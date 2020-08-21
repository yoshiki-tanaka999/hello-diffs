<template>
    <v-app>
        <v-main>
            <v-container>
                <!-- 論点の可視化 -->

                <!-- Post情報 -->
                <div>
                    <button type="button" class="btn btn-primary ">
                        Post_info
                    </button>
                </div>
                <!-- 論点の可視化 -->
                <div class="discuss_point_visualize">
                    <div>
                        論点の可視化を表示させたい
                    </div>
                </div>
            </v-container>
            
            <v-container v-for="post in posts" :key="post.id">
                <blog-post></blog-post>
                
                <!-- 実際のディスカッション -->
                <div class="question_parts">
                        <v-card-title>
                            {{ post.title }}
                        </v-card-title>
                        <h5 class="card-title">パンはパンでも食べられないパンはフライパンである。<br>
                        (投稿内容の反映はしていない)
                        </h5>
                </div>
                <div class="discuss_content">
                    <div class="answer">
                        <div class="pros_btn">
                            <div class="agree-text">
                                <p>賛成</p>
                            </div>
                            <div class= "open-modal"
                            onclick="document.getElementById('modal_pros').style.display = 'block';"
                            >
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" width="24" height="24"
                                    class="plus-btn"
                                >
                                <path 
                                    class="heroicon-ui" 
                                    d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"
                                />
                                </svg>
                            </div>
                        </div>
                        <div class="cons_btn">
                            <div class="agree-text">
                                <p>反対</p>
                            </div>
                            <div class= "open-modal"
                            onclick="document.getElementById('modal_cons').style.display = 'block'"
                            >
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" width="24" height="24"
                                    class="plus-btn"
                                >
                                <path 
                                    class="heroicon-ui" 
                                    d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"
                                />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="answer">
                    <div class="pros">
                        <!-- @if (count($claims_pros) > 0)
                            @foreach ($claims_pros as $claim)
                                <div class="">
                                    {{ $claim->content }}
                                </div>
                            @endforeach
                        @endif -->
                    </div>
                    <div class="cons">
                        <!-- @if (count($claims_cons) > 0)
                            @foreach ($claims_cons as $claim)
                                <div class="">
                                    {{ $claim->content }}
                                </div>
                            @endforeach
                        @endif -->
                    </div>
                </div>
            </v-container>
        </v-main>

    </v-app>
</template>

<script>
export default {
    data() {
        return {
            // テスト
            question: {
                id: $route.params.id, 
            },
            message: "",
            file: "",
            title: "",
            description: "",
            view: true,
            posts: {},
            //カードの開封 
            show: false,
        };
    },
    created: function() {
        this.getImage();
    },
    methods: {
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
        // 今日やること
        // 以下に、Postでなく、claim版のapiを作成→methodとして、定義する
        // また、
        // PostモデルとClaimモデルが、本コンポーネント内に表示されればOK
        // DiscussComponentとは別に、ClaimModalComponent.vueを作成する
        // ClaimModalComponent.vueは、モーダルでなくてもいいかも。吉島さんが作ったコンポーネントの感じで、作成してみる

}}

</script>
