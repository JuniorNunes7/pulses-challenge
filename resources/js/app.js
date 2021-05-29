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

// Dimensions
Vue.component('dimensions-index', require('./components/dimensions/DimensionIndex.vue').default);
Vue.component('dimensions-form', require('./components/dimensions/DimensionForm.vue').default);

// Questions
Vue.component('questions-index', require('./components/questions/QuestionIndex.vue').default);
Vue.component('questions-form', require('./components/questions/QuestionForm.vue').default);

const app = new Vue({
    el: '#app'
});
