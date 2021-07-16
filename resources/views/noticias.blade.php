@extends('layouts.base')
@section('home')
    @foreach ($news as $new)
        <div class="col-lg-5 mt-3 d-flex justify-content-center align-items-center mx-auto">
            <div class=" row featurette dissenyBorders">
                <div class=" col-lg-7  mt-5">
                    <h2 class="featurette-heading"> <a href="noticias/{{ $new->id }}">
                            {{ $new->title }}
                        </a></h2>
                    <span class="text-muted"> {{ $new->d_short }} </span>
                </div>
                <div class="col-lg-5 col-md-5 d-lg-block d-none p-0"> <img style="height: 200px;"
                        src="{{ Storage::url($new->image) }}"> </div>
            </div>
        </div>
    @endforeach
    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4">
        @if ($admin == true)
            <p>
                <a class="btn btn-danger btn-mg" href="/nova_noticia"> Crea una noticia </a>
            </p>
        @endif

    </div>
    <div class="col-lg-12 justify-content-center d-flex ">
        {{ $news->links() }}
    </div>
@endsection
