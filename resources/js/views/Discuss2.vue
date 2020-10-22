<template>
    <v-app class="discussBody">
        <!-- <headerindex-component id="header"></headerindex-component> -->
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component class="sidebar" v-bind:id="id"></DiscussSidebar-component>
        <!-- <DiscussChat-component v-bind:id="id"></DiscussChat-component> -->
        <!-- PostModalComponent.vue -->
        <!-- <DiscussModal-component v-bind:id="id"></DiscussModal-component> -->

        <v-main id="main">

            <!-- <ClaimTab2-component v-bind:id="id" @child-event="parentMethod(payload)"></ClaimTab2-component>  -->
            <ClaimTab2-component v-bind:id="id"></ClaimTab2-component> 
            <!-- id要らないかも -->
            <!-- <ClaimTabModal-component v-bind:id="id"></ClaimTabModal-component>    -->
            <ClaimTabModal-component v-bind:id="id" ></ClaimTabModal-component> 
            <!-- <ClaimOutputCard-component v-bind:id="id" :claimId="claimId"></ClaimOutputCard-component>              -->
            <!-- <ClaimOutputTabModal-component v-bind:id="id"></ClaimOutputTabModal-component>    -->
        </v-main>
    </v-app>
</template>

<script>
import ClaimTab2 from  '../components/ClaimTab2Component.vue'
export default {
    name: 'Discuss2',
        components: {
            ClaimTab2
        },
    data: function(){
    return{
            id: Number(this.$route.params.id),
            claimId: ""
        }
    // console.log(id);
    },
    methods: {
        // getPost() {
        //     axios.get('/api/posts/' + this.id)
        //     .then((res) => {
        //         this.post = res.data;
        //         this.claims = this.post.claims
        //         // this.claimId = this.claims[index].id
        //         console.log(this.post);  
        //         console.log(this.claims);  
        //     })
        // },
        parentMethod() {
            this.claimId = payload;
        }
    },
        mounted() {
        // this.getPost();
        // コミットのためtest
    },
}
</script>

<style scoped>
.discussBody {
    background-image: url(../testPhoto/whitecray.jpeg);
    background-size: cover;
}

</style>>