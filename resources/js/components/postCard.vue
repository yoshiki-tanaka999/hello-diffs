<template>
        <v-row>
            <v-col
                cols="4" 
                class="d-flex align-center"
                v-for="post in posts" :key="post.id"
            >
            <!-- <v-col
                cols="4" 
                class="d-flex align-center"
                v-for="{ id, title, img_url } in posts" :key="id"
            > -->
                <v-card
                    class="postcard mx-auto"
                    width="350"
                    max-width="400"
                >
                
                <!-- ディスカッションページへの遷移 -->
                    <!-- <router-link :to="{ name: 'Discuss2' , params: { id: Number(post.id) }}"> -->
                    <router-link v-bind:to="`/discuss/${post.id}`">
                    <!-- Not found -->
                    <!-- <router-link :to="`/discuss/${ post.id }`"
                    > -->
                        <!-- 「画像」 -->
                        <!-- <v-img
                            class="white--text align-end"
                            height="200px"
                            :src="`${post.img_url}`"
                        > -->
                        <v-img
                            class="post_card_img white--text align-end"
                            height="200px"
                        >
                        <!-- 「議題」 -->
                        <v-card-title class="v-card-title">{{ post.title }}</v-card-title>
                        <!-- <v-card-title class="v-card-title">{{ post.img_url }}</v-card-title> -->
                        <!-- <v-card-title class="v-card-title">人間がポジティブな気分になるのは朝か？夕方か？</v-card-title> -->
                        </v-img>
                    </router-link>


                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <!-- 「ブックマークボタン」 -->
                    <v-card-actions class="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- bookmarkにしていない -->
                        <!-- <i class="btnUnBookmark far fa-heart fa-2x mb-5" id=""></i> -->
                        <!-- bookmarkにしている -->
                        <i class="btnBookmarked fas fa-heart fa-2x mb-5" id=""></i>
                    </v-btn>
                    </v-card-actions>

    
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
                    </v-card-text>             
                </v-card>
            </v-col>
        </v-row>

</template>


<script>

import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'

export default {
    // Postのページ出し分け
    name: "post",
    created() {
        this.fetchPosts()
    },
    data() {
        return {
            paramsId:"",
            message: "",
            view: true,
            title: "",
            description: "",
            file: "",            
            posts: [],
            confirmedImage: "",
            //カードの開封 
            show: false,
            // アイコン
            id: Number(this.$route.params.id),
        };
    },
    // computed: {
    //     posts: () => post.fetch(),
    //     post() { return this.$store.getters.posts },
    //     ...mapGetters(['posts'])
    // },
    created: function() {
        this.getImage();
    },
    // 追加
    mounted() {
        this.fetch();
    },
    methods: {
        // 追加
        ...mapActions('post', [
            'fetch', 
        ]),
        getImage() {
            axios
                .get("/api/images")
                .then(response => {
                    this.posts = response.data;
                })
                .catch(err => {
                    this.message = err;
                });
                console.log(this.posts);
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
        // getId() {
        //     const id = this.post.id;
        //     console.log(id);
        // }       
    },
    // computed: {
    //     getId: function () {
    //         const id = this.post.id;
    //     }
    // }
}

</script>



<style scoped>
.postcard{
    /* box-shadow: 3px 3px 3px rgb(0, 0, 0, 0.4); */
}

.postcard:hover{
    cursor: pointer;
    box-shadow: 10px 10px 10px rgb(0, 0, 0, 0.4);
}
.v-card-title{
    color: white;
    background-color: rgb(0,0,0,0.5);
    font-size: 1rem;
    position: absolute;
    bottom: 0;
    padding: 5px;
    margin-right: 10px;
    margin-left: 10px;
}
.v-card-actions{
    float: right;
    align-items: center;
}
.btnUnBookmark{
    text-shadow: 1px 1px 1px gray;
}
.btnBookmarked{
    text-shadow: 1px 1px 1px gray;
    color:orangered;
}
.postStatus{
}
.postStatusList{
    color: grey;
    list-style: none;
    margin: auto auto 0;
}

.post_card_img {
    background-image: url(../testPhoto/geometric02.jpg);
    background-size: cover;
}
</style>

