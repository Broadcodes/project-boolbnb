<template>
    <div>
        <HomeComponent />
    </div>
</template>

<script>

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
        HomeComponent
    }
}
</script>

<style lang="scss">

</style>
