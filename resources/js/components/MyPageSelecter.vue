<template>
  <v-container id="thisbody" class="px-0">
    <v-tabs
      color="dark"
      width="1100"
      slider-color="rgba(245, 160, 3, 1)"
    >
      <v-tab to="/mypage" class="tab">respond</v-tab>
      <v-tab to="/mypage/following" class="tab">following</v-tab>
      <v-tab to="/mypage/own" class="tab">own</v-tab>
      <v-tab class="tab">recent</v-tab>
      <v-tab class="tab">recommended</v-tab>
      <v-tab class="tab">teams</v-tab>
      
      <!-- <v-tab-item>
          <respond class="secArea"/>
      </v-tab-item>
      <v-tab-item>
          <following class="secArea"/>
      </v-tab-item>
      <v-tab-item>
          <own class="secArea"/>
      </v-tab-item>
      <v-tab-item>
          <recent class="secArea"/>
      </v-tab-item>
      <v-tab-item>
          <recommended class="secArea"/>
      </v-tab-item>
      <v-tab-item>
          <teams class="secArea"/>
      </v-tab-item>-->
    </v-tabs> 

    <div id="tabsContentArea">
      <router-view id="tabsContent" />
    </div>
  </v-container>
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
  background-color: white;
  border-radius: 5px;
  padding: 30px;
}
</style>