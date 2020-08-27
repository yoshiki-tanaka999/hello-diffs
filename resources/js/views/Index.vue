<template>
    <v-app id="body">
        <!-- HeaderComponent.vue -->
        <headerindex-component id="header"></headerindex-component>
        <!-- PostModalComponent.vue(お花畑) -->
        <postmodal-component></postmodal-component>
        <!-- MainComponent.vue(お花畑) -->
        <main-component></main-component>

        <!-- タブ切り替え用 -->
        <v-container>
            <v-tabs
                id="tabs"
                color="black"
                background-color="transparent"
                slider-color="rgba(1, 1, 102, 0.863)"
                centered
            >
                <v-tab to="/index" class="tab">New</v-tab>
                <v-tab to="/index/popular" class="tab">Popular</v-tab>
                <v-tab to="/index/featured" class="tab">Featured</v-tab>
            </v-tabs>            
        </v-container>

        <div id="tabsContentArea">
            <router-view id="tabsContent" />
            <BTNshowmore-component />
        </div>

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
#header{
    position: fixed;
    top: 0;
}
.tab{
    font-weight: bold;
}
.tab:hover{
    text-decoration: none;
}
#tabsContentArea{
    width: 1160px;
    margin-right: auto;
    margin-left: auto;
}
#tabsContent{
    /* 表示エリアに影をつけるならこっち */
    /* background-color: rgba(84, 84, 97, 0.329); */
    /* 影を付けないならこっち */
    background-color: rgba(84, 84, 97, 0.01);
    padding: 30px;
}
</style>