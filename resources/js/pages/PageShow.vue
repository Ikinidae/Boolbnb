<template>

    <div v-if ="apartment">
        <div class="vw-100">
            <h1> {{ apartment.title }}</h1>
            <!-- <img class="w-75" src="{{ asset('storage/' . apartment.image) }}" alt="{{ apartment.title }}"> -->
            <img :src="`/storage/${apartment.image}`" class="card-img-top" :alt="apartment.title">
            <h3>Price: {{ apartment.price }}€ per night</h3>
            <h3>Rooms: {{ apartment.rooms }}</h3>
            <h3>Beds: {{ apartment.beds }}</h3>
            <h3>Bathrooms: {{ apartment.bathrooms }}</h3>
            <h3>Mq: {{ apartment.mq }}</h3>
            <h3>Address: {{ apartment.address }}</h3>
            <p>Description{{ apartment.description }}</p>

            <div class="services">
                <span v-for="service in apartment.services" :key="service.id" class="service">{{ service.name }}</span>

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
