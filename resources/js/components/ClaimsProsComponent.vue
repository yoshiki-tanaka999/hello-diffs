// Propの受け渡しが面倒なので、一旦使わない
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
        </v-card>
    <!-- </div> -->
</template> 

<script>
export default {
    props: {
        id: Number,
        claimId: Number,
    },
    data () {
        return {
            claimId: Number,
            claims: [],
            claim: [],
        }
    },
    methods: {
        getClaim() {
            axios.get('/api/claim')
            .then((res) => {
                this.claim = res.data;
                // this.claimId = this.claims[index].id
                console.log(this.claim);  
                // その他・補足のデータ
            })
        },
    },
    mounted() {
        // this.getPost();
        this.getClaim();
    },
}

</script>  