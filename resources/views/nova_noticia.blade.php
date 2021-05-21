@extends('layouts.base')
@section('products')

<div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
    <div class="col-lg-8">
        <form class="register" name="nueva_entrada" method="post">
            @csrf
            <h1 >Nueva Entrada</h1>
            <div>
                <label>Titulo Noticia:</label>
                <input type="text" id="titulo_noticia" name="titulo_noticia" required value="{{ old('title') }}"/>
            </div>
            <div>
                <label>Descripcion Corta:</label>
                <textarea type="text" id="d_corta" name="d_short" required value="{{ old('d_short') }}"></textarea>
            </div>
            <div class="form-group" >
                <label>Descripcion Larga: </label>
                <textarea  class=" form-control form-control-sm " id="content" name="content" required value="{{ old('content') }}"></textarea>
            </div>
            <div>
                <label for="file">File</label>
                <input type="file"  id="file" name="file" required />
            </div>


            <input class=" btn btn-danger" type="submit" value="Register" id="submit" name="submit" />
            <p> <a href="/login" class="linkform">You have an account already? Log in here</a></p>
        </form>
    </div>
</div>
@endsection
