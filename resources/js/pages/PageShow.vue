<template>

    <div v-if ="apartment">
        <div class="vw-100">
            <h1> {{ apartment.title }}</h1>
            <!-- <img class="w-75" src="{{ asset('storage/' . apartment.image) }}" alt="{{ apartment.title }}"> -->
            <img :src="`/storage/${apartment.image}`" class="card-img-top" :alt="apartment.title">
            <h3>Price: {{ apartment.price }}€ per night</h3>
            <h3>Rooms: {{ apartment.rooms }}</h3>
            <h3>Beds: {{ apartment.beds }}</h3>
            <h3>Bathrooms: {{ apartment.bathrooms }}</h3>
            <h3>Mq: {{ apartment.mq }}</h3>
            <h3>Address: {{ apartment.address }}</h3>
            <p>Description{{ apartment.description }}</p>

            <div class="services">
                <span v-for="service in apartment.services" :key="service.id" class="service">{{ service.name }}</span>

            </div>


        </div>
    </div>




</template>

<script>


export default {
    name: 'PageShow',
    props: {
        id: String,
    },
    data() {
        return {
            is404: false,
            apartment: []
        }
    },
    created() {
        axios.get('/api/apartments/' + this.id)
            .then(res =>{
                this.apartment = res.data.result, console.log('risultato',this.apartment)})
    }

}
</script>


<style lang="scss" scoped>

</style>
