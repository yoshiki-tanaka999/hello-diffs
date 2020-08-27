<template>
    <v-app id="tags">
        <!-- header -->
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <headerindex-component id="header"></headerindex-component>

        <!-- PostModalComponent.vue(お花畑) -->
        <postmodal-component></postmodal-component>
        
        <div class="container" id="main">
            <!-- page_title -->
            <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
            <TagTitle-component></TagTitle-component>

            <!-- tags_area -->
            <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
            <TagArea-component></TagArea-component>

            <!-- show more ボタン -->
            <BTNshowmore-component />
        </div>

            <!-- footer -->
            <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
            <footer-component></footer-component>

    </v-app>
</template>

<style scoped>
#tags{
    font-family: 'Noto Sans JP', sans-serif;
    background-image: url(../testPhoto/whitecray.jpeg);
    background-size: cover;
    padding-top: 50px;
}
#header{
    position: fixed;
    top: 0;
}
#main{
    margin-top: 60px;
    /* border: 1px solid #000000; */
}

</style>