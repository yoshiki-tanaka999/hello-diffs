// Act２
<template>
    <v-app class="whole">
        <div 
            class="text-center justify-center py-6 d-flex"
        >

            <v-card 
                class="d-flex"
                width= 100%
                >
                
                <div class="font-weight-black claimAddText"> 賛成 </div>

                <v-tooltip bottom>
                    <template v-slot:activator="{ on2, attrs2 }">
                        <div class= "open-modal-claim-outoput"
                            v-on:click="show = !show"
                            v-bind="attrs2"
                            v-on="on2"
                            >
                            <i class="fas fa-edit fa-2x ml-2 my-1"></i>
                        </div>
                    </template>
                    <span>新しい論点を追加する</span>
                </v-tooltip>  
            </v-card>

            <v-card 
                class="d-flex"
                width= 100%                    
            >

                <div class="font-weight-black claimAddText">反対</div>

                <v-tooltip bottom>
                    <template v-slot:activator="{ on2, attrs2 }">
                        <div class= "open-modal-claim-outoput"
                            v-on:click="show = !show"
                            v-bind="attrs2"
                            v-on="on2"
                            >
                            <i class="fas fa-edit fa-2x ml-2 my-1"></i>
                        </div>
                    </template>
                    <span>新しい論点を追加する</span>
                </v-tooltip>  

            </v-card>  
        </div>
            <!-- </div> -->


                <!-- v-ifでカードを描画。そこで、dataをinsertする -->
            <ClaimOutputCardAct2-component :id="id" v-if="show"></ClaimOutputCardAct2-component>

            <div class="d-flex justify-space-between">            
                <!-- 【枠固定】 賛成・反対・その他タブ ⇔ 意見のカードで表示させる -->


            <!-- この下が、OutputCard -->

                    <!-- カード①賛成用 -->
                    <!-- <ClaimsPros-component :id="id" :claimId="claimId"></ClaimsPros-component> -->
                <div>
                    <div 
                        v-for="(claim, index) in claimProsFiltered"
                        :key="index"
                    >
                        <template>
                            <!-- <div> -->
                                <v-card
                                    color="#1565C0"
                                    dark
                                    width="450px"
                                    height="100"
                                    max-height="200"
                                    class="mx-auto my-4"
                                    @click= "getClaimParams(index)"
                                >
                                        <!-- アイコンを追加 -->
                                        <div class="claimOutputValue">
                                            <div class="postStatusList d-flex">
                                                <!-- 「コメント数」 -->
                                                <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                                <!-- 「Like数」 -->
                                                <div>
                                                    <i class="fas fa-heart mr-2 ml-3"></i>1
                                                    <!-- <i v-if="!liked" class="fas fa-heart" @click="like(claimId)">{{ likeCount }}</i>
                                                    <i v-else class="far fa-heart" @click="unlike(claimId)">{{ likeCount }}</i> -->
                                                </div>
                                            </div>
                                        </div>   

                                    <!-- データベースからテキストを描画 -->

                                    <router-link 
                                        :to="{name: 'ClaimLayerViewAct2', params: {claimContent : claim.content, id : id, claimLevel : claim.claim_level, upperId: claim.id, claimFlag: claim.claim_flag}}" 
                                        style="text-decoration: none; color: inherit;" 
                                        exact 
                                        >
                                            <div
                                                class="font-weight-black claimText"
                                                color="white"
                                            >
                                                {{claim.content}}
                                            </div>
                                    </router-link>                             
                                </v-card>
                            <!-- </div> -->
                        </template> 
                    </div>
                </div>

                <div>
                    <div
                        v-for="(claim, index) in claimConsFiltered"
                        :key="index"
                    >
                    <!-- カード②反対用 -->
                    <!-- <div v-for=" in claim_output"> -->
                        <template>                        
                            <!-- <div v-show="currentTab === 1 ">                             -->
                                <v-card
                                    color="#C62828"
                                    dark
                                    width="450px"
                                    height="100px"
                                    max-height="200px"
                                    class="mx-auto my-4"
                                    @click= "getClaimParams(index)"
                                >
                                <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->



                                    <!-- アイコンを追加 -->
                                        <div class="claimOutputValue">
                                            <div class="postStatusList d-flex">
                                                <!-- 「コメント数」 -->
                                                <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                                <!-- 「Like数」 -->
                                                <div>
                                                    <i class="fas fa-heart mr-2 ml-3"></i>1
                                                </div>
                                            </div>
                                        </div>  

                                <router-link 
                                    :to="{name: 'ClaimLayerViewAct2', params: {claimContent : claim.content, id : id, claimLevel : claim.claim_level, upperId: claim.id, claimFlag: claim.claim_flag}}" 
                                    style="text-decoration: none; color: inherit;" 
                                    exact 
                                    >
                                    <!-- データベースからテキストを描画 -->
                                            <div
                                                class="font-weight-black claimText"
                                                color="white"
                                            >
                                                {{claim.content}}
                                            </div>
                                    </router-link>                               
                                </v-card>
                            <!-- </div> -->
                        </template> 
                    </div>
                </div>
                <!-- </div> -->
                <!-- </v-tab-item> -->

            </div>


    </v-app>
</template>

<script>
window._ = require('lodash');

export default {
    name:'ClaimTab2Act2',
    props: {
        id: Number,
        // claimId: Number,
    },
    data () {
        return {
            post: [],
            // 論点の整理関連
            default: 0,
            current: 0,
            activeTab: "",
            claimId: Number,
            claims: [],
            claim: [],
            issues:[],
            // ClaimOutputCardのv-if部分
            show: false,
            tab: null,
            tab1: null,
            // items: [
            //     '賛成', '反対', '補足・その他',
            // ],
            // text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            // どのTabが選択されているか
            // activeTab: 'tab1'
            claim_outputs: [],
            currentTab: 0,
            activeCard: "",
            result: [],
            claimContent : "",
            claimLevel: "",
            upperId: "",
            claimFlag: "",
            liked: false,
            likeCount: 0,
            }
    }, 
    created () {
        this.liked = this.defaultLiked
        this.likeCount = this.defaultCount
    },     
    methods: {
            getPost() {
                axios.get('/api/posts/' + this.id)
                .then((res) => {
                    this.post = res.data;
                    this.claims = this.post.claims

                })
            },
            tabSelect(index) {
                this.current = index;
                this.claimId = this.claims[index].id

                // claim_idの取得完了
                console.log(this.claimId);
            },


            // Outputでなく、Claimテーブルにする
            getClaim() {
                axios.get('/api/claim')
                .then((res) => {
                    this.claim = res.data;
                    console.log(this.claim);  
                    // その他・補足のデータ
                })
            },
            // getMessages() {
            //     axios
            //         .get("/api/claim")
            //         .then((response) => {
            //             this.claims = response.data;
            //             console.log(this.claims);
            //         });
            // },
            getClaimParams(index) {
                this.claimContent = this.claims[index].content;
                // あんまり良くないが、3つの値を取得する
                this.claimLevel = this.claims[index].claim_level;
                this.upperId = this.claims[index].id;
                this.claimFlag = this.claim[index].claim_flag;
            },
            // 
            like(claimId) {
                let url = `/api/posts/${postId}/like`
                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = true
                    this.likeCount = response.data.likeCount
                })
                .catch(error => {
                    alert(error)
                });
            },
            unlike(postId) {
                let url = `/api/posts/${postId}/unlike`
                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = false
                    this.likeCount = response.data.likeCount
                })
                .catch(error => {
                    alert(error)
                });
            }            
    },
    mounted() {
        this.getPost();
        this.getClaim();
        
        // Pusherからの通知待機
        Echo.channel('claim')
            .listen('ClaimCreated', (e) => {
            this.getPost(); // 全メッセージを再読込
        });
        console.log(Echo.channel('claim'));
        },    
    created() {
    // this.triggerEvent();
    },  
    computed: {
        // 賛成意見の紐付け
        getAgreeClaim() {
        return this.claim_outputs.filter(claim_output => {
                return claim_output.claim_flag === "賛成"
            })
        },
        // 反対意見の紐付け
        getDisAgreeClaim() {
        return this.claim_outputs.filter(claim_output => {
                return claim_output.claim_flag === "反対"
            })
        },
        // claimTestFiltered() {
        //     const claimOutputTestData = this.claims
        //     const result = claimOutputTestData.filter(claims => claims.post_id === this.id && claims.claim_level === 1)
        //     return result;
        //     console.log(result);
        // },   
        claimProsFiltered() {
            const claimOutputTestData = this.claims
            const result = claimOutputTestData.filter(claims => claims.post_id === this.id && claims.claim_flag === 0 && claims.claim_level === 1)
            return result;
            console.log(result);
        }, 
        claimConsFiltered() {
            const claimOutputTestData = this.claims
            const result = claimOutputTestData.filter(claims => claims.post_id === this.id && claims.claim_flag === 1 && claims.claim_level === 1)
            return result;
            console.log(result);
        },         
    },
}

</script>

<style scoped>
.whole {
    /* width: 1100px; */
    width: 90%;
    margin: 0 auto;
    background-color: transparent;
}

.title-card {
    margin-top: 30px;
}
/* Helper classes */
.basil {
    background-color: #FFFBE6 !important;
}
.basil--text {
    color: #356859 !important;
}

.open-modal-claim{
    color: white;
    position: absolute;
    right: 0;
    margin: 10px;
}
.open-modal-claim:hover{
    cursor: pointer;
    font-weight: bold;
}

.open-modal-claim-outoput{
    /* color: white; */
    position: absolute;
    right: 0;
    margin: 10px;
}
.open-modal-claim-outoput:hover{
    cursor: pointer;
    font-weight: bold;
}

.claimOutputValue {
    float: right;
    margin-right: 20px;
    padding-top: 10px;
    /* padding-bottom: 20px; */
}

.theme--light.v-tabs-items {
    background-color: transparent!important;
}

a.router-link-exact-active v-card-text {
    color: white;
}

a.router-link-exact-active i {
    color: white;
}

.claimAddText {
    color: black;
    font-size: 24px;
    padding: 12px;
    margin: 0 auto;
}

.prosBox {
    width : calc(100% / 2) ;
}

.cosnBox {
    width : calc(100% / 2) ;
}

.claimText {
    padding: 32px 12px 8px 12px;
}

</style>