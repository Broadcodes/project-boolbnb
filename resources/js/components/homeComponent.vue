<template>
    <div class="mx-5 px-5">
        <!-- CARD SECTION -->

        <div class="container-fluid carte">
            <div class="row">

                <div class="col-3">
                    <a href="#"><img src="img/casa_campagna.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Case in campagna</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/casa_mare.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Case al Mare</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/Igloo1.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Igloo</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/casa_montagna.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Case in Montagna</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/campeggio-italia.webp" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Campeggio</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/citta.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Case in Città</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/Roma.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Città d'arte</p>
                    </a>
                </div>

                <div class="col-3">
                    <a href="#"><img src="img/panorama.jpeg" class="img-fluid rounded" alt="">
                        <p class="text-center mt-2">Vista mozzafiato</p>
                    </a>
                </div>


            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'homeComponent'
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
