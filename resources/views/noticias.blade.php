@extends('layouts.base');
@section('products')
    <ul>
        @foreach ($news as $new)
            <li>
                <a href="noticias/{{ $new->code }}">
                    {{ $new->title }}
                </a>
            </li>

        @endforeach
    </ul>

    {{ $news->links() }}
@endsection
