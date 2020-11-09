// Act２
<template>
    <v-app class="whole" color="basil">
        <div 
            class="text-center justify-center py-6 d-flex"
        >

        <!-- <router-view :id="id" /> -->
                <!-- 論点に対する主張 -->
            <!-- <v-card 
                class="d-flex mx-auto"
                width= 90%
            >
                <v-tabs
                v-model="tab1"
                background-color="transparent"
                grow
                class="py-3"
                color="black"
                >
                    <v-tab href="#pros" class="font-weight-black" >賛成

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
            </v-card> -->

            <!-- <div 
                class="d-flex mx-auto"
                width= 80%
                background-color="transparent"
                grow
                style="white-space: normal;"
            > -->

                    <v-card 
                        class="d-flex"
                        width= 100%
                        >
                        
                        <v-card-text class="font-weight-black">賛成</v-card-text>

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
                    </v-card>

                    <v-card 
                        class="d-flex"
                        width= 100%                    
                    >

                        <v-card-text class="font-weight-black">反対</v-card-text>

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

                    </v-card>  
        </div>
            <!-- </div> -->


                <!-- v-ifでカードを描画。そこで、dataをinsertする -->
            <ClaimOutputCardAct2-component :id="id" v-if="show"></ClaimOutputCardAct2-component>

            <!-- <v-tabs-items 
                v-model="tab1"
                v-for="(claim, index) in claimTestFiltered"
                :key="claim.id"
                :class="{ active: currentTab === index }"
                @click="currentTab = index"
            > -->
            <div 
                v-for="(claim, index) in claimTestFiltered"
                :key="index"
            >            
                <!-- 【枠固定】 賛成・反対・その他タブ ⇔ 意見のカードで表示させる -->


            <!-- この下が、OutputCard -->
                <!-- <v-tab-item 
                    value="pros"             
                    v-if=" claim.claim_flag === 0"
                    max-width="600"
                > -->
                <!-- カード①賛成用 -->
                <!-- <ClaimsPros-component :id="id" :claimId="claimId"></ClaimsPros-component> -->
                <template v-if=" claim.claim_flag === 0">
                    <!-- <div> -->
                        <v-card
                            color="#1565C0"
                            dark
                            width="600"
                            max-height="200"
                            height="85"
                            class="mx-auto my-4"
                            @click= "getClaimParams(index)"
                        >
                            <router-link 
                                :to="{name: 'ClaimLayerViewAct2', params: {claimContent : claim.content, id : id, claimLevel : claim.claim_level, upperId: claim.id}}" 
                                style="text-decoration: none; color: inherit;" 
                                exact 
                                @click="sendParent">
                            <!-- データベースからテキストを描画 -->
                                <v-card-text
                                    class="font-weight-black"
                                    color="white"
                                >
                                    {{claim.content}}
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
                            </router-link>                             
                        </v-card>
                    <!-- </div> -->
                </template> 

<!-- 
                </v-tab-item> -->

                <!-- <v-tab-item value="cons"
                    v-if=" claim.claim_flag === 1"
                > -->
                <!-- <ClaimsCons-component :id="id"></ClaimsCons-component> -->
                <!-- カード②反対用 -->
                <!-- <div v-for=" in claim_output"> -->
                    <template v-if=" claim.claim_flag === 1">                        
                        <!-- <div v-show="currentTab === 1 ">                             -->
                            <v-card
                                color="#C62828"
                                dark
                                width="600"
                                max-height="200"
                                height="85"
                                class="mx-auto my-4"
                                @click= "getClaimParams(index)"
                            >
                            <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->

                            <router-link 
                                :to="{name: 'ClaimLayerViewAct2', params: {claimContent : claim.content, id : id, claimLevel : claim.claim_level, upperId: claim.id}}" 
                                style="text-decoration: none; color: inherit;" 
                                exact 
                                @click="sendParent">
                                <!-- データベースからテキストを描画 -->
                                    <v-card-text
                                        class="font-weight-black"
                                        color="white"
                                    >
                                        {{claim.content}}
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
                                </router-link>                               
                            </v-card>
                        <!-- </div> -->
                    </template>  
                <!-- </div> -->
                <!-- </v-tab-item> -->

            </div>


    </v-app>
</template>

<script>
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
            upperId: ""
            }
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
            getClaimParams(index) {
                this.claimContent = this.claims[index].content;
                // あんまり良くないが、3つの値を取得する
                this.claimLevel = this.claims[index].claim_level;
                this.upperId = this.claims[index].id;
            },
            sendParent(){
                this.$emit('catchParent', this.claimContent, this.claimLevel, this.upperId);              
        }
    },
    mounted() {
        this.getPost();
        this.getClaim();
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
        claimTestFiltered() {
            const claimOutputTestData = this.claims
            const result = claimOutputTestData.filter(claims => claims.post_id === this.id && claims.claim_level === 1)
            return result;
            console.log(result);
        },   
        // claimContent() {
        //     console.log(this.claim.content);
        //     return this.claim.content;
        // },
        // claimLevel() {
        //     console.log(this.$route.params.claim.claim_level);
        //     return this.$route.params.claim.claim_level;            
        // }              
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

/* .v-tab-model {
    align-items: center;
    display: flex;
    flex: 0 1 auto;
    font-size: .875rem;
    font-weight: 500;
    justify-content: center;
    letter-spacing: .0892857143em;
    line-height: normal;
    min-width: 90px;
    max-width: 360px;
    outline: none;
    padding: 0 16px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    transition: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
} */
</style>