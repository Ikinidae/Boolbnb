<template>

    <div v-if ="apartment">
        <div class="vw-100 p-3 px-5">
            <h1 class="mt-5 mb-3"> {{ apartment.title }}</h1>
            <div class="w-75 mx-auto">
                <img :src="`/storage/${apartment.image}`" class="card-img-top" :alt="apartment.title">
            </div>
            <h4 class="mt-3">Price: {{ apartment.price }} € per night</h4>
            <h4 class="mt-3">Rooms: {{ apartment.rooms }}</h4>
            <h4 class="mt-3">Beds: {{ apartment.beds }}</h4>
            <h4 class="mt-3">Bathrooms: {{ apartment.bathrooms }}</h4>
            <h4 class="mt-3">Mq: {{ apartment.mq }}</h4>
            <h4 class="mt-3">Address: {{ apartment.address }}</h4>
            <h5 class="mt-3">Description: {{ apartment.description }}</h5>

            <div class="services mt-3">
                <h5>Servizi aggiuntivi:</h5>
                <h5 v-for="service in apartment.services" :key="service.id" class="ms-2 service">{{ service.name }}</h5>
            </div>

            <div id="map-div"></div>


        </div>
    </div>




</template>

<script>


export default {
    name: 'PageShow',
    props: {
        id: String,
    },
    data() {
        return {
            is404: false,
            apartment: []
        }
    },
    // Usage with context the component
    head: {
        link: [
            // link css tomtom
            { rel: 'stylesheet', type:'text/css', href: 'https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css' },
        ],
        script: [
            // script tomtom
            { src: 'https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js'},
            // script search and services
            { src: 'https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js'},
        ],
    },
    created() {
        axios.get('/api/apartments/' + this.id)
            .then(res =>{
                this.apartment = res.data.result, console.log('risultato',this.apartment)})

        this.mapSearch();
    },
    methods:{
        mapSearch(){

            const API_KEY = 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff';

            const GOLDEN_GATE_BRIDGE = {lng: -122.47483, lat: 37.80776};

            var map = tt.map({
                key: API_KEY,
                container: 'map-div',
                center: GOLDEN_GATE_BRIDGE,
                zoom: 12
            });

            console.log('log', map);

            var moveMap = function(lnglat) {
                map.flyTo({
                    center: lnglat,
                    zoom: 14
                })
            }
        }
    }

}
</script>


<style lang="scss" scoped>

</style>
