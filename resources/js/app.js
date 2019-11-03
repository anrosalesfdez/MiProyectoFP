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


import VueNotification from "@kugatsu/vuenotification";
Vue.use(VueNotification, {
  timer: 3,
  animateIn: function() {
    var tl = new TimelineMax()
      .from(this.notificationEl, 0.6, {
        opacity: 0
      })
      .from(this.notificationEl, 0.4, {
        borderRadius: 100,
        width: 58,
        height: 58
      })
      .from(this.notificationElContent, 0.3, {
        opacity: 0
      });
    return tl;
  },
  error: {
    background: "red",
    color: "white",
    text: "error genérico"
  }
});


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

/**
 * Componentes
 *
 */
Vue.component('clientes', require('./components/clientes.vue').default);
Vue.component('clientes_nuevo', require('./components/clientes_nuevo.vue').default);
Vue.component('clientes_editar', require('./components/clientes_editar.vue').default);
Vue.component('clientes_detalle', require('./components/clientes_detalle.vue').default);
Vue.component('productos', require('./components/productos.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app'

});
