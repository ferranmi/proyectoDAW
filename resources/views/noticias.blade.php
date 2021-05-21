
@extends('layouts.base')
@section('products')

@foreach ($news as $new)
<div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
    <div class="col-md-8">
        <h2 class="featurette-heading"> <a href="noticias/{{ $new->code }}">
                {{ $new->title }}
            </a></h2>
        <span class="text-muted"> {{ $new->content }} </span>
        <p class="lead"> {{ $new->commentaries }} </p>
        <div class="col-md-5"> {{ $new->image }} </div>
    </div>
</div>

    @endforeach





<div class="col-lg-12  justify-content-center d-flex ">
    {{$news->links() }}
</div>

<div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">

    <p> <a  class="btn btn-danger btn-mg" href="/nova_noticia">  Crea una noticia  </a>
    </p>


</div>

@endsection
