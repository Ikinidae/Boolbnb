<template>

    <div class="form-group">
        <label class="form-label" for="address">Address*</label>
        <input
            required
            autocomplete="off"
            @change="addressSearch"
            type="text"
            class="form-control form-create address-form"
            name="address"
            id="query"
            v-model="address"
        />
        <input type="text"  name="latitude" v-model="latitude" />
        <input type="text"  name="longitude" v-model="longitude" />
        <!-- <div class="form-create address-form2" v-show="results.length > 0">
            <ul class="list-type">
                <li
                    :key="i"
                    v-for="(result, i) in results"
                    @click="selectAddress(i)"
                    style="cursor: pointer"
                    class="li-hover"
                >
                    {{ result.address.freeformAddress }}
                </li>
            </ul>
        </div> -->
    </div>
</template>

<script>
export default {
    name: "FindAddress",

    data(){
        return{
            api_key: 'k8V0aFCAwuHo8eDICtxR16HCuAjRAWff',
            latLong: [],
            latitude: null,
            longitude: null,
        };
    },
    mounted() {

    },
    methods: {
        addressSearch() {
            tt.services.fuzzySearch({
                key: this.api_key,
                query: document.getElementById("query").value,
            }).then(this.handleResults);
        },
        handleResults(result) {
            this.latLong = result.results[0].position;
            this.latitude = this.latLong.lat;
            this.longitude = this.latLong.lng;
            console.log('log1', this.latLong);
            console.log('log2', this.latitude);
            console.log('log3', this.longitude);

        }
    }

}
</script>

<style>

</style>

