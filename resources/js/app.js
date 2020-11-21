require('./bootstrap');
import router from "./router"

window.Vue = require('vue');

// Loading
import Vue from 'vue';
// Import component
import Loading from 'vue-loading-overlay';
// Init plugin
Vue.use(Loading);
// end Loading

// SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;
// End SweetAlert


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    router,
    el: '#app',
});
