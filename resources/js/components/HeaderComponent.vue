<template>
    <header class="header d-flex text-grey border-bottom justify-content-between">
            <div class="d-flex">
                <ul class="nav text-left">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">Hello Diff.s</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/mypage" class="nav-link">My page</router-link>
                    </li>
                    <li class="nav-item">
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