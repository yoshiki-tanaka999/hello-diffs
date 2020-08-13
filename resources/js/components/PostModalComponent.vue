<template>
    <!-- モーダルウィンドウ -->
    <div id="modal">
        <div
            class="modal-background"
            style="background-color:rgba(0,0,0,0.5)"
            @click="closeThemeModal">
        <!-- モーダルウィンドウの中身 -->
            <div class="modal-content" v-on:click.stop>
                <div class="modal-content-whole">
                    <div class="modal-content-title">
                        <h2 class="modal-content-title-name">スレッドを作成する</h2>
                        <span 
                        @click="closeThemeModal" 
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
    <!-- モーダルウィンドウ ここまで-->

</template>

<script>
export default {
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
                });
        }
    }
};
</script>