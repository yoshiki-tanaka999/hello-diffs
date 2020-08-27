<template>
    <v-app id="body">
        <!-- header -->
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <headerindex-component id="header"></headerindex-component>

        <!-- PostModalComponent.vue(お花畑) -->
        <postmodal-component></postmodal-component>

        <div class="container" id="main">
            <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
            <!-- ユーザの写真と名前 -->
            <UserImageName-component></UserImageName-component>
            <!-- 各カテゴリを選ぶ＆表示するエリア -->
            <MyPageSelecter-component></MyPageSelecter-component>
        </div>

        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <!-- footer -->        
        <footer-component></footer-component>

    </v-app>
</template>

<style scoped>
#body{
    font-family: 'Noto Sans JP', sans-serif;
    background-image: url(../testPhoto/whitecray.jpeg);
    background-size: cover;
    padding-top: 50px;
}
#main{
    margin-top: 30px;
    /* border: 1px solid #000000; */
}
#header{
    position: fixed;
    top: 0;
}
</style>