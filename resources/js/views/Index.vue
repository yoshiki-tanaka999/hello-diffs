<template>
    <v-app>
        <!-- HeaderComponent.vue -->
        <headerindex-component></headerindex-component>
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
    </v-app>
</template>
