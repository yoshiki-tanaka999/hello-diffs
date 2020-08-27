<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mypage</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
           <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Oswald&display=swap" rel="stylesheet">
</head>
<body>

    <div id="app">
        <mypage-component/>

    </div>

<!-- <script src="{{ mix('js/app.js') }}"></script>  -->
<script src="{{ asset('js/app.js') }}"></script>  
</body>
</html>


{{ dd('test') }}
<!-- ディスカッション用のビュー用のレイアウトを転用する -->
<!-- @extends('layout.layout_discuss') -->

<!-- @section('content') 
@endsection -->

