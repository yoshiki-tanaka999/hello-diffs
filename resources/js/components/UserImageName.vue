<template>
    <div id="userInfo">
        <img id="uimage" :src="uimage" alt="" height="60px" width="60px">
        <!-- <img src="" alt="">{{ uimage }} -->
        <h2>My Diff.s</h2>
    </div>
</template>

<script>
export default {
    name: 'userInfo',
    data(){
        return{
            // 要DB連携
            uimage: require('../testPhoto/tanu.png'),
            // uname: 'kichi'
        }
    },

}
      
</script>

<style scoped>
#userInfo{
    display: flex;
}

#uimage{
    margin-right:30px;
}
</style>