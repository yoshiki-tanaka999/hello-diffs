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
// vuex-router-syncのインポート
import { sync } from 'vuex-router-sync'

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
// サイドバー
Vue.component('DiscussSidebar-component', require('./components/DiscussSidebarComponent.vue').default);

// router(ルーティング)とstore(状態)を結びつける
sync(store, router);

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



