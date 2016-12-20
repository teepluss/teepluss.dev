<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    mounted() {
      // Vue.http.headers.common['Authorization'] = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJlYjM1ZGMwYjA5MGI2NjM1ZjU5ODk0OTljMWJiOTliOWY3NGJlZmZmMWVjNWY5NGRhYjQwMmYzYjE5NGE3MDc2MDI2MWI2OGM1NDYxY2Y4In0.eyJhdWQiOiIxIiwianRpIjoiMmViMzVkYzBiMDkwYjY2MzVmNTk4OTQ5OWMxYmI5OWI5Zjc0YmVmZmYxZWM1Zjk0ZGFiNDAyZjNiMTk0YTcwNzYwMjYxYjY4YzU0NjFjZjgiLCJpYXQiOjE0NzkyNzMzMzgsIm5iZiI6MTQ3OTI3MzMzOCwiZXhwIjoxNTEwODA5MzM4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.w83NjKL2M3pjmFqjOS3ExBzNfn0y2LgJaFZpSPjghYhxsy3bbHeslsNOU2ZyCbORAH-kG6w4-7UWY8B4ifqiZ3uhllVBZnc4bTmds7Z_HG57JMxWLyItOSriJLvvc7O2InfC_ulzAGHimAiZohDEPBQmsNUcwDABmqI_AZwd6JHEKex1nmLTU0v5wbNS3B38QzO18bFfmqn2EaSkl_p07NJIql30Gm73YS0IgxVV3woeuVHm7KqGk0fcfOdkcmf9LzyOK7M2UoiLBznL6Xp8kC2p1lYBvs2OdfTiZG95zR4QIgvxadkHD1lWH73amBZN63lVa3E8lBcBrB5DE_O-Dq89siawSqpp6kHCs-v5_bob0lKMaCp9c0Agdl0E-qVwFOTO2dLyBnMqRffxoIrFEThZpkpggIu3cRwo2R8hSRfZJEbpFt6FBg9x32v8QVVbp0xvyvJsAJras9R-TdgT1Ew9s7d-4DKGkf2nwclktITdZoG7w9Q7TMqRVhYak6DZHkon1JPpe8as8GVoQFvqd-fhpD82BMtbVI6Cs2dBF0q9lOFuqw3pZFm6rdYPfRV5xjj1beW0PjNmFE12k6qscdN0yBlJwRkfSfEpNHqeHM5_IZeuP6NH2frYab5LJKvjHLGAHt_B972llLdpajokuWRc_lVQWpDSAxcFEqZd2CY';

      // this.$http.get('http://foodretail.dev/api/category')
      //   .then((resp) => {
      //     console.log(resp)
      //   })
      console.log('Mounted.')
    }
  }
</script>
