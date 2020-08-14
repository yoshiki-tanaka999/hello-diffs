<template>
    
    <div>
        <!-- コンポーネント化せずに、一旦１ページで作る -->
        <!-- titleを柔軟化しないといけない -->
        <!-- <router-view></router-view> -->
        <router-view name="headerComponent"></router-view>

        

        <main class="card-body">
            <div class="container col-10 bg-danger">
                <div>
                    <img src="" alt="">image
                    <h2>Name</h2>
                </div>
                <div>
        <router-view name="mypageSelecter"></router-view>
            
                </div>
                <div class="row">
                    <div class="col-5 bg-warning">main</div>
                    <div class="col-5 bg-dark">sidebar</div>

                </div>
            </div>
        </main>
        <footer class="card-footer">FOOTER</footer>
    </div>

</template>