<template>
    <v-app color="basil">
        <!-- 投稿のタイトル(Postデータだけで完結) -->
        <v-card class="pt-3">
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
                            :key="claim.id"
                            v-bind:claimId="claim.id"
                            @click="setActiveTab(claim[index].id)"
                            >
                            <div >
                                {{ claim.issue }}
                            </div>

                        </v-tab>
                        <!-- <v-tab>
                            <v-icon>mdi-folder-plus</v-icon>
                        </v-tab> -->
                    </v-tabs>

                    <!-- モーダルウィンドウ -->
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
                        <!-- <v-tab v-model="tab1">主張①</v-tab>
                        <v-tab v-model="tab1">主張②</v-tab>
                        <v-tab v-model="tab1">主張③</v-tab>
                        <v-tab v-model="tab1">←これは隠したほうが良さげ</v-tab> -->
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
                <v-tab-item
                    v-for="item in items"
                    :key="item"
                >
                <!-- v-ifでカードを描画。そこで、dataをinsertする -->
                    <ClaimOutputCard-component :id="id" :claimId="claimId" v-if="show"></ClaimOutputCard-component>  
                    
                    <!-- 主張カード -->
                    <v-row dense>
                        <!-- カード① -->
                        <v-col cols="12">
                            <v-card
                                color="#385F73"
                                dark
                            >
                                <v-card-title class="headline">
                                Unlimited music now
                                </v-card-title>

                                <v-card-subtitle>Listen to your favorite artists and albums whenever and wherever, online and offline.</v-card-subtitle>

                                <v-card-actions>
                                    <v-btn text>
                                        Listen Now
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-col>       

                        <!-- カード② -->
                        <v-col cols="12">
                            <v-card
                                color="#385F73"
                                dark
                            >
                                <v-card-title class="headline">
                                Unlimited music now
                                </v-card-title>

                                <v-card-subtitle>Listen to your favorite artists and albums whenever and wherever, online and offline.</v-card-subtitle>

                                <v-card-actions>
                                    <v-btn text>
                                        Listen Now
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-col>  
                    </v-row>                            
                </v-tab-item>
            </v-tabs-items>            
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
            activeTab: "",
            claimId: "",
            claims: [],
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
            // これ使わないかも
            getClaim(index) {
                let claimId =  Number(this.post.claims[index].id)
                console.log(Number(this.post.claims[index].id));
                console.log(claimId);
            },
            setActiveTab(selectedId) {
                this.claimId = selectedTabName;
            },
            openModal: function(e) {
                document.getElementById('modal-claim-output').style.display = 'block';
            }
            // getClaim() {
            //     axios.get('/api/claim/')
            //     .then((res) => {
            //         this.claims = res.data;
            //         // console.log(this.claims);  
            //     })
            // }, 
            // getIssue() {
            //     return this.claims.filter(claim => {
            //         console.log(this.claim);
            //         console.log(this.claim.post.id);
            //         console.log(this.post.id);                    
            //         if ( claim.post_id === this.post.id) {
            //             return this.issues = this.claim;
            //             console.log(this.issues);
            //         }
            //     })
            // }  
    },
    mounted() {
        this.getPost();
        // this.getClaim(index);
        // this.getIssue();
    }
    // computed() {

    // }    
}
</script>

<style>
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