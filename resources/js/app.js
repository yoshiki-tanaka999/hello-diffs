require('./bootstrap');

// Vue連携時に追加1
import Vue from 'vue';
import VueRouter from 'vue-router';
// import router from './router'
import Example from './components/Example'
import Home from './views/Home'

window.Vue = Vue;
Vue.use(VueRouter);

// Vue連携時に追加2
// window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const router = new VueRouter({
//     routes
//     });

const app = new Vue({
    el: '#app',
    components: {
        Example,
        Home,
    }
  })


