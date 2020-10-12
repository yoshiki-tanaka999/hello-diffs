<template>
        <!-- カード① -->
            <v-card
                id="OutputCard"
                color="#2f3640"
                dark
            >
                <form>
                    <!-- 多分要らない？ -->
                    <v-card-title class="headline">
                        意見を投じる
                    </v-card-title>

                    <!--【セレクトボックス】賛成 or 反対 or その他の意見 -->
                    <select v-model="claim_flag">
                        <option disabled value="" class="select-validatot">賛否を選択してください。</option>
                        <option>賛成</option>
                        <option>反対</option>
                        <option>その他・補足</option>
                    </select>

                    <!-- 投稿される意見のテキストボックス -->
                    <textarea v-model="message" placeholder="論点に対する自分の意見を記入してください。"></textarea>

                    <v-card-actions>
                        <v-btn
                            text
                            class="claim-output-btn"
                            v-bind:disabled="isPush"
                            @click="uploadClaimOutput"
                        >
                            意見を投稿！
                        </v-btn>
                    </v-card-actions>
                </form>
            </v-card>


</template>

<script>

export default {
    props: {
        id: Number
    },
    data() {
        return {
            post: [],
            claims: [],
            claim_flag: '',
            message: '',
            // ボタンを押したかどうか
            isPush : false,
        }
    },
    methods: {
        getPost() {
            axios.get('/api/posts/' + this.id)
            .then((res) => {
                this.post = res.data;
                this.claims = this.post.claims
                console.log(this.post);  
                console.log(this.claims);  
            })
        },
        //この間に、特定のclaim_idを取得する関数が必要（get）   
        uploadClaimOutput() {
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
        }
    },
    mounted() {
        this.getPost();
    }, 
}
</script>  

<style scoped>
#OutputCard {
    width: 800px;
    margin: 20px auto 0 auto;
    /* padding: 28px; */
    border: 1px solid #ffffff;
    border-radius: 10px;
    background-color: transparent;
}

#OutputCard v-card {
    overflow: hidden;
}

.headline {
    padding-left: 50px;
    font-weight: 600;
}

#OutputCard select {
    display: block;
    width: 200px;
    height: 50px;
    margin: 10px 0 0 50px;
    color: #555;
    background-color: aliceblue;
    border: 0;
    border-radius: 5px; 
    padding: 0.5rem;      
}

#OutputCard textarea {
    display: block;
    width: 600px;
    height: 90px;
    margin: 30px 50px 0 50px;
    color: #555;
    background-color: aliceblue;
    border: 0;
    border-radius: 5px; 
    padding: 0.75rem;      
}

#OutputCard button {
    display: block;
    width: 100px;
    height: 35px;
    margin: 30px auto 20px 50px;
    color: #ffffff;
    border: 1px solid #ffffff;
    border-radius: 5px;
    box-shadow: 0;
    background-color: transparent;
    cursor: pointer;
    }

.select-validatot {
    color: #ffffff
}

.claim-output-btn {
    font-weight: 600;
}
</style>
