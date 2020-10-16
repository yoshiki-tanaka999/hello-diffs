<template>
  <v-app class="whole">
    <div class="container">

      <span class="header">
        <button class="registerBtn"><router-link :to="{ name: 'register', params: {} }"><p>Register</p></router-link></button>
        <button class="loginBtn"><router-link :to="{ name: 'login', params: {} }"><p>Login</p></router-link></button>
      </span>

      <div>
        <!-- サイトタイトル -->
        <h1 id="siteTitle"><span id="space"></span>Hello Diff<span id="dot">.</span>s</h1>
        <p class="siteSubTitle">疑問を通じて、異なる価値観を愛する</p>

        <div class="signUp-box">
        
          <div class="card-wrapper">
            <div class="half-color"></div>
            <div class="card-body-content">
              <div class="alert alert-danger" v-if="has_error && !success">
                <p>{{error}}</p>
              </div>

              <form autocomplete="off" @submit.prevent="login" method="POST">

                <div class="sendFormStyle" v-bind:class="{ 'has-error': has_error && errors.email }">
                  <!-- <label for="email">E-mail</label> -->
                  <div class="signup">
                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    <span class="invalid-feedback" role="alert" v-if="has_error && errors.email">
                      <strong>{{ errors.email }}</strong>
                    </span>
                  </div>
                </div> 

                <div class="sendFormStyle" v-bind:class="{ 'has-error': has_error && errors.password }">
                  <!-- <label for="password">Password</label> -->
                  <div class="signup">
                    <input type="password" id="password" class="form-control" v-model="password" required>
                    <span class="invalid-feedback " role="alert" v-if="has_error && errors.password">
                      <strong>{{ $message }}</strong>
                    </span>
                  </div>
                </div>

              <div class="wholeBtn">
                <div class="sendFormStyle signup">
                      <button type="submit" class="form-control form-submit sendFormBtn btn btn-dark">Submit</button>
                </div>
              </div>

              </form>
            </div>
          </div> 
        </div>
      </div> 
    </div>
  </v-app>
</template>

<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        success: false,
        has_error: false,
        error: '',
      }
    },
    methods: {

      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          data: {
            email: app.email,
            password: app.password
          },
          success: function() {
            app.success = true
          },
          error: function(res) {
            app.has_error = true
            app.error = res.response.data.error
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>

<style scoped>
.whole {
    font-family: 'Noto Sans JP', sans-serif;
    width: 100%;
    height: 100%;
    /* background-image: url(../testPhoto/geometric01.jpg); */
    background-image: url(../testPhoto/geometric02.jpg);
    background-size: cover;
    position: relative; 
}

.header button {
  float: right ;
}

.container {
    position: absolute;
    margin: auto;
    width: 100%;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.center {
    margin: 0 auto;
    justify-content: center;
}

#siteTitle{
    /* color:dimgray; */
    color:black;
    /* ベスト */
    font-family: 'EB Garamond', serif;
    font-size: 5rem;
    font-weight: bold;
    letter-spacing: 0.5rem;
    padding-top: 180px;
    text-align: center;
    /* padding-left: 50x; */
    /* シンプル＆太字 */
    /* font-family: 'Oswald', sans-serif; */
    /* 素朴 */
    /* font-family: 'Shadows Into Light', cursive; */
    /* シンプル */
    /* font-family: 'Dancing Script', cursive; */
    /* 個性派 */
    /* font-family: 'Abril Fatface', cursive; */
    /* タイプライターっぽい */
    /* font-family: 'Special Elite', cursive; */
    /* ジョンソンアンドジョンソン */
    /* font-family: 'Cookie', cursive; */
    /* ファンタジー */
    /* font-family: 'Cinzel', serif; */
    /* ベストに似ている */
    /* font-family: 'Cardo', serif; */
    /* font-weight: bold; */
    /* text-shadow: 2px -2px 1px rgb(253, 199, 97); */
}
.siteSubTitle {
    color:black;
    /* ベスト */
    font-family: 'EB Garamond', serif;
    font-size: 1rem;
    font-weight: bold;
    letter-spacing: 0.5rem;
    /* padding-top: 45px; */
    text-align: center;
    margin-bottom: 30px;
}

.signUp-box {
    margin: 0 auto;
    width: 600px;

}

.signup {
  margin: 30px;
  /* margin: 0 auto; */
}

.signup input {
    /* width: 100%;
    padding: 11px 10px 11px 13px;
    display: block;
    margin: 0;
    border: none;
    background: none;
    font: 16px/1.4 "Helvetica Neue", "HelveticaNeue", Helvetica, Arial, sans-serif;
    box-sizing: border-box; */
    box-shadow: none;
    border-radius: 0;
    width: 300px;
    margin: 0 auto;
}

form {
  margin: 0 auto;
}

.card-wrapper {
  width: 600px;
  /* background-color: black;
  opacity: 0.8; */
}

.sendFormStyle {
  margin: 0 auto;
  justify-content: center;
}

.sendForm {
  width: 300px;
  height: 50px; 
  margin: 0 auto;
  justify-content: center;
}

.sendForm button {
    width: 200px;
    margin: 0 auto;
    margin-top: 10px;
}
.wholeBtn {
    width: 300px;
    height: 50px;
    margin: 0 auto;
    justify-content: center;
}

.registerBtn {
  width: 100px;
  height: 50px;
  background-color: darkkhaki;
  border-radius: 5px;
  margin: 10px;
}

.registerBtn p {
  color: white;
  text-align: center;
  margin: auto;
}

.loginBtn {
  width: 100px;
  height: 50px;
  background-color: darkcyan;
  border-radius: 5px;
  margin: 10px;
}

.loginBtn p {
  color: white;
  text-align: center;
  margin: auto;
}

</style>