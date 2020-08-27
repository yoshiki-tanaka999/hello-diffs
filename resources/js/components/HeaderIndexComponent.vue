<template>
    <header class="header d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <ul class="nav text-left">
                    <!-- <li>
                        <router-link to="/index" class="nav-link border" id="siteLogo"><img src="../testPhoto/title_icon.png" alt="site logo" width="20px"></router-link>
                    </li> -->
                    <li class="nav-item">
                        <router-link to="/index" class="nav-link">Hello Diff.s</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/mypage" class="nav-link">My page</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/tags" class="nav-link">Tags</router-link>
                    </li>
                </ul>
            </div>
            

            <!-- モーダルが開かない。Bootstrap の影響？。放置。 -->
            <div class= "open-modal text-secondary"
                onclick="document.getElementById('modal').style.display = 'block';"
                title="新しい議題を投稿する"
                >
                <i class="fas fa-edit fa-2x"></i>
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
    </header>
</template>

<style scoped>
.header{
    height: 50px;
    width: 99vw;
    background-color: rgba(1, 1, 102, 0.863);
    z-index: 100;
}
.nav-link{
    /* color: rgb(245, 160, 3); */
    color: white;
    font-weight: bold;
    font-size: 1rem;
}
#siteLogo{
    margin-right: 20px;
}
.open-modal{
    margin-right:10px;
}
.open-modal:hover{
    cursor: pointer;
}
</style>