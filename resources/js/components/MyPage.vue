<template>
    
    <div>
        <!-- header -->
        <!-- <router-view name="headerComponent"></router-view> -->

        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <header-component></header-component>

        <main class="card-body">
            <div class="container col-10 bg-danger">

                <!-- ユーザの写真と名前 -->
                <!-- <router-view name="userImageName"></router-view> -->

                <!-- 各カテゴリを選ぶ＆表示するエリア -->
                <!-- <div>
                    <router-view name="mypageSelecter"></router-view>
                </div> -->

                <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
                <UserImageName-component></UserImageName-component>
                <!-- MainComponent.vue(お花畑) -->
                <MyPageSelecter-component></MyPageSelecter-component>
            </div>
        </main>
        
        <!-- footer -->
        <router-view name="footer"></router-view>
        
        <!-- web.phpの問題に伴い、↑を修正しました(田中) -->
        <footer-component></footer-component>

    </div>

</template>

<style scoped>
</style>