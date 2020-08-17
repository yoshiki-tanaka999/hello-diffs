// test


import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import MyPage from './components/MyPage'
import HeaderComponent from './components/HeaderComponent'
import UserImageName from './components/UserImageName'
import MyPageSelecter from './components/MyPageSelecter'
import Footer from './components/Footer'
import DiscussComponent from './components/DiscussComponent'

// Views/Homeのテスト
import Home from './views/Home'


const router = new Router({
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
      },
      {
      path: '/mypage',
      name: 'mypage',
      components: {
        default: MyPage,
          headerComponent: HeaderComponent,
          userImageName: UserImageName,
          mypageSelecter: MyPageSelecter,
          footer: Footer,
        },
      },
      {
        //
        //(\\d+)を付ければパラメータには数字しか入らない正規表現となる 
        path: '/discuss/:id(\\d+)', 
        name: 'discuss',
        component: { 
          default: DiscussComponent
        },
        props: route => ({ id: Number(route.params.id) })
      }
  ]
})

export default router;