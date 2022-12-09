<template>
    <div>
        <div class="contenitore-header">
            <div class="contenitore-logo">
                <a href=""><img src="../../../public/img/airbnb_logo.png" alt="logo AirBnB"></a>
            </div>
            <div class="ricerca">
                <button>Ovunque</button>
                <button>Qualunque settimana</button>
                <button id="ospiti">Aggiungi ospiti</button>
            </div>

            <div class="contenitore-affitta">
                <button>Affitta con AirBnB</button>
            </div>
            <div class="menu-hamburger">
                <div class="hamburger"></div>
                <div class="hamburger"></div>
                <div class="hamburger"></div>
            </div>
        </div>
        <div class="navbar">
            <ul>
                <li class="mx-2"><a href="">Parchi nazionali</a></li>
                <li class="mx-2"><a href="">Baite</a></li>
                <li class="mx-2"><a href="">Viste mozzafiato</a></li>
                <li class="mx-2"><a href="">Spazi accessibili</a></li>
                <li class="mx-2"><a href="">Novità</a></li>
                <li class="mx-2"><a href="">Sulle piste</a></li>
                <li class="mx-2"><a href="">Case sull'albero</a></li>
                <li class="mx-2"><a href="">Design</a></li>
                <li class="mx-2"><a href="">Wow!</a></li>
                <li class="mx-2"><a href="">Minicase</a></li>
                <li class="mx-2"><a href="">Fronte lago</a></li>
                <li class="mx-2"><a href="">Castelli</a></li>
                <li class="mx-2"><a href="">Piscine incredibili</a></li>
                <li class="mx-2"><a href="">Campagna</a></li>
                <li class="mx-2"><a href="">Luxe</a></li>
                <li class="mx-2"><a href="">Dimore storiche</a></li>
                <li class="mx-2"><a href="">Luoghi remoti</a></li>
                <li class="mx-2"><a href="">Ville</a></li>
                <li class="mx-2"><a href="">Stanze private</a></li>
                <li class="mx-2"><a href="">In cima al mondo</a></li>
                <li class="mx-2"><a href="">BnB</a></li>
                <li class="mx-2"><a href="">Agriturismi</a></li>
                <li class="mx-2"><a href="">Tropicali</a></li>
                <li class="mx-2"><a href="">Spiaggia</a></li>
                <li class="mx-2"><a href="">Grotte</a></li>
                <li class="mx-2"><a href="">Di tendenza</a></li>
                <li class="mx-2"><a href="">Città popolari</a></li>
                <li class="mx-2"><a href="">Polo nord</a></li>
                <li class="mx-2"><a href="">Spazi per giocare</a></li>
                <li class="mx-2"><a href="">Isole</a></li>
                <li class="mx-2"><a href="">Sull'acqua</a></li>
                <li class="mx-2"><a href="">Spazi creativi</a></li>
                <li class="mx-2"><a href="">Case galleggianti</a></li>
                <li class="mx-2"><a href="">Vigneti</a></li>
                <li class="mx-2"><a href="">Iurte</a></li>
                <li class="mx-2"><a href="">Case organiche</a></li>
                <li class="mx-2"><a href="">Torri</a></li>
                <li class="mx-2"><a href="">Cupole</a></li>
                <li class="mx-2"><a href="">Fienili</a></li>
                <li class="mx-2"><a href="">Ryokan</a></li>
            </ul>
        </div>
</div>
</template>

<script>
export default {
    name: 'headerComponent'
}
</script>

<style lang="scss" scoped>
    .contenitore-header {
        color: rgb(255, 255, 255);
        background-color: #ffffff;
        height: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        position: fixed;
        top: 80px;
        padding: 0 10px;
    }

    .contenitore-logo {
        width: 200px;
    }
    .contenitore-logo img {
        width: 150px;
    }
    .ricerca {
        background-color: #ffffff;
        padding: 5px;
        border-radius: 20px;
        font-size: 1.2em;
        border: 2px solid #DDDDDD;;
        button {
            border: 0px #ffffff;
            background-color: #ffffff;
            color: #222222;
            padding: 5px;
            // border-radius: 20px;
            border-right: 2px solid #717171;
        }
        #ospiti {
            color: #717171;
            border-right: 0px;
        }
    }

    .contenitore-affitta button {
        border: 0px;
        padding: 10px;
        background-color: #ffffff;

    }

    .contenitore-affitta button:hover {
        border-radius: 20px;
        background-color: #f1efef;
    }
    .menu-hamburger .hamburger {
        width: 35px;
        height: 5px;
        background-color: black;
        margin: 6px 0;
}

.navbar {
    background-color: #ffffff;
    margin-top: 98px;
    position: fixed;
    top: 80px;
    border-top: 2px solid #717171;
    height: 80px;
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
}
// ::-webkit-scrollbar {
//   height: 0.5em !important;
// }
.navbar ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    gap: 10px;

    li {
        height: 100%;
        width: 130px;
        text-align: center;
    }
}



.navbar ul li a {
    text-decoration: none;
    padding: 0;
    color: #717171;
}

.navbar ul li:hover {
    border-bottom: 2px solid #DDDDDD;
    cursor: pointer;
    margin-bottom: -2px;
}
</style>
