<template>
<!-- index/new で表示させるコンポーネント -->
    <v-app>
        <v-main>
            <v-container>
                <postcard-component />
            </v-container>
        </v-main>

        <!-- <postcard-component /> -->
        <!-- <BTNshowmore-component /> -->

    </v-app>
    
</template>

<script>
import { mapActions } from 'vuex'

// ディスカッションページ
// import Discuss from '../views/Discuss'

export default {
    // Postのページ出し分け
    name: "post",
    created() {
        this.fetchPosts()
    },
    data() {
        return {
            message: "",
            view: true,
            title: "",
            description: "",
            file: "",            
            posts: [],
            confirmedImage: "",
            //カードの開封 
            show: false,
        };
    },
    computed: {
        post() { return this.$store.getters.posts },
    },
    created: function() {
        this.getImage();
    },
    // 追加
    mounted() {
        this.fetch();
    },
    methods: {
        // 追加
        ...mapActions('post', [
            'fetch', 
        ]),
        getImage() {
            axios
                .get("/api/images/")
                .then(response => {
                    this.posts = response.data;
                })
                .catch(err => {
                    this.message = err;
                });
        },
        fetchPosts() {
            this.$http
                .get('/api/posts')
                .then(response =>  {
                    this.posts = response.data;
                })
                .finally(function(){
                location.reload(true);
                });
        },       
    },

}
</script>
