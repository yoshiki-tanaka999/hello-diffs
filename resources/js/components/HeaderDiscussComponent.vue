<template>
    <header class="header d-flex justify-space-between">
    <!-- <header class="header d-flex justify-content-center align-items-center"> -->

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
                </ul>
            </div>

            <div class="d-flex">
                <button class="loginBtn"><router-link :to="{ name: 'login', params: {} }"><p>Login</p></router-link></button>
                <!-- <button class="logoutBtn" @click="logout"><p>Logout</p></button> -->
            </div>
            <!-- モーダルが開かない。Bootstrap の影響？。放置。 -->
            <!-- <v-tooltip left>            
                <template v-slot:activator="{ on, attrs }">
                    <div class= "open-modal p-5"
                        v-bind="attrs"
                        v-on="on"
                        >
                        <v-icon color="white">{{ svgPath }}</v-icon>
                    </div>
                </template>
                <span>この議題をクリップする</span>
            </v-tooltip>

            <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                    <div class= "open-modal p-2"
                        v-bind="attrs"
                        v-on="on"
                        >
                        
                        <a href="https://twitter.com/"><i id="iconTW" class="fab fa-twitter-square fa-2x ml-4"></i></a>
                    </div>
                </template>
                <span>Twitterでシェアする</span>
            </v-tooltip> -->
    </header>
</template>

<script>
import { mdiPaperclip } from '@mdi/js'

export default {
    data: () => ({
        svgPath: mdiPaperclip
    }),
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
    z-index: 100;
}
.nav-link{
    color: white;
    font-size: 1rem;
    margin: 10px;
    padding: 4px 16px;
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

/* .header button {
    float: right ;
} */
.logoutBtn {
    width: 100px;
    height: 40px;
    background-color: darkred;
    border-radius: 5px;
    /* margin: 3px; */
    margin: auto 5px;
}

.logoutBtn p {
    color: white;
    text-align: center;
    margin: auto;
}

.loginBtn {
    width: 100px;
    height: 40px;
    background-color: darkcyan;
    border-radius: 5px;
    /* margin: 3px; */
    margin: auto 16px;
}

.loginBtn p {
    color: white;
    text-align: center;
    margin: auto ;
}
</style>