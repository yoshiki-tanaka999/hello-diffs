<template>
    <div id="footer">
        <footer class="card-footer border-none">
            <v-row>
                <v-col>
                    <ul>
                        <li><router-link to="/home" class="nav-link">About Us</router-link></li>
                        <!--  -->
                        <li><a href="https://twitter.com/"><i id="iconTW" class="fab fa-twitter-square fa-2x ml-4"></i></a></li>
                    </ul>
                </v-col>
                <v-col>
                    <ul>
                        <li><router-link to="/index" class="nav-link">Top page</router-link></li>
                        <li><router-link to="/index" class="nav-link">- New</router-link></li>
                        <li><router-link to="/index/popular" class="nav-link">- Popular</router-link></li>
                        <li><router-link to="/index/featured" class="nav-link">- Featured</router-link></li>
                    </ul>
                </v-col>
                <v-col>
                    <ul>
                        <li><router-link to="/mypage" class="nav-link">My page</router-link></li>
                        <li><router-link to="/mypage/respond" class="nav-link">- Respond</router-link></li>
                        <li><router-link to="/mypage/following" class="nav-link">- Following</router-link></li>
                        <li><router-link to="/mypage/own" class="nav-link">- Own</router-link></li>
                        <li><router-link to="/mypage/recent" class="nav-link">- Recent</router-link></li>
                        <li><router-link to="/mypage/recommended" class="nav-link">- Recommended</router-link></li>
                        <li><router-link to="/mypage/teams" class="nav-link">- Teams</router-link></li>
                    </ul>
                </v-col>
                <v-col>
                    <ul>
                        <li><router-link to="/tags" class="nav-link">Tags</router-link></li>
                    </ul>
                </v-col>
            </v-row>
        </footer>

        <!-- Contact Us  -->
        <!-- Privacy policy -->

       <div class="d-flex" id="titleIconArea">
           <!-- !要変更 -->
           <!-- <img src="../testPhoto/title_icon.png" alt="title icon" width="200px"> -->
           <p class="mt-auto mb-0 ml-4" id="cAndTitle">©︎ Hello Diff.s 2020</p>
       </div>
    </div>
</template>

<style scoped>
#footer{
    background-color: rgba(1, 1, 102, 0.5);
    margin-top: 60px;
}
.card-footer{
    padding: 10px 60px;
}
.nav-link{
    color: white;
}
li{
    list-style: none;
}
#iconTW{
    color: darkgray;
}
#iconTW:hover{
    color: white;
}
#titleIconArea{
    justify-content: center;
}
#cAndTitle{
    height: 20px;
    color: white;
}
</style>