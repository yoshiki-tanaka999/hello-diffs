<template>
    <v-app class="whole" color="basil">
        <!-- 投稿のタイトル(Postデータだけで完結) -->
        <v-card 
            class="title-card pt-3 mx-auto"
            width="900"
        >
            <v-card-title class="text-center justify-center py-6">
                <h1 class="font-weight-bold display-5">
                    {{ post.title }}
                </h1>
            </v-card-title>
        </v-card>

        <v-container 
            class="text-center justify-center py-6" 
        >
        <!-- 投稿の疑問に対する論点 -->
            <v-sheet 
                elevation="3"
                width="900"
                class=" mx-auto"
            >
                <v-card  class="d-flex">
                    <!-- v-forを入れる -->
                    <v-tabs
                        v-model="tab"
                        background-color="indigo darken-4"
                        center-active
                        show-arrows
                        color="white"
                        dark
                    >
                    <!-- コンポーネント化 -->
                    <!-- 問題は、post_idごとでfor文を回す -->
                        <v-tab
                            v-for="(claim, index) in claims"
                            :key="index"
                            :class="current === index ? 'current' : ''" @click="tabSelect(index)"
                            >
                            <div 
                                class="font-weight-black"
                            >
                                {{ claim.issue }}
                            </div>

                        </v-tab>
                        <!-- <v-tab>
                            <v-icon>mdi-folder-plus</v-icon>
                        </v-tab> -->
                    </v-tabs>

                    <!-- モーダルウィンドウのボタン -->
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                            <div class= "open-modal-claim"
                                onclick="document.getElementById('modal-claim').style.display = 'block';"
                                v-bind="attrs"
                                v-on="on"
                                >
                                <i class="fas fa-edit fa-2x ml-2"></i>
                            </div>
                        </template>
                        <span>新しい論点を追加する</span>
                    </v-tooltip>                    
                </v-card>                
            </v-sheet>

                <v-tabs-items 
                    v-model="tab" 
                    class="py-3"

                >
                    <v-tab-item
                        v-for="claim in claims"
                        :key="claim.id"

                    >
                        <v-card
                            color="basil"
                            flat
                            width="800"
                            class=" mx-auto"
                            >
                            <v-card-text
                                class="font-weight-black"
                                width="900"
                            >
                                {{ claim.content }}
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>  

        <!-- 論点に対する主張 -->
            <v-card 
                class="d-flex mx-auto"
                width="900"
            >
                <v-tabs
                v-model="tab1"
                background-color="transparent"
                grow
                class="py-3"
                color="indigo darken-4"
                >
                    <v-tab href="#pros" class="font-weight-black">賛成
                        <!-- モーダルウィンドウ(claim_output) -->
                        <v-tooltip bottom>
                            <template v-slot:activator="{ on2, attrs2 }">
                                <div class= "open-modal-claim-outoput"
                                    v-on:click="show = !show"
                                    v-bind="attrs2"
                                    v-on="on2"
                                    >
                                    <i class="fas fa-edit fa-2x ml-2"></i>
                                </div>
                            </template>
                            <span>新しい論点を追加する</span>
                        </v-tooltip>  
                    </v-tab>

                    <v-tab href="#cons" class="font-weight-black">反対
                        <!-- モーダルウィンドウ(claim_output) -->
                        <v-tooltip bottom>
                            <template v-slot:activator="{ on2, attrs2 }">
                                <div class= "open-modal-claim-outoput"
                                    v-on:click="show = !show"
                                    v-bind="attrs2"
                                    v-on="on2"
                                    >
                                    <i class="fas fa-edit fa-2x ml-2"></i>
                                </div>
                            </template>
                            <span>新しい論点を追加する</span>
                        </v-tooltip>  

                    </v-tab>        
                    <v-tab href="#others" class="font-weight-black">その他・補足
                        <!-- モーダルウィンドウ(claim_output) -->
                        <v-tooltip bottom>
                            <template v-slot:activator="{ on2, attrs2 }">
                                <div class= "open-modal-claim-outoput"
                                    v-on:click="show = !show"
                                    v-bind="attrs2"
                                    v-on="on2"
                                    >
                                    <i class="fas fa-edit fa-2x ml-2"></i>
                                </div>
                            </template>
                            <span>新しい論点を追加する</span>
                        </v-tooltip>  

                    </v-tab>             
                </v-tabs>
            </v-card>

                <!-- v-ifでカードを描画。そこで、dataをinsertする -->
            <ClaimOutputCard-component :id="id" :claimId="claimId" v-if="show"></ClaimOutputCard-component>

            <v-tabs-items 
                v-model="tab1"
                v-for="(claim_output, index) in claim_outputTestFiltered"
                :key="claim_output.id"
                :class="{ active: currentTab === index }"
                @click="currentTab = index"
                
            >
                <!-- 【枠固定】 賛成・反対・その他タブ ⇔ 意見のカードで表示させる -->


            <!-- この下が、OutputCard -->
                <v-tab-item 
                    value="pros"             
                    v-if=" claim_output.claim_flag === '賛成' "
                    max-width="600"
                >
                <!-- カード①賛成用 -->
                    <template>
                        <!-- <div> -->
                            <v-card
                                color="#C62828"
                                dark
                                width="600"
                                max-height="200"
                                height="85"
                                class="mx-auto my-4"
                            >
                            <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->

                            <!-- データベースからテキストを描画 -->
                                <v-card-text
                                    class="font-weight-black"
                                    color="white"
                                >
                                    {{claim_output.content}}
                                </v-card-text>
                                <!-- <v-card-text>賛成です。</v-card-text> -->

                                <!-- アイコンを追加 -->
                                <div class="claimOutputValue">
                                    <div class="postStatusList d-flex">
                                        <!-- 「コメント数」 -->
                                        <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                        <!-- 「参加者数」 -->
                                        <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                        <!-- 「ブックマークされた数」 -->
                                        <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                                    </div>
                                </div>                                
                            </v-card>
                        <!-- </div> -->
                    </template>  
                </v-tab-item>

                <v-tab-item value="cons"
                    v-if=" claim_output.claim_flag === '反対' "
                >
                <!-- カード②反対用 -->
                <!-- <div v-for=" in claim_output"> -->
                    <template>                        
                        <!-- <div v-show="currentTab === 1 ">                             -->
                            <v-card
                                color="#1565C0"
                                dark
                                width="600"
                                max-height="200"
                                height="85"
                                class="mx-auto my-4"
                            >
                            <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->

                            <!-- データベースからテキストを描画 -->
                                <v-card-text
                                    class="font-weight-black"
                                    color="white"
                                >
                                    {{claim_output.content}}
                                </v-card-text>
                                <!-- <v-card-text>反対です。</v-card-text> -->
                                <!-- アイコンを追加 -->
                                <div class="claimOutputValue">
                                    <div class="postStatusList d-flex">
                                        <!-- 「コメント数」 -->
                                        <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                        <!-- 「参加者数」 -->
                                        <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                        <!-- 「ブックマークされた数」 -->
                                        <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                                    </div>
                                </div>                                
                            </v-card>
                        <!-- </div> -->
                    </template>  
                <!-- </div> -->
                </v-tab-item>

                <v-tab-item value="others"
                    v-if=" claim_output.claim_flag === 'その他・補足' "
                >
                <!-- カード③その他用 -->
                    <template>   
                        <!-- <div v-show="currentTab === 2"> -->
                            <v-card
                                color="#F9A825"
                                dark
                                width="600"
                                max-height="200"
                                height="85"
                                class="mx-auto my-4"
                            >
                            <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->

                            <!-- データベースからテキストを描画 -->
                                <v-card-text
                                    class="font-weight-black"
                                    color="white"                                
                                >
                                    {{claim_output.content}}
                                </v-card-text>
                                <!-- <v-card-text>その他です。</v-card-text> -->
                                <!-- アイコンを追加 -->
                                <div class="claimOutputValue">
                                    <div class="postStatusList d-flex">
                                        <!-- 「コメント数」 -->
                                        <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                        <!-- 「参加者数」 -->
                                        <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                        <!-- 「ブックマークされた数」 -->
                                        <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                                    </div>
                                </div>                                
                            </v-card>
                        <!-- </div>     -->
                    </template>  
                </v-tab-item>

            </v-tabs-items>
        </v-container>
    </v-app>
</template>

<script>
export default {
    name:'ClaimTab2',
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
            items: [
                '賛成', '反対', '補足・その他',
            ],
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            // どのTabが選択されているか
            // activeTab: 'tab1'
            claim_outputs: [],
            currentTab: 0,
            activeCard: "",
            result: [],

            }
    },  
    methods: {
            getPost() {
                axios.get('/api/posts/' + this.id)
                .then((res) => {
                    this.post = res.data;
                    this.claims = this.post.claims
                    // this.claimId = this.claims[index].id
                    // console.log(this.post);  
                    // console.log(this.claims);  
                })
            },
            tabSelect(index) {
                this.current = index;
                this.claimId = this.claims[index].id
                // this.$emit('child-event', this.claimId);
                // console.log(this.current);
                // claim_idの取得完了
                console.log(this.claimId);
            },
            getClaimOutput() {
                axios.get('/api/claim_output')
                .then((res) => {
                    this.claim_outputs = res.data;
                    // this.claimId = this.claims[index].id
                    console.log(this.claim_outputs);  
                    // その他・補足のデータ
                })
            },

            // Discuss2にclaimidを送る
            // triggerEvent() {
            //     this.$emit('child-event', this.claimId);
            // }  
    },
    mounted() {
        this.getPost();
        this.getClaimOutput();
        // this.getIssue();
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
        // その他・補足意見の紐付け
        getAnotherClaim() {
        return this.claim_outputs.filter(claim_output => {
                return claim_output.claim_flag === "その他・反対意見"
            })
        },
        // 論点と、意見の紐付け
        claim_outputFiltered() {
            const claimOutputData = this.claim_outputs
            const result = claimOutputData.filter(claim_outputs => claim_outputs.claim_id === this.claimId)
            return result;
        },
        claim_outputTestFiltered() {
            const claimOutputTestData = this.claim_outputs
            const result = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_id === this.claimId)
            return result;
            console.log(result);
        },
        // v-forの2つ目
        claim_outputTestFiltered_pros() {
            const claimOutputTestData_pros = this.claim_outputs
            const result_pros = claimOutputTestData_pros.filter(claim_outputs => {
                claim_outputs.claim_id === this.claimId &&
                claim_outputs.claim_flag === "成功" 
                })
            return result_pros;
        },
        claim_outputTestFiltered_cons(claim_output) {
            const claimOutputTestData_cons = this.result
            const result_cons = claimOutputTestData_pros.filter(claim_output => claim_output.claim_flag === "反対")
            return result_cons;
        }, 
        claim_outputTestFiltered_others(claim_output) {
            const claimOutputTestData_cons = this.result
            const result_others = claimOutputTestData_pros.filter(claim_output => claim_output.claim_flag === "その他・補足")
            return result_others;
        },                        

        },
        // watch: {
        //     currentTab: function() {
        //         if (this.currentTab === 0) {
        //             const claimOutputTestData = this.claim_outputs
        //             const result_pros = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_flag === "反対")
        //             return result_pros
        //         } else if (this.currentTab === 1) {
        //             const claimOutputTestData = this.claim_outputs
        //             const result_cons = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_flag === "反対")
        //             return result_cons                    
        //         } else {
        //             const claimOutputTestData = this.claim_outputs
        //             const result_others = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_flag === "その他・補足")
        //             return result_others    
        //         }
        //     }
            // メソッドチェーン
            // claim_outputTestFiltered()  {
            //     const claimOutputTestData = this.claim_outputs
            //     if(this.currentTab === 0) {
            //         // claim_flagが”賛成”のとき
            //         const result_pros = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_id === this.claimId)
            //                                             .filter(claim_outputs => claim_outputs.claim_flag === "反対")
            //         console.log(result_pros);
            //         return result_pros
            //     } else if (this.currentTab === 1) {
            //         // claim_flagが”反対”のとき
            //         const result_cons = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_id === this.claimId)
            //                                             .filter(claim_outputs => claim_outputs.claim_flag === "反対")
            //         console.log(result_cons);
            //         return result_cons
            //     } else if (this.currentTab === 2) {
            //         // claim_flagが”その他・補足”のとき
            //         const result_others = claimOutputTestData.filter(claim_outputs => claim_outputs.claim_id === this.claimId)
            //                                             .filter(claim_outputs => claim_outputs.claim_flag === "その他・補足")
            //         console.log(result_cons);
            //         return result_others
            //     } else {
            //         console.log("データを取得できませんでした");
            //     }
            // }
    }

</script>

<style scoped>
.whole {
    width: 1100px;
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
}

.theme--light.v-tabs-items {
    background-color: transparent!important;
}
</style>