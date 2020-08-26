<template>
    <header class="header d-flex text-grey border-bottom justify-content-between">
            <div class="d-flex">
                <ul class="nav text-left text-danger">
                    <li class="nav-item">
                        <router-link to="/index" class="nav-link">Hello Diff.s</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/mypage" class="nav-link">My page</router-link>
                    </li>
                    <li class="nav-item" id="tags">
                        <router-link to="/tags" class="nav-link">Tags</router-link>
                    </li>
                </ul>
            </div>
            <div>
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-primary">Share</button>
            </div>
    </header>
</template>

<style scoped>
.header{
    background-color : rgb(255, 234, 141);
}
</style>