<template>
    <div class="col-sm-6 col-md-4">
        <div v-for="apartment in apartments" :key="apartment.id" class="card h-100">
            <img :src="apartment.image" class="card-img-top" :alt="apartment.title">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ apartment.title }}</h5>
                <p class="card-text mb-auto pb-3">{{ apartment.description }}</p>
                <!-- <router-link :to="{name: 'show', params: {slug: post.slug} }" class="btn btn-primary">Read</router-link> -->
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "App",
    data(){
        return{
            apartments: []
        }
    },

    created() {
        axios.get('http://127.0.0.1:8000/api/apartment')
            .then(res => {
                this.apartments = res.data.response.data;
                console.log(this.apartments);
            })
    }
};

</script>
<style lang="scss" scoped>

</style>
