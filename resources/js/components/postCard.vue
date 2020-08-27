<template>
        <v-row>

            <v-col>
                <v-card
                    class="postcard mx-auto"
                    width="350"
                    max-width="400"
                >
                    <!-- 「画像」 -->
                    <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                    <!-- 「議題」 -->
                    <v-card-title class="v-card-title">人間がポジティブな気分になるのは朝か？夕方か？</v-card-title>
                    </v-img>

                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <!-- 「ブックマークボタン」 -->
                    <v-card-actions class="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- bookmarkにしていない -->
                        <!-- <i class="btnUnBookmark far fa-heart fa-2x mb-5" id=""></i> -->
                        <!-- bookmarkにしている -->
                        <i class="btnBookmarked fas fa-heart fa-2x mb-5" id=""></i>
                    </v-btn>
                    </v-card-actions>

    
                    <div>
                        <ul class="postStatusList d-flex">
                            <!-- 「コメント数」 -->
                            <li><i class="far fa-comments mr-2 ml-3"></i>3</li>
                            <!-- 「参加者数」 -->
                            <li><i class="fas fa-users mr-2 ml-3"></i>2</li>
                            <!-- 「ブックマークされた数」 -->
                            <li><i class="fas fa-heart mr-2 ml-3"></i>1</li>
                        </ul>
                    </div>
                    </v-card-text>             
                </v-card>
            </v-col>

            <v-col>
                <v-card
                    class="postcard mx-auto"
                    max-width="400"
                    width="350"
                >
                    <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                    <v-card-title class="v-card-title">アイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオ</v-card-title>
                    </v-img>

                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <v-card-actions class="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- likeにしていない -->
                        <i class="btnUnBookmark far fa-heart fa-2x mb-5"></i>
                        <!-- likeにしている -->
                        <!-- <i class="btnBookmarked fas fa-heart fa-2x"></i> -->
                    </v-btn>
                    </v-card-actions>

                    <div>
                        <ul class="postStatusList d-flex">
                            <li><i class="far fa-comments mr-2 ml-3"></i>3</li>
                            <li><i class="fas fa-users mr-2 ml-3"></i>2</li>
                            <li><i class="fas fa-heart mr-2 ml-3"></i>1</li>
                        </ul>
                    </div>
                    </v-card-text>
                </v-card>
            </v-col>

                        <v-col>
                <v-card
                    class="postcard mx-auto"
                    max-width="400"
                    width="350"
                >
                    <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                    <v-card-title class="v-card-title">アイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオ</v-card-title>
                    </v-img>

                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <v-card-actions class="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- likeにしていない -->
                        <i class="btnUnBookmark far fa-heart fa-2x mb-5"></i>
                        <!-- likeにしている -->
                        <!-- <i class="btnBookmarked fas fa-heart fa-2x"></i> -->
                    </v-btn>
                    </v-card-actions>

                    <div>
                        <ul class="postStatusList d-flex">
                            <li><i class="far fa-comments mr-2 ml-3"></i>3</li>
                            <li><i class="fas fa-users mr-2 ml-3"></i>2</li>
                            <li><i class="fas fa-heart mr-2 ml-3"></i>1</li>
                        </ul>
                    </div>
                    </v-card-text>
                </v-card>
            </v-col>

        </v-row>

</template>

<style scoped>
.postcard:hover{
    cursor: pointer;
    box-shadow: 10px 10px 10px rgb(0, 0, 0, 0.4);
}
.v-card-title{
    color: white;
    background-color: rgb(0,0,0,0.5);
    font-size: 1rem;
    position: absolute;
    bottom: 0;
    padding: 5px;
    margin-right: 10px;
    margin-left: 10px;
}
.v-card-actions{
    float: right;
    align-items: center;
}
.btnUnBookmark{
    text-shadow: 1px 1px 1px gray;
}
.btnBookmarked{
    text-shadow: 1px 1px 1px gray;
    color:orangered;
}
.postStatus{
}
.postStatusList{
    color: grey;
    list-style: none;
    margin: auto auto 0;
}
</style>

