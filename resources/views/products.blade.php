@extends('layouts.base')
@section('products')
    <img class="hola" src="/images/fondo_running.gif" />
    <div class="col-lg-12 d-flex mt-3">

        @foreach ($races as $races)

            <div class="col-lg-6">
                <div class="card flex-md-row mb-5 box-shadow h-md-250 div-products-targetas mx-auto">
                    <div class="card-body d-flex flex-column align-items-start  ">
                        <h3 class="mb-0"> {{ $races->name }} </h3>
                        <p class=" mb-1 text-muted"> {{ $races->time_start }}</p>
                        <p class="card-text mb-auto "> {{ $races->descripcion }} </p>
                        <p> {{ $races->distance }} </p>
                        <a href="/carreras/{{ $races->id }}">Continue reading</a>
                    </div>
                    <img class=" card-img-right flex-auto d-none d-md-block " style="width: 200px; height: 225px;"
                        src="{{ Storage::url($races->image) }}" data-holder-rendered="true">
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-lg-12 d-flex mt-5 mb-5">

        @foreach ($news as $new)
            <div class="col-lg-3">
                <a href="/noticias/{{ $new->code }}">
                    <div class="d-block card mb-3 box-shadow targetas-products mx-auto">
                        <img class="card-img-top"
                            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                            alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                            src="{{ Storage::url($new->image) }}"
                            data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text"> {{ $new->title }} </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach


    @endsection
