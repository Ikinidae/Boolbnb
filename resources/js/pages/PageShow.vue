<template>

    <div v-if="apartment" style="padding-top: 0.5rem">
        <!-- Carta della casa -->
        <div class="show-container">
            <div class="show-title">{{ apartment.title }}</div>
            <span class="show-owner">{{ apartment.address }}</span>
            <div class="show-owner">
                <i class="fa-solid fa-bed"></i>
                <span>{{ apartment.beds }}</span>
                <i class="fa-solid fa-toilet"></i>
                <span>{{ apartment.bathrooms }}</span>

            </div>
            <div class="show-cont-img">
                <img :src="`/storage/${apartment.image}`" :alt="apartment.title">
                <!-- <div id="map" class="id"></div> -->
                <div id="map-div" class="id"></div>
            </div>
            <div class="show-opacity">{{ apartment.description }}</div>
            <div class="show-price">
                Price per night:<span>{{ apartment.price }}€</span>
            </div>
            <div>
                <span class="show-price">Services included: </span>
                <ul>
                    <li v-for="service in apartment.services" :key="service.id">{{ service.name }}</li>
                </ul>
            </div>
            <div>
                <!-- email -->
                <label for="email">Your e-mail</label>
                <input class="form-control form-create" type="text" name="email_sender" id="email_sender"
                    v-model="email" />
                <br />
                <!-- name -->
                <label for="text">Your name</label>
                <input class="form-control form-create" type="text" name="name" id="name" v-model="name" />
                <br />
                <!-- surname -->
                <label for="text">Your surname</label>
                <input class="form-control form-create" type="text" name="surname" id="surname" v-model="surname" />
                <br />
                <!-- message -->
                <label for="text">Your message</label>
                <textarea class="form-control form-create description-form description-form" type="text" name="text"
                    id="text" @change="log" v-model="text">
                    </textarea>

                <div class="submit mt-3">
                    <button @click="sendMessage(apartment.id), toggleClass()"  class="button_accent" type="submit">Invia</button>
                </div>

                <div id="message_alert" class="alert alert-success d-flex align-items-center d-none mt-3" role="alert">
                    <div>
                       Your message has been sent
                    </div>
                </div>
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
            text: '',
            users: ''
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
                    console.log('mappa', this.apartment);
                }
                var map = tt.map({
                    key: this.API_KEY,
                    container: 'map-div',
                    center: { lng: this.apartment.longitude, lat: this.apartment.latitude },
                    zoom: 12
                });

                var marker = new tt.Marker()
                    .setLngLat({ lng: this.apartment.longitude, lat: this.apartment.latitude })
                    .addTo(map);
            });


        // PROVA PER FAR COMPARIRE EMAIL AUTOCOMPILATA
        // axios.get('/api/users')
        //     .then(res => {
        //         if (res.data.success) {
        //             this.users = res.data.result;
        //             console.log('chiamata users',this.users);
        //         }

        //     }).catch(function (error) {
        //         console.log('volevi vedere users');
        //         console.log(error);
        //     });

    },
    methods: {
        log() {
            console.log('ciao', this.email);
            console.log(this.name);
            console.log(this.surname);
            console.log(this.text);
            console.log('ciaooo', this.text);
        },

        sendMessage($id) {
            if (this.email != '' && this.text != '' && this.name != '' && this.surname != '') {
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

                        };

                    }).catch(function (error) {
                        console.log('voleviiiiiiii');
                        console.log(error);
                    });
            }

        },
        toggleClass(){
            document.getElementById("message_alert").classList.toggle('d-none');

        }

    }
}
</script>


<style lang="scss" scoped>
#map-div {
    height: 500px;
    width: 500px;
}
</style>
