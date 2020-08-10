<!-- トップページのビュー用のレイアウト -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>discuss</title>
 
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
 
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
    </head>
    <body class="all">
        <header class="header d-flex text-grey border-bottom justify-content-between">
            <div class="d-flex">
                <ul class="nav text-left">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Hello Diff.s</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/mypage') }}">My Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tags') }}">Tags</a>
                    </li>
                </ul>
            </div>
            <div>
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-primary">Share</button>
            </div>
        </header>

            <div>
                @yield('content')
            </div>
    </body>
</html>