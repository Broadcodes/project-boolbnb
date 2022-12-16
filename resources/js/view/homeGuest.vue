<template>
    <div>
        <div>
            <FilterSearch   @coordinate="sentCoordinate"/>

        </div>

        <div class="apartment_container container-fluid mx-5 px-5">
                    <div v-if="filteredData">
                        <div v-for="apartment in apartments" :key="apartment.id">
                            {{apartment.address}}


                        </div>

                    </div>
                    <div v-else>
                        <div v-for="apartment in apartmentToShow" :key="apartment.id">

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
            apartmentToShow :[],
            filteredData : true,
            apartments:[],
            addressCondition:'',
            countryCondition:'',
            cityCondition:'',
            currentCategory:''


        }

    },
    mounted() {
        this.getApartment();
    },
    methods:{
        getApartment(){
            axios.get("/api/apiHome").then(response => {
            if (response.data.success) {

                this.apartments  = response.data.results



            }

        });
        },





        getBack(){
            this.filteredData=true;
            this.apartmentToShow =this.apartments;
        },
        sentCoordinate(data){




            axios.post('/api/coordinate',data).then(response=>{
                if(response)
                {


                    console.log(response)
                    this.apartmentToShow=response.data[0];

                }



            })
            this.filteredData=false;

        }







    },

    components: {

        FilterSearch
    }
}
</script>

<style lang="scss">

.apartment_container{
    margin-top: 250px;
}



</style>
