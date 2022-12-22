<template>

    <div>
        <div class="container-fluid">
                <div v-if="apartmentClick||positionSet||categorySet" id="back" @click="getBack">
                    <button>back</button>
                </div>

                <div v-if="!loading">

                    <div class="psfix">
                        <FilterSearch @coordinate="sentCoordinate" @sentCategory="setCategory" />
                    </div>

                    <div v-if="!apartmentClick" >
                        <apartmentListComponent :apartments="apartmentsToShow" @clickedApartment="showApartment" />
                    </div>



                </div>
                <div v-else>
                    loading
                </div>

        </div>
        <router-view></router-view>


    </div>

</template>

<script>
import FilterSearch from '../components/FilterSearch.vue';
import apartmentListComponent from '../components/apartmentListComponent.vue';

export default {
    name: "homeGuest",
    data() {

        return {
            apartmentsToShow :{},
            loading:true,
            apartments:[],
            positionSet:false,
            apartmentsInRadius:[],
            apartmentClick:false,
            categorySet:false,
            data:[]

        }

    },
    mounted() {
        this.getApartment();
        console.log(this.$route)
    },
    methods:{
        getApartment(){
            axios.get("/api/apiHome").then(response => {
            if (response.data.success) {
                this.apartments= response.data.results2;
                console.log(response.data.results);
                this.data=response.data.results;
                this.apartmentsToShow  = response.data.results;
                this.loading=false;

            }

        });
        },

        getBack(){
            this.apartmentsToShow=this.data;
            this.positionSet=false;
            this.categorySet=false;
            this.apartmentClick=false;
            this.$router.go(-1);

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
            this.categorySet=true;

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
        showApartment(slug){
            this.apartmentClick=true;
            console.log('hai cliccato il post con slug:', slug);
            this.$router.push('/home/' + slug)
        }


    },
    components: {
        FilterSearch,
        apartmentListComponent
    }
}
</script>

<style lang="scss">
#back{
    position: fixed;
}




</style>
