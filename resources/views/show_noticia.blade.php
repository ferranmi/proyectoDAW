
@extends('layouts.base')
@section('products')

<div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
    <div class="col-md-8">
        <p><h2 class="featurette-heading col-md-12">
                {{ $news->title }}
        </h2></p>
        <p class="text-muted col-md-12"> {{ $news->d_short }} </p>
        <div class="row">
            <p class="lead col-md-6" > {{ $news->content }} </p>
            <div class="col-md-6"> <img src="{{Storage::url($news->image)}}"> </div>
        </div>
        <p class="lead col-md-12"> {{ $news->commentaries }} </p>
    </div>
</div>






<div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">

    <p>
        <a  class="btn btn-danger btn-mg" href="/noticias/{{$news->code}}/edit">  Editar noticia  </a>
    </p>


</div>

@endsection
