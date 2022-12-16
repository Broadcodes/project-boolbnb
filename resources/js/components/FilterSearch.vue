<template>
    <div>
        <div class="centerz d-flex align-items-center justify-content-center">

             <searchBoxComponent @setPosition="getPosition" />

        </div>



        <div class="selection fixed-top w-100">


            <div>
                <div class="categoryArea d-flex align-items-center justify-content-around w-100">

                    <div class="flex-column text-center">
                        <button @click="setCategory('Parchi nazionali')"><span class="flex-column"><i
                                    class="fa-solid fa-mountain-sun"></i></span>
                            <p>Montagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Baite')"><span class="flex-column"><i
                                    class="fa-solid fa-house-crack"></i></span>
                            <p>Baite</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Campagna')"><span class="flex-column"><i
                                    class="fa-solid fa-campground"></i></span>
                            <p>Campagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Viste mozzafiato')"><span class="flex-column"><i
                                    class="fa-solid fa-panorama"></i></span>
                            <p>Viste mozzafiato</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Sulle piste')"><span class="flex-column"><i
                                    class="fa-solid fa-person-skiing"></i></span>
                            <p>Sulle piste</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Luoghi remoti')"><span class="flex-column"><i
                                    class="fa-solid fa-igloo"></i></span>
                            <p>Igloo</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Città popolari')"><span class="flex-column"><i
                                    class="fa-solid fa-city"></i></span>
                            <p>Città</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Dimore storiche')"><span class="flex-column"><i
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

            this.$emit('setCategory', input)
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
.centerz {
    position: relative;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 50%;
}

button {
    text-decoration: none;
    border: none;
    background-color: rgba(255, 255, 255, 0);
}

.categoryArea{
    position: relative;
    top: -10px;
}

</style>
