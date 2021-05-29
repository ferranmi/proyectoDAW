@extends('layouts.base')
@section('products')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <img class="hola" src="/images/fondo_running.gif" />
        <div class="row">
        @foreach ($races as $races)
            <div class="col-lg-4 p-0 d-flex justify-content-between col-md-12 col-sm-12 card flex-md-row mb-3 div-products-targetas mx-auto fondos_targetas" >
                    <div class="card-body d-flex flex-column align-items-start" >
                        <h3 class="mb-0 text-primary"> {{ $races->name }} </h3>
                        <p class=" mb-1 text-dark"> {{ $races->time_start }}</p>
                        <p class="card-text mb-auto text-primary "> {{ $races->descripcion }} </p>
                        <p> {{ $races->distance }} </p>

                        <a href="/carreras/{{ $races->id }}">Continue reading</a>
                    </div>
                    <img class=" card-img-right flex-auto d-none d-md-block"
                        src="./images/azores.jpg" data-holder-rendered="true">
              </div>

        @endforeach
    </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 d-flex mt-5 mb-5">
        <div class="row">
        @foreach ($news as $new)
            <div class="col-lg-3 mb-3">
                <div class="d-block card mb-3 box-shadow targetas-products mx-auto fondos_targetas ">
                    <img class="card-img-top"
                        data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                        alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                        src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_179665e1b58%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_179665e1b58%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                        data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text"> {{ $new->title }} </p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @endsection
