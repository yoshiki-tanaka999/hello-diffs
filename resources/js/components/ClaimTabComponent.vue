<template>
    <v-app class="whole" color="basil">
        <!-- 投稿のタイトル(Postデータだけで完結) -->
        <v-card class="title-card pt-3">
            <v-card-title class="text-center justify-center py-6">
                <h1 class="font-weight-bold display-5">
                    {{ post.title }}
                </h1>
            </v-card-title>
        </v-card>

        <v-container class="text-center justify-center py-6" justify="center">
        <!-- 投稿の疑問に対する論点 -->
            <v-sheet elevation="3">
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
                            <div >
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

                <v-tabs-items v-model="tab" class="py-3">
                    <v-tab-item
                        v-for="claim in claims"
                        :key="claim.id"
                    >
                        <v-card
                            color="basil"
                            flat
                            >
                            <v-card-text>{{ claim.content }}</v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>  

            <!-- 論点に対する主張(消えている) -->
            <v-sheet elevation="3">
                <v-card>
                    <v-tabs
                    v-model="tab"
                    background-color="indigo"
                    center-active
                    show-arrows
                    color="white"
                    dark
                    class="d-none"                  
                    >
                        <v-tab
                            v-for="claim in claims"
                            :key="claim.id"
                            v-model="tab1"
                            >
                        </v-tab>
                    </v-tabs>
                </v-card>                
            </v-sheet>                

        <!-- 論点に対する主張 -->
            <v-card class="d-flex">
                <v-tabs
                v-model="tab1"
                background-color="transparent"
                color="basil"
                grow
                class="py-3"
                >
                    <v-tab
                        v-for="item in items"
                        :key="item"
                    >
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
                        {{ item }}
                    </v-tab>
                </v-tabs>
            </v-card>


            <v-tabs-items v-model="tab1">
                <!-- 【枠固定】 賛成・反対・その他タブ ⇔ 意見のカードで表示させる -->
                <v-tab-item
                    v-for="item in items"
                    :key="item"
                >
                <!-- v-ifでカードを描画。そこで、dataをinsertする -->
                    <ClaimOutputCard-component :id="id" :claimId="claimId" v-if="show"></ClaimOutputCard-component>

                </v-tab-item>
            </v-tabs-items> 
            
            <v-tabs-items v-model="tab1">
                <v-tab-item
                    v-for="claim_output in claim_outputs"
                    :key="claim_output.id"
                >
                <!-- カード①賛成用 -->
                    <div 
                        >
                        <v-card
                            color="#385F73"
                            dark
                        >
                        <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->
                        <!-- アイコンを追加 -->
                        <div>
                            <div class="postStatusList d-flex">
                                <!-- 「コメント数」 -->
                                <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                <!-- 「参加者数」 -->
                                <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                <!-- 「ブックマークされた数」 -->
                                <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                            </div>
                        </div>

                        <!-- データベースからテキストを描画 -->
                            <v-card-text>{{claim_output.content}}</v-card-text>
                        </v-card>
                    </div>
                </v-tab-item>
            </v-tabs-items> 
                <!-- カード②反対用 -->
                        
                <!-- カード②その他・補足 -->

          
        </v-container>
    </v-app>
</template>

<script>
export default {
    props: {
        id: Number,
    },
    data () {
        return {
            post: [],
            // 論点の整理関連
            default: 0,
            current: 0,
            activeTab: "",
            claimId: "",
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
            activeCard: "",
            }
    },
    methods: {
            getPost() {
                axios.get('/api/posts/' + this.id)
                .then((res) => {
                    this.post = res.data;
                    this.claims = this.post.claims
                    // this.claimId = this.claims[index].id
                    console.log(this.post);  
                    console.log(this.claims);  
                })
            },
            tabSelect(index) {
                this.current = index;
                this.claimId = this.claims[index].id
                console.log(this.current);
                // claim_idの取得完了
                console.log(this.claimId);
            },
            getClaimOutput() {
                axios.get('/api/claim_output/')
                .then((res) => {
                    this.claim_outputs = res.data;
                    // this.claimId = this.claims[index].id
                    console.log(this.claim_outputs);  
                })
            },
    },
    mounted() {
        this.getPost();
        this.getClaimOutput();
        // this.getIssue();
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
    }
}

</script>

<style>
.whole {
    width: 1100px;
    margin: 0 auto;
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
</style>