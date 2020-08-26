<template>
    <v-app id="body">
        <!-- HeaderComponent.vue -->
        <headerindex-component id="t"></headerindex-component>
        <!-- PostModalComponent.vue(お花畑) -->
        <postmodal-component></postmodal-component>
        <!-- MainComponent.vue(お花畑) -->
        <main-component></main-component>

        <!-- タブ切り替え用 -->
        <v-container>
            <v-tabs>
                <v-tab to="/index">New</v-tab>
                <v-tab to="/index/popular">Popular</v-tab>
                <v-tab to="/index/featured">Featured</v-tab>
            </v-tabs>            
        </v-container>

        <router-view/>
        <footer-component></footer-component>
    </v-app>
</template>

<style scoped>
#body{
    background-color: #f3f3f334;
    padding-top: 50px;
}
#t{
    position: fixed;
    top: 0;
}
</style>