<!-- トップページのビュー用のレイアウト -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>top</title>
 
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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <!-- モーダルが開かない。Bootstrap の影響？。放置。 -->
            <div class= "open-modal"
                onclick="document.getElementById('modal').style.display = 'block';">
                <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" width="24" height="24"
                        class="plus-btn"
                    >
                    <path 
                        class="heroicon-ui" 
                        d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"
                    />
                    </svg>
            </div>
        </header>

            <div>
                @yield('content')
            </div>

            
    </body>
</html>