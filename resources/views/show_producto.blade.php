@extends('layouts.base')
@section('home')
    <div class="col-lg-4 mt-5 mx-auto">
        <div class=" row featurette dissenyBorders">
            <div class="col-lg-7">
                <p>
                <h3 class="featurette-heading col-md-12">
                    {{ $productos->name }}
                </h3>
                </p>
                <p class="text-muted col-md-12">
                    {{ $productos->price }}€
                </p>
                <div class="row">
                    <p class="lead col-md-12">
                        Cantidad: {{ $productos->stock }}
                    </p>
                </div>

                <p class="lead col-md-12"> {{ $productos->descripcio }} </p>


            </div>
            <div class="col-md-5 p-0">
                <img style="height: 200px;" src="{{ Storage::url($productos->image) }}">
            </div>

        </div>

    </div>
    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-2 ">
        <p>
            <a class="btn btn-danger btn-mg" href="/compras/{{ $productos->id }}"> Comprar </a>
        </p>
    </div>
    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-success btn-mg" href="/productos/{{ $productos->code }}/edit"> Editar producto </a>
                <a class="btn btn-danger btn-mg" href="/delete_productos/{{ $productos->code }}"> Eliminar producto </a>
            </p>
        @endif

    </div>

@endsection
