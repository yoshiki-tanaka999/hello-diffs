<template>
    <v-app class="discussBody">
        <!-- <headerindex-component id="header"></headerindex-component> -->
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component class="sidebar" v-bind:id="id"></DiscussSidebar-component>
        <!-- <DiscussChat-component v-bind:id="id"></DiscussChat-component> -->
        <!-- PostModalComponent.vue -->
        <!-- <DiscussModal-component v-bind:id="id"></DiscussModal-component> -->

        <v-main id="main">
            <!-- <DiscussChart-component></DiscussChart-component>
            <DiscussPost-component v-bind:id="id"></DiscussPost-component>  -->
            <ClaimTab2-component v-bind:id="id"></ClaimTab2-component> 
            <!-- id要らないかも -->
            <!-- <ClaimTabModal-component v-bind:id="id"></ClaimTabModal-component>    -->
            <ClaimTabModal-component v-bind:id="id"></ClaimTabModal-component> 
            <ClaimOutputCard-component v-bind:id="id"></ClaimOutputCard-component>             
            <!-- <ClaimOutputTabModal-component v-bind:id="id"></ClaimOutputTabModal-component>    -->
        </v-main>
    </v-app>
</template>

<script>
export default {
    data: function(){
    return{
            id: Number(this.$route.params.id),
        }
    // console.log(id);
},
}
</script>