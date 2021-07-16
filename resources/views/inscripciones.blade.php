@extends('layouts.base')
@section('home')


    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 fondos_targetas rounded dissenyBorders">
            <form class="register" name="register" method="post">
                @csrf
                <h3 class="display-4 mb-2">Inscripcio Cursa</h3>
                <div>
                    <label>DNI:</label>
                    <input type="text" id="dni" name="dni" disabled="disabled" required
                        value='{{ old('dni', session('user')->dni) }}' />
                </div>
                <div>
                    <label>Nombre:</label>
                    <input class="name" type="text" id="name" name="name" disabled="disabled" required
                        value='{{ old('name', session('user')->firstname) }}' />
                </div>
                <div>
                    <label>Apellido:</label>
                    <input type=" text" id="lastname" name="lastname" disabled="disabled" required
                        value='{{ old('lastname', session('user')->lastname) }}' />
                </div>
                <div>
                    <label>Email:</label>
                    <input type=" text" id="email" name="email" disabled="disabled" required
                        value='{{ old('email', session('user')->email) }}' />
                </div>
                <div>
                    <label>Codigo Postal:</label>
                    <input type="text" id="C_postal" name="C_postal" disabled="disabled" required
                        value='{{ old('C_postal', session('user')->C_postal) }}' />
                </div>
                <div>
                    <label>Poblacion:</label>
                    <input type="text" id="Poblacion" name="Poblacion" disabled="disabled" required
                        value='{{ old('Poblacion', session('user')->Poblacion) }}' />
                </div>
                <div>
                    <label>Nombre carrera:</label>
                    <input type="text" id="Poblacion" name="Poblacion" disabled="disabled" required
                        value='{{ $g_carrera->name }}' />
                </div>
                <div>
                    <label>Data nacimiento:</label>
                    <input type="date" id="datanac" name="datanac" required
                        value='{{ old('datanac', session('user')->datanac) }}' />
                </div>
                <div>
                    <input class="btn btn-danger mb-2" type="submit" value="Enviar" id="submit" name="submit" />
                    <input type="hidden" id="carrera" name="carrera" value="{{ $g_carrera->id }}">
                </div>
            </form>
        </div>
    </div>

@endsection
