<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-light w-75">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Boolbnb</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
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
                    <!-- input con 3 value 10,20,30 km il value viene salvato in una variabile nel data -->


                        <label for="radius">Choose radius distance</label>
                        <select name="radius" id="radius" v-model="radius">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>

                        </select>




                    <!-- nel button viene fatta partire la funzione getApartments(lat long radius) con i valori di lat lon e radius  -->
                    <div class="form-create address-form2" v-show="nameAddress.length > 0">
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

                    <!-- <button @click="$emit('mysearch', Apartments)" class="btn btn-outline-success" type="submit">Search</button> -->
                    <button @click="getApartments(radius,latitude,longitude)" class="btn btn-outline-success" type="submit">Search</button>
                <!-- </form> -->
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'NavBar',
    data() {
        return {

            api_key: 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff',
            latitude: null,
            longitude: null,
            radius: null,
            nameAddress: [],
            searchAddress:[],

            // array dove salveremo i risultati da stampare
            Apartments: []
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
                    console.log('risultato res',res);

                });
        },



    }
}
</script>

<style>

</style>
