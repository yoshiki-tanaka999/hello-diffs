require('./bootstrap');

<<<<<<< HEAD
// アイコン
import '@mdi/font/css/materialdesignicons.css'

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

// トップページのお花畑
Vue.component('main-component', require('./components/MainComponent.vue').default);
=======
window.Vue = require('vue');
import Vue from 'vue'
import Router from 'vue-router'
import router from './router';
import MyPage from './components/MyPage';

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
>>>>>>> develop

// トップページのお花畑
Vue.component('postmodal-component', require('./components/PostModalComponent.vue').default);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('header-component', require('./components/HeaderComponent.vue').default);

// API連携用
Vue.component('testapi-component', require('./components/TestApiComponent.vue').default);

// 画像アップロード用
Vue.component('image-component', require('./components/ImageComponent.vue').default);


const app = new Vue({
    el: '#app',
    router,
<<<<<<< HEAD
    vuetify : new Vuetify({
        icons: {
          iconfont: 'mdiSvg',
        }
    }),
=======
    components: {
        "mypage-component": MyPage
    },
    vuetify: new Vuetify()
>>>>>>> develop
});



// const app = new Vue({
//     el: '#app',
    
// });