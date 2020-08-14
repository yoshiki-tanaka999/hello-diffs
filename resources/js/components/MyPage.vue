<template>
    
    <div>
        <!-- header -->
        <router-view name="headerComponent"></router-view>

        <main class="card-body">
            <div class="container col-10 bg-danger">

                <!-- ユーザの写真と名前 -->
                <router-view name="userImageName"></router-view>

                <!-- 各カテゴリを選ぶ＆表示するエリア -->
                <div>
                    <router-view name="mypageSelecter"></router-view>
                </div>
        
            </div>
        </main>

        <!-- footer -->
        <router-view name="footer"></router-view>
        

    </div>

</template>

<style scoped>
</style>