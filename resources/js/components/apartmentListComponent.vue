<template>
  <div>

    <div class="apartment_container px-5">
                <div class="contenitore-card p-5">
                    <div class="singola-card" v-for="apartment in apartments" :key="apartment.id"
                        @click="showApartment(apartment.apartment_slug)">
                        <img v-if="apartment.apartment_images == null" class="img-fluid resize-img img-thumbnail"
                            :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                        <img v-else class="img-fluid resize-img img-thumbnail"
                            :src="getSrcImages('storage', apartment.apartment_images)" :alt="apartment.apartment_title">
                        <h4 class="testo-card mt-3">{{ apartment.apartment_title.substr(0, 20) }} <span
                                v-if="apartment.apartment_title.length > 20">...</span></h4>
                    </div>
                </div>

            </div>

  </div>
</template>

<script>
export default {
    name:'apartmentListComponent',
    data(){
        return{

        }
    },
    props:{
        apartments:Array
    },
    methods:{
        getSrcImages(folder, path) {
            return folder + '/' + path;
        },
        showApartment(slug){

            this.$emit('clickedApartment', slug);
        },

    }

}
</script>

<style lang="scss" scoped>

#back{
    position: fixed;
}
.contenitore-card {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 30px;

}

.singola-card {
    cursor: pointer;
    width: calc(100% / 3 - 90px);
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
