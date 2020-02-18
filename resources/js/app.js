

require('./bootstrap');

window.Vue = require('vue');

window.Fire = new Vue(); //initialize a fire event so we can use it anywhere in the application. 

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import {routes} from './routes'
import StoreData from './store'
import {initialize} from './helpers/general';

// register jw pagination component globally
import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);


Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);

// import Home from './components/Home.vue';
// Vue.component('home', Home);

// import MainApp  from './components/MainApp.vue';
// Vue.component('main-app',MainApp);



import Myheader from './components/MyHeader.vue';
Vue.component('my-header', Myheader);

import Myfooter from './components/Footer.vue';
Vue.component('footers', Myfooter);


const router  = new VueRouter({
    mode:'history',
    routes,
});

initialize(store, router);
const app = new Vue({
    el: '#app',
    router,
    store,
    components:{ Myheader, Myfooter }
});
