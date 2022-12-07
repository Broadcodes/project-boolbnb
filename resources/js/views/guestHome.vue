<template>
  <div>
    guestHome

  </div>
</template>

<script>
export default {
    name:'guestHome',
    mounted(){
        console.log('guestHome mounted!');
        axios.get('/api/guestHome').then(response=>{
            if(response.data.success){
                console.log('ok')
            }

        });

    }

}
</script>

<style lang="scss" scoped>

</style>
