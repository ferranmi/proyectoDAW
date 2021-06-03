@extends('layouts.base')
@section('home')
    <div class="col-lg-4 mx-auto mt-2">
        <div class="row featurette dissenyBorders">
            <img style="height:275px; width: 100% " src=" {{ Storage::url($race->image) }}">
            <h2 class="featurette-heading col-lg-12">
                {{ $race->name }}
            </h2>
            <p class="text-muted col-lg-12">
                {{ $race->descripcion }}
            </p>
            <p class="col-lg-12">
                {{ $race->distance }} km
            </p>
            <p class="col-lg-12">
                @foreach ($segments as $segment)
                    {{ $segment }}
                @endforeach
            </p>

        </div>

    </div>

    <div class="col-lg-12 justify-content-center d-flex  mt-2 mb-2 ">
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
