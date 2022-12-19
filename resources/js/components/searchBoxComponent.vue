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

              this.$emit('setPosition',data.data.result.position)
            }

    },



}
</script>

<style>

  .tp{
    margin-top: 200px;
    width: 30vw;
    margin-left: 20px;
  }

</style>
