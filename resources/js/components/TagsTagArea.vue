<template>
  <div class="container pt-5 mb-5">
    <!-- <button class="tagBtn col-3" v-bind:style="{'background-image': 'url('+ tagSeries[0].tagImage +')'}">{{tagSeries[0].tagName}}</button> -->
    <v-row id="tagsArea" class="d-flex flex-wrap">
      <v-col
        cols="3"
        class="tagBtn my-5"
        v-for="tag in tagSeries"
        v-bind:key="tag.tagName"
        v-bind:style="{'background-image': 'url('+ tag.tagImage +')'}"
      >{{ tag.tagName }}</v-col>
    </v-row>
  </div>
</template>

<script>
import poliImage from "../testPhoto/politics.jpeg";
import geoImage from "../testPhoto/geography.jpeg";
import religionImage from "../testPhoto/religion.jpeg";
import poli2 from "../testPhoto/tanu.png";
import wolf from "../testPhoto/wolf.jpeg";

export default {
  name: "tags",
  data() {
    return {
      tagSeries: [
        { tagName: "Politics", tagImage: poliImage },
        { tagName: "Geography", tagImage: geoImage },
        { tagName: "Religion", tagImage: religionImage },
        { tagName: "Animals", tagImage: poli2 },
        { tagName: "Wolf", tagImage: wolf },
      ],
    };
  },
};
</script>

<style scoped>

/* #tagsArea{
    width: 1161px;
    padding-left: 200px;
    padding-right: 200px;
} */

.tagBtn {
  height: 100px;
  margin: 10px;
  /* font-family: 'EB Garamond', serif; */
  /* font-weight: bold; */
  color: white;
  font-size: 1.3rem;
  /* text-shadow: 2px 2px 1px black; */
  text-shadow: 2px 2px 1px rgba(1, 1, 102, 0.863);
  background-size: cover;
  border: 1px solid rgba(128, 128, 128, 0.452);
  border-radius: 3px;
  box-shadow: 3px 3px 3px rgb(0, 0, 0, 0.4);
  cursor: pointer;
  margin-right: 47px;
  margin-left: 47px;
}

.tagBtn:hover {
  box-shadow: 10px 10px 10px rgb(0, 0, 0, 0.4);
}
</style>