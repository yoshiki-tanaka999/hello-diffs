<template id="tags">
    <div class="container bg-dark mt-4 mb-4">
        <!-- <button class="tagBtn col-3" v-bind:style="{'background-image': 'url('+ tagSeries[0].tagImage +')'}">{{tagSeries[0].tagName}}</button> -->
        <button 
            class="tagBtn col-3" 
            v-for="tag in tagSeries" 
            v-bind:key="tag.tagName" 
            v-bind:style="{'background-image': 'url('+ tag.tagImage +')'}"
        >
        {{ tag.tagName }}</button>
        <br>
        <button id="showMoreBtn" class="btn bg-primary">show more</button>
    </div>
</template>

<script>
import poliImage from '../testPhoto/politics.jpeg'
import geoImage from '../testPhoto/geography.jpeg'
import religionImage from '../testPhoto/religion.jpeg'
import poli2 from '../testPhoto/tanu.png'
import wolf from '../testPhoto/wolf.jpeg'

export default {
    name: 'tags',
    data(){
        return{
            tagSeries: [
                {tagName: "politics", tagImage: poliImage},
                {tagName: "geography", tagImage: geoImage},
                {tagName: "religion", tagImage: religionImage},
                {tagName: "Politics2", tagImage: poli2},
                {tagName: "wolf", tagImage: wolf}
            ]
        }
    }
}
</script>

<style scoped>
.tagBtn{
    height:100px;
    /* width: 200px; */
    /* background-image:url(../testPhoto/politics.jpeg); */
    margin:10px;
}

#showMoreBtn{
    text-align: center;
}
</style>