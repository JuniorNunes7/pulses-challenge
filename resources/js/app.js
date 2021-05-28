require('./bootstrap');

import Vue from 'vue'

// Plugins
import VueToastr from "vue-toastr";
Vue.use(VueToastr);

// Global components
Vue.component('vue-toastr', require('./components/Toastr.vue').default);

const app = new Vue({
    el: '#app',
});
