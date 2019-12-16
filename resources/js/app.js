/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');


//registro de directiva personalizada para pasar datos form a upperCase
//Aplica a toda la aplicación
Vue.directive( 'touppercase', {
    update (el) {
        el.value = el.value.toLocaleUpperCase();
        console.log(el.value)
    },
})

import Notifications from 'vue-notification';
// import velocity from 'velocity-animate';
Vue.use(Notifications)
// Vue.use(Notifications, { velocity })


import VueCurrencyInput from 'vue-currency-input'

const pluginOptions = {
  /* see config reference */
  globalOptions: { currency: 'USD' }
}
Vue.use(VueCurrencyInput, pluginOptions);



// import Vue from 'vue'
// import VueGoogleCharts from 'vue-google-charts'
 
// Vue.use(VueGoogleCharts)



import {ServerTable, ClientTable, Event} from 'vue-tables-2';
let options = {};
let useVuex = false;
let theme = "bootstrap4";
let template = "default";
Vue.use(ClientTable, options, useVuex, theme, template);
Vue.use(ServerTable, options, useVuex, theme, template);
import daterangepicker from 'daterangepicker';
window.moment = require('moment');


import Print from 'vue-print-nb'
Vue.use(Print);

//sacar la dependencia de vuetify
//sacar la dependencia de toastr
//sacar la dependencia de vue-notifications
//sacar la dependencia de VuePaginate
//sacar la dependencia de VueNotification

/**
 * Componentes
 *
 */
Vue.component('clientes', require('./components/clientes.vue').default);
Vue.component('clientes_nuevo', require('./components/clientes_nuevo.vue').default);
Vue.component('clientes_editar', require('./components/clientes_editar.vue').default);
Vue.component('clientes_detalle', require('./components/clientes_detalle.vue').default);
Vue.component('productos', require('./components/productos.vue').default);
Vue.component('settingsuser', require('./components/settingsuser.vue').default);
Vue.component('emisor', require('./components/emisor.vue').default);
Vue.component('facturas', require('./components/facturas.vue').default);
Vue.component('facturas_nuevo', require('./components/facturas_nuevo.vue').default);
Vue.component('facturas_detalle', require('./components/facturas_detalle.vue').default);
Vue.component('grafs', require('./components/grafs.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app'

});
