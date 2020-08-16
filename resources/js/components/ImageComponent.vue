<template>
    <v-app>
        <v-main>

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
                        <router-link :to="'/discuss/' + post.id">
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
                        



                        <v-spacer></v-spacer>

                        <v-btn
                            icon
                            @click="show = !show"
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
                </v-col>

            </v-row>
        </v-container>



        </v-main>
    </v-app>
    
</template>

<script>
// アイコン
import { mdiShare } from '@mdi/js';
import { mdiHeartPlus } from '@mdi/js';

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
            data.append("description", this.title);
 
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
                });
        },
}}
</script>
