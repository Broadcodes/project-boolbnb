<template>
    <div>
        <HeaderComponent />
        <HomeComponent />
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
import HomeComponent from '../components/HomeComponent.vue';

export default {
    name: "homeGuest",
    mounted() {
        axios.get("/api/apiHome").then(response => {
            if (response.data.success) {
                console.log("ok!");
            }
        });
    },
    components: {
        HeaderComponent,
        HomeComponent
    }
}
</script>

<style lang="scss">
      .contenitore-home {
        height: 100vh;
        background-color: #ff385c;
    }
</style>
