<template>
    <v-container>
        <!-- <blog-post></blog-post> -->
        
        <!-- 実際のディスカッション -->
        <v-card class="question_parts">
            <div class="card_icon">
                <div class="value_line_outer">
                    <i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i>
                    <i class="fas fa-heart value_love"></i>
                    <i class="far fa-thumbs-up value_like"></i>
                </div>
                <div><i class="fas fa-bars card_menu"></i></div>
            </div>

            <v-card-title class="card_title">
                {{ post.title }}
                <!-- 質問の表示 -->
                <!-- {{ ParamsId }} -->
            </v-card-title>
                
        </v-card>

        <div class="discuss_content">
            <div class="answer">
                <v-card>
                    <div class="pros_btn">
                        <div class="agree-text_pros"><p>賛成</p></div>
                        <div class= "open-modal"
                        onclick="document.getElementById('modal_pros').style.display = 'block';"
                        >
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" width="24" height="24"
                                class="plus-btn"
                            >
                            <path 
                                class="heroicon-ui" 
                                d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"
                            />
                            </svg>                        
                        </div>
                    </div>
                    <v-card class="claim_card">
                        <div class="card_icon">
                            <div class="value_line_outer">
                                <i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i>
                                <i class="fas fa-heart value_love"></i>
                                <i class="far fa-thumbs-up value_like"></i>
                            </div>
                            <div><i class="fas fa-bars card_menu"></i></div>
                        </div>
                        <p>ここに意見が投稿される</p>
                    </v-card>
                    <v-card class="claim_card">
                        <div class="card_icon">
                            <div class="value_line_outer">
                                <i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i>
                                <i class="fas fa-heart value_love"></i>
                                <i class="far fa-thumbs-up value_like"></i>
                            </div>
                            <div><i class="fas fa-bars card_menu"></i></div>
                        </div>
                        <p><i class="fas fa-grip-lines value_line"></i>は論点に対する影響度を表す。</p>
                    </v-card>
                </v-card>

                <v-card>
                    <div class="cons_btn">
                        <div class="agree-text_cons">
                            <p>反対</p>
                        </div>
                        <div class= "open-modal"
                        onclick="document.getElementById('modal_cons').style.display = 'block'"
                        >
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" width="24" height="24"
                                class="plus-btn"
                            >
                            <path 
                                class="heroicon-ui" 
                                d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"
                            />
                            </svg>
                        </div>
                    </div>
                    <v-card class="claim_card">
                        <div class="card_icon">
                            <div class="value_line_outer">
                                <i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i>
                                <i class="fas fa-heart value_love"></i>
                                <i class="far fa-thumbs-up value_like"></i>
                            </div>
                            <div><i class="fas fa-bars card_menu"></i></div>
                        </div>
                        <p>意見と上記のチャートは１対１で対応する</p>
                    </v-card>
                    <v-card class="claim_card">
                        <div class="card_icon">
                            <div class="value_line_outer">
                                <i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i><i class="fas fa-grip-lines value_line"></i>
                                <i class="fas fa-heart value_love"></i>
                                <i class="far fa-thumbs-up value_like"></i>
                            </div>
                            <div><i class="fas fa-bars card_menu"></i></div>
                        </div>
                        <p><i class="fas fa-heart value_love"></i>は意見を受け入れたサイン</p>
                    </v-card>                    
                </v-card>
            </div>
        </div>


        <div class="answer">
            <div class="pros">
                <!-- @if (count($claims_pros) > 0)
                    @foreach ($claims_pros as $claim)
                        <div class="">
                            {{ $claim->content }}
                        </div>
                    @endforeach
                @endif -->
            </div>
            <div class="cons">
                <!-- @if (count($claims_cons) > 0)
                    @foreach ($claims_cons as $claim)
                        <div class="">
                            {{ $claim->content }}
                        </div>
                    @endforeach
                @endif -->
            </div>
        </div>
    </v-container>
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

<style scoped>
.question_parts {
    width: 800px;
    background-color: rgba(129, 129, 199, 0.863);
}

.pros_btn {
    margin-top: 5px;
}
.cons_btn {
    margin-top: 5px;
}

.claim_card {
    max-height: 80px;
    margin: 5px;
}
.card_title {
    color: white;
}

.card_icon {
    display:flex;
    justify-content: space-between;
    padding-top: 5px;
}

.value_line_outer {
    padding-left: 10px;
    padding-bottom: 5px;
}

.value_line {
    padding-right: 1px;
}
.value_love {
    padding-left: 5px;
}
.value_like {
        padding-left: 5px;
}
.card_menu {
    /* padding-top: 5px; */
    padding-right: 10px;    
}


</style>