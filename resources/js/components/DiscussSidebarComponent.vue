<template>
    <v-container>
        <v-navigation-drawer
            v-model="drawerRight"
            app
            clipped
            right
        >

        <!-- チャット欄 -->
        <div class="section">
            <div class="oneArea">
                <div class="onebox">
                <!-- <div class="imgArea"><img src="https://125naroom.com/wp/wp-content/themes/design125naroom/img/kinoko_pan.png" alt="きのこさん"></div> -->
                <div class="fukiArea"><div class="fukidasi">チャット欄</div></div>
                </div>
                <div class="onebox">
                <!-- <div class="imgArea"><img src="https://125naroom.com/wp/wp-content/themes/design125naroom/img/kinoko_megane.png" alt="きのこさん"></div> -->
                <div class="fukiArea"><div class="fukidasi">チャットベースで議論を展開する(発散)。意見として左側にまとめる(収束)。</div></div>
                </div>
                <div class="onebox">
                <!-- <div class="imgArea"><img src="https://125naroom.com/wp/wp-content/themes/design125naroom/img/kinoko_megane.png" alt="きのこさん"></div> -->
                <div class="fukiArea"><div class="fukidasi">管理者や編集者という風に、貢献度に応じて管理者(議題投稿者)から権限が付与される。</div></div>
                </div>

                <div v-for="chat in chatFiltered" :key="chat.id" >
                    <!-- 登録された日時 -->
                    <span>{{ chat.created_at }}</span>：&nbsp;
                    <!-- メッセージ内容 -->
                    <span>{{ chat.content }}</span>
                </div>
            </div>

            <!-- チャット入力欄 -->
            <div class="message-area">
                <div class="message-area-text">
                <textarea id="text" v-model="content"></textarea>
                </div>
                <div class="message-area-button">
                <button id="send" class="disabled-button"  type="button" @click="send()">送信</button>
                </div>
            </div>
        </div>

        </v-navigation-drawer>
    </v-container>

</template>

<script>
    export default {
        props: {
          source: String,
          id: Number
        },
        data() {
          return {
            content: '',
            chats: [],
            drawer: null,
            drawerRight: null,
            right: false,
            left: false,
          }
        },
        mounted() {
          this.getMessages();
        },
        computed: {
          chatFiltered() {
            const chatData = this.chats
            const result = chatData.filter(chat => chat.post_id === this.id)
            return result;
          }
        },            
        methods: {
          getMessages() {
            axios
                .get("/api/chat/")
                .then((response) => {
                    this.chats = response.data;
                    console.log(this.chats);
                });
          },
          send() {
            let data = new FormData();
            data.append("content", this.content);
              axios
                .post("/api/chat/", data)
                .then(response => {
                    this.content = "";
                })
          },
          findBy: function (list, id, post_id) {
              return list.filter(function (chat) {
                  // 入力がない場合は全件表示
                  return (chat[post_id] === this.id),
                  console.log(this.chats);
              })
          }
        },    
    }
</script>

<style scoped>
.oneArea {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  max-width: 1024px;
  margin: 70px auto 20px auto;
  padding: 0 10px;
}
.oneArea .onebox {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
    /* padding: 0 10px; */
}
.oneArea .onebox:nth-child(even) {
  flex-direction: row-reverse;
  margin-top: 20px;
}
.oneArea .onebox .imgArea {
  width: 16%;
  position: relative;
}
.oneArea .onebox .imgArea img {
  width: 100%;
  max-width: 130px;
  position: absolute;
  top: 0;
}
.oneArea .onebox:nth-child(odd) .imgArea img {
  left: 0;
  padding-right: 30px;
}
.oneArea .onebox:nth-child(even) .imgArea img {
  right: 0;
  padding-left: 30px;
}
.oneArea .onebox .fukiArea {
  width: 63%;
    padding: 10px ０;
}
.oneArea .onebox .fukidasi {
  width: 100%;
  position: relative;
  padding: 25px;
  background-color: #f2f3f7;
  font-size: 12px;
  color: #231815;
  border-radius: 12px;
  box-sizing: border-box;
}
.oneArea .onebox .fukidasi::before {
  content: '';
  position: absolute;
  display: block;
  top: 22px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 15px 30px 15px 0;
  border-color: transparent #f2f3f7 transparent transparent;
}
.oneArea .onebox:nth-child(odd) .fukidasi::before {
  left: -20px;
}
.oneArea .onebox:nth-child(even) .fukidasi {
  background-color: #fde5e5;
}
.oneArea .onebox:nth-child(even) .fukidasi::before {
  right: -20px;
  border-color: transparent #fde5e5 transparent transparent;
  transform: rotate(180deg);
}
@media screen and (max-width: 1024px) {
  .oneArea .onebox .imgArea img {
    max-width: 70%;
  }
  .oneArea .onebox .fukidasi {
    padding: 15px;
    font-size: 14px;
  }
  .oneArea .onebox .fukidasi::before {
    top: 8px;
  }
}
@media screen and (max-width: 420px) {
  .oneArea {
    margin: 30px auto;
  }
  .oneArea .onebox:nth-child(even) {
    margin-top: 15px;
  }
  .oneArea .onebox .imgArea {
    width: 20%;
  }
  .oneArea .onebox .fukidasi {
    padding: 10px 15px;
    font-size: 12px;
  }
}

/* チャット欄 */
/* 参考サイト：https://note.com/skipla/n/n4f93a621c5d4 */
.section {
    position: relative;
    height: 100%;
    width: 100%;
}

/* メッセージの入力部分は高さを10vhにして、テキストエリアとボタンをflexで横並びにする*/
.message-area {
    height: 10vh;
    width: 100%;
    display: flex;
	position: absolute;
	bottom: 47px;
}

/* テキストエリアは80%で表示 */
.message-area-text {
 width: 80%;
}

/* テキストエリアは20%で表示 */
.message-area-button {
 width: 20%;
}
/* テキストエリアはリサイズをできなくして、横幅いっぱいに表示 */
.message-area-text textarea {
 width: 100%;
 height: 70%;
 resize: none; /* これでユーザーのリサイズをできなくする */
 border: 1px solid #ddd; /* 枠線をつけて領域を分かりやすく */
 box-sizing: border-box; /* borderを付けてるので、border込の大きさにする */
}
/* ボタンはグリーンのボタンにして、上下左右を全体に広げる */
.message-area-button button {
 width: 100%;
 height: 70%;
 background: #61E739;
 color: #fff;
 font-size: 0.7rem;
 font-weight: bold;
 border: 0;
}
</style>
