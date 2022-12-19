<template>
    <div>
        <div>
            <FilterSearch   @coordinate="sentCoordinate" @sentCategory="setCategory"/>
        </div>

        <div v-if="!loading">
            <homeComponent :apartments="apartmentsToShow"/>
        </div>
        <div v-else>
            loading
        </div>


        <button @click="getBack">get back</button>



    </div>
</template>

<script>

import homeComponent from '../components/homeComponent';
import FilterSearch from '../components/FilterSearch.vue';

export default {
    name: "homeGuest",
    data(){

        return{
            apartmentsToShow :[],
            loading:true,
            apartments:[],
            positionSet:false,
            apartmentsInRadius:[]
        }
    },
    mounted() {
        this.getApartment();
    },
    methods:{
        getApartment(){
            axios.get("/api/apiHome").then(response => {
            if (response.data.success) {
                this.apartments= response.data.results
                this.apartmentsToShow  = response.data.results
                this.loading=false
                console.log(this.apartmentsToShow);
            }

        });
        },

        getBack(){
            this.apartmentsToShow=this.apartments;
            this.positionSet=false;

        },

        sentCoordinate(data){
            axios.post('/api/coordinate',data).then(response=>{
                if(response)
                {
                    this.apartmentsInRadius=response.data[0];
                    this.apartmentsToShow=response.data[0];
                    this.positionSet=true;
                }

            })

        },

        setCategory(category){

                if(!this.positionSet){
                    this.apartmentsToShow=this.apartments
                    let arr=[];
                    arr=this.apartmentsToShow.filter(
                        function(apartment){
                                return apartment.category.toLowerCase()===category.toLowerCase()
                              }
                    )
                    this.apartmentsToShow=arr;
                }
                else{

                    let arr=[];
                    this.apartmentsToShow=this.apartmentsInRadius
                    console.log(this.apartmentsToShow);
                    arr=this.apartmentsToShow.filter(function(apartment){
                    return apartment.category.toLowerCase()===category.toLowerCase()

                })
                this.apartmentsToShow=arr;
                }


        },


    },

    components: {

        FilterSearch,
        homeComponent
    }
}
</script>

<style lang="scss" scoped>

.apartment_container{
    margin-top: 450px;
}



</style>
