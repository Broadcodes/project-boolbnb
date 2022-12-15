<template>
    <div>
        <div>
            <FilterSearch @whereCondition="getWhereCondition" @setCategory="getCategoryCondition" @coordinate="sentCoordinate"/>

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
                this.apartmentToShow = response.data.results
                console.log(this.apartmentToShow)


            }

        });
        },

        getWhereCondition(array){
            this.apartmentToShow=[];

            this.addressCondition = array[0];
            this.countryCondition = array[1];
            this.cityCondition = array[2];

            this.getApartmentToShow();



        },

        getCategoryCondition(category){

            this.apartmentToShow=[];
            this.currentCategory=category;

            this.getApartmentToShow();



        },
        getApartmentToShow(){

            this.apartmentToShow=[];
            this.apartments.forEach(element=>{
                if(element.address.toLowerCase().includes(this.addressCondition.toLowerCase()||element.address.toLowerCase()===this.addressCondition.toLowerCase)||
                element.countrySubdivision.toLowerCase().includes(this.countryCondition.toLowerCase()||element.countrySubdivision.toLowerCase()===this.countryCondition.toLowerCase)||
                element.city.toLowerCase().includes(this.cityCondition.toLowerCase()||element.city.toLowerCase()===this.cityCondition.toLowerCase() )
                ||element.category===this.currentCategory){





                    this.apartmentToShow.push(element);
                    this.filteredData = false;
                }

             }
            )



        },
        getBack(){
            this.filteredData=true;
            this.apartmentToShow =this.apartments;
        },
        sentCoordinate(data){
            console.log(data);

            axios.post('/api/coordinate',data).then(response=>{
                if(response)
                {
                    console.log(response)
                }


            })

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
