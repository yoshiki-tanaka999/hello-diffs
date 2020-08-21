<template>
    <header class="header d-flex text-grey border-bottom justify-content-between">
            <div class="d-flex">
                <ul class="nav text-left">
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
            <div class= "open-modal"
                onclick="document.getElementById('modal').style.display = 'block';">
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
    </header>
</template>