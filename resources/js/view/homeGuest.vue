<template>
    <div>
        <HeaderComponent />
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
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
        HeaderComponent
    }
}
</script>

<style lang="scss" scoped>

</style>
