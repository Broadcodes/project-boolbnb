<template>
    <div class="container-fluid">

        <div class="apartment_containermx-5 px-5 mt-5 pt-5">

            <img v-if="apartment.apartment_images == null" class="resize-img img-thumbnail"
                :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
            <img v-else class="resize-img img-thumbnail" :src="getSrcImages('storage', apartment.apartment_images)"
                :alt="apartment.apartment_title">

            <ul class="m-5 list-group">
                <li class="list-group-item">Titolo annuncio: {{ apartment.apartment_title }}</li>
                <li class="list-group-item">Descrizione: {{ apartment.description }}</li>
                <li class="list-group-item">Numero di stanze: {{ apartment.bedrooms }}</li>
                <li class="list-group-item">Numero di letti: {{ apartment.bed }}</li>
                <li class="list-group-item">Numero di bagni: {{ apartment.bathrooms }}</li>
                <li class="list-group-item">MQ': {{ apartment.sqm }}</li>
                <li class="list-group-item">Categoria: {{ apartment.category }}</li>
                <li class="list-group-item">Prezzo: {{ apartment.price }}</li>
                <li class="list-group-item">Indirizzo: {{ apartment.address }}</li>
                <li class="list-group-item">Civico: {{ apartment.civic_number }}</li>
                <li class="list-group-item">CAP: {{ apartment.postalCode }}</li>
                <li class="list-group-item">Città: {{ apartment.city }}</li>
                <li class="list-group-item">Provincia: {{ apartment.countrySubdivision }}</li>
            </ul>

            <div class="d-flex align-items-end">
                <form class="w-100" action="api/message" method="POST">
                    <!-- non toccare l'input con il name="apartment_id" tanto è nascosto, ma di fondamentale importanza -->
                    <input class="d-none" type="text" name="apartment_id" required id="apartment_id" :value="apartment.id">
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

                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'showApartmentGuest',
    data(){
        return{
            apartment:undefined
        }
    },

    mounted(){
        const slug = this.$route.params.slug;
        console.log(this.$route);

        this.loadPage('/api/apiHome/' + slug);

    },
    methods: {
        loadPage(url){
            console.log(url);

            axios.get(url).then(({data})=>{
                if(data.success){
                    console.log('data', data)
                    this.apartment = data.results;
                    console.log(this.apartment)
                }else{
                    console.log('no')
                }
            }).catch(e =>{
                console.log(e);
            })
        },

        getSrcImages(folder, path) {
            return folder + '/' + path;
        },
        getBack(){
            this.$router.go(-1);


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
