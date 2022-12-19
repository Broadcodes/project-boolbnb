<template>
    <div>
      <div id="searchBox" class="container tp justify-content-center d-flex">

      </div>

    </div>
  </template>

  <script>
  export default {
      name:'searchBoxComponent',
      data(){
          return{











          }
      },
      mounted(){


          this.getPosition();




      },
      methods:{
              getPosition(){

                  let options = {
                      searchOptions: {
                          key: 'APoE4D1CGAlRGOWQcaSfdelLIwY944gV',
                          language: 'it-IT',
                          limit: 5
                      },
                      autocompleteOptions: {
                          key: 'APoE4D1CGAlRGOWQcaSfdelLIwY944gV',
                          language: 'it-IT'
                      }
              };
              var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
              var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

              ttSearchBox.on('tomtom.searchbox.resultselected', this.emitPosition);
              document.getElementById("searchBox").append(searchBoxHTML);

              },
              emitPosition(data){
                console.log(data.data.result.position);



              this.$emit('setPosition',data.data.result.position)
            }

      },



  }
  </script>

  <style>



  </style>
