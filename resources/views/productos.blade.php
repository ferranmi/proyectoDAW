@extends('layouts.base');
@section('home')
    @foreach ($productos as $producto)
        <div class="col-lg-3 mb-3 mt-5">
            <div class="d-block card mb-3 box-shadow targetas-products mx-auto fondos_targetas ">
                <img class="card-img-top" style="height: 225px; width: 100%; display: block;"
                    src="{{ Storage::url($producto->image) }}">
                <div class="card-body">
                    <h4 class="featurette-heading"> <a href="productos/{{ $producto->code }}">
                            {{ $producto->name }}
                        </a></h4>
                    <span class="text-muted"> {{ $producto->price }}€ </span>
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
    <div class="col-lg-12  justify-content-center d-flex mb-2 ">
        {{ $productos->links() }}
    </div>
@endsection
