<template>
    <div>

        <div class="selection fixed-top w-100">

            <div class="centerz d-flex align-items-center justify-content-center">

                <div class="mx-2">
                    <label for="address">Address</label>
                    <input type="text" name="address" v-model="address">
                </div>
                <div class="mx-2">
                    <label for="country">Country</label>
                    <input type="text" name="country" v-model="country">
                </div>
                <div class="mx-2">
                    <label for="city">City</label>
                    <input type="text" name="city" v-model="city">
                </div>
                <button class="mx-2" @click="setWhere()"><i class="fa-solid fa-magnifying-glass"></i></button>

            </div>
            <div>
                <div class="categoryArea d-flex align-items-center justify-content-around w-100">

                    <div class="flex-column text-center">
                        <button @click="setCategory('Parchi nazionali')"><span class="flex-column"><i
                                    class="fa-solid fa-mountain-sun"></i></span>
                            <p>Montagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Baite')"><span class="flex-column"><i
                                    class="fa-solid fa-house-crack"></i></span>
                            <p>Baite</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Campagna')"><span class="flex-column"><i
                                    class="fa-solid fa-campground"></i></span>
                            <p>Campagna</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Viste mozzafiato')"><span class="flex-column"><i
                                    class="fa-solid fa-panorama"></i></span>
                            <p>Viste mozzafiato</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Sulle piste')"><span class="flex-column"><i
                                    class="fa-solid fa-person-skiing"></i></span>
                            <p>Sulle piste</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Luoghi remoti')"><span class="flex-column"><i
                                    class="fa-solid fa-igloo"></i></span>
                            <p>Igloo</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Città popolari')"><span class="flex-column"><i
                                    class="fa-solid fa-city"></i></span>
                            <p>Città</p>
                        </button>
                    </div>

                    <div class="flex-column text-center">
                        <button @click="setCategory('Dimore storiche')"><span class="flex-column"><i
                                    class="fa-solid fa-landmark"></i></span>
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
    name: 'FilterSearch',
    data() {
        return {
            address: '',
            country: '',
            city: ''

        }
    },
    methods: {
        setWhere() {
            let array = [];
            array.push(this.address, this.country, this.city);
            console.log('hey');
            console.log(array);
            this.$emit('whereCondition', array)
        },
        setCategory(input) {
            console.log(input)

            this.$emit('setCategory', input)
        }

    }

}
</script>

<style lang="scss" scoped>
.centerz {
    position: relative;
    top: -50px;
}

button {
    text-decoration: none;
    border: none;
    background-color: rgba(255, 255, 255, 0);
}

.categoryArea{
    position: relative;
    top: -10px;
}

</style>
