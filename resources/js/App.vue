<template>
    <div class="col-sm-6 col-md-4">
        <!-- navbar component -->
        <NavBar @mysearch="getApartment"></NavBar>

        <!-- main -->
        <div class="title m-b-md">
                BoolBnb
        </div>

        <!-- card component -->
        <CardApartment v-for="apartment in apartments" :key="apartment.id" :apartment="apartment" class="card h-100"></CardApartment>
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue';
import CardApartment from './components/CardApartment.vue';

export default {
    name: "App",
    components: {
        NavBar,
        CardApartment
    },
    data(){
        return{
            apartments: []
        }
    },

    // created() {
    //     axios.get('/api/apartment')
    //         .then(res => {
    //             this.apartments = res.data.response.data;
    //             console.log(this.apartments);
    //         })
    //         .catch(error => {});
    // },
    methods: {
        getApartment(textUser){
            this.apartments = textUser;
            console.log('ciao');
        }
    }
};

</script>
<style lang="scss" scoped>
    // @import 'bootstrap/scss/bootstrap';
</style>
