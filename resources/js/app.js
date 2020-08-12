require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// API連携用
Vue.component('testapi-component', require('./components/TestApiComponent.vue').default);

// 画像アップロード用
Vue.component('image-component', require('./components/ImageComponent.vue').default);

const app = new Vue({
    el: '#app',
    
});
