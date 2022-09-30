<template>
    <div>


        <!-- navbar component -->
        <NavBar @mysearch="getApartment"></NavBar>

        <!-- card component -->
        <div class="index-cards">
            <CardApartment v-for="apartment in apartments" :key="apartment.id" :apartment="apartment"></CardApartment>
        </div>

        <!-- default shown apartment -->
        <div class="index-cards">
            <CardApartment v-for="apartment in defaultApartments" :key="apartment.id" :apartment="apartment">
            </CardApartment>
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
        CardApartment,

    },
    data() {
        return {
            apartments: [],
            defaultApartments: []
        }
    },

    created() {
        axios.get('/api/apartments')
            .then(res => {
                this.defaultApartments = res.data.result;
                console.log('defaultApartments', this.defaultApartments);
            })
            .catch(function (error) {
                console.log('voleviiiiiiii');
                console.log(error);
            });
    },

    methods: {
        getApartment(textUser) {
            this.apartments = textUser;
            console.log('app.vue', this.apartments);
        }
    }
};

</script>
<style lang="scss" scoped>
@import 'bootstrap/scss/bootstrap';
</style>
