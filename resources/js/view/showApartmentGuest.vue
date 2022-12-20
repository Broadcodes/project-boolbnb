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
                            <h3>{{ dataListArr.address }}, {{ dataListArr.civic_number }} - {{ dataListArr.city }} {{
                                    dataListArr.city
                            }}</h3>
                            <h3>Categoria: {{ dataListArr.category }}</h3>
                        </div>
                    </div>

                    <a class="buttonMoreDetail" href="#areaDetail">Mostra dettagli</a>
                </div>
            </div>
            <div id="areaDetail">
                <div class="showDetail">
                    <div id="moreDetail" class="moreDetail container">
                        <h2>Prezzo dell'immobile: <span class="price">€ {{ dataListArr.price }}</span></h2>
                        <div class="detail">
                            <div class="detailElement">
                                <i class="fa-solid fa-people-roof"></i>
                                <h4>{{ dataListArr.bedrooms }}</h4>
                                <h5>Numero di stanze</h5>
                            </div>
                            <div class="detailElement">
                                <i class="fa-solid fa-bed"></i>
                                <h4>{{ dataListArr.bed }}</h4>
                                <h5>Numero di letti</h5>
                            </div>
                            <div class="detailElement">
                                <i class="fa-solid fa-bath"></i>
                                <h4>{{ dataListArr.bathrooms }}</h4>
                                <h5>Numero di bagni</h5>
                            </div>
                            <div class="detailElement">
                                <i class="fa-solid fa-ruler"></i>
                                <h4>{{ dataListArr.sqm }}</h4>
                                <h5>MQ</h5>
                            </div>
                        </div>
                        <h4 class="description mt-5">{{ dataListArr.description }}</h4>
                        <button @click="getBack" class="btn btn-primary">Torna alla home</button>
                    </div>
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
        height: 700px;
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

                &:hover {
                    scale: 1.05;
                    box-shadow: 0px 0px 40px #fff;
                }

                h1,
                h3 {
                    text-align: left;
                    color: #fff;
                }

                h1 {
                    padding-bottom: 10px;
                    font-size: 4rem;
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
            height: 400px;
            margin-top: 120px;
            padding: 25px 0px;
            background-color: #ededed;

            .moreDetail {
                width: 100%;
                height: 1000px;
                text-align: center;

                h2 {
                    font-size: 3rem;
                    margin: 35px 0;

                    .price {
                        color: rgb(28, 141, 233);
                        font-size: 4.5rem;
                    }
                }

                .detail {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    padding: 40px;

                    .detailElement {
                        display: flex;
                        min-width: 150px;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        padding: 15px;
                        transition: all .5s;

                        &:hover {
                            transform: scale(1.1);
                            box-shadow: 20px 20px 15px rgba(0, 0, 0, 0.25);
                        }

                        i {
                            font-size: 2rem;
                            margin-bottom: 20px;
                        }

                        h4 {
                            font-size: 1.6rem;
                        }

                        h5 {
                            font-size: 1.2rem;
                        }
                    }
                }

                .description {
                    padding: 30px;
                    text-align: left;
                    height: 400px;
                    overflow-y: auto;
                }
            }
        }
    }


}
</style>
