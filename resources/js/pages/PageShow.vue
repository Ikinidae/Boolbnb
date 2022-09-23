<template>
    <div v-if ="apartment">
        <div class="w-100 p-3 px-5">
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

            <div>
                    <!-- Form della email -->
                <form>
                    <!-- email -->
                    <label for="email">Your e-mail</label>
                    <input
                        class="form-control form-create"
                        type="text"

                        name="email_sender"
                        id="email_sender"
                        v-model="email"
                    />
                    <br />
                    <!-- name -->
                    <label for="text">Your name</label>
                    <input
                        class="form-control form-create"
                        type="text"

                        name="name"
                        id="name"
                        v-model="name"
                    />
                    <br />
                    <!-- surname -->
                    <label for="text">Your surname</label>
                    <input
                        class="form-control form-create"
                        type="text"

                        name="surname"
                        id="surname"
                        v-model="surname"
                    />
                    <br />
                    <!-- message -->
                    <label for="text">Your message</label>
                    <textarea
                        class="form-control form-create description-form"
                        type="text"

                        name="text"
                        id="text"
                        @change="log"
                        v-model="text">
                    </textarea>

                    <div class="submit">
                        <button @click="sendMessage(apartment.id)" class="button-send" type="submit">Invia</button>
                    </div>
                </form>
            </div>
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
            apartment: [],
            API_KEY: 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff',
            email: '',
            name: '',
            surname: '',
            text: ''
        }
    },
    mounted() {
        let tomTomScript = document.createElement('script')
        tomTomScript.setAttribute('src', 'https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js')
        document.head.appendChild(tomTomScript)

        let tomTomCss = document.createElement('link')
        tomTomCss.setAttribute('rel', 'stylesheet')
        tomTomCss.setAttribute('type', 'text/css')
        tomTomCss.setAttribute('href', 'https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css')
        document.head.appendChild(tomTomCss)
    },
    created() {
        axios.get('/api/apartments/' + this.id)
            .then(res => {
                if (res.data.success) {
                    this.apartment = res.data.result;
                    console.log(this.apartment);
                }
                var map = tt.map({
                    key: this.API_KEY,
                    container: 'map-div',
                    center: { lng: this.apartment.longitude, lat: this.apartment.latitude },
                    zoom: 12
                });

                var marker = new tt.Marker()
                    .setLngLat({lng: this.apartment.longitude, lat: this.apartment.latitude})
                    .addTo(map);
            })

    },
    methods: {
        log(){
            console.log('ciao', this.email);
            console.log(this.name);
            console.log(this.surname);
            console.log(this.text);
        },

        sendMessage($id){
            if(this.email != '' && this.text != '' && this.name != '' && this.surname != ''){
                axios.post('/api/message', {
                apartment_id: $id,
                text: this.text,
                name: this.name,
                surname: this.surname,
                email: this.email
            })
            .then(res => {
                if (res.data.success) {
                    this.email = '';
                    this.text = '';
                    this.name = '';
                    this.surname = '';
                }
            }).catch(function (error) {
                console.log('voleviiiiiiii');
                console.log(error);
            });
            }
        },

    }
}
</script>


<style lang="scss" scoped>
    #map-div{
        height: 500px;
        width: 500px;
    }
</style>
