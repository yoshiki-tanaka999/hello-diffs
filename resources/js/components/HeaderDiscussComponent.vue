<template>
    <header class="header d-flex justify-content-center align-items-center">
            <div class="d-flex">
                <ul class="nav text-left p-0 m-0">
                    <!-- <li>
                        <router-link to="/index" class="nav-link border" id="siteLogo"><img src="../testPhoto/title_icon.png" alt="site logo" width="20px"></router-link>
                    </li> -->
                    <li class="nav-item">
                        <router-link to="/index" class="nav-link">Hello Diff.s</router-link>
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
            

            <!-- モーダルが開かない。Bootstrap の影響？。放置。 -->
            <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                    <div class= "open-modal p-2"
                        onclick="document.getElementById('modal').style.display = 'block';"
                        v-bind="attrs"
                        v-on="on"
                        >
                        <i class="fas fa-edit fa-2x ml-2"></i>
                        <!-- <svg 
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" width="24" height="24"
                                class="plus-btn"
                            >
                            <path 
                                class="heroicon-ui" 
                                d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"
                            />
                            </svg> -->
                    </div>
                </template>
                <span>新しい議題を投稿する</span>
            </v-tooltip>
    </header>
</template>

<style scoped>
.header{
    height: 50px;
    width: 99vw;
    font-family: 'Noto Sans JP', sans-serif;
    background-color: rgba(1, 1, 102, 0.863);
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