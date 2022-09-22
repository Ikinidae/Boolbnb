<template>
    <div>
        <h1>sono la shw</h1>
        <div class="vw-100">
            <h1>{{ apartment.title }}</h1>
            <!-- <img class="w-75" src="{{ asset('storage/' . apartment.image) }}" alt="{{ apartment.title }}"> -->
            <!-- <h3>Price: {{ apartment.price }}€ per night</h3> -->
            <h3>Rooms: {{ apartment.rooms }}</h3>
            <h3>Beds: {{ apartment.beds }}</h3>
            <h3>Bathrooms: {{ apartment.bathrooms }}</h3>
            <h3>Mq: {{ apartment.mq }}</h3>
            <h3>Address: {{ apartment.address }}</h3>
            <p>{{ apartment.description }}</p>

            <!-- <div class="services">
                <span v-for="service in apartment.service" :key="service.id" class="service">{{ service.name }}</span>

            </div> -->


        </div>
    </div>
</template>

<script>
import Axios from 'axios';

export default {
    name:'PageShow',
    props:{
        id: String,
    },
    data(){
        return{
            apartment: ''

        }
    },
    created(){
        Axios.get('/api/apartments' + this.id)
        .then(res => this.apartment = res.data.result);
    }

}
</script>


<style lang="scss" scoped>

</style>
