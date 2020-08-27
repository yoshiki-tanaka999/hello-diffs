<template>
    <v-main class="tf-tree example">
        <v-container>
            <ul>
                <li>
                    <span class="tf-nc">投稿テーマイメージ</span>
                    <ul>
                        <li>
                        <span class="tf-nc">論点階層：賛成</span>
                            <ul>
                                <li><span class="tf-nc">論点階層2-1</span></li>
                                <li>
                                    <span class="tf-nc">論点階層2-2</span>
                                        <ul>
                                            <li><span class="tf-nc">論点階層3-1</span></li>
                                            <li><span class="tf-nc">論点階層3-2</span></li>
                                        </ul>
                                </li>
                                <li><span class="tf-nc">論点階層2-3</span></li>
                            </ul>
                        </li>

                        <li>
                        <span class="tf-nc">論点階層：反対</span>
                        <ul>
                            <li><span class="tf-nc">←のように展開</span></li>
                            <li><span class="tf-nc"></span></li>
                        </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </v-container>
    </v-main>
</template>
