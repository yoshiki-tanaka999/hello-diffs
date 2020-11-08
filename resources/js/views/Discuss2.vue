<template>
    <v-app class="discussBody">
        <!-- <headerindex-component id="header"></headerindex-component> -->
        <HeaderDiscuss-component id="header"></HeaderDiscuss-component>
        <DiscussSidebar-component class="sidebar" v-bind:id="id"></DiscussSidebar-component>
        <!-- <DiscussChat-component v-bind:id="id"></DiscussChat-component> -->
        <!-- PostModalComponent.vue -->
        <!-- <DiscussModal-component v-bind:id="id"></DiscussModal-component> -->

        <v-main id="main">

        <!-- セレクション時点 -->
            <!-- <ClaimTab2-component v-bind:id="id"></ClaimTab2-component> 
            <ClaimTabModal-component v-bind:id="id" ></ClaimTabModal-component>  -->


        <!-- Hello-diffs act2 -->
            <ClaimPostTitle-component v-bind:id="id"></ClaimPostTitle-component> 

            <router-view name="ClaimTab2Act2" v-bind:id="id" />
            <router-view name="ClaimLayerViewAct2" 
                v-bind:id="id" 
                v-bind:claimContent="claim.content" 
                v-bind:claimLevel="claim.claim_level"
                @catchParent="displayMessage"
            />

            <!-- <ClaimTab2Act2-component v-bind:id="id"></ClaimTab2Act2-component>  -->

            <!-- <router-view  name="ClaimTab2Act2" v-bind:id="id" /> -->
            <!-- Act1時の論点の追加のためのコンポーネント -->
            <!-- <ClaimTabAct2Modal-component v-bind:id="id" ></ClaimTabAct2Modal-component>  -->

        </v-main>
    </v-app>
</template>

<script>
import ClaimTab2Act2 from  '../components/ClaimTab2Act2Component.vue'
export default {
    // name: 'Discuss2',
    //     components: {
    //         ClaimTab2
    //     },
    data: function(){
        return{
                id: Number(this.$route.params.id),
                // claimLevel: "",
                claim:"",
                // claimContent: "",
                claimId: "",
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
        },
        getClaim() {
            axios.get('/api/claim')
            .then((res) => {
                this.claim = res.data;
                console.log(this.claim);  
                // その他・補足のデータ
            })
        },
        displayMessage(claimContent, claimLevel, upperId){
            return claimContent, this.claimLevel, upperId;
        }     
    },
    computed: {
        claimContent() {
            console.log(this.$route.params.claim.content);
            return this.$route.params.claim.content;
        },
        claimLevel() {
            console.log(this.$route.params.claim.claim_level);
            return this.$route.params.claim.claim_level;            
        }
    },
    mounted() {
        this.getClaim();
    },
}
</script>

<style scoped>
.discussBody {
    background-image: url(../testPhoto/whitecray.jpeg);
    background-size: cover;
}

</style>>