@extends('layouts.base')
@section('products')

    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-lg-8 col-md-8 col-sm-8 bg-danger rounded dissenyBorders ">
            <form class="register" name="nueva_entrada" method="post">
                @csrf
                <h3 class="mb-2 display-4 ">Nueva Entrada</h3>
                <div>
                    <label>Titulo Noticia:</label>
                    <input type="text" id="titulo_noticia" name="titulo_noticia" value="{{ old('titulo_noticia') }}" />
                    @error('titulo_noticia')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Descripcion Corta:</label>
                    <textarea type="text" id="d_corta" name="d_short" value="{{ old('d_corta') }}"></textarea>
                    @error('d_short')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Descripcion Larga: </label>
                    <textarea class=" form-control form-control-sm " id="d_larga" name="d_larga" required
                        value="{{ old('content') }}"></textarea>
                </div>
                <div>
                    <label for="file">File</label>
                    <input type="file" id="file" name="file" />
                    @error('file')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>


                <input class="btn btn-info btn-mg mb-2" type="submit" value="crear" id="submit" name="submit" />
            </form>
        </div>
    </div>
@endsection
