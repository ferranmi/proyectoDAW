@extends('layouts.base')
@section('products')
    <div class="col-lg-5 mt-3 d-flex justify-content-center mx-auto">
        <div class="row featurette dissenyBorders">
            <div class="col-lg-7">
                <h2 class="featurette-heading">
                    {{ $race->name }}
                </h2>
                <p class="text-muted">
                    {{ $race->descripcion }}
                </p>
                <p class="lead ">
                    {{ $race->distance }} km
                </p>
                <p class="lead">
                    @foreach ($segments as $segment)
                        {{ $segment }}
                    @endforeach
                </p>
            </div>
            <div class="col-lg-5 col-md-5 d-lg-block d-none p-0">
                <img style="height:200px;" src=" {{ Storage::url($race->image) }}">
            </div>
        </div>

    </div>

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-2 ">
        <p>
            <a class="btn btn-danger btn-mg" href="/inscripciones/{{ $race->id }}"> Inscripcion </a>
        </p>
    </div>
    <div class="col-lg-12  justify-content-center d-flex  mb-2 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-success btn-mg" href="/carreras/{{ $race->id }}/edit"> Editar carrera </a>
                <a class="btn btn-danger btn-mg" href="/delete_carreras/{{ $race->id }}"> Eliminar carrera </a>
            </p>
        @endif
    </div>
@endsection
