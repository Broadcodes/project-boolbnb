<template>
    <div class="container-fluid">
        <div class="apartment_containermx-5 px-5 mt-5 pt-5">

            <img v-if="dataListArr.apartment_images == null" class="resize-img img-thumbnail"
                :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
            <img v-else class="resize-img img-thumbnail" :src="getSrcImages('storage', dataListArr.apartment_images)"
                :alt="dataListArr.apartment_title">

            <ul class="m-5 list-group">
                <li class="list-group-item">Titolo annuncio: {{ dataListArr.apartment_title }}</li>
                <li class="list-group-item">Descrizione: {{ dataListArr.description }}</li>
                <li class="list-group-item">Numero di stanze: {{ dataListArr.bedrooms }}</li>
                <li class="list-group-item">Numero di letti: {{ dataListArr.bed }}</li>
                <li class="list-group-item">Numero di bagni: {{ dataListArr.bathrooms }}</li>
                <li class="list-group-item">MQ': {{ dataListArr.sqm }}</li>
                <li class="list-group-item">Categoria: {{ dataListArr.category }}</li>
                <li class="list-group-item">Prezzo: {{ dataListArr.price }}</li>
                <li class="list-group-item">Indirizzo: {{ dataListArr.address }}</li>
                <li class="list-group-item">Civico: {{ dataListArr.civic_number }}</li>
                <li class="list-group-item">CAP: {{ dataListArr.postalCode }}</li>
                <li class="list-group-item">Città: {{ dataListArr.city }}</li>
                <li class="list-group-item">Provincia: {{ dataListArr.countrySubdivision }}</li>
            </ul>

            <div class="d-flex align-items-end">
                <form class="w-100" action="api/message" method="POST">
                    <!-- non toccare l'input con il name="apartment_id" tanto è nascosto, ma di fondamentale importanza -->
                    <input class="d-none" type="text" name="apartment_id" required id="apartment_id" :value="dataListArr.id">
                    <!-- ------------------------------ -->
                    <div class="d-flex flex-column">
                        <label class="form-label" for="name">Nome e cognome</label>
                        <input class="form-control" type="text" name="name" required id="name" placeholder="Nome e cognome">
                    </div>
                    <div class="d-flex flex-column my-2">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" required id="email" placeholder="email">
                    </div>
                    <div class="d-flex flex-column">
                        <label class="form-label" for="content_message">Invia un messaggio al proprietario</label>
                        <textarea class="form-control" required name="content_message" id="content_message" cols="30" rows="10"
                            placeholder="Chiedi tutto quello che vuoi!"></textarea>
                    </div>
                    <div class="d-flex">
                        <div>
                            <input class="btn btn-success m-2" type="submit" value="Invia Messaggio">
                        </div>
                        <div>
                            <button @click="getBack" class="btn btn-primary m-2">Torna alla home</button>
                        </div>
                    </div>
                </form>

            </div>
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
        getSrcImages(folder, path) {
            return folder + '/' + path;
        }
    }
}
</script>

<style lang="scss" scoped>
.resize-img {
    min-height: 400px;
    max-height: 400px;
    object-fit: contain;
}
</style>
