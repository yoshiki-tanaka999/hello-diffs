<template>
    <section class="wrapper">
        <div class="container-fluid">
            <div class="content" id="bg">
                <h1 id="siteTitle">Hello Diff.s</h1>
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
#siteTitle{
    /* color: rgb(255, 223, 41); */
    color: rgb(252, 178, 61);
    /* font-family: 'Merriweather Sans', sans-serif; */
    font-family: 'Oswald', sans-serif;

    font-size: 3rem;
    letter-spacing: 0.3rem;
    font-weight: bold;
    text-shadow: 2px -2px 1px #24642f;
    padding-top: 100px;
}

.container-fluid{
    height: 300px;
    /* width: 1200px; */
    /* background-color: rgb(255, 234, 141); */
    /* background-color: green; */
    background-image:url(../testPhoto/titleImage_2.jpg);
    background-size:contain;
    text-align: center;
    margin: 30px auto 20px;
    /* margin-bottom: 20px; */
}
#titleImage{
    margin-left:370px;
}
</style>