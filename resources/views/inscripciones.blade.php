@extends('layouts.base')
@section('products')

{{session("user")}}
<div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
    <div class=" col-lg-4 bg-danger rounded dissenyBorders">
        <form class="register" name="register" method="post">
            @csrf
            <h3 class="display-4 mb-2">Incripcio Cursa</h3>
            <div>
                <label>DNI:</label>
                <input type="text" id="dni" name="dni" required value='{{ old('dni', session("user")->dni) }}' />
            </div>
            <div>
                <label>Nombre:</label>
                <input class="name" type="text" id="name" name="name" required value='{{ old('name', session("user")->name) }}'" />
            </div>
            <div>
                <label>Apellido:</label>
                <input type="text" id="lastname" name="lastname" required value='{{ old('lastname', session("user")->lastname) }}'" />
            </div>
            <div>
                <label>Email:</label>
                <input type="text" id="email" name="email" required value='{{ old('email', session("user")->email) }}' />
            </div>
            <div>
                <label>Codigo Postal:</label>
                <input type="text" id="C_postal" name="C_postal" required value='{{ old('C_postal', session("user")->C_postal) }}' />
            </div>
            <div>
                <label>Poblacion:</label>
                <input type="text" id="Poblacion" name="Poblacion" required value='{{ old('Poblacion', session("user")->Poblacion) }}' />
            </div>
            <div>
                <label>Nombre carrera:</label>
                <input type="text" id="Poblacion" name="Poblacion" disabled="disabled" required value='{{ $g_carrera->name }}' />
            </div>

            <div>
                <label>Data nacimiento:</label>
                <input type="date" id="datanac" name="datanac" required value='{{ old('datanac', session("user")->datanac) }}' />
            </div>
            <div>
            <input class="btn btn-info btn-mg mb-2" type="submit" value="Enviar" id="submit" name="submit" />
            <input type="hidden" id="carrera" name="carrera" value="{{ $g_carrera->id }}" >
        </form>
    </div>
</div>

@endsection
