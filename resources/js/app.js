/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//registro de directiva personalizada para pasar datos form a upperCase
//Aplica a toda la aplicación xD
Vue.directive( 'touppercase', {
    update (el) {
        el.value = el.value.toUpperCase()
    },
})

/**
 * Librerias
 * 
 */
import VuePaginate from 'vue-paginate';
Vue.use(VuePaginate);

import Vuetify from 'vuetify' // Import Vuetify to your project
Vue.use(Vuetify) // Add Vuetify as a plugin

import Toastr from 'toastr' // Import Vuetify to your project
Vue.use(Toastr) // Add Vuetify as a plugin
/**
 * Componentes
 *
 */
Vue.component('clientes', require('./components/clientes.vue').default);
Vue.component('clientes_nuevo', require('./components/clientes_nuevo.vue').default);
Vue.component('clientes_editar', require('./components/clientes_editar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app'

});
