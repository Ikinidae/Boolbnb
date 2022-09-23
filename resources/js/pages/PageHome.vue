<template>
    <div>


        <!-- navbar component -->

        <NavBar  @mysearch="getApartment"></NavBar>


        <!-- main -->
        <!-- <div class="text-center">

        </div> -->

        <!-- card component -->
        <div class="row row-cols row-cols-md-2 g-4 mt-3">
            <CardApartment class="container " v-for="apartment in apartments" :key="apartment.id" :apartment="apartment"></CardApartment>
        </div>


    </div>
</template>

<script>
import NavBar from '../components/NavBar.vue';
import CardApartment from '../components/CardApartment.vue';

export default {
    name: "PageHome",
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
            console.log('app.vue', this.apartments);
        }
    }
};

</script>
<style lang="scss" scoped>
    @import 'bootstrap/scss/bootstrap';
</style>
