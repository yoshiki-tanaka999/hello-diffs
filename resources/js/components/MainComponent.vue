<template>
    <section class="wrapper">
        <div class="container p-0">
            <div class="content" id="bg">
                <h1 id="siteTitle">Hello Diff<span id="dot">.</span>s</h1>
                <!-- <img src="../testPhoto/title_icon.png" alt="" height="100px" width="300px" id="titleImage"> -->
                <div class="list">
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    // export default {
    //     mounted() {
    //         console.log('Component mounted.')
    //     }
    // }
</script>

<style scoped>
.container{
    width: 1100px;
    height: 250px;
    text-align: center;
    margin: 30px auto 20px;
    position:relative;
}

.container::after{
    content:"";
    position: absolute;
    bottom: 0px;
    left: 0vw;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0px 0vw 100px 1100px;
    border-color: transparent transparent  rgba(235, 235, 235, 0.7) transparent;
}

#siteTitle{
    color: black;
    /* ベスト */
    font-family: 'EB Garamond', serif;
    font-size: 8rem;
    letter-spacing: 0.5rem;
    padding-top: 45px;
    /* シンプル＆太字 */
    /* font-family: 'Oswald', sans-serif; */
    /* 素朴 */
    /* font-family: 'Shadows Into Light', cursive; */
    /* シンプル */
    /* font-family: 'Dancing Script', cursive; */
    /* 個性派 */
    /* font-family: 'Abril Fatface', cursive; */
    /* タイプライターっぽい */
    /* font-family: 'Special Elite', cursive; */
    /* ジョンソンアンドジョンソン */
    /* font-family: 'Cookie', cursive; */
    /* ファンタジー */
    /* font-family: 'Cinzel', serif; */
    /* ベストに似ている */
    /* font-family: 'Cardo', serif; */
    /* font-weight: bold; */
    /* text-shadow: 2px -2px 1px rgb(253, 199, 97); */
}


#titleImage{
    margin-left:370px;
}

#dot{
    color: rgba(1, 1, 102, 1);
}
</style>