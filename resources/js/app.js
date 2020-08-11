require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// API連携用
Vue.component('testapi-component', require('./components/TestApiComponent.vue').default);

const app = new Vue({
    el: '#app',
    
});
