

import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

// MyPage.vueのコンポーネント 
import MyPage from './components/MyPage'
// import HeaderComponent from './components/HeaderComponent'
import UserImageName from './components/UserImageName'
import MyPageSelecter from './components/MyPageSelecter'
import Respond from './components/RespondMyPage'
import Following from './components/FollowingMyPage'
import Own from './components/OwnMyPage'
// import Footer from './components/Footer'

// ImageComponentのコンポーネント
// import Discuss from './views/Discuss'
// import Image from './components/ImageComponent'

// Tags.vueのコンポーネント 
import Tags from './components/Tags';
import TagsTitle from './components/TagsTitle';
import TagsArea from './components/TagsTagArea';

// Views/Homeのテスト
import Home from './views/Home'

// Index.vue
import Index from './views/Index'
// Index.vueのコンポーネント
import Image from './components/ImageComponent'
import ImagePopular from './components/ImagePopularComponent'
import ImageFeatured from './components/ImageFeaturedComponent'

// Discss.vue
import Discuss from './views/Discuss'
// Discss.vueのコンポーネント
import DiscussChart from './components/DiscussChartComponent'
import DiscussPost from './components/DiscussPostComponent'

const router = new Router({
  mode: 'history',
  routes: [
    {
      // ★★トップページ★★
      path: '/index',
      component: Index,
        children: [
          {
            path: '',
            component: Image ,
          },
          {
            path: 'popular',
            component: ImagePopular ,
          },          
          {
            path: 'featured',
            component: ImageFeatured ,
          },
        ],
      
    },
    {
      // ★★ディスカッションページ★★
      //(\\d+)を付ければパラメータには数字しか入らない正規表現となる 
      path: '/discuss/:id(\\d+)', 
      name: 'Discuss',
      // components: {
      //   default: Discuss,
      //     DiscussChart: DiscussChart,
      //     DiscussPost: DiscussPost,
      //   },
      component: require("./views/Discuss.vue").default,
      // props: route => ({ id: Number(route.params.id) })
    },
    {
      path: '/home',
      name: 'home',
      component: Home
    },
    {
    path: '/mypage',
    name: 'Mypage',
    // component: require("./components/MyPage").default,
    // components: {
    //   default: MyPage,
    //     // headerComponent: HeaderComponent,
    //     userImageName: UserImageName,
    //     mypageSelecter: MyPageSelecter,
    //     // footer: Footer,
    //   },
    component: MyPage,
      children: [
        {
          path: '',
          component: Respond,
        },
        {
          path: 'following',
          component: Following,
        },
        {
          path: 'own',
          component: Own,
        },
      ],
    },
    {
      path: '/tags',
      name: 'Tags',
      components: {
        default: Tags,
        // headerComponent: HeaderComponent,
        tagTitle: TagsTitle,
        tagArea: TagsArea,
        // footer: Footer,
      }
    }
  ]
})



export default router;