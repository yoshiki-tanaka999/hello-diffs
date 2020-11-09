<template>
        <!-- ↓↓コンポーネント化 →Discuss2に描画↓↓ -->
        <!-- 投稿のタイトル(Postデータだけで完結) -->
        <v-card 
            class="title-card pt-3 mx-auto"
            width= 90%
        >
            <!-- <router-link :to="{name: 'ClaimTab2Act2', params: { id : id}}" style="text-decoration: none; color: inherit;" exact> -->
                <v-card-title class="text-center justify-center py-6">
                    <h1 class="font-weight-bold display-5">
                        {{ post.title }}
                    </h1>
                </v-card-title>
            <!-- </router-link>  -->
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
                    // this.claims = this.post.claims
                    // this.claimId = this.claims[index].id
                    // console.log(this.post);  
                    // console.log(this.claims);
                })
            },
    },
    mounted() {
        this.getPost();
    },
}
</script>

<style scoped>
a.router-link-exact-active h1 {
  color: black;
}

</style>
