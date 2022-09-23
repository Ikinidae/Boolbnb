<template>

    <nav class="navbar navbar-expand-lg mx-auto w-75">
            <div class="container-fluid">
                <div>
                        <a class="navbar-brand" href="#">
                            <img class="nav-item logo"  src="../../logo boolbnb.png" alt="logo">
                        </a>
                    </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse"  id="navbarTogglerDemo01">
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

                    <div class="form-group">
                            <div>
                            <input
                            required
                            autocomplete="off"
                            @keyup="addressSearch"
                            type="text"
                            class="form-control form-create address-form me-3"
                            name="address"
                            id="query"
                            v-model="searchAddress"
                            placeholder="Search"
                        />

                        </div>

                        <div class="form-create address-form2 autocomplete" v-show="nameAddress.length > 0">
                        <ul class="list-group scroller m-2">
                            <li
                                :key="i"
                                v-for="(name, i) in nameAddress"
                                @click="selectAddress(i)"
                                style="cursor: pointer"
                                class="li-hover list-group-item "
                            >
                                {{ name.address.freeformAddress }}
                            </li>
                        </ul>
                    </div>

                    </div>


                    <div class="dropdown m-2 ">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            filters
                            </button>
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                <li>
                                     <!-- Input per radiante -->
                                    <label  for="radius">Choose radius distance</label>
                                     <select class="me-3"  @change="getApartments(radius,latitude,longitude)" name="radius" id="radius" v-model="radius">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </li>

                                <li>
                                    <!-- Rooms -->
                                    <label for="rooms">Choose min rooms</label>
                                    <select class="me-3" @change="log" name="rooms" id="rooms" v-model="rooms">
                                        <!-- <option value="Any">Any</option> -->
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </li>

                                <li>
                                    <!-- Beds -->
                                    <label for="beds">Choose min beds</label>
                                    <select class="me-3" @change="log" name="beds" id="beds" v-model="beds">
                                        <!-- <option value="Any">Any</option> -->
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </li>
                            </ul>
                    </div>






                    <!-- Services -->
                    <div id="filter-list" class="show dropdown m-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </button>
                        <ul class=" dropdown-menu" >
                            <li class="dropdown-item" :key="i" v-for="(service, i) in services">
                                <input
                                    type="checkbox"
                                    :name="service.name"
                                    :id="service.id"
                                    :value="service.name"
                                    v-model="selectedServices"
                                    @change="log"
                                />
                                    <label :for="service.id">
                                        {{ service.name }}
                                    </label>
                            </li>
                        </ul>
                    </div>



                    <!-- <button @click="$emit('mysearch', Apartments)" class="btn btn-outline-danger" type="submit">Search</button> -->
                    <!-- <button @click="$emit('mysearch', filteredApt)" class="btn btn-outline-danger" type="submit">Search</button> -->
                    <button @click="selectRooms" class="btn btn-outline-danger" type="submit">Search</button>
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
            this.servicesArrayApt = [],
            this.filteredApt = [];

            for (let i = 0; i < this.Apartments.length; i++) {

                // per ogni appartamento controllo se le condizioni numero di stanze e letti sono verificate
                if (this.Apartments[i].rooms >= this.rooms & this.Apartments[i].beds >= this.beds) {

                    // se si, pushare in un array con appartamenti filtrati
                    this.firstFilter.push(this.Apartments[i]);

                    // per ogni appartamento filtrato
                    for (let k = 0; k < this.firstFilter.length; k++) {
                        this.servicesArrayApt = [];

                        // per ogni servizio salvare il nome nell'array servicesArrayApt
                        for (let j = 0; j < this.firstFilter[k].services.length; j++) {
                            this.servicesArrayApt.push(this.firstFilter[k].services[j].name);
                        }
                        // creare un'array
                        let intersect = this.servicesArrayApt.filter(service => this.selectedServices.includes(service));
                        console.log('intersect', intersect);

                        // per ogni servizio selezionato nei filtri fare il confronto con quelli dell'appartamento
                        if (intersect.length == this.selectedServices.length && !this.filteredApt.includes(this.firstFilter[k])) {
                            this.filteredApt.push(this.firstFilter[k]);
                        } else {
                            console.log("Ika sei grande");
                        }
                    }
                } else {
                    console.log('questo appartmamento non è stato pushato', this.Apartments[i]);
                }
            }
            console.log('primo filtro', this.firstFilter);
            console.log('filteredapt', this.filteredApt);

            this.$emit('mysearch', this.filteredApt);
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
                    // console.log('log this.services', this.services);
                });
            });
        },
    }
}
</script>

<style>
.logo{
    height: 150px;
}

.autocomplete {
    z-index: 10;
    padding: 10px;
    /* border: 1px solid; */
    border-radius: 20px;
    position: absolute;
}

.scroller {
  width: 300px;
  height: 100px;
  overflow-y: scroll;
  scrollbar-color: rebeccapurple green;
  scrollbar-width: thin;
}
</style>
