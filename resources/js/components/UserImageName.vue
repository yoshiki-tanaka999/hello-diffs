<template>
    <div id="userInfo">
        <img id="uimage" :src="uimage" alt="" height="100px" width="100px">
        <!-- <img src="" alt="">{{ uimage }} -->
        <h1 id="myDiffs">My Diff.s</h1>
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
    width: 1161px;
    background-color: white;
    border-radius: 5px;
    display: flex;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-bottom: 15px;
}

#uimage{
    border: 3px outset #e6e6e6;
    margin-right:30px;
    margin-left:30px;
}

#myDiffs{
    height: 40px;
    font-weight: bold;
    margin-top: auto;
    margin-bottom: auto;
}
</style>