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
                color="dark"
                slider-color="rgba(245, 160, 3, 1)"
            >
                <v-tab to="/index" class="tab">New</v-tab>
                <v-tab to="/index/popular" class="tab">Popular</v-tab>
                <v-tab to="/index/featured" class="tab">Featured</v-tab>
            </v-tabs>            
        </v-container>

        <div id="tabsContentArea">
            <router-view id="tabsContent" />
        </div>

        <footer-component></footer-component>
    </v-app>
</template>

<style scoped>
#body{
    background-color: #f3f3f334;
    padding-top: 50px;
}
#header{
    position: fixed;
    top: 0;
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
    padding: 30px;
}
</style>