@extends('layouts.base')
@section('products')
    <div class="col-lg-6 d-flex justify-content-center mt-3 mb-3 mx-auto">
        <div class="col-md-7 dissenyBorders" style="height: 200px">
            <h2 class="featurette-heading mt-5">
                {{ $race->name }}
            </h2>
            <p class="text-muted col-md-12">
                {{ $race->descripcion }}
            </p>
            <div class="row">
                <p class="lead col-md-6">
                    {{ $race->distance }} km
                </p>
                <p class="lead col-md-6">
                    @foreach ($segments as $segment)
                        {{ $segment }}
                    @endforeach
                </p>

            </div>
        </div>
        <div class="col-md-5 p-0">
            <img style="height: 200px" src="{{ Storage::url($race->image) }}">
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
