@extends('layouts.base')
@section('home')
    <div class="col-lg-12 mt-3 mb-5 d-flex justify-content-center">
        <div class="  col-lg-4 fondos_targetas dissenyBorders">
            <h3 class="mt-2">Informacion del usuario:</h3>
            <div>
                <label>DNI:</label> {{ session('user')->dni }}
            </div>
            <div>
                <label>First Name:</label>
                {{ session('user')->name }}
            </div>
            <div>
                <label>Last Name:</label>
                {{ session('user')->lastname }}
            </div>
            <div>
                <label>Email:</label>
                {{ session('user')->email }}
            </div>
            <div>
                <label>Data nacimiento:</label>
                {{ session('user')->birth_date }}
            </div>
            <div>
                <p>
                    <a href="/edit_user/{{ session('user')->id }}">
                        <button type="submit" class="btn btn-danger" value="editar">Editar usuario</button>
                    </a>
                </p>
            </div>
        </div>
    </div>

@endsection
