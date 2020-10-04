<template>
    <v-app id="body">
        <!-- <headerindex-component id="header"></headerindex-component> -->
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component v-bind:id="id"></DiscussSidebar-component>
        <!-- PostModalComponent.vue -->
        <DiscussModal-component v-bind:id="id"></DiscussModal-component>

        <v-main id="main">
            <DiscussChart-component></DiscussChart-component>
            <DiscussPost-component v-bind:id="id"></DiscussPost-component> 
        </v-main>
    </v-app>
</template>

<script>
export default {
    data: function(){
    return{
            id: this.$route.params.id,
        }
    // console.log(id);
},
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
