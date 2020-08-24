<template>
    <div class="row align-items-end">
        <div class="col-sm-4">
            <label for="position" class="form-label">Position</label>
            <select class="form-select" aria-label="Default select example" name="position" 
                id="position" @change="updatePosition" required>
                <option value="" selected disabled>Select Position</option>

                <option v-for="(position, index) in positions" :value=position.id :key=index>
                    {{ position.title }}
                </option>
            </select>
        </div>

        <div class="col-sm-4">
            <label for="location" class="form-label">Location</label>
            <select id="location" class="form-select" aria-label="Default select example" name="location" required>
                <option value="" selected disabled>Select Location</option>
                <optgroup v-if="position == 1">
                    <option v-for="(country, index) in countries" :value=country.id :key=index>
                        {{ country.name }}
                    </option>
                </optgroup>
                <optgroup v-if="position == 2 || position == 3 || position == 4">
                    <option v-for="(county, index) in counties" :value=county.id :key=index>
                        {{ county.name }}
                    </option>
                </optgroup>
                <optgroup v-if="position == 5">
                    <option v-for="(constituency, index) in constituencies" :value=constituency.id :key=index>
                        {{ constituency.name }}
                    </option>
                </optgroup>
                <optgroup v-if="position == 6">
                    <option v-for="(ward, index) in wards" :value=ward.id :key=index>
                        {{ ward.name }}
                    </option>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-4">
            <button type="submit" class="btn btn-block btn-primary">Apply Filter</button>
        </div>
    </div>
</template>

<script>
    import { mapState } from "vuex";
    import { mapActions } from "vuex";

    export default {
        'name': 'search-voting-results',

        data(){

            return {
                position: 0,
            }
        },

        computed: {
            ...mapState(['countries', 'counties', 'constituencies', 'wards', 'positions'])
        },

        beforeMount(){
            this.getCountries()
            this.getCounties()
            this.getConstituencies()
            this.getWards()
            this.getPositions()
        },

        mounted() {
            console.log('Search Voting Results Mounted.')
        },

        methods: {
            ...mapActions([
                'getCountries', 
                'getCounties',
                'getConstituencies', 
                'getWards', 
                'getPositions'
            ]),

            updatePosition(e){
                this.position = e.target.value
                console.log(e.target.value)
            },
        }
    }
</script>

<style scoped>

</style>