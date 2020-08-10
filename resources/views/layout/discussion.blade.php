<!-- discussのビュー用のレイアウト -->
@extends('layout.layout_discuss')

@section('content')

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
</section>

<!-- ディスカッションそれ自体 -->
<section>
    <div class="question_parts">
        <h2>問い</h2>
        <h5 class="card-title">パンはパンでも食べられないパンはフライパンである。<br>
        (投稿内容の反映はしていない)
        </h5>
    </div>
    <div class="discuss_content">
        <div class="answer">
            <div class="pros_btn">
                <div class="agree-text">
                    <p>賛成</p>
                </div>
                <div class= "open-modal"
                onclick="document.getElementById('modal_pros').style.display = 'block';"
                >
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
            </div>
            <div class="cons_btn">
                <div class="agree-text">
                    <p>反対</p>
                </div>
                <div class= "open-modal"
                onclick="document.getElementById('modal_cons').style.display = 'block'"
                >
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
            </div>
        </div>
    </div>
</section>

    <div class="answer">
        <div class="pros">
            @if (count($claims_pros) > 0)
                @foreach ($claims_pros as $claim)
                    <div class="">
                        {{ $claim->content }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="cons">
            @if (count($claims_cons) > 0)
                @foreach ($claims_cons as $claim)
                    <div class="">
                        {{ $claim->content }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <!-- モーダルウィンドウ(賛成)-->
    <div id="modal_pros">
        <div
            class="modal-background"
            style="background-color:rgba(0,0,0,0.5)"
            @click="closeThemeModal">
        <!-- モーダルウィンドウの中身 -->
            <div class="modal-content" v-on:click.stop>
                <div class="modal-content-whole">
                    <div class="modal-content-title">
                        <h2 class="modal-content-title-name">意見を投稿する</h2>
                        <span @click="closeThemeModal" style="font-size: 2.25rem;"
                        onclick="document.getElementById('modal_pros').style.display = 'none';"
                        >×</span>
                    </div>

                    <form method="post" action="{{ url('claim') }}" >
                    @csrf
                        <!-- テーマ概要 -->
                        <div class="modal-content-margin">
                            <!-- なぜか、文章が最初から書けない＆placeholderが反映していない -->
                            <textarea
                                name="content" 
                                placeholder="あなたの意見を記述する" 
                                cols="20" rows="5" 
                                type="text" 
                                class="modal-content-input"
                                ></textarea>
                        </div>
                        
                        <div class="modal-form">
                            <button
                                class="modal-form-btn"
                                @click="addTheme"
                            >意見を投稿する
                            </button>
                        </div>
                        <input type="hidden"  name="claim_flag" value="0">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- モーダルウィンドウ ここまで-->


    <!-- モーダルウィンドウ(反対)-->
    <div id="modal_cons">
        <div
            class="modal-background"
            style="background-color:rgba(0,0,0,0.5)"
            @click="closeThemeModal">
        <!-- モーダルウィンドウの中身 -->
            <div class="modal-content" v-on:click.stop>
                <div class="modal-content-whole">
                    <div class="modal-content-title">
                        <h2 class="modal-content-title-name">意見を投稿する</h2>
                        <span @click="closeThemeModal" style="font-size: 2.25rem;"
                        onclick="document.getElementById('modal_cons').style.display = 'none';"
                        >×</span>
                    </div>

                    <form method="post" action="{{ url('claim') }}" >
                    @csrf
                        <!-- テーマ概要 -->
                        <div class="modal-content-margin">
                            <!-- なぜか、文章が最初から書けない＆placeholderが反映していない -->
                            <textarea
                                name="content" 
                                placeholder="あなたの意見を記述する" 
                                cols="20" rows="5" 
                                type="text" 
                                class="modal-content-input"
                                ></textarea>
                        </div>
                        
                        <div class="modal-form">
                            <button
                                class="modal-form-btn"
                                @click="addTheme"
                            >意見を投稿する
                            </button>
                        </div>
                        <input type="hidden"  name="claim_flag" value="1">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- モーダルウィンドウ ここまで-->




@endsection