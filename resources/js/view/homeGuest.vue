<template>
    <div class="container-fluid">

        <div v-if="titleApartmentShow == ''">

            <div>
                <FilterSearch @coordinate="sentCoordinate" />
            </div>

            <div class="apartment_container container-fluid mx-5 px-5">

                    <div v-if="filteredData" class="contenitore-card">
                        <div class="singola-card" v-for="apartment in apartments" :key="apartment.id" @click="getApartmentShow(apartment)">
                            <img v-if="apartment.apartment_images == null" class="img-fluid resize-img img-thumbnail" :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                            <img v-else class="img-fluid resize-img img-thumbnail" :src="getSrcImages('storage', apartment.apartment_images)" :alt="apartment.apartment_title">
                            <h4 class="testo-card"> {{ apartment.apartment_title }}</h4>
                        </div>
                    </div>
                    <div v-else>
                        <div class="singola-card" v-for="apartment in apartmentToShow" :key="apartment.id" @click="getApartmentShow(apartment)">
                            <img v-if="apartment.apartment_images == null" class="img-fluid resize-img img-thumbnail" :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                            <img v-else class="img-fluid resize-img img-thumbnail" :src="getSrcImages('storage', apartment.apartment_images)" :alt="apartment.apartment_title">
                            <h4 class="testo-card"> {{ apartment.apartment_title }}</h4>
                        </div>
                    </div>

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
        getSrcImages(folder, path){
            return folder + '/' + path;
        }
    },

    components: {
        FilterSearch,
        showApartmentGuest
    }
}
</script>

<style lang="scss">
    .contenitore-card {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 30px;
     }

    .singola-card {
        cursor: pointer;
        width: calc(100% / 3 - 90px);
        border: 3px solid brown;
        border-radius: 20px;
        padding: 10px;
        align-items: center;
        display: flex;
        flex-direction: column;
        object-fit: contain;
            .resize-img {
                min-height: 200px;
                max-height: 200px;
                object-fit: cover;

            }
            .testo-card {
                font-size: 1.3em;
                font-weight: 600;
                color: brown;
                padding: 5px;
    }


}

</style>
