<template>
    <v-main class="pa-0" >
        <v-container class="tf-tree example" id="chart">
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
#chart {
    /* width: 1161px; */
    width: 80%;
    background-color: rgba(255, 255, 255, 0.3);
    /* background-color: rgba(235, 235, 235, 0.7); */
    border-radius: 3px;
    display: flex;
    justify-content: center;
    /* padding-top: 20px;
    padding-bottom: 20px;
    margin-bottom: 50px; */
}
</style>