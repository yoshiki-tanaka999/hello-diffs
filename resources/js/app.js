require('./bootstrap');

// アイコン
import '@mdi/font/css/materialdesignicons.css'

// Vue
import Vue from 'vue'
// window.Vue = require('vue');

// Vuetify
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'

Vue.use(Vuetify, {
  theme: {
    primary: colors.indigo.base,
    secondary: colors.blue.base,
    accent: colors.amber.base,
  }
});
import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'

// Vue-Router
import router from './router'
import store from './store' // ★追加
// Set Vue router
Vue.router = router
// vuex-router-syncのインポート
import { sync } from 'vuex-router-sync'

window.state = store.state;

import Router from 'vue-router'
import MyPage from './components/MyPage'
import Tags  from './components/Tags'

import Discuss from './views/Discuss'

// ★★トップページ★★
// ヘッダー
Vue.component('headerindex-component', require('./components/HeaderIndexComponent.vue').default);
// トップページのお花畑
Vue.component('main-component', require('./components/MainComponent.vue').default);
// トップページの投稿
Vue.component('postmodal-component', require('./components/PostModalComponent.vue').default);
// 画像アップロード用
Vue.component('image-component', require('./components/ImageComponent.vue').default);
Vue.component('postcard-component', require('./components/postCard.vue').default);
Vue.component('discuss-component', require('./views/Discuss.vue').default);

// ★★マイページ★★
// ヘッダー
// Vue.component('header-component', require('./components/HeaderComponent.vue').default);
// ユーザー名と画像？
Vue.component('UserImageName-component', require('./components/UserImageName.vue').default);
// セレクター
Vue.component('MyPageSelecter-component', require('./components/MyPageSelecter.vue').default);
// フッター
Vue.component('footer-component', require('./components/Footer.vue').default);

// ★★タグページ★★
// ヘッダー・フッターは割愛
// タグタイトル
Vue.component('TagTitle-component', require('./components/TagsTitle.vue').default);
// タグエリア
Vue.component('TagArea-component', require('./components/TagsTagArea.vue').default);
// **ボタン
Vue.component('BTNshowmore-component', require('./components/BtnShowMore.vue').default);
// **ボタン
Vue.component('BTNshowmore-component', require('./components/BtnShowMore.vue').default);

// API連携用
Vue.component('testapi-component', require('./components/TestApiComponent.vue').default);

// ★★ディスカッションページ★★
// チャート部分
Vue.component('HeaderDiscuss-component', require('./components/HeaderDiscussComponent.vue').default);
// チャート部分
Vue.component('DiscussChart-component', require('./components/DiscussChartComponent.vue').default);
// Post情報を記載
Vue.component('DiscussPost-component', require('./components/DiscussPostComponent.vue').default);
// Modal情報を記載
Vue.component('DiscussModal-component', require('./components/DiscussModalComponent.vue').default);
// サイドバー
Vue.component('DiscussSidebar-component', require('./components/DiscussSidebarComponent.vue').default);
Vue.component('DiscussChat-component', require('./components/DiscussChatComponent.vue').default);

Vue.component('TweetTest-component', require('./components/TweetTestComponent.vue').default);

Vue.component('Claim-component', require('./components/ClaimComponent.vue').default);
Vue.component('ClaimTab-component', require('./components/ClaimTabComponent.vue').default);
Vue.component('ClaimTabModal-component', require('./components/ClaimTabModalComponent.vue').default);
Vue.component('ClaimOutputTabModal-component', require('./components/ClaimOutputTabModalComponent.vue').default);
Vue.component('ClaimOutputCard-component', require('./components/ClaimOutputCardComponent.vue').default);

// router(ルーティング)とstore(状態)を結びつける
sync(store, router);

// ログイン認証
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'es6-promise/auto'
import VueAuth from '@websanova/vue-auth'
import auth from './auth'
Vue.use(VueAxios, axios)
Vue.use(VueAuth, auth)


const app = new Vue({
    el: '#app',
    router,
    store, // ★追加
    vuetify : new Vuetify({
        icons: {
          iconfont: 'mdiSvg',
        }
    }),
    components: {
        "mypage-component": MyPage,
        "discuss-component": Discuss,
        "tags-component": Tags,
    },
});

// トップページ
// const top = new Vue({
//   el: '#top',
//   router,
//   vuetify : new Vuetify({
//       icons: {
//         iconfont: 'mdiSvg',
//       }
//   }),
//   components: {
//       "discuss-component": Discuss,
//       "image-component": Image,
//   },
// });



