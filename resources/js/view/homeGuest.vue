<template>
    <div>
        <div v-if="titleApartmentShow == ''">
            <div>
                <FilterSearch @coordinate="sentCoordinate" />
            </div>

            <div class="apartment_container container-fluid mx-5 px-5">
                <div v-if="filteredData">
                    <div class="apartmentShow" v-for="apartment in apartments" :key="apartment.id" @click="getApartmentShow(apartment)">
                        <img v-if="apartment.apartment_images == null" class="img-fluid w-25" src="../../../public/images/immagine_non_disponibile.png" alt="Nessuna immagine">
                        <img v-else class="img-fluid w-25" :src="getSrcImages(apartment.apartment_images)" :alt="apartment.apartment_title">
                        <h4> {{ apartment.apartment_title }}</h4>
                    </div>
                </div>
                <div v-else>
                    <div class="apartmentShow" v-for="apartment in apartmentToShow" :key="apartment.id" @click="getApartmentShow(apartment)">
                        <img v-if="apartment.apartment_images == null" class="img-fluid w-25" src="../../../public/images/immagine_non_disponibile.png" alt="Nessuna immagine">
                        <img v-else class="img-fluid w-25" :src="getSrcImages(apartment.apartment_images)" :alt="apartment.apartment_title">
                        <h4> {{ apartment.apartment_title }}</h4>
                    </div>

                </div>
                <button @click="getBack">get back</button>
            </div>
        </div>
        <div v-else>
            <showApartmentGuest :dataListArr="showDetailsApartment" @pageBack="changePage" />
        </div>
    </div>
</template>

<script>
import FilterSearch from '../components/FilterSearch.vue';
import showApartmentGuest from '../view/showApartmentGuest.vue';

export default {
    name: "homeGuest",
    data() {

        return {
            apartmentToShow: [],
            filteredData: true,
            apartments: [],
            addressCondition: '',
            countryCondition: '',
            cityCondition: '',
            currentCategory: '',
            titleApartmentShow: '',
            showDetailsApartment: []

        }

    },
    mounted() {
        this.getApartment();
    },
    methods: {
        getApartment() {
            axios.get("/api/apiHome").then(response => {
                if (response.data.success) {

                    this.apartments = response.data.results

                }
            });
        },

        getApartmentShow(value) {
            this.titleApartmentShow = value.apartment_title;
            this.showDetailsApartment = value;
        },
        getBack() {
            this.filteredData = true;
            this.apartmentToShow = this.apartments;
        },
        changePage(value) {
            this.titleApartmentShow = value;
            this.showDetailsApartment = [];
        },
        sentCoordinate(data) {

            axios.post('/api/coordinate', data).then(response => {
                if (response) {
                    console.log(response)
                    this.apartmentToShow = response.data[0];
                }
            })
            this.filteredData = false;
        },
        getSrcImages(path){
            return 'storage/' + path;
        }
    },

    components: {
        FilterSearch,
        showApartmentGuest
    }
}
</script>

<style lang="scss">
.apartment_container {
    margin-top: 250px;

    .apartmentShow {
        cursor: pointer;
    }
}
</style>
