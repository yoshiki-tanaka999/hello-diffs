<template>
    <v-main class="pa-0">
        <v-container class="tf-tree example">
            <ul>
                <li>
                    <span class="tf-nc">投稿テーマイメージ</span>
                    <ul>
                        <li>
                        <span class="tf-nc">論点階層：賛成</span>
                            <ul>
                                <li><span class="tf-nc"></span></li>
                                <li>
                                    <span class="tf-nc"></span>
                                        <ul>
                                            <li><span class="tf-nc"></span></li>
                                            <li><span class="tf-nc"></span></li>
                                        </ul>
                                </li>
                                <li><span class="tf-nc"></span></li>
                            </ul>
                        </li>

                        <li>
                        <span class="tf-nc">論点階層：反対</span>
                        <ul>
                            <li><span class="tf-nc"></span></li>
                            <li><span class="tf-nc">←のように論点を可視化したい</span></li>
                        </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </v-container>
    </v-main>
</template>

<style scoped>
.tf-tree example {
    justify-content: center;
}
</style>