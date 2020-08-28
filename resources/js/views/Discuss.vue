<template>
    <v-app id="body">
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component></DiscussSidebar-component>
        <v-main id="main">
            <DiscussChart-component></DiscussChart-component>
            <DiscussPost-component></DiscussPost-component>  
        </v-main>
    </v-app>
</template>


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
