<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tags</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div id="app">
        <tags-component/>
    </div>

<!-- <script src="{{ mix('js/app.js') }}"></script>  -->
<script src="{{ asset('js/app.js') }}"></script>  

</body>
</html>


{{dd('test')}}
<!-- ディスカッション用のビュー用のレイアウトを転用する -->
@extends('layout.layout_discuss')

@section('content')
@endsection