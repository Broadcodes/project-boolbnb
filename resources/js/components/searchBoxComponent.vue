<template>
  <div>
    <div id="searchBox" class="tp">

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
                        language: 'it',
                        limit: 5
                    },
                    autocompleteOptions: {
                        key: 'APoE4D1CGAlRGOWQcaSfdelLIwY944gV',
                        language: 'it'
                    }
            };
            var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
            var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

            ttSearchBox.on('tomtom.searchbox.resultsfound', this.emitPosition);
            document.getElementById("searchBox").append(searchBoxHTML);

            },
            emitPosition(data){


            this.$emit('setPosition',data.data.results.fuzzySearch.results[0].position)
          }

    },



}
</script>

<style>

  .tp{
    margin-top: 200px;
  }

</style>
