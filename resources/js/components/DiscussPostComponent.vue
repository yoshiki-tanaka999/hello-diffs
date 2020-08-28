<template>
    <v-app>        
        <v-main>
            <v-container>
                <!-- <blog-post></blog-post> -->
                
                <!-- 実際のディスカッション -->
                <div class="question_parts">
                        <v-card-title>
                            <!-- {{ posts.title }} -->
                            質問の表示
                        </v-card-title>
                        <!-- <h5 class="card-title">{{ $route.params.id }}</h5> -->

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
// Vuex
import { mapGetters, mapActions } from 'vuex'

export default {
    name:"post",
    data() {
        return {
            // $route: { params: { id: '' } } ,
            posts: {
                id: '',
                title: '',
                description: '',
            }
        }
    },
    computed: {
        getPostById() { return this.$store.getters.post },
    },
    // // 追加
    // mounted() {
    //     this.fetch();
    // },
    method: {
        // 追加
        ...mapActions('post', [ 'fetch' ]),
        
        async fetch ({ commit }) {
            await axios.get('/api/images').then(res => {
                commit('setData', res.data);
            });
        },
    }
}

</script>