<template>
    <!-- <div>
        sono il card apartment
        <img :src="apartment.image" class="card-img-top" :alt="apartment.title">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ apartment.title }}</h5>
            <p class="card-text mb-auto pb-3">{{ apartment.description }}</p>
            <router-link :to="{name: 'show', params: {slug: post.slug} }" class="btn btn-primary">Read</router-link>
        </div>
    </div> -->

    <div class="col-sm-6 col-md-4 g-4">
        <div class="card h-100">
            <img :src="`/storage/${apartment.image}`" class="card-img-top" :alt="apartment.title">
            <div class="card-body">
                <h5 class="card-title">{{ apartment.title }}</h5>
                <p class="card-text mb-auto pb-3">{{ apartment.description }}</p>
                <p class="card-text mb-auto pb-3">Address: {{ apartment.address }}</p>
                <p class="card-text mb-auto pb-3">Rooms: {{ apartment.rooms }}</p>
                <p class="card-text mb-auto pb-3">Beds: {{ apartment.beds }}</p>
            </div>
            <div class="services">
                <p v-for="service in apartment.services" :key="service.id" class="service">{{ service.name }}</p>

            </div>
            <div class="card-footer">
                <small class="text-muted">{{ apartment.price }}€</small>
            </div>
            <router-link :to="{name: 'show', params: {id: apartment.id} }" class="btn btn-primary">Read</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CardApartment',
    props: {
        apartment: Object,
    }
}
</script>

<style>

</style>
