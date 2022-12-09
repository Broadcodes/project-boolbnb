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
                <li><a href="">Parchi nazionali</a></li>
                <li><a href="">Baite</a></li>
                <li><a href="">Viste mozzafiato</a></li>
                <li><a href="">Spazi accessibili</a></li>
                <li><a href="">Novità</a></li>
                <li><a href="">Sulle piste</a></li>
                <li><a href="">Case sull'albero</a></li>
                <li><a href="">Design</a></li>
                <li><a href="">Wow!</a></li>
                <li><a href="">Minicase</a></li>
                <li><a href="">Fronte lago</a></li>
                <li><a href="">Castelli</a></li>
                <li><a href="">Piscine incredibili</a></li>
                <li><a href="">Campagna</a></li>
                <li><a href="">Luxe</a></li>
                <li><a href="">Dimore storiche</a></li>
                <li><a href="">Luoghi remoti</a></li>
                <li><a href="">Ville</a></li>
                <li><a href="">Stanze private</a></li>
                <li><a href="">In cima al mondo</a></li>
                <li><a href="">BnB</a></li>
                <li><a href="">Agriturismi</a></li>
                <li><a href="">Tropicali</a></li>
                <li><a href="">Spiaggia</a></li>
                <li><a href="">Grotte</a></li>
                <li><a href="">Di tendenza</a></li>
                <li><a href="">Città popolari</a></li>
                <li><a href="">Polo nord</a></li>
                <li><a href="">Spazi per giocare</a></li>
                <li><a href="">Isole</a></li>
                <li><a href="">Sull'acqua</a></li>
                <li><a href="">Spazi creativi</a></li>
                <li><a href="">Case galleggianti</a></li>
                <li><a href="">Vigneti</a></li>
                <li><a href="">Iurte</a></li>
                <li><a href="">Case organiche</a></li>
                <li><a href="">Torri</a></li>
                <li><a href="">Cupole</a></li>
                <li><a href="">Fienili</a></li>
                <li><a href="">Ryokan</a></li>
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
    margin-top: 100px;
    position: fixed;
    top: 80px;
    border-top: 2px solid #717171;
}
.navbar ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.navbar ul li a {
    text-decoration: none;
    padding: 0;
    color: #717171;
}

.navbar ul li:hover {
    border-bottom: 2px solid #DDDDDD;
    cursor: pointer;
}
</style>
