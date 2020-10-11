<template>
    <v-app
        id="OutputCard"
    >
        <!-- カード① -->
        <v-col>
            <v-card
                color="#2f3640"
                dark
            >
                <!-- 多分要らない？ -->
                <v-card-title class="headline">
                    意見を投じる
                </v-card-title>

                <!--【セレクトボックス】賛成 or 反対 or その他の意見 -->
                <select v-model="selected">
                    <option disabled value="" class="select-validatot">賛否を選択してください。</option>
                    <option>賛成</option>
                    <option>反対</option>
                    <option>その他・補足</option>
                </select>

                <!-- 投稿される意見のテキストボックス -->
                <textarea v-model="message" placeholder="論点に対する自分の意見を記入してください。"></textarea>

                <v-card-actions>
                    <v-btn text>
                        Submit!
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-col> 
    </v-app>

</template>

<script>

export default {
    data() {
        return {
            selected: '',
            message: '',
        }
    }
}
</script>  

<style scoped>
#OutputCard {
    width: 800px;
    margin: 20px auto 0 auto;
    padding: 28px;
    border: 1px solid #ffffff;
    border-radius: 10px;
    background-color: transparent;
}

#OutputCard v-card {
    overflow: hidden;
}

.headline {
    padding-left: 50px;
    font-weight: 500;
}

#OutputCard select {
    display: block;
    width: 200px;
    height: 30px;
    margin: 10px 0 0 50px;
    color: #555;
    background-color: aliceblue;
    border: 0;
    border-radius: 5px;       
}

#OutputCard textarea {
    display: block;
    width: 600px;
    height: 90px;
    margin: 30px 50px 0 50px;
    color: #555;
    background-color: aliceblue;
    border: 0;
    border-radius: 5px;       
}

#OutputCard button {
    display: block;
    width: 100px;
    height: 25px;
    margin: 30px auto 0 auto;
    color: #ffffff;
    border: 1px solid #ffffff;
    border-radius: 15px;
    box-shadow: 0;
    background-color: transparent;
    cursor: pointer;
    }

.select-validatot {
    color: #ffffff
}
</style>
