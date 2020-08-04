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
                    <option v-for="(ward, index) in wards" :value=index :key=index>
                        {{ ward }}
                    </option>
                </select>
            </div>   
        </div>

        <hr>

        <div class="border rounded-lg p-3 bg-white mt-5">
            <h5 class="text-secondary font-weight-bold py-2">Candidature Details</h5>

            <div class="mt-3">
                <label for="ward-id" class="form-label">Position<span class="text-danger">*</span></label>
                <select class="form-select" name="ward_id" @change="updatePosition" 
                        id="ward-id" aria-label="Select a position">
                    <option selected disabled>Select Position</option>
                    <option v-for="(position, index) in positions" :value=index :key=index>
                        {{ position }}
                    </option>
                </select>
            </div>

            <div class="mt-3">
                <label for="ward-id" class="form-label">Location(Ward)<span class="text-danger">*</span></label>
                <select class="form-select" name="ward_id" 
                        id="ward-id" aria-label="Select a position">
                    <option selected disabled>Select Location</option>
                    <option v-if="selectPosition == 5" v-for="(ward, index) in wards" :value=index :key=index>
                        {{ ward }}
                    </option>
                    <option v-if="selectPosition == 0" v-for="(country, index) in countries" :value=index :key=index>
                        {{ country }}
                    </option>
                    <option v-if="selectPosition == 4" v-for="(constituency, index) in constituencies" :value=index :key=index>
                        {{ constituency }}
                    </option>
                    <option v-if="[1, 2, 3].includes(selectPosition)" v-for="(county, index) in counties" :value=index :key=index>
                        {{ county }}
                    </option>
                </select>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        'name': 'add-candidate',

        data(){

            return {
                positions: [
                    'President', 
                    'Governor', 'Senetor', 
                    'Women Representative', 
                    'Member Of Parliament', 
                    'Member of County Assembly'
                ],
                countries: ['Kenya'],
                counties: ['Nairobi', 'Mombasa', 'Kisumu', 'Vihiga', 'Kakamega'],
                constituencies: ['Hamisi', 'Emuhaya', 'Maragoli'],
                wards: ['Gisambai', 'Jepkoyayi'],
                selectPosition: '',
                selectLocation: '',
            }
        },

        mounted() {
            console.log('Add Candidate mounted.')
        },

        methods: {
            updatePosition(e){
                this.selectPosition = e.target.value
                console.log(e.target.value)
            }
        }
    }
</script>

<style scoped>

</style>
