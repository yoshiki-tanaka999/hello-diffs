<template>
    <v-container>
                            <!-- ここが論点に対する主張 -->
                    <v-tabs-items v-model="tab" class="py-3">
                        <v-tab-item
                            v-for="claim in claims"
                            :key="claim.id"
                        >
                            <v-card
                                color="basil"
                                flat
                                >
                                <v-card-text>{{ claim.content }}</v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>  

                    

                <!-- 論点に対する主張(消えている) -->
                <v-sheet elevation="3">
                    <v-card>
                        <v-tabs
                        v-model="tab"
                        background-color="indigo"
                        center-active
                        show-arrows
                        color="white"
                        dark
                        class="d-none"                
                        >
                            <v-tab
                                v-for="claim in claims"
                                :key="claim.id"
                                v-model="tab1"
                                >
                            </v-tab>
                        </v-tabs>
                    </v-card>                
                </v-sheet>                

            <!-- 論点に対する主張 -->
                <v-card class="d-flex">
                    <v-tabs
                    v-model="tab1"
                    background-color="transparent"
                    color="basil"
                    grow
                    class="py-3"
                    >
                        <v-tab href="#pros">賛成
                            <!-- モーダルウィンドウ(claim_output) -->
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on2, attrs2 }">
                                    <div class= "open-modal-claim-outoput"
                                        onclick="document.getElementById('OutputCard').style.display = 'block';"
                                        v-bind="attrs2"
                                        v-on="on2"
                                        >
                                        <i class="fas fa-edit fa-2x ml-2"></i>
                                    </div>
                                </template>
                                <span>新しい論点を追加する</span>
                            </v-tooltip>  

                        </v-tab>

                        <v-tab href="#cons">反対
                            <!-- モーダルウィンドウ(claim_output) -->
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on2, attrs2 }">
                                    <div class= "open-modal-claim-outoput"
                                        v-on:click="show = !show"
                                        v-bind="attrs2"
                                        v-on="on2"
                                        >
                                        <i class="fas fa-edit fa-2x ml-2"></i>
                                    </div>
                                </template>
                                <span>新しい論点を追加する</span>
                            </v-tooltip>  
                        </v-tab>  
                        
                        <v-tab href="#others">その他・補足
                            <!-- モーダルウィンドウ(claim_output) -->
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on2, attrs2 }">
                                    <div class= "open-modal-claim-outoput"
                                        v-on:click="show = !show"
                                        v-bind="attrs2"
                                        v-on="on2"
                                        >
                                        <i class="fas fa-edit fa-2x ml-2"></i>
                                    </div>
                                </template>
                                <span>新しい論点を追加する</span>
                            </v-tooltip>  
                        </v-tab> 
                    </v-tabs>
                </v-card>


                <v-tabs-items 
                    v-model="tab1"
                    v-for="claim_output in claim_outputTestFiltered"
                    :key="claim_output.id"
                    :class="{ active: currentTab === index }"
                    @click="currentTab = index"
                >
                    <!-- 【枠固定】 賛成・反対・その他タブ ⇔ 意見のカードで表示させる -->

                    <!-- v-ifでカードを描画。そこで、dataをinsertする -->
                        <ClaimOutputCard-component :id="id" :claimId="claimId" v-if="show"></ClaimOutputCard-component>

                    <v-tab-item 
                        value="pros"                 
                        v-for="claim_output in claim_outputTestFiltered_pros"
                        :key="claim_output.id"
                    >
                    <!-- カード①賛成用 -->
                        <template v-show=" claim_output.claim_flag === '賛成' ">
                            <!-- <div> -->
                                <v-card
                                    color="#385F73"
                                    dark
                                >
                                <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->
                                <!-- アイコンを追加 -->
                                <div>
                                    <div class="postStatusList d-flex">
                                        <!-- 「コメント数」 -->
                                        <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                        <!-- 「参加者数」 -->
                                        <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                        <!-- 「ブックマークされた数」 -->
                                        <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                                    </div>
                                </div>

                                <!-- データベースからテキストを描画 -->
                                    <v-card-text>{{claim_output[index].content}}</v-card-text>
                                    <v-card-text>賛成です。</v-card-text>
                                </v-card>
                            <!-- </div> -->
                        </template>  
                    </v-tab-item>

                    <v-tab-item value="cons">
                    <!-- カード②反対用 -->
                    <!-- <div v-for=" in claim_output"> -->
                        <template v-show=" claim_output.claim_flag === '反対' ">                        
                            <!-- <div v-show="currentTab === 1 ">                             -->
                                <v-card
                                    color="#385F73"
                                    dark
                                >
                                <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->
                                <!-- アイコンを追加 -->
                                <div>
                                    <div class="postStatusList d-flex">
                                        <!-- 「コメント数」 -->
                                        <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                        <!-- 「参加者数」 -->
                                        <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                        <!-- 「ブックマークされた数」 -->
                                        <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                                    </div>
                                </div>

                                <!-- データベースからテキストを描画 -->
                                    <v-card-text>{{claim_output.content}}</v-card-text>
                                    <v-card-text>反対です。</v-card-text>
                                </v-card>
                            <!-- </div> -->
                        </template>  
                    <!-- </div>                      -->
                    </v-tab-item>
                    
                    <v-tab-item value="others">
                                <!-- カード③その他用 -->
                                    <template v-show=" claim_output.claim_flag === 'その他・補足' ">   
                                        <!-- <div v-show="currentTab === 2"> -->
                                            <v-card
                                                color="#385F73"
                                                dark
                                            >
                                            <!-- v-ifで賛成、反対、その他ごとに紐付ける（それぞれ色を変えたい） -->
                                            <!-- アイコンを追加 -->
                                            <div>
                                                <div class="postStatusList d-flex">
                                                    <!-- 「コメント数」 -->
                                                    <div><i class="far fa-comments mr-2 ml-3"></i>3</div>
                                                    <!-- 「参加者数」 -->
                                                    <div><i class="fas fa-users mr-2 ml-3"></i>2</div>
                                                    <!-- 「ブックマークされた数」 -->
                                                    <div><i class="fas fa-heart mr-2 ml-3"></i>1</div>
                                                </div>
                                            </div>

                                            <!-- データベースからテキストを描画 -->
                                                <v-card-text>{{claim_output.content}}</v-card-text>
                                                <v-card-text>その他です。</v-card-text>
                                            </v-card>
                                        <!-- </div>     -->
                                    </template>  
                    </v-tab-item>

                </v-tabs-items> 
    </v-container>
</template>
