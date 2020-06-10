@extends('layouts.default')

@section( 'title, $title' )

@section( 'content' )
    <h1>{{ $title }}</h1>
    {{-- ここはbladeのコメントです。出力時には無視されます。 --}}
    <!-- HTMLのコメントは普通に出力されます。 -->

    <p> $numの値は、{{ $num }}です。 </p>

    @if( $num > 5 )

        <p> 5より大きいです。 </p>

    @endif

    @if( $num > 15 )

        <p> 15より大きいです。 </p>

    @endif

    <ul>
        @forelse( $messages as $message )
            <li> {{ $message->name }}： {{ $message->body }} {{ $message->created_at }} </li>

            @empty
                <li> メッセージはありません。 </li>

        @endforelse
    </ul>
@endsection
