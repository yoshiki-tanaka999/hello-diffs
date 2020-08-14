// routingを伴いわない、単純にコンポーネントの出し分けの方法
// （可能であれば修正）冗長な記述

<template>
  <v-tabs>
    <v-tab>respond</v-tab>
    <v-tab>following</v-tab>
    <v-tab>own</v-tab>
    <v-tab>recent</v-tab>
    <v-tab>recommended</v-tab>
    <v-tab>teams</v-tab>
    
    <v-tab-item>
        <respond/>
    </v-tab-item>
    <v-tab-item>
        <following/>
    </v-tab-item>
    <v-tab-item>
        <own/>
    </v-tab-item>
    <v-tab-item>
        <recent/>
    </v-tab-item>
    <v-tab-item>
        <recommended/>
    </v-tab-item>
    <v-tab-item>
        <teams/>
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