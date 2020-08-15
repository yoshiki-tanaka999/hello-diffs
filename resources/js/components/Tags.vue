<template>
    <div id="tags">
        <!-- header -->
        <router-view name="headerComponent"></router-view>

        <!-- page_title -->
        <router-view name="tagTitle"></router-view>

        <!-- tags_area -->
        <router-view name="tagArea"></router-view>

        <!-- footer -->
        <router-view name="footer"></router-view>
    </div>
</template>