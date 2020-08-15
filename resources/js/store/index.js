import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const debug = process.env.NODE_ENV === 'production'

export default new Vuex.Store({
    state: {
        countries: [],
        counties: [],
        constituencies: [],
        wards: [],
        positions: [],
    },

    actions: {
        async getCountries({ commit }){
            return commit('setCountries', await axios.get('/api/locations/countries'))
        },

        async getCounties({ commit }){
            return commit('setCounties', await axios.get('/api/locations/counties'))
        },

        async getConstituencies({ commit }){
            return commit('setConstituencies', await axios.get('/api/locations/constituencies'))
        },

        async getWards({ commit }){
            return commit('setWards', await axios.get('/api/locations/wards'))
        },

        async getPositions({ commit }){
            return commit('setPositions', await axios.get('/api/positions'))
        }
    },

    mutations: {
        setCountries(state, response){
            state.countries = response.data.data
        },

        setCounties(state, response){
            state.counties = response.data.data
        },

        setConstituencies(state, response){
            state.constituencies = response.data.data
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