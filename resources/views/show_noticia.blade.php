@extends('layouts.base')
@section('products')
    <div class="col-lg-7 mt-3 mb-3 mx-auto row">

        <div class="col-lg-12  justify-content-center dissenyBorders">
            <p>
            <h3 class="featurette-heading col-md-12">
                {{ $news->title }}
            </h3>
            </p>
            <div class="justify-content-center mx-auto">

                <p class="lead">
                    {{ $news->content }}
                </p>
            </div>
            <div class="col-lg-12 d-flex justify-content-center mb-2  ">
                <img src="{{ Storage::url($news->image) }}">
            </div>
        </div>

    </div>

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-success btn-mg" href="/noticias/{{ $news->id }}/edit"> Editar noticia </a>
                <a class="btn btn-danger btn-mg" href="/delete_noticias/{{ $news->code }}"> Eliminar noticia </a>
            </p>
        @endif
    </div>
@endsection
