// 結局使わない
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// 商品リストの配列
const state = {
    posts: []
};
const getters = {
    fetch(id) {
        return state.posts;
    },
    find(id) {
        return state.posts.find((el) => el.id === id);
    },
    // asyncFind(id, callback) {
    //     setTimeout(() => {
    //     callback(state.posts.find((el) => el.id === id));
    //     }, 1000);
    // }  
};

  // インポート先で使用できる関数をオブジェクトとしてまとめたもの
export default {
    namespaced: true,	// 名前空間を有効にする
    state,
    getters,
};