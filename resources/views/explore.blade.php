<!-- トップページのビュー用のレイアウト -->
@extends('layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Example</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div id="app">
        <main-component></main-component>
        <image-component></image-component>
        <postmodal-component></postmodal-component>
    </div>
    

<script src="{{ mix('js/app.js') }}"></script> 
</body>
</html>

@endsection