<template>
    <!-- 投稿のタイトル(Postデータだけで完結) -->
    <v-card class="title-card pt-3">
        <v-card-title class="text-center justify-center py-6">
            <h1 class="font-weight-bold display-5">
                {{ post.title }}
            </h1>
        </v-card-title>
    </v-card>
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
}
</script>