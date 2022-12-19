<template>
    <div class="mx-5 px-5">
        <!-- CARD SECTION -->

        <div class="carte">
            <div class="row">



                <div v-for="apartment in apartments" :key="apartment.id" class="col-3">
                    <a href="#"><img src="img/casa_campagna.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">{{apartment.address}}</p>
                        <p>{{apartment.description}}</p>
                    </a>
                </div>




            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'homeComponent',
    props:{
        apartments:Array
    },
    mounted(){
        console.log(apartments)

    },

}
</script>

<style lang="scss" scoped>
.carte {
    margin-top: 220px;

    a {
        transition: 0.1s;

        &:hover {
            opacity: 80%;
        }
    }
}
</style>
