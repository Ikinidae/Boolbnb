<template>
    <div class="index-card custom">
        <div class="card h-100">

            <div class="index-cover-img">
                    <img :src="`/storage/${apartment.image}`" class="card-img-top" :alt="apartment.title">

                </div>
                <div class="index-card-text">
                    <div class="index-cover-img-l">
                        <span>Rooms:</span>
                        <span>{{ apartment.rooms }}</span>
                        <br>
                        <i class="fa-solid fa-bed"></i
                        ><span>{{  apartment.beds  }}</span>
                        <br>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ apartment.address }}</span>
                    </div>
                    <p class="index-card-title">{{ apartment.title  }}</p>
                    <p>{{  apartment.description }}</p>
                    <!-- services -->
                    <div>
                        <span class="show-price">Services included: </span>
                        <ul>
                            <li v-for="service in apartment.services" :key="service.id">{{ service.name }}</li>
                        </ul>
                    </div>
                </div>
            <div class="card-footer">
                <small class="text-muted">{{ apartment.price }}€</small>
            </div>
            <div class="index-card-price" style="width: 100%">
                    <router-link
                    :to="{name: 'show', params: {id: apartment.id} }"

                        class="index-btn"
                        >Read</router-link
                    >
                </div>
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
