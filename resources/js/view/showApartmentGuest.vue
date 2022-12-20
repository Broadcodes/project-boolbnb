<template>
    <div>
        <!-- non toccare l'input con il name="apartment_id" tanto è nascosto, ma di fondamentale importanza -->
        <input class="d-none" type="text" name="apartment_id" required id="apartment_id" :value="dataListArr.id">
        <!-- ------------------------------ -->

        <div class="areaShow">
            <div class="jumbo">
                <img v-if="dataListArr.apartment_images == null" class="imgJumbo"
                    :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                <img v-else class="imgJumbo" :src="getSrcImages('storage', dataListArr.apartment_images)"
                    :alt="dataListArr.apartment_title">
                <div class="filter">
                    <div class="text">
                        <div class="textArea">
                            <h1>{{ dataListArr.apartment_title }}</h1>
                            <p>{{ dataListArr.address }}, {{ dataListArr.civic_number }} - {{ dataListArr.city }} {{
                                    dataListArr.city
                            }}</p>
                            <p>Categoria: {{ dataListArr.category }}</p>
                        </div>
                    </div>

                    <a class="buttonMoreDetail" href="#areaDetail">Mostra dettagli</a>
                </div>
            </div>
            <div id="areaDetail">
                <div class="showDetail">
                    <div id="moreDetail" class="moreDetail container">
                        <h4>Prezzo a Notte: <span class="price">€ {{ dataListArr.price }}</span></h4>
                        <h5>Dettagli:</h5>
                        <hr>
                        <div class="detail">

                            <div class="detailElement">
                                <i class="fa-solid fa-people-roof"></i>
                                <p>{{ dataListArr.bedrooms }}</p>
                                <p>Numero di stanze</p>
                            </div>
                            <div class="detailElement">
                                <i class="fa-solid fa-bed"></i>
                                <p>{{ dataListArr.bed }}</p>
                                <p>Numero di letti</p>
                            </div>
                            <div class="detailElement">
                                <i class="fa-solid fa-bath"></i>
                                <p>{{ dataListArr.bathrooms }}</p>
                                <p>Numero di bagni</p>
                            </div>
                            <div class="detailElement">
                                <i class="fa-solid fa-ruler"></i>
                                <p>{{ dataListArr.sqm }}</p>
                                <p>Metri Quadrati</p>
                            </div>
                        </div>
                        <hr>

                        <div class="description">
                            <h5 class="text-center mb-3">Descrizione:</h5>
                            <p>{{ dataListArr.description }}</p>
                        </div>
                        <hr>


                        <div>
                            <button @click="getBack" class="btn btn-primary mt-3">Torna alla home</button>
                        </div>


                    </div>

                    <!-- <div class="description">
                            <h3>Descrizione</h3>
                            <p>{{ dataListArr.description }}</p>
                        </div>


                        <div>
                            <button @click="getBack" class="btn btn-primary mt-3">Torna alla home</button>
                        </div> -->

                </div>
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
.areaShow {
    margin-top: 100px;
    padding: 0px;

    .jumbo {
        width: 100%;
        height: 480px;
        position: relative;

        .imgJumbo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center right;
            position: absolute;
            top: 0;
            left: 0;
        }

        .filter {
            width: 100%;
            height: 100%;
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.8) 0%, rgba(26, 26, 26, 0.75) 37%, rgba(56, 56, 56, 0.65) 72%, rgba(255, 255, 255, 0) 100%);
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            overflow: hidden;

            .text {
                width: 50%;
                height: 100%;
                display: flex;
                padding-left: 200px;
                align-items: center;
            }

            .textArea {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding: 50px;
                transition: all 0.5s;
                position: relative;
                animation: moveToRight 2s ease;

                // &:hover {
                //     scale: 1.05;
                //     box-shadow: 0px 0px 40px #fff;
                // }

                h1,
                h3,
                h4,
                p {
                    text-align: left;
                    color: #fff;
                }

                h2 {
                    padding-bottom: 10px;
                    color: white;
                }
            }

            @keyframes moveToRight {
                from {
                    left: -500px;
                }

                to {
                    left: 0px;
                }
            }

            .buttonMoreDetail {
                width: 240px;
                height: 240px;
                line-height: 115px;
                border-radius: 50%;
                position: absolute;
                font-size: 1.2rem;
                color: #fff;
                bottom: -150px;
                transform: translateX(-50%);
                background-color: rgba(0, 0, 0, 0.5);
                box-shadow: inset 0px 0px 20px #fff;
                text-decoration: none;
                animation: moveToTop 2s ease;

                &:hover {
                    font-size: 1.3rem;
                }
            }

            @keyframes moveToTop {
                from {
                    bottom: -250px;
                }

                to {
                    bottom: -150px;
                }
            }
        }
    }

    #areaDetail {
        padding-top: 50px;


        .showDetail {
            width: 100%;
            // height: 350px;
            // margin-top: -73px;
            padding: 25px 0px;
            // background-color: #ededed;

            .moreDetail {
                width: 100%;
                height: 1000px;
                text-align: center;

                h4 {

                    margin: 35px 0;

                    .price {
                        color: #ff385c;

                    }
                }

                .detail {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    // padding: 40px;
                    // border: 1px solid blue;

                    .detailElement {
                        display: flex;
                        min-width: 150px;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        padding: 15px;
                        transition: all .5s;
                        cursor: pointer;

                        &:hover {
                            transform: scale(1.1);
                            box-shadow: 20px 20px 15px rgba(0, 0, 0, 0.25);
                        }

                        i {
                            font-size: 1.5rem;
                            margin-bottom: 20px;
                        }

                        h4 {
                            font-size: 1.6rem;
                        }


                    }
                }

                .description {
                    padding: 30px;
                    text-align: left;
                    height: 200px;
                    overflow-y: auto;
                    border-radius: 10px;
                    margin-top: 55px;
                    }


}
        }
    }


}
</style>
