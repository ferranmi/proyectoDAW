@extends('layouts.base')
@section('home')

    @foreach ($races as $race)
        <div class="col-lg-7 mt-3 mx-auto">
            <div class=" row featurette dissenyBorders">
                <div class="col-lg-4 mt-5">
                    <h2 class="featurette-heading"> <a href="carreras/{{ $race->id }}">
                            {{ $race->name }}
                        </a></h2>
                    <p class="text-dark col-md-12">
                        {{ $race->distance }}km
                    </p>
                </div>
                <div class="col-lg-8 col-md-5 d-lg-block d-none p-0 m-0"> <img style="height: 200px; width: 100%"
                        src="{{ Storage::url($race->image) }}">
                </div>
            </div>
        </div>

    @endforeach


    <div class="col-lg-12 justify-content-center d-flex ">
        {{ $races->links() }}
    </div>

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-danger btn-mg" href="/nova_carrera"> Crea una carrera </a>
            </p>
        @endif

    </div>




@endsection
