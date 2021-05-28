@extends('layouts.base');
@section('products')
    @foreach ($productos as $producto)

        <div class="col-lg-4 mt-3">
            <div class="row featurette dissenyBorders ">
                <div class="col-md-7  bg-danger  text-align-center  ">
                    <h2 class="featurette-heading"> <a href="productos/{{ $producto->code }}">
                            titulo: {{ $producto->name }}
                        </a></h2>
                    <span class="text-muted"> precio: {{ $producto->price }} </span>
                </div>
                <div class="col-md-5"> <img style="width: auto;" src="{{ Storage::url($producto->image) }}">
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-danger btn-mg" href="/nuevo_producto"> Crea un producto </a>
            </p>
        @endif

    </div>
    <div class="col-lg-12  justify-content-center d-flex ">
        {{ $productos->links() }}
    </div>
@endsection
