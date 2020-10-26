<template>
        <!-- ↓↓コンポーネント化 →Discuss2に描画↓↓ -->
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
        <!-- ↑↑までをコンポーネント化 →Discuss2に描画↑↑ -->
</template>

<script>
export default {
    props: {
        id: Number,
        // claimId: Number,
    },
    data () {
        return {
            post: [],
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
    }
}
</script>

<style>

</style>
