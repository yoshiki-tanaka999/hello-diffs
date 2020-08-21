<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Example</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <!-- 分岐点①：Index.vue -->
            <!-- 分岐点②：Discuss.vue -->
            <router-view/>
        </div>
    <script src="{{ mix('js/app.js') }}"></script> 
    </body>
</html>

