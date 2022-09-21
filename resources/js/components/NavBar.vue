<template>

        <nav class="navbar navbar-expand-lg mx-auto w-75">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex" id="navbarTogglerDemo03">
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                </ul> -->
                <!-- <form class="d-flex" role="search"> -->
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model=""> -->
                    <input
                        required
                        autocomplete="off"
                        @keyup="addressSearch"
                        type="text"
                        class="form-control form-create address-form"
                        name="address"
                        id="query"
                        v-model="searchAddress"
                    />

                    <!-- Input per radiante -->
                    <label  for="radius">Choose radius distance</label>
                    <select  @change="getApartments(radius,latitude,longitude)" name="radius" id="radius" v-model="radius">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>

                    <!-- Rooms -->
                    <label for="rooms">Choose min rooms</label>
                    <select @change="log" name="rooms" id="rooms" v-model="rooms">
                        <!-- <option value="Any">Any</option> -->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <!-- Beds -->
                    <label for="beds">Choose min beds</label>
                    <select @change="log" name="beds" id="beds" v-model="beds">
                        <!-- <option value="Any">Any</option> -->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <!-- Services -->
                    <div id="filter-list" class="show">
                        <ul>
                            <li :key="i" v-for="(service, i) in services">
                                <input
                                    type="checkbox"
                                    :name="service.name"
                                    :id="service.id"
                                    :value="service.name"
                                    v-model="selectedServices"
                                    @change="log"
                                /><label :for="service.id">
                                    {{ service.name }}
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class=" form-create address-form2" v-show="nameAddress.length > 0">
                        <ul class="list-type">
                            <li
                                :key="i"
                                v-for="(name, i) in nameAddress"
                                @click="selectAddress(i)"
                                style="cursor: pointer"
                                class="li-hover"
                            >
                                {{ name.address.freeformAddress }}
                            </li>
                        </ul>
                    </div>

                    <!-- <button @click="$emit('mysearch', Apartments)" class="btn btn-outline-danger" type="submit">Search</button> -->
                    <!-- <button @click="$emit('mysearch', filteredApt)" class="btn btn-outline-danger" type="submit">Search</button> -->
                    <button @click="selectRooms" class="btn btn-outline-success" type="submit">Search</button>
                <!-- </form> -->
                </div>
            </div>
        </nav>

</template>

<script>
export default {
    name: 'NavBar',
    data() {
        return {

            api_key: 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff',
            latitude: null,
            longitude: null,
            radius: 20,
            rooms: 1,
            beds: 1,
            nameAddress: [],
            searchAddress:[],
            services: [],
            selectedServices:[],

            // array dove salviamo i dati del json ricevuto dall'api
            Apartments: [],

            // array dove salviamo gli appartamenti per letti e stanze
            firstFilter: [],

            // array per i servizi del j-esimo apt
            servicesArrayApt: [],

            // array finale dove dobbiamo mettere gli apt filtrati per tutto quanto
            filteredApt: []
        };
    },
    created() {
        this.getServices();
    },
    methods: {

        log(){
            console.log('rooms',this.rooms);
            console.log('beds',this.beds);
            console.log('services', this.selectedServices);
        },

        // FUZZY SEARCH
        addressSearch() {
            tt.services.fuzzySearch({
                key: this.api_key,
                query: document.getElementById("query").value,
            }).then(this.handleResults);
        },
        handleResults(result) {
            this.nameAddress = result.results;
            console.log('risultati handle results',this.nameAddress);
            // console.log('log1', this.latLong);
            // console.log('log2', this.latitude);
            // console.log('log3', this.longitude);
        },
        selectAddress(i){
            this.searchAddress = this.nameAddress[i].address.freeformAddress;
            this.latitude = this.nameAddress[i].position.lat;
            this.longitude = this.nameAddress[i].position.lng;
            this.nameAddress = []
            this.getApartments(this.radius,this.latitude,this.longitude)
            // console.log('address', this.nameAddress);
            // console.log('lat', this.latitude);
            // console.log('lon', this.longitude);
        },

        getApartments(radius, lat, lon) {
            axios
                .get(
                    "/api/distance/" +
                        radius +
                        "/" +
                        lat +
                        "/" +
                        lon
                )
                .then((res) => {
                    this.Apartments = res.data;
                    console.log('risultato chiamata axios da navbar', this.Apartments);
                    console.log('ricerca dei servizi', this.Apartments[0].services[0].name);
                });
        },
        selectRooms() {
            this.firstFilter = [];
            this.filteredApt = [];

            for (let i = 0; i < this.Apartments.length; i++) {

                // per ogni appartamento controllo se le condizioni numero di stanze e letti sono verificate
                if (this.Apartments[i].rooms >= this.rooms & this.Apartments[i].beds >= this.beds) {

                    // se si, pushare in un array con appartamenti filtrati
                    this.firstFilter.push(this.Apartments[i]);

                    // // per ogni appartamento prendo ogni servizio e lo pusho in un array di servizi posseduti dal jesimo appartamento
                    // for (let j = 0; j < this.firstFilter.length; j++) {

                    //     console.log('sdfgsdfhxfghj', this.firstFilter.services[j]);
                    //     // for (let index = 0; index < this.firstFilter.services.length; index++) {
                    //     //     this.firstFilter.services[j].name.push(this.servicesArrayApt);
                    //     // }

                    //     // se array di servizi posseduti include array di servizi selezionati pushare nell'array apartments
                    //     // if (this.servicesArrayApt.includes(this.selectedServices)) {
                    //     //     this.filteredApt.push(this.firstFilter[j]);
                    //     // }

                    //     // if (this.selectedServices.includes(this.firstFilter.service[j].name)) {
                    //     //     this.filteredApt.push(this.firstFilter[j]);
                    //     // }
                    //     // this.firstFilter.services[j].push(this.servicesArrayApt)
                    // }

                    // this.filteredApt.push(this.Apartments[i])
                    // & this.Apartments[i].services[i].name.includes(this.selectedServices)
                }
                else
                    console.log('questo appartmamento non è stato pushato', this.Apartments[i]);
            }
            // this.Apartments = this.filteredApt;
            console.log('primo filtro', this.firstFilter);
            console.log('filteredapt', this.filteredApt);

            this.$emit('mysearch', this.firstFilter);
        },
        getServices() {
            axios.get("/api/service")
                .then((res) => {
                res.data.forEach((e) => {
                    let obj = {
                        id: e.id,
                        name: e.name,
                    };
                    this.services.push(obj);
                    console.log('log this.services', this.services);
                });
            });
        },
    }
}
</script>

<style>
.logo{
    height: 100px;
}
</style>
