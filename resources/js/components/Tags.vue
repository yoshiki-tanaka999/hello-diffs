<template>
    <div id="tags">
        <!-- header -->
        <!-- <router-view name="headerComponent"></router-view> -->
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <header-component></header-component>

        <!-- page_title -->
        <!-- <router-view name="tagTitle"></router-view> -->
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <TagTitle-component></TagTitle-component>

        <!-- tags_area -->
        <!-- <router-view name="tagArea"></router-view> -->
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <TagArea-component></TagArea-component>

        <!-- footer -->
        <!-- <router-view name="footer"></router-view> -->
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <footer-component></footer-component>
    </div>
</template>