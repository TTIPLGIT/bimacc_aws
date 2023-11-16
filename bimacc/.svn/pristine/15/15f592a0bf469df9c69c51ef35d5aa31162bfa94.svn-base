
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueSocketio from 'vue-socket.io';
window.Vue = require('vue');
Vue.use(new VueSocketio({
    connection: ':6999'
}));
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);
import ToggleButton from 'vue-js-toggle-button';
Vue.use(ToggleButton);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hearing-component', require('./components/HearingComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

// Core plugin JavaScript
require('startbootstrap-sb-admin/vendor/jquery-easing/jquery.easing.min');
// Page level plugin JavaScript
require('chart.js/dist/Chart.min');
require('datatables.net/js/jquery.dataTables');
require('datatables.net-bs4/js/dataTables.bootstrap4');

// Custom scripts for all pages
require('startbootstrap-sb-admin/js/sb-admin.min');

// Demo scripts for this page
require('startbootstrap-sb-admin/js/demo/datatables-demo');

