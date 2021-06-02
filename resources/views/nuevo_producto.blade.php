@extends('layouts.base')
@section('products')

    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-lg-4 col-md-8 col-sm-8 fondos_targetas rounded dissenyBorders ">
            <form class="register" name="nueva_entrada" method="post" enctype="multipart/form-data">
                @csrf
                <h3 class="mb-2 display-4 ">Crear Proucto</h3>
                <div>
                    <label>Nombre producto:</label>
                    <input type="text" id="name" name="name" value='{{ old('name') }}' />
                    @error('name')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>precio:</label>
                    <input type="text" id="price" name="price" value='{{ old('price') }}' />
                    @error(' price') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>stock:</label>
                    <input type="text" id="stock" name="stock" value='{{ old('stock') }}' />
                    @error(' stock') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>precio:</label>
                    <input type="text" id="descripcio" name="descripcio"
                        value='{{ old('descripcio') }}' />
                    @error(' descripcio') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>

                <div>
                    <label for="file">File</label>
                    <input type="file" id="file" name="file" value="{{ old('file') }}" />

                </div>


                <input class="btn btn-danger mb-2" type="submit" value="crear" id="submit" name="submit" />
            </form>
        </div>
    </div>
@endsection
