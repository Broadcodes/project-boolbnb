<template>
    <div>

        <div class="container search_box">
            <searchBoxComponent @setPosition="getPosition" />
        </div>

        <div class="selection fixed-top">


            <div>
                <div class="d-flex align-items-center justify-content-around">

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Parchi nazionali') ? 'active' : ''" @click="setCategory('Parchi nazionali')"><span><i
                                    class="fa-solid fa-mountain-sun"></i></span>
                            <p>Montagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Baite') ? 'active' : ''" @click="setCategory('Baite')"><span><i
                                    class="fa-solid fa-house-crack"></i></span>
                            <p>Baite</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Campeggio') ? 'active' : ''" @click="setCategory('Campeggio')"><span><i
                                    class="fa-solid fa-campground"></i></span>
                            <p>Campeggio</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Viste mozzafiato') ? 'active' : ''" @click="setCategory('Viste mozzafiato')">
                            <span><i class="fa-solid fa-panorama"></i></span>
                            <p>Viste mozzafiato</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Sulle piste') ? 'active' : ''" @click="setCategory('Sulle piste')"><span><i
                                    class="fa-solid fa-person-skiing"></i></span>
                            <p>Sulle piste</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Igloo') ? 'active' : ''" @click="setCategory('Igloo')"><span><i
                                    class="fa-solid fa-igloo"></i></span>
                            <p>Igloo</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Città') ? 'active' : ''" @click="setCategory('Città')"><span><i
                                    class="fa-solid fa-city"></i></span>
                            <p>Città</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button :class="(categoryName=='Città d\'Arte') ? 'active' : ''" @click="setCategory('Città d\'Arte')"><span><i
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
            categoryName: ''

        }
    },
    methods: {

        setCategory(input) {

            this.categoryName=input;

            this.$emit('sentCategory', input)

            return this.categoryName;
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
    max-width: calc(100vh - 200px);
    z-index: 1040;
    position: relative;
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

.active {
    color:#000;
    font-weight: bold;
    // border-bottom: 3px solid #000;
}

</style>
