<template>
  <div>
    <v-container id="thisbody" class="px-0">
      <v-tabs
        color="black"
        background-color="transparent"
        slider-color="rgba(1, 1, 102, 0.863)"
        centered
      >
        <!-- <v-tab to="/mypage/respond" class="tab">respond</v-tab>
        <v-tab to="/mypage/following" class="tab">following</v-tab>
        <v-tab to="/mypage/own" class="tab">own</v-tab>
        <v-tab to="/mypage/recent" class="tab">recent</v-tab>
        <v-tab to="/mypage/recommended" class="tab">recommended</v-tab>
        <v-tab to="/mypage/teams" class="tab">teams</v-tab> -->
      </v-tabs> 
    </v-container>

    <!-- tabで選択した内容（コンポーネント）を表示するエリア -->
      <div id="tabsContentArea">
        <router-view id="tabsContent" />
      </div>
  </div>
</template>

<script>
// import Respond from './RespondMypage';
// import Following from './FollowingMypage';
// import Own from './OwnMypage';
// import Recent from './RecentMypage';
// import Recommended from './RecommendedMypage';
// import Teams from './TeamsMypage';

// export default {
//   components: {
//     Respond,
//     Following,
//     Own,
//     Recent,
//     Recommended,
//     Teams          
//   },
// }
</script>

<style scoped>
/* .secArea{
  height: 300px;
} */
#thisbody{
  width: 1161px;
}

.tab:hover{
    text-decoration: none;
}

#tabsContentArea{
  border-radius: 5px;
  margin: 12px auto auto;

}
#tabsContent{
  background-color: transparent;
  border-radius: 5px;
  padding: 30px;
}
</style>