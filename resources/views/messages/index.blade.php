@extends( 'layouts.default' )

@section( 'title', $title )

@section( 'content' )

    <h1> {{ $title }} </h1>

    <p> 現在のログインユーザー名： {{ Auth::user()->name }} </p>

    <form action = "{{ url('/logout') }}" method = "post">
        {{ csrf_field() }}
        <button type = "submit"> ログアウト </button>
    </form>

    <!-- エラーの表示 -->
    @foreach( $errors->all() as $error )
        <p class = "error"> {{ $error }} </p>
    @endforeach

    <!-- 以下にフォームを追記します -->

    <form method = "post" action = "{{ url( '/messages' ) }}" enctype = "multipart/form-data">
        <!-- CSRF対策の1文（必ず記述すること！）-->
        {{ csrf_field() }}

        <!-- 名前の入力 -->
        <!-- <div>
            <label>
                名前： <input type = "text" name = "name" class = "name_field" placeholder = "お名前を入力">
            </label>
        </div> -->

        <!-- コメントの入力 -->
        <div>
            <label>
                コメント： <input type = "body" name = "body" class = "comment_field" placeholder = "コメントを入力">
            </label>
        </div>

        <!-- 画像の追加 -->
        <div>
            <label>
                画像： <input type = "file" name = "image">
            </label>
        </div>

        <!-- 投稿 -->
        <div>
            <input type = "submit" value = "投稿">
        </div>
    </form>

    <ul>
        @forelse( $messages as $message )
            <li>
                @if ($message->image !== '')
                    <img src = "{{ asset('storage/photos/' . $message->image) }}">
                    <br>
                @endif
                {{ $message->name }}： {{ $message->body }} {{ $message->created_at }}</li>

            @empty
                <li> メッセージはありません </li>
        @endforelse
    </ul>
@endsection
