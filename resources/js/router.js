import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

// MyPage.vueのコンポーネント
import MyPage from './components/MyPage'
// import HeaderComponent from './components/HeaderComponent'
import UserImageName from './components/UserImageName'
import MyPageSelecter from './components/MyPageSelecter'

// import Respond from './components/RespondMyPage'
// import Following from './components/FollowingMyPage'
// import Own from './components/OwnMyPage'
// import Recent from './components/RecentMyPage'
// import Recommended from './components/RecommendedMyPage'
// import Teams from './components/TeamsMyPage'
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
import DiscussModal from './components/DiscussModalComponent' 

import ClaimIssueContent from './components/ClaimIssueContentComponent'
import Claim from './components/ClaimComponent'
import ClaimsPros from './components/ClaimsProsComponent'
import ClaimsCons from './components/ClaimsConsComponent'
import ClaimsOthers from './components/ClaimsOthersComponent'

// Register
import Register from './views/Register'
// Login
import Login from './views/Login'
// User(ログインテスト)
import User from './views/User'
// account
import Account from './views/Account'
// not found
import Not_found from './views/Not_found'

import Tweet from './components/TweetTestComponent' 
// import ClaimTab from './components/ClaimTabComponent' 
import Chat from './components/DiscussChatComponent'

const router = new Router({
  mode: 'history',
  routes: [
    {
      // ★★トップページ★★
      path: '/index',
      component: Index,
        children: [
          {
            path: 'new',
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
      component: require("./views/Discuss.vue").default,
      // props設定を有効にすることで、$route.paramsの内容がそのままpropsとして渡る
      props: (route) => ({
        id: Number(route.params.id)
      }),
    },
    {
      // // ★★ディスカッションページ★★
      // //(\\d+)を付ければパラメータには数字しか入らない正規表現となる 
      // path: '/discuss/:id(\\d+)', 
      // name: 'Claim',
      // component: require("./views/Discuss.vue").default,
      // // props設定を有効にすることで、$route.paramsの内容がそのままpropsとして渡る
      // props: (route) => ({
      //   id: Number(route.params.id)
      // }),
    },    
      {
        path: '/discuss/:id(\\d+)/claim/:claimId(\\d+)',
        name: 'Claim',
        conponent: Claim,
        props: (route) => ({
          id: Number(route.params.id),
          claimId: Number(claim.id)
        }),
      }],
        children:[
          {
            path: 'pros',
            name: 'pros',
            conponent: require("./components/ClaimsProsComponent.vue").default,
          },
          {
            path: 'cons',
            name: 'cons',
            conponent: ClaimsCons,
          },
          {
            path: 'others',
            name: 'others',
            conponent: ClaimsOthers,
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
    // component: MyPage,
    //   children: [
        // {
        //   path: 'respond',
        //   component: Respond,
        // },
        // {
        //   path: 'following',
        //   component: Following,
        // },
        // {
        //   path: 'own',
        //   component: Own,
        // },
        // {
        //   path: 'recent',
        //   component: Recent,
        // },
        // {
        //   path: 'recommended',
        //   component: Recommended,
        // },
        // {
        //   path: 'teams',
        //   component: Teams,
        // },
      // ],
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
    },
    // レジスター
    {path: '/register', name: 'register', component: Register }, 
    // ログイン認証
    { path: '/login', name: 'login', component: Login },
    // ログインテスト
    { path: '/user', component: User },
    // account
    { path: '/account', name: 'Account', component: Account },
    // not found
    { path: '/404', name: 'Not_found', component: Not_found },
    { path: '*', redirect: '/404' },
    { path: '/tweet', name: 'Tweet', component: Tweet },    
    // { path: '/claimtab', name: 'ClaimTab', component: ClaimTab }, 
    { path: '/chattest', name: 'Chat', component: Chat },

  ]
})

// 認証( ログインしていないとリダイレクトされる) 
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
      if (state.isLogin === false) {
          next({
              path: '/login',
              query: { redirect: to.fullPath }
          })
      } else {
          next()
      }
  } else {
      next();
  }
});

export default router;