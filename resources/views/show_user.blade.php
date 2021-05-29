@extends('layouts.base')
@section('products')
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 bg-danger rounded dissenyBorders">
            <h3>Informacion del usuario:</h3>
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
                        <button type="submit" class="btn-info" value="editar">Editar usuario</button>
                    </a>
                </p>
            </div>
        </div>

    @endsection
