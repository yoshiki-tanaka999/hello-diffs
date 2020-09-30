<template>
    <!-- 【現在使っていない】ImageComponent.vueに統合済み -->
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
    // created () {
    //     this.$http.get('http://127.0.0.1:8000/discuss/' + this.id).then(function(data){
    //         console.log(data);
    //         this.posts = data.body
    //     })
    // },
    // created () {
    //     this.dataDetail = this.$store.state.posts.find(post => post.id.toString() === this.$route.params.id.toString())
    // },
    // mountedでフィルター掛けたやつを入れる。直接、
    // mounted: {
        // title, description = getPostById(id),
        // this.posts.title = title,
        // this.posts.description = description
    // },
    computed: {
        // posts: () => post.fetch(),
        // post() { return this.$store.getters.posts },
        // ...mapGetters('post', ['posts']),
        // ...mapGetters('test', ['asyncFind']),
        
        // ParamsId() {
        //     return Number(this.$route.params.id);
        // },
        // getPostById() {
        //     return posts.find(post => post.id === this.ParamsId);
        // },
        // getPostById(){
        //     return this.$store.getters.getPostById
        // },
        // hoge() {
        //     return this.posts.filter(post => post.id(post.id === this.params.id))
        // },

        // getPostById() {
        //     // console.log($store.getters.post)
        //     return this.$store.getters.getPostById
        // },
        // title() {
        //     return this.post.title;
        // },
        // description() {
        //     return this.post.description;
        // },        
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
            this.$http
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
                    console.log(this.post);                    
                })
        }
    },
    mounted() {
        this.getPost();
    }
}
</script>
