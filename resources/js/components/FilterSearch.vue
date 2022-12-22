<template>
    <div>

        <div class="container search_box">
            <searchBoxComponent @setPosition="getPosition" />
        </div>

        <div class="selection fixed-top">


            <div>
                <div class="d-flex align-items-center justify-content-around">

                    <div class="flex-column text-center">
                        <button @click="setCategory('Parchi nazionali')"><span><i
                                    class="fa-solid fa-mountain-sun"></i></span>
                            <p>Montagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Baite')"><span><i
                                    class="fa-solid fa-house-crack"></i></span>
                            <p>Baite</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Campagna')"><span><i
                                    class="fa-solid fa-campground"></i></span>
                            <p>Campagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Viste mozzafiato')">
                            <span><i class="fa-solid fa-panorama"></i></span>
                            <p>Viste mozzafiato</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Sulle piste')"><span><i
                                    class="fa-solid fa-person-skiing"></i></span>
                            <p>Sulle piste</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Luoghi remoti')"><span><i
                                    class="fa-solid fa-igloo"></i></span>
                            <p>Igloo</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Città popolari')"><span><i
                                    class="fa-solid fa-city"></i></span>
                            <p>Città</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Dimore storiche')"><span><i
                                    class="fa-solid fa-landmark"></i></span>
                            <p>Città d'Arte</p>
                        </button>
                    </div>

                </div>

            </div>
            <div>



            </div>
        </div>



    </div>
</template>

<script>
import searchBoxComponent from '../components/searchBoxComponent.vue';
export default {
    name: 'FilterSearch',
    data() {
        return {


        }
    },
    methods: {

        setCategory(input) {
            console.log(input)

            this.$emit('sentCategory', input)
        },
        getPosition(data){

            this.$emit('coordinate',data)//data:object


        }

    },
    components:{
        searchBoxComponent
    }

}
</script>

<style lang="scss" scoped>

.search_box{
    margin-top: 150px;
    position: relative;
    top: -150px;
    z-index: 1030;
    max-width: calc(100vh - 300px);
}

button {
    text-decoration: none;
    border: none;
    background-color: rgba(255, 255, 255, 0);
    color: #727171;
    transition: 0.3s;
}

button:hover {
    color: black;
}

.selection{
    margin-top: 66px !important;
    padding-top: 15px;
    z-index: 200;
    border-bottom: 1px solid lightgray;
}

</style>
