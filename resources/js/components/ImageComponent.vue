<template>
    <v-app>
        <!-- 花畑 -->
            <section class="wrapper">
                <div class="container">
                    <div class="content">
                        <h2 class="heading">Hello Diff.s</h2>
                        <div class="list">
                            <div class="list-item">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
                            <div class="list-item">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
                        </div>
                    </div>
                </div>
            </section>
        <v-main>
        <!-- ★★投稿データの表示★★ -->
            <!-- カードユニット開始 -->
            <v-container>
                <v-row >
                    <v-col 
                        cols="4" 
                        class="d-flex align-center"
                        v-for="post in posts" :key="post.id"
                    >
                        <!-- カード単体 -->
                        <v-card
                            class="mx-auto"
                            width="344"
                        >
                            <router-link 
                                :to="'/discuss/' + post.id"
                                >
                                <v-img
                                :src="`${post.img_url}`"
                                height="200px"
                                >
                                </v-img>
                            </router-link>


                            <v-card-title>
                                {{ post.title }}
                            </v-card-title>

                            <v-card-subtitle>
                            1,000 miles of wonder
                            </v-card-subtitle>

                            <v-card-actions>
                            
                            <!-- Likeボタン -->
                            <v-btn>
                                <v-icon medium>{{ svgPath_2 }}</v-icon>
                            </v-btn>

                            <!-- シェアボタン -->
                            <v-btn>                        
                                <v-icon>{{ svgPath }}</v-icon>
                            </v-btn>
                            
                            <!-- 開くボタン -->
                            <v-spacer></v-spacer>

                            <v-btn
                                icon
                                @click.stop="show = !show"
                            >
                                <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                            </v-btn>
                            </v-card-actions>

                            <v-expand-transition>
                            <div v-show="show">
                                <v-divider></v-divider>

                                <v-card-text>
                                    {{ post.description }}
                                </v-card-text>
                            </div>
                            </v-expand-transition>
                        </v-card>
                        <!-- カード単体終了 -->

                        <!-- <router-view name="Discuss"></router-view> -->
                    </v-col>

                </v-row>
            </v-container>
        <!-- ★★投稿データの表示終わり★★ -->
        </v-main>

            <!-- ★★モーダルウィンドウ★★ -->
            <v-container>
                <div id="modal">
                    <div
                        class="modal-background"
                        style="background-color:rgba(0,0,0,0.5)"
                        >
                    <!-- モーダルウィンドウの中身 -->
                        <div class="modal-content" v-on:click.stop>
                            <div class="modal-content-whole">
                                <div class="modal-content-title">
                                    <h2 class="modal-content-title-name">スレッドを作成する</h2>
                                    <span 

                                    style="font-size: 2.25rem;"
                                    onclick="document.getElementById('modal').style.display = 'none';"
                                    >×</span>
                                </div>

                                <p>チャンネルはチームがコニュニケーションを取る場所です。<br>
                                特定のトピックに基づいてチャンネルを作ると良いでしょう。(例: #マーケティング)</p>
                                <!-- <form method="post"> -->
                                    <!-- テーマタイトル -->
                                    <div class="modal-content-subheading">question</div>
                                    <div class="modal-content-margin">
                                        <input
                                            type="text"
                                            v-model="title"
                                            class="modal-content-input"
                                        />
                                    </div>
                                    <!-- テーマチャンネル(タグ) -->
                                    <!-- <div class="modal-content-subheading">tag</div>
                                    <div class="modal-content-margin">
                                        <input
                                            type="text" 
                                            name="tag"
                                            class="modal-content-input"
                                        />
                                    </div> -->
                                    <!-- テーマ概要 -->
                                    <div class="modal-content-subheading">description</div>
                                    <div class="modal-content-margin">
                                        <textarea
                                            v-model="description" 
                                            cols="20" rows="5"
                                            type="text"
                                            class="modal-content-input"
                                            ></textarea>
                                    </div>
                                    
                                    <!-- file upload -->
                                    <div class="modal-content-subheading">サムネイル画像</div>
                                    <div class="modal-content-margin">
                                        <input 
                                            type="file" 
                                            @change="confirmImage"
                                            v-if="view"
                                        />
                                    </div>

                                    <!-- バリデーション用 -->
                                    <p>{{ message }}</p>

                                    <div class="modal-form">
                                        <button
                                            class="modal-form-btn"
                                            @click="uploadImage"
                                        >問いを投げかける
                                        </button>
                                    </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </v-container>
            <!-- モーダルウィンドウ ここまで-->
    </v-app>
    
</template>

<script>
// アイコン
import { mdiShare } from '@mdi/js';
import { mdiHeartPlus } from '@mdi/js';

// ディスカッションページ
// import Discuss from '../views/Discuss'

export default {
    // Postのページ出し分け
    created() {
        this.fetchPosts()
    },
    data() {
        return {
            message: "",
            file: "",
            title: "",
            description: "",
            view: true,
            posts: {},
            confirmedImage: "",
            //カードの開封 
            show: false,
            // アイコン
            svgPath: mdiShare,
            svgPath_2: mdiHeartPlus,
        };
    },
    created: function() {
        this.getImage();
    },
    methods: {
        getImage() {
            axios
                .get("/api/images/")
                .then(response => {
                    this.posts = response.data;
                })
                .catch(err => {
                    this.message = err;
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
        // PostModalComponent.vue
        confirmImage(e) {
            this.message = "";
            this.file = e.target.files[0];
            if (!this.file.type.match("image.*")) {
                this.message = "画像ファイルを選択して下さい";
                this.confirmedImage = "";
                return;
            }
            this.createImage(this.file);
        },
        createImage(file) {
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = e => {
                this.confirmedImage = e.target.result;
            };
        },
        uploadImage() {
            let data = new FormData();
            data.append("file", this.file);
            data.append("title", this.title);
            data.append("description", this.description);
 
            axios
                .post("/api/images/", data)
                .then(response => {
                    this.getImage();
                    this.message = response.data.success;
                    this.confirmedImage = "";
                    this.title = "";
                    this.description = "";
                    this.file = "";
 
                    //ファイルを選択のクリア
                    this.view = false;
                    this.$nextTick(function() {
                        this.view = true;
                    });
                })
                .catch(err => {
                    this.message = err.response.data.errors;
                })
                .finally(function(){
                    location.reload(true);
                });
        }        
    },
    // components: {
    //     Discuss
    // }
}
</script>
