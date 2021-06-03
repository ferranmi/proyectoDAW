@extends('layouts.base')
@section('home')

    <div class="col-lg-12 d-flex justify-content-center mt-3 mb-3">
        <div class="col-lg-3 fondos_targetas dissenyBorders">
            <form class="register" name="update_entrada" method="post" enctype="multipart/form-data"
                action="/carreras/{{ $race->id }}">
                @csrf
                @method('PUT')
                <h3>Editar Carrera</h3>
                <div>
                    <label>Titulo Carrera:</label>
                    <input type="text" id="name" name="name" value='{{ old('name', $race->name) }}' />
                    @error('name')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Descripcion:</label>
                    <textarea type="text" id="descripcion"
                        name="descripcion">{{ old('descripcion', $race->descripcion) }}</textarea>
                    @error(' descripcion') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Distancia: </label>
                    <input type="text" id="distance" name="distance" value='{{ old('distance', $race->distance) }}' />
                    @error('distance')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Hora de salida: </label>
                    <input type="datetime-local" id="time_start" name="time_start"
                        value="{{ old('time_start', $race->time_start) }}">
                    @error('time_start')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label for="file">File</label>
                    <input type="file" id="file" name="file" value="{{ old('file', $race->image) }}" />
                    @error('file')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <input class=" btn btn-danger mb-2" type="submit" value="Actualizar" id="submit" name="submit" />
            </form>
        </div>
    </div>
@endsection
