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
                            <h4>{{ dataListArr.address }}, {{ dataListArr.civic_number }} - {{ dataListArr.city }}</h4>
                            <h4>Categoria: {{ dataListArr.category }}</h4>
                        </div>
                    </div>

                    <a class="buttonMoreDetail flex-column" href="#areaDetail">
                        <i class="fa-solid fa-arrow-down fa-xl"></i>
                    </a>
                </div>
            </div>



            <div id="areaDetail">

                <div class="showDetail">
                    <div id="moreDetail" class="moreDetail container mt-5">
                        <h4>Prezzo a Notte: <span class="price">€ {{ dataListArr.price }}</span></h4>
                        <hr>

                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <img v-if="dataListArr.apartment_images == null" class="img-thumbnail"
                                            :src="getSrcImages('images', 'immagine_non_disponibile.png')" alt="Nessuna immagine">
                                        <img id="myImg" v-else class="img-thumbnail" :src="getSrcImages('storage', dataListArr.apartment_images)"
                                            :alt="dataListArr.apartment_title">
                                    </div>

                                    <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01">
                                    </div>
                                </div>

                                <div class="col-8 description">
                                    <h5>Descrizione:</h5>
                                    <br>
                                    <p>{{ dataListArr.description }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h5 class="mt-1">Dettagli:</h5>
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

                        <div>
                            <button @click="getBack" class="btn btn-primary mt-5">Torna alla home</button>
                        </div>


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
    },

    mounted(){
        let modal = document.getElementById("myModal");

        let img = document.getElementById("myImg");
        let modalImg = document.getElementById("img01");

        img.addEventListener('click', function(){
            console.log('ok');
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        });

        let span = document.getElementsByClassName("close")[0];

        span.addEventListener('click', function() {
        modal.style.display = "none";
        });
    }
}
</script>

<style lang="scss" scoped>
.areaShow {


    .jumbo {
        width: 100%;
        height: 100vh;
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



            .moreDetail {
                width: 100%;
                height: 1000px;
                text-align: center;

                h4 {
                    margin: 35px 0;

                    .price {
                        color: #ff385c;
                        font-size: 1.7rem;
                    }
                }

                .detail {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;

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
                    text-align: left;
                    height: auto;
                    overflow-y: auto;
                    border-radius: 10px;

                    }
            }
        }
    }


#myImg {
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}


.modal {
  margin-top: 65px;
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9);
}


.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}


.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}


.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}


}
</style>
