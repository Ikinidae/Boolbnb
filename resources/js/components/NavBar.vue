<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                </ul> -->
                <!-- <form class="d-flex" role="search"> -->
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="keyword">
                    <!-- DA IMPLEMENTARE SE CE LO CHIEDONO -->
                    <!-- <ul v-if="Apartments.length > 0">
                        <li v-for="apartment in Apartments" :key="apartment.id" v-text="apartment.title"></li>
                    </ul> -->
                    <button @click="$emit('mysearch', Apartments)" class="btn btn-outline-success" type="submit">Search</button>
                <!-- </form> -->
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'NavBar',
    data() {
        return {
            keyword: null,
            Apartments: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/api/search', { params: { keyword: this.keyword } })
                .then(res => {
                    this.Apartments = res.data;
                    console.log('log1', res.data);
                    console.log('log2', this.Apartments);
                })
                .catch(error => {});
        }
    }
}
</script>

<style>

</style>
