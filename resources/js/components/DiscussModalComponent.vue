// 使っていない
<template>
    <!-- モーダルウィンドウ -->
    <div id="modal-discuss">
        <div
            class="modal-background-discuss"
            style="background-color:rgba(0,0,0,0.5)"
            >
        <!-- モーダルウィンドウの中身 -->
            <div class="modal-content-discuss" v-on:click.stop>
                <div class="modal-content-whole-discuss">
                    <!-- アイキャッチ -->
                    <div  class="modal-discuss-img-content">
                        <v-img
                            class="white--text align-end"
                            height="300px" width="700px"
                            :src="`${post.img_url}`"
                        >
                            <div class="modal-discuss-header">
                                <span 
                                    style="font-size: 2.25rem;"
                                    onclick="document.getElementById('modal-discuss').style.display = 'none';"
                                    class="discuss-button-close"
                                >×</span>
                                <h1 class="modal-content-discuss-title">
                                    <div class="modal-content-discuss-title-name">{{ post.title }}</div>
                                </h1>
                            </div>
                        </v-img>
                    </div>


                    <div class="modal-discuss-content">
                    <!-- ポスト情報のアイコン -->                        
                        <div>
                            <ul class="postStatusList d-flex">
                                <!-- 「コメント数」 -->
                                <li><i class="far fa-comments mr-2 ml-3"></i>3</li>
                                <!-- 「参加者数」 -->
                                <li><i class="fas fa-users mr-2 ml-3"></i>2</li>
                                <!-- 「ブックマークされた数」 -->
                                <li><i class="fas fa-heart mr-2 ml-3"></i>1</li>
                            </ul>
                        </div>
                        <!-- テーマ概要 -->
                        <div class="modal-content-subheading">議題の背景・説明</div>
                        <div class="modal-content-margin">{{ post.description }}</div>
                    </div>


                    <button class="modal-discuss-button">議論に参加する</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- モーダルウィンドウ ここまで-->

</template>

<script>
/* eslint-disable no-console */

// Vuex
import { mapGetters, mapActions } from 'vuex'

import { mdiRectangle } from '@mdi/js';
import { mdiRectangleOutline } from '@mdi/js';

export default {
    // created() {
    //     this.fetchPosts()
    // },
    props: {
        id: Number
    },
    data() {
        return {
            post: [],
            dataDetail: [],
            mdiRectangle,
            mdiRectangleOutline
        }
    },
    computed: {
        
    },
    methods: {
        // 追加
        ...mapActions('post', [ 'fetch' ]),      
        async fetch ({ commit }) {
            await axios.get('/api/images').then(res => {
                commit('setData', res.data);
            });
        },
        fetchPosts() {
            this.$https
                .get('/api/posts')
                .then(response =>  {
                    this.posts = response.data;
                })
                .finally(function(){
                location.reload(true);
                });
        },
        getPost() {
            axios.get('/api/posts/' + this.id)
                .then((res) => {
                    this.post = res.data;
                    // console.log(this.post);                    
                })
        }
    },
    mounted() {
        this.getPost();
    }
}
</script>

<style scoped>
#modal-discuss {
    display: none;
}

.modal-background-discuss {
    z-index: 10;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25rem;
    /* padding-left:  20rem; */
}

.modal-content-discuss {
    z-index: 20;
    background-color: white;
    color: #1a202c;
    /* width: 40%; */
    border-radius: 0.375rem;
}

.modal-content-whole-discuss {
    display: flex;
    flex-direction: column;
}

/* .modal-discuss-img-content {
    flex: 1 1 auto;
    position: relative;
    min-height: 240px;
    width: 100%;
    box-sizing: border-box;
    background-color: rgba(28,34,41,.15);
    padding: 46px 32px;
    z-index: 1;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
} */

.modal-discuss-header {
    flex: 1 1 auto;
    position: relative;
    min-height: 300px;
    width: 100%;
    box-sizing: border-box;
    background-color: rgba(28,34,41,.15);
    padding: 46px 32px;
    z-index: 1;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
}

.discuss-button-close {
    position: absolute!important;
    top: 32px;
    right: 32px;
    cursor: pointer;
    margin: -8px;
    padding: 8px;
}

.modal-discuss-header-content {
    flex: 1 1 auto;
    position: relative;
    min-height: 240px;
    width: 100%;
    box-sizing: border-box;
    background-color: rgba(28,34,41,.15);
    padding: 46px 32px;
    z-index: 1;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
}

.modal-content-discuss-title {
    font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
    font-weight: 700;
    font-size: 33px;
    line-height: 1.2;
    flex: 1 1 auto;
    color: #fff;
    text-shadow: 0 0 4px rgba(0,0,0,.16);
    margin: auto;
    overflow: hidden;
    text-overflow: ellipsis;
}

.modal-content-discuss-title-name h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}

.modal-discuss-content {
    padding: 32px;
}

.modal-discuss-button {
    font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
    font-weight: 700;
    font-size: 14px;
    line-height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;

    width: 210px;
    height: 48px;
    position: fixed!important;
    left: calc(50% - 105px);
    bottom: 32px;
    z-index: 2;

    /* ボタンのスタイル */
    color: #fff;
    background: #52a3ff;
    border-color: #52a3ff;
}

</style>
