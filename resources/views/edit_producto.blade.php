@extends('layouts.base')
@section('products')

    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-lg-8">
            <form class="register" name="update_entrada" method="post" enctype="multipart/form-data"
                action="/productos/{{ $productos->id }}">
                @csrf
                @method('PUT')

                <h1>Editar producto</h1>
                <div>
                    <label>Nombre producto:</label>
                    <input type="text" id="name" name="name" value='{{ old('name', $productos->name) }}' />
                    @error('name')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>precio:</label>
                    <input type="text" id="price" name="price" value='{{ old('price', $productos->price) }}' />
                    @error(' price') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>stock:</label>
                    <input type="text" id="stock" name="stock" value='{{ old('stock', $productos->stock) }}' />
                    @error(' stock') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>precio:</label>
                    <input type="text" id="descripcio" name="descripcio"
                        value='{{ old('descripcio', $productos->descripcio) }}' />
                    @error(' descripcio') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>

                <div>
                    <label for="file">File</label>
                    <input type="file" id="file" name="file" value="{{ old('file', $productos->image) }}" />

                </div>
                <input class=" btn btn-danger" type="submit" value="Actualizar" id="submit" name="submit" />
            </form>

        </div>

    </div>

@endsection
