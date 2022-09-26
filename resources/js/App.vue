<template>
    <div>
        <!-- navbar component -->

        <!-- <NavBar @mysearch="getApartment"></NavBar> -->


        <!-- main -->
        <!-- <div class="text-center">

        </div> -->

        <!-- card component -->
        <!-- <div class="row row-cols row-cols-md-2 g-4 mt-3">
            <CardApartment class="container " v-for="apartment in apartments" :key="apartment.id" :apartment="apartment" ></CardApartment>
        </div> -->

        <div class="container-fluid">
            <router-view></router-view>

        </div>


    </div>
</template>

<script>
// import NavBar from './components/NavBar.vue';
// import CardApartment from './components/CardApartment.vue';

export default {
    name: "App",
    components: {
        // NavBar,
        // CardApartment
    },
    data(){
        return{
            // apartments: []
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


    // VECCHIA APP
    // methods: {
    //     getApartment(textUser){
    //         this.apartments = textUser;
    //         console.log('app.vue', this.apartments);
    //     }
    // }
};

</script>
<style lang="scss" scoped>
    @import 'bootstrap/scss/bootstrap';

// .bg{
//    background-image: url(../backgrounduck.png);
//     min-height: 100vw;
//     background-repeat: no-repeat;
//     background-size: cover;
//     background-attachment:fixed;

// }
</style>
