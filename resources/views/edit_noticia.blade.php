@extends('layouts.base')
@section('products')

    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-lg-8">
            <form class="register" name="update_entrada" method="post" enctype="multipart/form-data"
                action="/noticias/{{ $news->id }}">
                @csrf
                @method('PUT')


                <h1>Nueva Entrada</h1>
                <div>
                    <label>Titulo Noticia:</label>
                    <input type="text" id="titulo_noticia" name="titulo_noticia"
                        value='{{ old('titulo_noticia', $news->title) }}' />
                    @error('titulo_noticia')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Descripcion Corta:</label>
                    <textarea type="text" id="d_corta" name="d_short">{{ old('d_corta', $news->d_short) }}</textarea>
                    @error(' d_short') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Descripcion Larga: </label>
                    <textarea class=" form-control form-control-sm " id="content"
                        name="content">{{ old('content', $news->content) }}</textarea>
                    @error('content')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label for="file">File</label>
                    <input type="file" id="file" name="file" value="{{ old('file', $news->image) }}" />
                    @error('file')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>


                <input class=" btn btn-danger" type="submit" value="Actualizar" id="submit" name="submit" />
            </form>
        </div>
    </div>
@endsection
