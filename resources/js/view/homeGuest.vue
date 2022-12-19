<template>
    <div class="container-fluid">

        <div v-if="titleApartmentShow == ''">

            <div>
                <FilterSearch @coordinate="sentCoordinate" />
            </div>

            <div class="apartment_container mx-5 px-5">
                <div v-if="filteredData" class="contenitore-card">
                    <div class="singola-card" v-for="apartment in apartments" :key="apartment.id"
                        @click="getApartmentShow(apartment)">
                        <img v-if="apartment.apartment_images == null" class="img-fluid resize-img img-thumbnail"
                            :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                        <img v-else class="img-fluid resize-img img-thumbnail"
                            :src="getSrcImages('storage', apartment.apartment_images)" :alt="apartment.apartment_title">
                        <h4 class="testo-card mt-3">{{ apartment.apartment_title.substr(0, 20) }} <span
                                v-if="apartment.apartment_title.length > 20">...</span></h4>
                    </div>
                </div>
                <div v-else class="contenitore-card">
                    <div class="singola-card" v-for="apartment in apartmentToShow" :key="apartment.id"
                        @click="getApartmentShow(apartment)">
                        <img v-if="apartment.apartment_images == null" class="img-fluid resize-img img-thumbnail"
                            :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                        <img v-else class="img-fluid resize-img img-thumbnail"
                            :src="getSrcImages('storage', apartment.apartment_images)" :alt="apartment.apartment_title">
                        <h4 class="testo-card">{{ apartment.apartment_title.substr(0, 20) }} <span
                                v-if="apartment.apartment_title.length > 20">...</span></h4>
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

            if (this.titleApartmentShow != '') {
                alert('Messaggio inviato correttamente');
            }

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
        getSrcImages(folder, path) {
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
    min-width: 300px;
    border-radius: 20px;
    padding: 10px;
    align-items: center;
    display: flex;
    flex-direction: column;
    object-fit: contain;
    transition: all .5s;

    .resize-img {
        min-height: 200px;
        max-height: 200px;
        object-fit: cover;

    }

    .testo-card {
        font-size: 1.3em;
        font-weight: 600;
        padding: 5px;

    }

    &:hover {
        transform: scale(1.05);
        box-shadow: 8px 8px 20px rgb(201, 201, 201);
    }


}
</style>
