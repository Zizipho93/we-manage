
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueSweetAlert from 'vue-sweetalert';
Vue.use(VueSweetAlert);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('new-project', require('./components/newProject.vue'));
Vue.component('assign-task', require('./components/assignTask.vue'));

const app = new Vue({
    el: '#app'
});
