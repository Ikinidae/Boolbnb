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

    <div class="index-card custom">
        <div class="card h-100">

            <div class="index-cover-img">
                    <img :src="`/storage/${apartment.image}`" class="card-img-top" :alt="apartment.title">

                    <div class="index-cover-img-l">
                        <i class="fa-solid fa-bed"></i
                        ><span>{{  apartment.beds  }}</span>
                        <i class="fa-solid fa-toilet"></i
                        ><span>{{ apartment.bathrooms }}</span>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ apartment.address }}</span>
                    </div>
                </div>
                <div class="index-card-text">
                    <p class="index-card-title">{{ apartment.title  }}</p>
                    <p>{{  apartment.description }}</p>
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
