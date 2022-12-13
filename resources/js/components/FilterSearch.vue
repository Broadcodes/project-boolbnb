<template>
  <div>

    <div class="selection fixed-top align-items-center justify-content-around w-100">

        <div class="centerz">
                <h1>
                    where?
                </h1>
                <label for="address">address</label>
                <input type="text" name="address" v-model="address">
                <label for="country">country</label>
                <input type="text" name="country" v-model="country">
                <label for="city">city</label>
                <input type="text" name="city" v-model="city">
                <button @click="setWhere()">search</button>


        </div>
        <div>
            <div class=" d-flex align-items-center justify-content-around w-100">

                    <div class="flex-column text-center">
                        <button @click="setCategory('Parchi nazionali')"><span class="flex-column"><i class="fa-solid fa-mountain-sun"></i></span>
                            <p>Montagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('qui')" ><span class="flex-column"><i class="fa-solid fa-house-crack"></i></span>
                            <p>Baite</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('nobis')"><span class="flex-column"><i class="fa-solid fa-campground"></i></span>
                            <p>Campagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('et')"><span class="flex-column"><i class="fa-solid fa-panorama"></i></span>
                            <p>Viste mozzafiato</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Sulle piste')"><span class="flex-column"><i class="fa-solid fa-person-skiing"></i></span>
                            <p>Sulle piste</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Luoghi remoti')"><span class="flex-column"><i class="fa-solid fa-igloo"></i></span>
                            <p>Igloo</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Di tendenza')"><span class="flex-column"><i class="fa-solid fa-city"></i></span>
                            <p>Città</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Dimore storiche')"><span class="flex-column"><i class="fa-solid fa-landmark"></i></span>
                            <p>Città d'Arte</p>
                        </button>
                    </div>

                </div>
        </div>
    </div>



  </div>
</template>

<script>
export default {
    name:'FilterSearch',
    data(){
        return{
            address:'',
            country:'',
            city:''

        }
    },
    methods:{
        setWhere(){
            let array = [];
            array.push(this.address,this.country,this.city);
            console.log('hey');
            console.log(array);
            this.$emit('whereCondition', array)
        },
        setCategory(input){
            console.log(input)

            this.$emit('setCategory', input)
        }

    }

}
</script>

<style lang="scss" scoped>
.centerz{
    text-align: center;
}
button{
    text-decoration: none;
    border: none;
}


</style>
