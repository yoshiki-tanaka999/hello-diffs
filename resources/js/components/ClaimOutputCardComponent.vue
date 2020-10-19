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
                        <option
                            v-for="(option, index) in options" 
                            :key="index"  
                            class="select-validator"
                            @click="getClaimFlag(index)"
                            >
                            {{ option.text }}
                        </option>
                    </select>

                    <!-- 投稿される意見のテキストボックス -->
                    <textarea v-model="content" placeholder="論点に対する自分の意見を記入してください。"></textarea>

                    <v-card-actions>
                        <v-btn
                            text
                            class="claim-output-btn"
                            v-bind:disabled="isPush"
                            @click="uploadClaimOutput(index)"
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
        id: Number,
        claimId: Number
    },
    data() {
        return {
            post: [],
            claims: [],
            claim:[],
            claim_flag: "",
            options: [
                { text: '賛成', value: '０' },
                { text: '反対', value: '1' },
                { text: 'その他・補足', value: '2' }
            ],
            content: '',           
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
                // dataが取得できていることを確認済み
                console.log(this.id);                  
                console.log(this.post);  
                console.log(this.claims);  
            })
        },
        getClaimFlag() {
            let claim_flag = this.options[index].value;
            console.log(claim_flag);
            // let claim_flag =  Number(this.options[index].value)
            // console.log(Number(this.options[index].value));
            // console.log(claim_flag);
        },
        //この間に、特定のclaim_idを取得する関数が必要（get）   
        uploadClaimOutput(index) {
            // let claim_flag = this.options[index].value;
            let post_id = this.id;
            let claim_id = this.claimId;
            let data = new FormData();
            // postデータ(id)を取得する
            data.append("post_id", post_id);
            data.append("claim_id", claim_id);
            data.append("claim_flag", this.claim_flag);
            data.append("content", this.content);
            axios
                .post("/api/claim_output/", data)
                .then(response => {
                    // this.getImage();
                    this.message = response.data.success;
                    // this.confirmedImage = "";
                    this.claim_flag = "";
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
        // this.getPost();
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
    z-index: 20px;
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
    width: 688px;
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
    /* margin: 30px 50px 20px auto; */
    margin: 30px auto 20px 50px;
    color: #ffffff;
    border: 1px solid #ffffff;
    border-radius: 5px;
    box-shadow: 0;
    background-color: transparent;
    cursor: pointer;
    }

.select-validator {
    color: #ffffff
}

.claim-output-btn {
    font-weight: 600;
}
</style>
