@extends('layouts.base')
@section('products')
    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-md-8">
            <h2 class="featurette-heading col-md-12">
                {{ $race->name }}
            </h2>
            <p class="text-muted col-md-12">
                {{ $race->descripcion }}
            </p>
            <div class="row">
                <p class="lead col-md-6">
                    {{ $race->distance }}
                </p>
                <p class="lead col-md-6">
                    @foreach ($segments as $segment)
                        {{ $segment }}
                    @endforeach
                </p>
                <div class="col-md-6">
                    <img src="{{ Storage::url($race->image) }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-2 ">
        <p>
            <a class="btn btn-danger btn-mg" href="/inscripciones/{{ $race->id}}"> Inscripcion </a>
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
