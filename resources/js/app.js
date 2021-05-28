require('./bootstrap');

import Vue from 'vue'

// Plugins
import VueToast from 'vue-toast-notification';
Vue.use(VueToast, {
    position: 'top-right'
});

// Global components
Vue.component('vue-toastr', require('./components/Toastr.vue').default);
Vue.component('sidebar', require('./components/layout/Sidebar.vue').default);

// Dimension
Vue.component('dimensions-index', require('./components/DimensionIndex.vue').default);
Vue.component('dimensions-form', require('./components/DimensionForm.vue').default);

const app = new Vue({
    el: '#app'
});
