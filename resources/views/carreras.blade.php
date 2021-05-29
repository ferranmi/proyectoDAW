@extends('layouts.base')
@section('products')

    @foreach ($races as $race)
        <div class="col-lg-10 d-flex justify-content-center  mt-3 mb-3  mx-auto" style="background-color: rgba(241, 145, 145, 0.5);">
            <div class="col-md-8">
                <h2 class="featurette-heading"> <a href="carreras/{{ $race->id }}">
                        {{ $race->name }}
                    </a></h2>
                <p class="lead">
                    {{ $race->distance }}
                </p>
                <div class="col-md-4"> <img style="width: auto;" src="{{ Storage::url($race->image) }}"> </div>
            </div>
        </div>




    @endforeach


    <div class="col-lg-12 justify-content-center d-flex ">
        {{ $races->links() }}
    </div>

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        {{-- @if ($admin == true) --}}
        <p>
            <a class="btn btn-danger btn-mg" href="/nova_carrera"> Crea una carrera </a>
        </p>
        {{-- @endif --}}

    </div>




@endsection
