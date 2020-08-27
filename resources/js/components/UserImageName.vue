<template>
    <div id="userInfo">
        <h1 id="mypageTitle">My Page</h1>
        <img id="uimage" :src="uimage" alt="" height="100px" width="100px">
        <!-- <img src="" alt="">{{ uimage }} -->
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
    background-color: rgba(255, 255, 255, 0.3);
    /* background-color: rgba(235, 235, 235, 0.7); */
    border-radius: 3px;
    display: flex;
    justify-content: center;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-bottom: 15px;
}
#mypageTitle{
    height: 40px;
    font-family: 'EB Garamond', serif;
    font-weight: bold;
    margin-top: auto;
    margin-bottom: auto;
}
#uimage{
    border: 3px outset #e6e6e6;
    margin-right:30px;
    margin-left:30px;
}
</style>