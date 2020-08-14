<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mypage</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div id="app1">
        <mypage-component/>
        <!-- <home></home> -->
        <!-- <div id="nav">
          <router-link to="/">Home</router-link>
        </div>
        <router-view/>
        </div> -->
    </div>

<!-- <script src="{{ mix('js/app.js') }}"></script>  -->
<script src="{{ asset('js/app.js') }}"></script>  
</body>
</html>


<div>マイページ用ルーティング確認</div>

{{ dd('test') }}
<!-- ディスカッション用のビュー用のレイアウトを転用する -->

<!-- @extends('layout.layout_discuss') -->

<!-- @section('content') 


 @endsection -->

