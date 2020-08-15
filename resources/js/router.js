// test
// this is test 2

import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import MyPage from './components/MyPage'
import HeaderComponent from './components/HeaderComponent'
import UserImageName from './components/UserImageName'
import MyPageSelecter from './components/MyPageSelecter'
import Footer from './components/Footer'

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
      
    }
  ]
})

export default router;