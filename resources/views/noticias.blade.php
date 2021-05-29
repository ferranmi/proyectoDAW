@extends('layouts.base')
@section('products')
    @foreach ($news as $new)

        <div class="col-lg-4 mt-3">
            <div class="row featurette dissenyBorders ">
                <div class="col-md-7  bg-danger  text-align-center  ">
                    <h2 class="featurette-heading"> <a href="noticias/{{ $new->code }}">
                            titulo: {{ $new->title }}
                        </a></h2>
                    <span class="text-muted"> contenido: {{ $new->d_short }} </span>
                </div>
                <div class="col-md-5"> <img style="width: auto;" src="{{ Storage::url($new->image) }}"> </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        {{-- @if ($admin == true) --}}
            <p>
                <a class="btn btn-danger btn-mg" href="/nova_noticia"> Crea una noticia </a>
            </p>
    {{--     @endif --}}

    </div>
    <div class="col-lg-12 justify-content-center d-flex ">
        {{ $news->links() }}
    </div>
@endsection
