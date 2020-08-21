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

// ImageComponentのコンポーネント
// import Discuss from './views/Discuss'
import Image from './components/ImageComponent'

// Tags.vueのコンポーネント 
import Tags from './components/Tags';
import TagsTitle from './components/TagsTitle';
import TagsArea from './components/TagsTagArea';

// Views/Homeのテスト
import Home from './views/Home'


const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/index',
      name: 'image',
      component: Image
    },
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
        name: 'Discss',
        // component: { 
        //   default: Discuss
        // },
        component: require("./views/Discuss.vue").default,
        // props: route => ({ id: Number(route.params.id) })
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