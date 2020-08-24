<template>
    <div>
        <div class="border rounded-lg p-3 bg-white">
            <h5 class="text-secondary font-weight-bold py-2">User Details</h5>

            <div class="mt-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="name" 
                    placeholder="Name...">
            </div>
            
            <div class="mt-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" 
                    class="form-control" id="email" placeholder="Email...">
            </div>
            
            <div class="mt-3">
                <label for="phone-number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" name="phone_number" 
                    class="form-control" id="phone-number" placeholder="Phone Number ...">
            </div>

            <div class="mt-3">
                <label for="national_id_number" class="form-label">National ID Number <span class="text-danger">*</span></label>
                <input type="text" name="national_id_number" 
                    class="form-control" id="national_id_number" placeholder="ID Number...">
            </div>

            <div class="mt-3">
                <label for="ward-id" class="form-label">Ward<span class="text-danger">*</span></label>
                <select class="form-select" name="ward_id"
                        id="ward-id" aria-label="Select a position">
                    <option selected disabled>Select Candidate Ward (Location)</option>
                    <option v-for="(ward, index) in wards" :value=ward.id :key=index>
                        {{ ward.name }}
                    </option>
                </select>
            </div>   
        </div>

        <hr>

        <div class="border rounded-lg p-3 bg-white mt-5">
            <h5 class="text-secondary font-weight-bold py-2">Candidature Details</h5>

            <div class="mt-3">
                <label for="ward-id" class="form-label">Position<span class="text-danger">*</span></label>
                <select class="form-select" name="position_id" @change="updatePosition" 
                        id="ward-id" aria-label="Select a position">
                    <option value="" selected disabled>Select Position</option>

                    <option v-for="(position, index) in positions" :value=position.id :key=index>
                        {{ position.title }}
                    </option>
                </select>
            </div>

            <div class="mt-3">
                <label for="ward-id" class="form-label">Location<span class="text-danger">*</span></label>
                <select class="form-select" name="location_id" 
                        id="ward-id" aria-label="Select a position">
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

        </div>
    </div>
</template>

<script>
    import { mapState } from "vuex";

    export default {
        'name': 'add-candidate',

        data(){

            return {
                position: 0,
            }
        },

        computed: {
            ...mapState(['countries', 'counties', 'constituencies', 'wards', 'positions'])
        },

        beforeMount(){
            this.$store.dispatch('getCountries'),
            this.$store.dispatch('getCounties'),
            this.$store.dispatch('getConstituencies'),
            this.$store.dispatch('getWards'),
            this.$store.dispatch('getPositions')
        },

        mounted() {
            console.log('Add Candidate mounted.')
        },

        methods: {
            updatePosition(e){
                this.position = e.target.value
                console.log(e.target.value)
            },
        }
    }
</script>

<style scoped>

</style>
