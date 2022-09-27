<template>
    <div class="form-group">

        <!-- address input -->
        <label class="form-label" for="address">Address*</label>
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

        <!-- hidden inputs for coordinates -->
        <input type="text" hidden name="latitude" v-model="latitude" />
        <input type="text" hidden name="longitude" v-model="longitude" />

        <!-- list of addresses -->
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
    </div>
</template>

<script>
export default {
    name: "FindAddress",

    data(){
        return{
            api_key: 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff',
            latitude: null,
            longitude: null,
            nameAddress: [],
            searchAddress:[]
        };
    },
    methods: {
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
        }
    }
}
</script>

<style>

</style>

