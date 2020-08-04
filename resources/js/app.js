require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-candidate', require('./components/AddCandidateComponent.vue').default);

const app = new Vue({
    el: '#app',
});
