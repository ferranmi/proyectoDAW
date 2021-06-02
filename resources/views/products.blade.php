@extends('layouts.base')
@section('products')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- <img class="hola" src="/images/nature2.jpg" />-->
        <div class="row">
            @foreach ($races as $races)
                <div class="col-lg-4 p-0 d-flex justify-content-between col-md-12 col-sm-12 card flex-md-row mb-3 div-products-targetas mx-auto"
                    style="height: 15em">
                    <div class=" card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0 text-primary"> {{ $races->name }} </h3>
                        <p class=" mb-1 text-dark"> {{ $races->time_start }}</p>
                        <p class="card-text mb-auto text-primary "> {{ $races->descripcion }} </p>
                        <p> {{ $races->distance }} km </p>

                        <a href="/carreras/{{ $races->id }}">Continue reading</a>
                    </div>
                    <img class=" card-img-right flex-auto d-none d-md-block" src="{{ Storage::url($races->image) }}"
                        data-holder-rendered="true">
                </div>

            @endforeach
        </div>

    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
        <div class="row">
            @foreach ($news as $new)
                <div class="col-lg-3 mb-3">
                    <div class="d-block card mb-3 box-shadow targetas-products mx-auto ">
                        <a href="/noticias/{{ $new->id }}">
                            <img class="card-img-top" style="height: 225px; width: 100%; display: block;"
                                src="{{ Storage::url($new->image) }}">
                            <div class="card-body">
                                <p class="card-text"> {{ $new->title }} </p>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
