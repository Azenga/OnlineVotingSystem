require('./bootstrap');

window.Vue = require('vue');

import store from "./store";

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-candidate', require('./components/AddCandidateComponent.vue').default);
Vue.component('add-station', require('./components/AddStationComponent.vue').default);

const app = new Vue({
    el: '#app',
    store,
});
