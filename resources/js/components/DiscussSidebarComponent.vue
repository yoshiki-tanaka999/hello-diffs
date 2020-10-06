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
            <div id="chat-frame" v-for="chat in chatFiltered" :key="chat.id">
              <!-- 誰かのトーク -->
              <p class="chat-talk">
                  <span class="talk-icon">
                      <img src="/images/tanu.png?2251be57d715825a2661ec6174760145" alt="tartgeticon" width="50" height="50"/>
                  </span>
                  <span class="talk-content">{{ chat.content }}</span>
              </p>
              <!-- 自分のトーク -->
              <!-- <p class="chat-talk mytalk">
                  <span class="talk-icon">
                      <img src="/images/tanu.png?2251be57d715825a2661ec6174760145" alt="myicon" width="50" height="50"/>
                  </span>
                  <span class="talk-content">[トーク内容を記載]</span>
              </p> -->
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
// Pusher導入
    import Pusher from 'pusher-js';
    
    export default {
        props: {
          source: String,
          id: Number
        },
        data() {
          return {
            content: '',
            post_id:'',
            chats: [],
            drawer: null,
            drawerRight: null,
            right: false,
            left: false,
          }
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
            let post_id = this.id;
            let data = new FormData();
            console.log(post_id); // post_id = this.idで値は取れている
            data.append("content", this.content);
            data.append("post_id", Number(post_id));
              axios
                .post("/api/chat/", data)
                .then(response => {
                    this.content = "";
                    let post_id = "";
                })
          },
        },
        mounted() {
          this.getMessages();
          // Pusherからの通知待機
          Echo.channel('chat')
              .listen('MessageCreated', (e) => {
                this.getMessages(); // 全メッセージを再読込
          });
          console.log(Echo.channel('chat'));
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
    /* height: 10vh; */
    width: 100%;
    display: flex;
    position: absolute;
    bottom: 0;
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

/* シンプルな吹き出しデザイン */
#chat-frame {
  min-width: 320px;
  max-width: 800px;
  margin: auto;
  padding: 1em 2em;
  background-color: #D8F3F0;
}
.chat-talk {
  overflow: hidden;
  margin: 0 0 1em 0;
  padding: 0;
}
.chat-talk span {
  display: block;
  margin: 0;
  padding: 0;
}
.chat-talk .talk-icon {
  float: left;
  width: auto;
}
.chat-talk .talk-content {
  position: relative;
  box-sizing: border-box;
  width: auto;
  min-height: 50px;
  border-radius: 10px;
  background-color: rgb(112, 208, 224);
  margin: 0 auto 0 70px;
  padding: 1em;
}
.chat-talk .talk-icon img {
  max-width: 100%;
  height: auto;
  vertical-align: bottom;
  border: 2px solid #fff;
  border-radius: 50%;
}
.chat-talk .talk-content:before {
  position: absolute;
  top: 15px;
  left: -20px;
  display: block;
  width: 0;
  height: 0;
  content: '';
  border: 10px solid transparent;
  border-right-color: rgb(112, 208, 224);
}
.chat-talk.mytalk .talk-icon {
  float: right;
}
.chat-talk.mytalk .talk-content {
  margin: 0 70px 0 auto;
  color: #000;
  background: #78FF6C;
}
.chat-talk.mytalk .talk-content:before {
  right: -20px;
  left: auto;
  border-color: transparent;
  border-left-color: #78FF6C;
}
</style>
