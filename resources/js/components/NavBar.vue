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
                    <div>
                        <a class="navbar-brand" href="#">
                            <img class="nav-item logo"  src="../../logo boolbnb.png" alt="logo">
                        </a>
                    </div>
                    <div class="mb-2">
                        <input
                            required
                            autocomplete="off"
                            @keyup="addressSearch"
                            type="text"
                            class="form-control form-create address-form me-3"
                            name="address"
                            id="query"
                            v-model="searchAddress"
                        />

                    </div>
                    <div class="dropdown m-3 ">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            filter*
                            </button>
  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
    <li>  <label  for="radius">Choose radius distance</label>
                        <select class="me-2" @change="getApartments(radius,latitude,longitude)" name="radius" id="radius" v-model="radius">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
    </li>
    <li>
        <label for="rooms">Choose min rooms</label>
                        <select class="me-2" @change="selectRooms" name="rooms" id="rooms" v-model="rooms">
                            <option value="Any">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
    </li>
    <li>
        <label for="beds">Choose min beds</label>
                        <select class="me-2" @change="" name="beds" id="beds" v-model="beds">
                            <option value="Any">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
    </li>
  </ul>
</div>


                    <!-- Input per radiante -->
                    <!-- <div class="m-2">
                        <label  for="radius">Choose radius distance</label>
                        <select class="me-3" @change="getApartments(radius,latitude,longitude)" name="radius" id="radius" v-model="radius">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>

                        <label for="rooms">Choose min rooms</label>
                        <select class="me-3" @change="selectRooms" name="rooms" id="rooms" v-model="rooms">
                            <option value="Any">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <label for="beds">Choose min beds</label>
                        <select class="me-3" @change="" name="beds" id="beds" v-model="beds">
                            <option value="Any">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div> -->


                    <!-- nel button viene fatta partire la funzione getApartments(lat long radius) con i valori di lat lon e radius  -->
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

                    <button @click="$emit('mysearch', Apartments)" class="btn btn-outline-danger m-2" type="submit">Search</button>
                    <!-- <button @click="getApartments(radius,latitude,longitude)" class="btn btn-outline-success" type="submit">Search</button> -->
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
            rooms: 'Any',
            beds: 'Any',
            nameAddress: [],
            searchAddress:[],

            // array dove salveremo i risultati da stampare
            Apartments: [],
            // nuovo array filtrato per camere
            // filteredApt: []
        };
    },

    methods: {

        // log(){
        //     console.log('radius',this.radius);
        // },

        // FUZZY SEARCH
        addressSearch() {
            tt.services.fuzzySearch({
                key: this.api_key,
                query: document.getElementById("query").value,
            }).then(this.handleResults);
        },
        handleResults(result) {
            this.nameAddress = result.results;
            console.log('risultati',this.nameAddress);
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
                });
        },
        // selectRooms(){
        //     for (let i = 0; i < this.Apartments.length; i++) {
        //         if (this.Apartments[i].rooms >= this.rooms) {
        //             this.filteredApt.push(this.Apartments[i])
        //         }
        //     }
        //     this.Apartments = this.filteredApt;
        //     console.log(this.filteredApt);
        // }
    }
}
</script>

<style>
.logo{
    height: 100px;
}
</style>
