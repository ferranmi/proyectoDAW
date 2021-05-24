@extends('layouts.base');
@section('products')
    @foreach ($news as $new)
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading"> <a href="noticias/{{ $new->code }}">
                        titulo: {{ $new->title }}

                    </a></h2>
                <span class="text-muted"> contenido: {{ $new->content }} </span>
                <p class="lead"> comentarios: {{ $new->commentaries }} </p>
                <div class="col-md-5"> imatge: {{ $new->image }} </div>

    @endforeach


    <div class="col-lg-12  justify-content-center d-flex ">
        {{ $news->links() }}
    </div>

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">

        <p> <a class="btn btn-danger btn-mg" href="/nova_noticia"> Crea una noticia </a>
        </p>


    </div>

@endsection
