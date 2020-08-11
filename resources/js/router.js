import Vue from 'vue'
import Router from 'vue-router'

import Example from './components/Example'
// Views/Homeのテスト
import Home from './views/Home'

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    // {
    //   path: '/',
    //   name: 'example',
    //   component: Example
    // },
    {
        path: '/home',
        name: 'home',
        component: Home
      }
  ]
})