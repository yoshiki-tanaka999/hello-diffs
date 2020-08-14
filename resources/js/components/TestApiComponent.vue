<template>
    <div>
        <!-- 新規追加フォーム -->
        <div>
            <p>タイトル：<input type="text" v-model="title" /></p>
            <p>説明：<input type="text" v-model="description" /></p>
            <p>画像URL：<input type="text" v-model="img_url" /></p>
            <button @click="addPost">追加</button>
        </div>

        <!-- post一覧 -->
        <div>
            <ul>
                <li v-for="post in posts" :key="post.id">
                    {{ post.id }}/{{ post.title }}/{{ post.description }}/{{ post.img_url }}
                    <button
                        :disabled="isPush"
                        @click="displayUpdate(post.id, post.title, post.description, post.img_url)"
                    >
                        編集
                    </button>
                    <button :disabled="isPush" @click="deletePost(post.id)">
                        削除
                    </button>
                </li>
            </ul>
        </div>
 
        <!-- 編集フォーム -->
        <div v-if="updateForm">
            <p>idが{{ updateId }}の編集フォーム</p>
            <p>タイトル：<input type="text" v-model="updateTitle" /></p>
            <p>説明：<input type="text" v-model="updateDescription" /></p>
            <p>画像URL：<input type="text" v-model="img_url" /></p>
            <button @click="updatePost(updateId, updateTitle, updateDescription)">
                編集する
            </button>
            <button @click="updateCancel">キャンセル</button>
        </div>
 
        <!-- エラーメッセージ -->
        <p v-if="message">{{ message }}</p>
    </div>
</template>
 
<script>
export default {
    data() {
        return {
            message: "",
            isPush: false,
            updateForm: false,
            posts: {},
            title: "",
            description: "",
            img_url: "",
            updateId: "",
            updateTitle: "",
            updateDescription: ""
        };
    },
    created: function() {
        this.getPost();
    },
    methods: {
        getPost() {
            axios
                .get("/api/tests/")
                .then(response => {
                    this.posts = response.data;
                })
                .catch(err => {
                    this.message = err;
                });
        },
        addPost() {
            axios
                .post("/api/tests/", {
                    title: this.title,
                    description: this.description
                })
                .then(response => {
                    this.getPost();
                    this.title = "";
                    this.description = "";
                    this.img_url = "",
                    this.message = "";
                })
                .catch(err => {
                    this.message = err;
                });
        },
        displayUpdate(id, title, description) {
            this.isPush = true;
            this.updateForm = true;
            this.message = "";
            this.updateId = id;
            this.updateTitle = title;
            this.updateDescription = description;
        },
        updateCancel() {
            this.isPush = false;
            this.updateForm = false;
            this.message = "";
        },
        updatePost(updateId, updateTitle, updateDescription) {
            axios
                .put("/api/tests/" + updateId, {
                    title: this.updateTitle,
                    description: this.updateDescription
                })
                .then(response => {
                    this.getPost();
                    this.isPush = false;
                    this.updateForm = false;
                    this.message = "";
                })
                .catch(err => {
                    this.message = err;
                });
        },
        deletePost(id) {
            axios
                .delete("/api/tests/" + id)
                .then(response => {
                    this.getPost();
                    this.message = "";
                })
                .catch(err => {
                    this.message = err;
                });
        }
    }
};
</script>