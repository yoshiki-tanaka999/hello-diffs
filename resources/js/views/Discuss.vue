<template>
    <v-app class="discussBody">
        <!-- <headerindex-component id="header"></headerindex-component> -->
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component class="sidebar" v-bind:id="id"></DiscussSidebar-component>
        <!-- <DiscussChat-component v-bind:id="id"></DiscussChat-component> -->
        <!-- PostModalComponent.vue -->
        <!-- <DiscussModal-component v-bind:id="id"></DiscussModal-component> -->


<!-- ClaimComponntの中身 -->
<!-- この部分は固定 -->
        <v-main id="main">
            <v-app class="whole" color="basil">
                <DiscussPostTitle-component v-bind:id="id"></DiscussPostTitle-component>
<!-- この部分は固定 -->
<!-- ここまでは、クリア -->

        <v-container class="text-center justify-center py-6" justify="center">
        <!-- 以下、ClaimTabComponentに収納する -->
            <!-- <ClaimTab-component :id="id" :claimId="claimId"></ClaimTab-component> -->
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
                            :to="{ name: 'Claim', params: { claimId: claim.id }}"
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
        </v-container>

<!--  -->
        <router-view />

        <ClaimTabModal-component v-bind:id="id"></ClaimTabModal-component>
        <!-- v-ifでカードを描画。そこで、dataをinsertする -->
        <!-- <ClaimOutputCard-component :id="id" :claimId="claimId" v-if="show"></ClaimOutputCard-component> -->


                <!-- カード②反対用 -->
                        
                <!-- カード②その他・補足 -->


            </v-app>
            <!-- id要らないかも -->
            <!-- <ClaimTabModal-component v-bind:id="id"></ClaimTabModal-component>    -->
            <!-- <ClaimOutputTabModal-component v-bind:id="id"></ClaimOutputTabModal-component>    -->
        </v-main>
    </v-app>
</template>

<script>
export default {
    data: function(){
    return{
            id: Number(this.$route.params.id),
            tab: null,   
            default: 0,
            current: 0,  
            claims: [],       
        }
    // console.log(id);
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
        mounted() {
            this.getPost();
            this.getClaimOutput();
            // this.getIssue();
    },

}
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
</script>


<style scoped>
.discussBody{
    font-family: 'Noto Sans JP', sans-serif;
    /* background-image: url(../testPhoto/whitecray.jpeg); */
    /* background-color:dimgrey; */
    /* background-size: cover; */
    padding-top: 50px;
}
#main{
    margin-top: 10px;
    margin-top: 10px;
    /* border: 1px solid #000000; */
    resize: horizontal;
    overflow: hidden;
}
#header{
    position: fixed;
    top: 0;
}

.sidebar {
    width: 350px;
}
</style>
