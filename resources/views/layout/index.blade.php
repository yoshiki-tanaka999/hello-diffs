<!-- トップページのビュー用のレイアウト -->
@extends('layout.layout')

@section('content')

<!-- <div class="top_page_first_view">
    <img src="../upload/sunset_flower.jpg" class="top_page_first_view_background_img" alt="">
    <h2>部分レイアウト</h2>
</div> -->

<section class="wrapper">
    <div class="container">
        <div class="content">
            <h2 class="heading">Hello Diff.s</h2>
            <div class="list">
                <div class="list-item">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
                <div class="list-item">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
            </div>
        </div>
    </div>
</section>

<section class="discussion_select">

</section>

<section class="main">
    <!-- 以下は、Bootstrapのスタイル -->
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card-deck card_box">
                <div class="card">
                    <a href="{{ url('/discuss/{ $post->id }') }}">  
                        <img width="100%" height="200" src="./upload/{{$post->img_url}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" >
                        <title>Placeholder</title>
                        <rect fill="#868e96" width="100%" height="100%"/>
                        </img>
                    </a>
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
                    </div>
                </div>
                <div class="card">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="card-deck">
                <div class="card">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
    @endif
</section>

        <!-- モーダルウィンドウ -->
            <div id="modal">
                <div
                    class="modal-background"
                    style="background-color:rgba(0,0,0,0.5)"
                    @click="closeThemeModal">
                <!-- モーダルウィンドウの中身 -->
                    <div class="modal-content" v-on:click.stop>
                        <div class="modal-content-whole">
                            <div class="modal-content-title">
                                <h2 class="modal-content-title-name">スレッドを作成する</h2>
                                <span @click="closeThemeModal" style="font-size: 2.25rem;"
                                onclick="document.getElementById('modal').style.display = 'none';"
                                >×</span>
                            </div>

                            <p>チャンネルはチームがコニュニケーションを取る場所です。<br>
                            特定のトピックに基づいてチャンネルを作ると良いでしょう。(例: #マーケティング)</p>
                            <form method="post" action="{{ url('post') }}">
                            @csrf
                                <!-- テーマタイトル -->
                                <div class="modal-content-subheading">question</div>
                                <div class="modal-content-margin">
                                    <input
                                        type="text" name="title"
                                        class="modal-content-input"
                                    />
                                </div>
                                <!-- テーマチャンネル(タグ) -->
                                <div class="modal-content-subheading">tag</div>
                                <div class="modal-content-margin">
                                    <input
                                        type="text" name="tag"
                                        class="modal-content-input"
                                    />
                                </div>
                                <!-- テーマ概要 -->
                                <div class="modal-content-subheading">description</div>
                                <div class="modal-content-margin">
                                    <textarea
                                        name="description" cols="20" rows="5"
                                        type="text"
                                        class="modal-content-input"
                                        ></textarea>
                                </div>
                                
                                <!-- file upload -->
                                <div class="modal-content-subheading">サムネイル画像</div>
                                <div class="modal-content-margin">
                                    <input 
                                        name="img_url" 
                                        type="file" 
                                    />
                                </div>
                                <div class="modal-form">
                                    <button
                                        class="modal-form-btn"
                                        @click="addTheme"
                                    >問いを投げかける
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- モーダルウィンドウ ここまで-->



@endsection