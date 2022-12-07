<template>
  <div>
    uraHome
    <button @click="test">click</button>
  </div>
</template>

<script>
export default {
    name:'uraHome',
    mounted(){
        console.log('uraHome')
    },
    methods:{
        test(){
            axios.get('/api/uraHome').then(response=>{
                if(response){
                    console.log('molto ok')
                }
            })

        }
    }

}
</script>

<style lang="scss" scoped>

</style>
