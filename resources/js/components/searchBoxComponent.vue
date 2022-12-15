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
                        language: 'en-GB',
                        limit: 5
                    },
                    autocompleteOptions: {
                        key: 'APoE4D1CGAlRGOWQcaSfdelLIwY944gV',
                        language: 'en-GB'
                    }
            };
            var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
            var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

            ttSearchBox.on('tomtom.searchbox.resultsfound', this.boh);
            document.getElementById("searchBox").append(searchBoxHTML);

            },
            boh(data){


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
