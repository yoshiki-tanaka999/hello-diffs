<template>
    <div id="body" class="bg-dark">
	    <h1>Home Page</h1>
        <div class="container-fluid" id="no1">
            <div id="area1" class="m-0">
                <p class="hometext">はじめまして、</p>
            </div>
        </div>

        <div class="container-fluid border d-flex p-0" id="no2">
            <div id="area2" class="m-0">
                <p class="hometext">はじめまして、</p>
            </div>
            <div id="pic2">
                <p class="notext">
                    test
                </p>
            </div>

        </div>

        <div class="container-fluid border d-flex p-0" id="no3">
            
            <div id="pic3">
                <p class="notext">
                    test
                </p>
            </div>
            <div id="area2" class="m-0">
                <p class="hometext">はじめまして、</p>
            </div>
        </div>

        <div class="container-fluid border d-flex p-0" id="no4">
            <div id="area2" class="m-0">
                <p class="hometext">はじめまして、</p>
            </div>
            <div id="pic4">
                <p class="notext">
                    test
                </p>
                <!-- <img src="" alt="" width="100vw"> -->
            </div>
        </div>
        
        <div class="container-fluid border d-flex p-0" id="no5">
            <div id="area2" class="m-0">
                <p class="hometext">はじめまして、</p>
            </div>
            <div id="pic5">
                <p class="notext">
                    test
                </p>
                <!-- <img src="" alt="" width="100vw"> -->
            </div>
        </div>
        <div class="container-fluid border d-flex p-0" id="no6">
            <!-- <div id="area2" class="m-0">
                <p class="hometext">はじめまして、</p>
            </div> -->
            <div id="pic6">
                <p class="notext">
                    test
                </p>
                <!-- <img src="" alt="" width="100vw"> -->
            </div>
        </div>






        <p>thanks to:
            
        </p>
    </div>

</template>

<script>
    // export default {
    //     props: {
    //         home: String
    //     }
    // }
</script>

<style scoped>
.container-fluid{
    height: 600px;
    width: 100vw;
    background-color: black;

}

/* #no1, #no2{
      padding: 100px;
}
#no1{
  position: relative;
}

#no1::before{
  content:"";
  position: absolute;
  bottom: 0;
  left: 50vw;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 100px 50vw 100px 100vw ;
 
  border-color: transparent transparent #ffffff transparent;
}
#no2{
    background-color: red;
} */
.hometext{
    color: white;
}

.notext{
    opacity: 0;
}

#area1{
}

#no2, #no3, #no4, #no5{
        display: flex;
    justify-content: space-between
}

#pic2{
    width: 50vw;
    height: 100%;
    background-image: url(../testPhoto/colorful_25.jpeg);
    background-size: cover;
    /* float: right; */

}

#pic3{
    width: 50vw;
    height: 100%;
    background-image: url(../testPhoto/colorful_15.jpeg);
    background-size: cover;
}

#pic4{
            width: 60vw;
    height: 100%;
    background-image: url(../testPhoto/colorful_23.jpeg);
    background-size: cover;
}

#pic5{
                width: 80vw;
    height: 100%;
    background-image: url(../testPhoto/colorful_9.jpeg);
    background-size: cover;
}
#pic6{
                    width: 100vw;
    height: 100%;
    background-image: url(../testPhoto/colorful_26.jpeg);
    background-size: cover;
}
</style>