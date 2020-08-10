<!-- @extends('layout.layout_discuss') -->
@section('content')
    <form method="post" action="{{ route('claims_create') }}" enctype="multipart/form-data">
    @csrf
        <div class="form">
            <div class="form-content">
                <label for="content" class="form-content">内容</label> 
                <textarea class="" name="content" cols="50" rows="10">{{ old('content') }}</textarea>        
            </div>

            <div class="form-submit">
                <button type="submit">投稿する</button>
            </div>
        </div>
    </form>
@endsection