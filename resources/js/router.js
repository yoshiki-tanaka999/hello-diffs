import Vue from 'vue'
import Router from 'vue-router'

import Example from './components/Example'
import MyPage from './components/MyPage'
import HeaderComponent from './components/HeaderComponent'
import UserImageName from './components/UserImageName'
import MyPageSelecter from './components/MyPageSelecter'
import Footer from './components/Footer'

// Views/Homeのテスト
import Home from './views/Home'

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
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