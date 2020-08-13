require('./bootstrap');

// Vue
import Vue from 'vue'
// window.Vue = require('vue');

// Vuetify
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'

Vue.use(Vuetify, {
  theme: {
    primary: colors.indigo.base,
    secondary: colors.blue.base,
    accent: colors.amber.base,
  }
});
import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'

// Vue-Router
import router from './router'


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// API連携用
Vue.component('testapi-component', require('./components/TestApiComponent.vue').default);

// 画像アップロード用
Vue.component('image-component', require('./components/ImageComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
    vuetify : new Vuetify(),
});
