<template>
        <v-row>

            <v-col>
                <v-card
                    class="mx-auto"
                    max-width="400"
                    width="350"
                >
                    <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                    <v-card-title id="v-card-title">人間がポジティブな気分になるのは朝か？夕方か？</v-card-title>
                    </v-img>

                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <v-card-actions id="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- bookmarkにしていない -->
                        <!-- <i class="far fa-heart fa-2x mb-5" id="btnUnBookmark"></i> -->
                        <!-- bookmarkにしている -->
                        <i class="fas fa-heart fa-2x mb-5" id="btnBookmarked"></i>
                    </v-btn>
                    </v-card-actions>

                    <div id="postStatus">
                        <ul id="postStatusList" class="d-flex">
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
                    class="mx-auto"
                    max-width="400"
                    width="350"
                >
                    <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                    <v-card-title id="v-card-title">アイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオ</v-card-title>
                    </v-img>

                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <v-card-actions id="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- likeにしていない -->
                        <i class="far fa-heart fa-2x mb-5"></i>
                        <!-- likeにしている -->
                        <!-- <i class="fas fa-heart fa-2x"></i> -->
                    </v-btn>
                    </v-card-actions>

                    <div id="postStatus">
                        <ul id="postStatusList" class="d-flex">
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
                    class="mx-auto"
                    max-width="400"
                    width="350"
                >
                    <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                    <v-card-title id="v-card-title">アイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオ</v-card-title>
                    </v-img>

                    <!-- <v-card-subtitle class="pb-0">Number 10</v-card-subtitle> -->

                    <v-card-text class="text--primary">
                    <div></div>

                    <v-card-actions id="v-card-actions">
                    <v-btn
                        color="grey"
                        text
                    >
                        <!-- likeにしていない -->
                        <i class="far fa-heart fa-2x mb-5"></i>
                        <!-- likeにしている -->
                        <!-- <i class="fas fa-heart fa-2x"></i> -->
                    </v-btn>
                    </v-card-actions>

                    <div id="postStatus">
                        <ul id="postStatusList" class="d-flex">
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
#v-card-title{
    margin-right: 10px;
    margin-left: 10px;
    padding: 5px;
    background-color: rgb(0,0,0,0.5);
    font-size: 1rem;
}

#v-card-actions{
    float: right;
    align-items: center;
}
#btnUnBookmark{
    text-shadow: 1px 0px 1px gray;
}

#btnBookmarked{
    text-shadow: 1px 1px 1px gray;
    color:orangered;
}

#postStatus{
    color: grey;
}
#postStatusList{
    list-style: none;
    /* text-align: end; */
    margin:auto auto 0;
}
</style>

