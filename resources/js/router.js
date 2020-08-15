// test
// this is test 2

import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

// MyPage.vueのコンポーネント 
import MyPage from './components/MyPage'
import HeaderComponent from './components/HeaderComponent'
import UserImageName from './components/UserImageName'
import MyPageSelecter from './components/MyPageSelecter'
import Footer from './components/Footer'

// Tags.vueのコンポーネント 
import Tags from './components/Tags';
import TagsTitle from './components/TagsTitle';
import TagsArea from './components/TagsTagArea';

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
      path: '/tags',
      name: 'tags',
      components: {
        default: Tags,
        headerComponent: HeaderComponent,
        tagTitle: TagsTitle,
        tagArea: TagsArea,
        footer: Footer,
      }
    }
  ]
})

export default router;