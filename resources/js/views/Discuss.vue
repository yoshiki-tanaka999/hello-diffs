<template>
    <v-app id="body">
        <!-- <headerindex-component id="header"></headerindex-component> -->
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component></DiscussSidebar-component>
        <v-main id="main">
            <DiscussChart-component></DiscussChart-component>
            <DiscussPost-component></DiscussPost-component>  
        </v-main>
    </v-app>
</template>

<script>
/* eslint-disable no-console */

// Vuex
import { mapGetters, mapActions } from 'vuex'

import { mdiRectangle } from '@mdi/js';
import { mdiRectangleOutline } from '@mdi/js';

export default {
    name:"post",
    data() {
        return {
            // $route: { params: { id: '' } } ,
            posts: {
                title: '',
                description: '',
            },
            mdiRectangle,
            mdiRectangleOutline
        }
    },
    // created: function() {
    //     this.getImage();
    // },
    // mountedでフィルター掛けたやつを入れる。直接、
    mounted: {
        // title, description = getPostById(id),
        // this.posts.title = title,
        // this.posts.description = description
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


<style scoped>
#body{
    font-family: 'Noto Sans JP', sans-serif;
    background-image: url(../testPhoto/whitecray.jpeg);
    background-size: cover;
    padding-top: 50px;
}
#main{
    margin-top: 10px;
    margin-top: 10px;
    /* border: 1px solid #000000; */
}
#header{
    position: fixed;
    top: 0;
}
</style>
