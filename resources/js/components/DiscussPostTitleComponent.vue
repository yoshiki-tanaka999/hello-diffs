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
    data: function(){
    return{
            id: Number(this.$route.params.id),
        }
    // console.log(id);
},
}
</script>