<template>
    <div>
         <div class="mt-3">
            <label for="ward-id" class="form-label">Ward <span class="text-danger">*</span></label>
            <select class="form-select" aria-describedby="help-ward" @change="updateUsers"
                name="ward_id" id="ward-id" aria-label="Select a position">
                <option selected disabled>Select Ward</option>

                <option v-for="(ward, index) in wards" :value=ward.id :key=index>
                    {{ ward.name }}
                </option>
            </select>
            <small id="help-ward" class="form-text text-muted">Select the ward in which the station is</small>
        </div>

        <div class="mt-3">
            <label for="user-id" class="form-label">Select Officers</label>
            <select multiple class="form-select" aria-describedby="officer-ward"
                name="users_ids[]" id="user-id" aria-label="Select a position">
                <option selected disabled>Select Officers</option>
                <option v-for="user in wards[ward].users" :value=user.id :key=user.id>
                    {{ user.name }}
                </option>

            </select>
            <small id="officer-ward" class="form-text text-muted">Select the ward first to display the corrent users</small>
        </div>
    </div>
</template>

<script>

import { mapState } from "vuex";

export default {
    name: 'add-station',

    data(){
        return {
            ward: 0,
        }
    },

    computed:{
        ...mapState(['wards'])
    },

    beforeMount(){
        this.$store.dispatch('getWards')
    },

    methods: {
        updateUsers(e){
            this.ward = event.target.value
        }
    }
}

</script>

<style scoped>

</style>