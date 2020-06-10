@extends( 'layouts.default' )

@section( 'title, $title' )

@section( 'content' )
    <h1>Messageモデルの利用</h1>
    <p>
        {{ $message->name }}:
        {{ $message->body }}
    </p>
@endsection
