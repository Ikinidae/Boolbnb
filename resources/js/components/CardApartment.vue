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

<!-- <div class="row row-cols row-cols-md-2 g-4"> -->
    <div class="col-sm-6 col-md-4 g-4">
        <div class="card h-100">
            <img :src=" apartment.image" class="card-img-top" :alt="apartment.title">
            <div class="card-body">
                <h5 class="card-title">{{ apartment.title }}</h5>
                <p class="card-text mb-auto pb-3">{{ apartment.description }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{ apartment.price }}€</small>
            </div>
        </div>
    </div>
<!-- </div> -->


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
