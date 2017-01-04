<template>
  <div>
    <ul>
      <li v-for="message in messages">
        <span>{{ message.text }}</span>
      </li>
    </ul>
    <p><button @click="broadcast">Broadcast</button></p>
  </div>
</template>
<script>
  export default {
    name: 'broadcast',
    data () {
      return {
        messages: []
      }
    },
    mounted () {
      const userId = 1;

      // Private
      Echo.private('order.' + userId)
        .listen('ServerCreated', (e) => {
            this.messages.push(e.message)
        });

      // Public
      // Echo.channel('order.' + userId)
      //   .listen('ServerCreated', (e) => {
      //       this.messages.push(e.message)
      //   });
    },
    methods: {
      broadcast () {
        this.$http.post('/api/notifications')
          .then(resp => {
            // console.log(resp)
          })
      }
    }
  }
</script>
