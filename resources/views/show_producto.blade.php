@extends('layouts.base')
@section('products')
    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-md-8">
            <p>
            <h2 class="featurette-heading col-md-12">
                {{ $productos->name }}
            </h2>
            </p>
            <p class="text-muted col-md-12">
                {{ $productos->price }}
            </p>
            <div class="row">
                <p class="lead col-md-6">
                    {{ $productos->stock }}
                </p>
                <div class="col-md-6">
                    <img src="{{ Storage::url($productos->image) }}">
                </div>
            </div>
            <p class="lead col-md-12"> {{ $productos->descripcio }} </p>
        </div>
    </div>

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-success btn-mg" href="/productos/{{ $productos->code }}/edit"> Editar noticia </a>
                <a class="btn btn-danger btn-mg" href="/delete_productos/{{ $productos->code }}"> Eliminar noticia </a>
            </p>
        @endif

    </div>

@endsection
