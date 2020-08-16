<template>
    <!-- 論点の可視化 -->
    <section>
        <!-- Post情報 -->
        <div>
            <button type="button" class="btn btn-primary ">
                Post_info
            </button>
        </div>
        <!-- 論点の可視化 -->
        <div class="discuss_point_visualize">
            <div>
                論点の可視化を表示させたい
            </div>
        </div>
        <p>{{ id }}</p>
    </section>

</template>

<script>
    // propsでidを受け取るようにすると同時に、Numberでデータ型も指定する
    export default {
        props: { id: Number }
    }
</script>