<template>
    <!-- モーダルウィンドウ -->
    <div id="modal-claim">
        <div
            class="modal-background-claim"
            style="background-color:rgba(0,0,0,0.5)"
            >
        <!-- モーダルウィンドウの中身 -->
            <div class="modal-content-claim" v-on:click.stop>
                <div class="modal-content-whole-claim">
                    <!-- アイキャッチ -->
                    <div  class="modal-claim-img-content">
                        <v-img
                            class="img-background white--text align-end"
                            height="300px" width="700px"
                            :src="`${post.img_url}`"
                            dark
                        >
                            <div class="modal-claim-header">
                                <p>Question.</p>
                                <span 
                                    style="font-size: 2.25rem;"
                                    onclick="document.getElementById('modal-claim').style.display = 'none';"
                                    class="claim-button-close"
                                >×</span>
                                <h1 class="modal-content-claim-title">
                                    <div class="modal-content-claim-title-name">{{ post.title }}</div>
                                </h1>
                            </div>
                        </v-img>
                    </div>


                    <div class="modal-claim-content">
                        <!-- 論点の可視化 -->
                        <div class="modal-content-subheading">論点(6文字以内)</div>
                        <div class="modal-content-margin">
                            <input
                                type="text"
                                v-model="issue"
                                class="modal-content-input"
                            />
                        </div>

                        <div class="modal-content-subheading">論点の説明</div>
                        <div class="modal-content-margin">
                            <textarea
                                v-model="content" 
                                cols="20" rows="5"
                                type="text"
                                class="modal-content-input"
                                ></textarea>
                        </div>
                    </div>


                    <button 
                        class="modal-claim-button"
                        @click="uploadClaim"
                    >
                    論点を追加する</button>
                    
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
            claim: [],
            title:"",
            post_id: "",
            issue: "",
            content: "",
            mdiRectangle,
            mdiRectangleOutline
        }
    },
    methods: {
        // 追加
        // ...mapActions('post', [ 'fetch' ]),      
        // async fetch ({ commit }) {
        //     await axios.get('/api/images').then(res => {
        //         commit('setData', res.data);
        //     });
        // },
        // fetchPosts() {
        //     this.$http
        //         .get('/api/posts')
        //         .then(response =>  {
        //             this.posts = response.data;
        //         })
        //         .finally(function(){
        //         location.reload(true);
        //         });
        // },        
        getPost() {
            axios.get('/api/posts/' + this.id)
            .then((res) => {
                this.post = res.data;
                this.claims = this.post.claims
                console.log(this.post);  
                console.log(this.claims);  
            })
        },        
        uploadClaim() {
            let post_id = this.id;
            let data = new FormData();
            // postデータ(id)を取得する
            data.append("post_id", Number(post_id));
            data.append("issue", this.issue);
            data.append("content", this.content);
            axios
                .post("/api/claim/", data)
                .then(response => {
                    // this.getImage();
                    this.message = response.data.success;
                    // this.confirmedImage = "";
                    this.issue = "";
                    this.content = "";
                })
                .catch(err => {
                    this.message = err.response.data.errors;
                })
                .finally(function(){
                    location.reload(true);
                });
        },           
    },
    mounted() {
        this.getPost();
        // this.getClaim();
        // this.getIssue();
    },   
}
</script>

<style scoped>
#modal-claim {
    display: none;
}

.modal-background-claim {
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

.modal-content-claim {
    z-index: 20;
    background-color: white;
    color: #1a202c;
    /* width: 40%; */
    border-radius: 0.375rem;
}

.modal-content-whole-claim {
    display: flex;
    flex-direction: column;
}

.img-background {
    /* background-image: url(../testPhoto/whitecray.jpeg); */
}

/* .modal-claim-img-content {
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

.modal-claim-header {
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
.modal-claim-header p {
    font-size: 1.4rem;
    font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
}


.claim-button-close {
    position: absolute!important;
    top: 32px;
    right: 32px;
    cursor: pointer;
    margin: -8px;
    padding: 8px;
}

.modal-claim-header-content {
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



.modal-content-claim-title {
    font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
    font-weight: 700;
    font-size: 28px;
    line-height: 1.2;
    flex: 1 1 auto;
    color: #fff;
    text-shadow: 0 0 4px rgba(0,0,0,.16);
    margin: auto;
    overflow: hidden;
    text-overflow: ellipsis;
}

.modal-content-claim-title-name {
    display: block;
    /* font-size: 2em; */
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}

.modal-claim-content {
    padding: 32px;
}

.modal-claim-button {
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