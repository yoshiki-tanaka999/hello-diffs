<template>

  <v-tabs>
    <v-tab>respond</v-tab>
    <v-tab>following</v-tab>
    <v-tab>own</v-tab>
    <v-tab>recent</v-tab>
    <v-tab>recommended</v-tab>
    <v-tab>teams</v-tab>
    
    <v-tab-item>
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
    </v-tab-item>
  </v-tabs>

</template>

<script>
import Respond from './RespondMypage';
import Following from './FollowingMypage';
import Own from './OwnMypage';
import Recent from './RecentMypage';
import Recommended from './RecommendedMypage';
import Teams from './TeamsMypage';

export default {
  components: {
    Respond,
    Following,
    Own,
    Recent,
    Recommended,
    Teams          
  },
}
</script>

<style scoped>
.secArea{
  height: 300px;
}
</style>