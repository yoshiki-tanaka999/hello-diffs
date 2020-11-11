<template>
    <v-container>
        <v-navigation-drawer
            v-model="drawerRight"
            app
            clipped
            right
            width = 30%
            class="ChatForm"
          >

        <!-- チャット欄 -->
        <div class="section">
            <!-- <div id="chat-frame" v-for="chat in chatFiltered" :key="chat.id"> -->
              <!-- 誰かのトーク -->
              <!-- <p class="chat-talk">
                  <span class="talk-icon">
                      <img src="/images/tanu.png?2251be57d715825a2661ec6174760145" alt="tartgeticon" width="50" height="50"/>
                  </span>
                  <span class="talk-content">{{ chat.content }}</span>
              </p>
            </div> -->

            <!-- チャットカード -->
            <v-card
              class="ma-3"
              color="#2f3640"
              dark
              max-width="400"
              max-height="600"
              v-for="chat in chatFiltered" :key="chat.id"
            >

              <div>
                <v-card-text class="font-weight-bold ">
                  {{ chat.content }}
                </v-card-text>
              </div>

              <v-card-actions>
                <v-list-item class="grow">
                  <!-- アイコン画像(デフォルト) -->
                  <v-list-item-avatar color="grey darken-1">
                    <v-icon class="mr-1 ml-1">
                      mdi-account-circle
                    </v-icon>
                  </v-list-item-avatar>

                  <!-- 表示名(Userテーブルとのリレーション) -->
                  <v-list-item-content>
                    <v-list-item-title v-if="chat.user">{{ chat.user.name }}</v-list-item-title>
                  </v-list-item-content>

                  <!-- Like数と閲覧数 -->
                  <v-row
                    align="center"
                    justify="end"
                  >
                    <v-icon class="mr-1">
                      mdi-heart
                    </v-icon>
                    <span class="subheading mr-2">0</span>
                    <span class="mr-1"></span>
                    <v-icon class="mr-1">
                      mdi-share-variant
                    </v-icon>
                    <span class="subheading">0</span>
                  </v-row>
                </v-list-item>
              </v-card-actions>
            </v-card>
              <!-- 自動読み込みのブロック 一定の部分までスクロールされると@infinite=で指定したmethodが実行される -->
              <infinite-loading ref="infiniteLoading" spinner="spiral" @infinite="infiniteLoad">
                <!-- ステータスがcompleteに更新されると下記が表示される -->
                <!-- <span slot="no-more">-----検索結果は以上です-----</span> -->
                <!-- 結果が存在しない場合下記が表示される -->
                <!-- <span slot="no-results">-----検索結果はありません-----</span> -->
              </infinite-loading>
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

          </v-navigation-drawer>
    </v-container>

</template>

<script>
// Pusher導入
    import Pusher from 'pusher-js';
    import InfiniteLoading from 'vue-infinite-loading';
    
    export default {
        components: {
          InfiniteLoading
        },
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
                .get("/api/chat")
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
                .post("/api/chat", data)
                .then(response => {
                    this.content = "";
                    let post_id = "";
                })
          },
          infiniteLoad() {
            // itemの生成
            for(let i=0;i<20;i++){
              this.chats.push("ニュース");
            }
            this.$refs.infiniteLoading.stateChanger.loaded();
            if (this.chats.length == 100) {
              this.$refs.infiniteLoading.stateChanger.complete();
            }
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
.ChatForm {
  width: 100%;
  /* position: relative;←相対位置 */
}

.basil {
    background-color: #FFFBE6 !important;
        color: #356859 !important;
}

/* チャット欄 */
/* 参考サイト：https://note.com/skipla/n/n4f93a621c5d4 */
.section {
    position: relative;
    height: 100%;
    min-height: 100vh;
    width: 100%;
    padding-top: 50px;

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
  height: 100%;
  resize: none; /* これでユーザーのリサイズをできなくする */
  border: 1px solid #ddd; /* 枠線をつけて領域を分かりやすく */
  box-sizing: border-box; /* borderを付けてるので、border込の大きさにする */
  background-color: white;
}
/* ボタンはグリーンのボタンにして、上下左右を全体に広げる */
.message-area-button button {
 width: 100%;
 height: 100%;
 background: #2f3640;
 border: 1px solid #ffffff;
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
