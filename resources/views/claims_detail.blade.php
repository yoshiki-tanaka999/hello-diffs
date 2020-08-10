<!-- @extends('layout.layout_discuss') -->

@section('cliams_pros')

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <p>詳細内容：{{ $content }}</p>
        @endforeach
    @endif

@endsection