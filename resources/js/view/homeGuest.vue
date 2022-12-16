<template>
    <div>
        <div>
            <FilterSearch   @coordinate="sentCoordinate" @sentCategory="setCategory"/>

        </div>

        <div class="apartment_container container-fluid mx-5 px-5">
                    <div v-if="loading">

                    </div>

                    <div v-else >
                        <div v-for="apartment in apartmentsToShow" :key="apartment.id">

                            {{apartment.address}}
                            {{apartment.apartment_title}}

                        </div>

                    </div>
                    <button @click="getBack">get back</button>

        </div>


    </div>
</template>

<script>

import HomeComponent from '../components/HomeComponent';
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


                    console.log(response)
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



                arr=this.apartmentsToShow.filter(function(apartment){
                    return apartment.category.toLowerCase()===category.toLowerCase()

                })





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

        FilterSearch
    }
}
</script>

<style lang="scss">

.apartment_container{
    margin-top: 450px;
}



</style>
