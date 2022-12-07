<template>
    <div>
        homeGuest
    </div>
</template>

<script>
export default {
    name: 'homeGuest',
    mounted(){
        axios.get('/api/apiHome').then(response=>{
            if(response.data.success){
                console.log('ok!')
            }

        });


    }
}
</script>

<style lang="scss" scoped>

</style>
