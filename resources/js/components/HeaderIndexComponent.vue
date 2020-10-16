<template>
    <header class="header d-flex justify-content-center align-items-center">
            <div class="d-flex">
                <ul class="nav text-left p-0 m-0">
                    <!-- <li>
                        <router-link to="/index" class="nav-link border" id="siteLogo"><img src="../testPhoto/title_icon.png" alt="site logo" width="20px"></router-link>
                    </li> -->
                    <li class="nav-item">
                        <router-link to="/index/new" class="nav-link">Hello Diff.s</router-link>
                    </li>
                    <li class="nav-item">
                        <!-- <router-link to="/mypage" class="nav-link">My page</router-link> -->
                        <router-link to="/mypage" class="nav-link">マイページ</router-link>
                    </li>
                    <li class="nav-item">
                        <!-- <router-link to="/tags" class="nav-link">Tags</router-link> -->
                        <router-link to="/tags" class="nav-link">#タグ一覧</router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/login" class="nav-link">ログイン</router-link>
                    </li>
<!-- 
                    <li class="nav-link" @click="logout">ログアウト</li> -->
                </ul>
            </div>
            

            <!-- モーダルが開かない。Bootstrap の影響？。放置。 -->
            <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                    <div class= "open-modal p-2"
                        onclick="document.getElementById('modal').style.display = 'block';"
                        v-bind="attrs"
                        v-on="on"
                        >
                        <i class="fas fa-edit fa-2x ml-2"></i>
                    </div>
                </template>
                <span>新しい議題を投稿する</span>
            </v-tooltip>
    </header>
</template>

<script>
    export default {
        methods: {
            logout() {
                axios.post('/api/auth/logout').then(res => {
                    axios.defaults.headers.common['Authorization'] = '';
                    state.isLogin = false;
                    this.$router.push({path: '/index/new'});
                });
            }
        }
    }
</script>

<style scoped>
.header{
    height: 50px;
    /* width: 99vw; */
    width: 100%;
    font-family: 'Noto Sans JP', sans-serif;
    background-color: rgba(1, 1, 102, 0.863);
    font-family: 'Noto Sans JP', sans-serif;
    z-index: 100;
}
.nav-link{
    color: white;
    font-size: 1rem;
    margin: 10px;
    padding: 8px 16px;
}
.nav-link:hover{
    font-weight: bold;
}
/* #siteLogo{
    margin-right: 20px;
} */
.open-modal{
    color: white;
    position: absolute;
    right: 0;
    margin: 10px;
}
.open-modal:hover{
    cursor: pointer;
    font-weight: bold;
}
</style>