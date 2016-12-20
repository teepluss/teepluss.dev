
<script>
  import FormError from './FormError.vue'

  export default {
    name: 'form-request',
    props: ['method', 'action'],
    components: {
      FormError
    },
    data: function() {
      return {
        models: [],
        errors: [],
        submitted: false
      }
    },
    mounted () {
      // console.log(this.$el.action);
    },
    methods: {
      callbackTo (func) {
        // Call to native js.
        Event.emitEvent(func, [this.models])
      },
      sendRequest () {
        const action = this.$el.querySelector('form').action

        let formData = new FormData()

        // Add an image if exists.
        let userfile = this.$el.querySelector('#inputFile')
        if (_.isObject(userfile)) {
          const upload = userfile.files[0];
          if (! _.isUndefined(upload)) {
            formData.append('userfile', upload)
          }
        }

        _.forIn(this.models, (v, i) => {
          formData.append(i, v)
        })

        this.$http.post(action, formData).then((resp) => {
          this.models = []
          this.errors = []
          this.submitted = true
        }, (resp) => {
          // console.log(resp.data)
          this.errors = resp.data
        })
      }
    }
  }
</script>
