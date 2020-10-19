<template>
    <v-app>
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
                    <router-link :to="{ name: 'Claim', params: { id: claim.id }}">
                        <v-tab
                            v-for="(claim, index) in claims"
                            :key="index"
                            :class="current === index ? 'current' : ''" @click="tabSelect(index)"
                            >
                            <div >
                                {{ claim.issue }}
                            </div>
                        </v-tab>
                    </router-link>

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
            <!-- ClaimIssueContentComponent -->
            <router-view />
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
                axios.get('/api/claim_output')
                .then((res) => {
                    this.claim_outputs = res.data;
                    // this.claimId = this.claims[index].id
                    console.log(this.claim_outputs);  
                    // その他・補足のデータ
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
        claim_outputTestFiltered_pros(claim_output) {
            const claimOutputTestData_pros = this.result
            const result_pros = claimOutputTestData_pros.filter(claim_output => claim_output.claim_flag === "成功")
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

<style>
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
</style>