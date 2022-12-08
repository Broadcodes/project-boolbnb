<template>

    <div class="contenitore-header">
        <div class="contenitore-search">
             <input type="text" placeholder="Cerca appartamento" id="search">
             <label for="search">Cerca un appertamento</label>
        </div>
        <div class="contenitore-logo">
            <a href=""><img src="../../../public/img/airbnb_logo.png" alt="logo AirBnB"></a>
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
        background-color: #f76983;
        height: 15%;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .contenitore-logo {
        width: 200px;
    }
    .contenitore-logo img {
        width: 150px;
    }
</style>
