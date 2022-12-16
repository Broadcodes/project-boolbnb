<template>
    <div>
        <div class="apartment_container container-fluid mx-5 px-5">

            <img v-if="dataListArr.apartment_images == null" class="img-fluid w-25"
                :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
            <img v-else class="img-fluid w-25" :src="getSrcImages('storage', dataListArr.apartment_images)"
                :alt="dataListArr.apartment_title">

            <ul class="m-5">
                <li>Titolo annuncio: {{ dataListArr.apartment_title }}</li>
                <li>Descrizione: {{ dataListArr.description }}</li>
                <li>Numero di stanze: {{ dataListArr.bedrooms }}</li>
                <li>Numero di letti: {{ dataListArr.bed }}</li>
                <li>Numero di bagni: {{ dataListArr.bathrooms }}</li>
                <li>MQ': {{ dataListArr.sqm }}</li>
                <li>Categoria: {{ dataListArr.category }}</li>
                <li>Prezzo: {{ dataListArr.price }}</li>
                <li>Indirizzo: {{ dataListArr.address }}</li>
                <li>Civico: {{ dataListArr.civic_number }}</li>
                <li>CAP: {{ dataListArr.postalCode }}</li>
                <li>Città: {{ dataListArr.city }}</li>
                <li>Provincia: {{ dataListArr.countrySubdivision }}</li>
            </ul>

            <button @click="getBack">get back</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'showApartmentGuest',
    props: {
        dataListArr: Object,
    },
    methods: {
        getBack() {
            this.$emit('pageBack', '')
        },
        getSrcImages(folder, path){
            return folder + '/' + path;
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
