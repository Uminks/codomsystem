/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import {
    BadgerAccordion,
    BadgerAccordionItem
} from 'vue-badger-accordion';
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('codom-register', require('./components/CodomRegisterComponent.vue').default);
Vue.component('expense-register', require('./components/ExpensesRegisterComponent.vue').default);
Vue.component('payment-register', require('./components/PaymentRegisterComponent.vue').default);
Vue.component('charge-register', require('./components/ChargeRegisterComponent.vue').default);
Vue.component('estates-list', require('./components/EstatesListComponent.vue').default);
Vue.component('BadgerAccordion', BadgerAccordion);
Vue.component('BadgerAccordionItem', BadgerAccordionItem);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
});


// CUSTOM JS
if ($('.login-container')[0]) {
    let body = $('body');
    body.css("background-color", "#485563");
    body.css("background-color", "-webkit-linear-gradient(to left, #29323c, #485563)");
    body.css("background-color", "linear-gradient(to left, #29323c, #485563)");
}
