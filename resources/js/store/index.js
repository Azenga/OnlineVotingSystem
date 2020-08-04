import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const debug = process.env.NODE_ENV === 'production'

export default new Vuex.Store({
    state: {
        locations: [],
        wards: [],
        positions: [],
    },

    actions: {
        async getLocations({ commit }){
            return commit('setLocations', await axios.get('/api/locations'))
        },
        async getWards({ commit }){
            return commit('setWards', await axios.get('/api/locations/wards'))
        },
        async getPositions({ commit }){
            return commit('setPositions', await axios.get('/api/positions'))
        }
    },

    mutations: {
        setLocations(state, response){
            state.locations = response.data.data
        },
        setWards(state, response){
            state.wards = response.data.data
        },
        setPositions(state, response){
            state.positions = response.data.data
        }
    },

    strict: debug
});