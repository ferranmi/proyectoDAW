@extends('layouts.base')
@section('products')
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 bg-danger rounded dissenyBorders">
            <form class="update" name="update" method="post">
                @csrf
                <h3 class="display-4 mb-2">Crear usuario</h3>
                <div>
                    <label>DNI:</label>
                    <input type="text" id="dni" name="dni"  value="{{ old('dni') }}" />
                    @error(' dni') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>First Name:</label>
                    <input class="name" type="text" id="name" name="name"  value="{{ old('name') }}" />
                    @error(' name') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Last Name:</label>
                    <input type="text" id="lastname" name="lastname"  value="{{ old('lastname') }}" />
                    @error(' lastname') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" id="email" name="email"  value="{{ old('email') }}" />
                    @error(' email') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" id="passwd" name="passwd" />
                </div>
                <div>
                    <label>Repeat password:</label>
                    <input type="password" id="passwd2" name="passwd2" />
                </div>
                <div>
                    <label>Data nacimiento:</label>
                    <input type="date" id="datanac" name="datanac"  value="{{ old('datanac') }}" />
                    @error(' datanac') <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>

                @if (session()->has('user'))
                    @if (!empty(session('user')))

                        @if (session('user')->type_user == 'A')
                            <div>
                                <label>Tipo de usuario: </label>
                                <select name="type" id="type">
                                    <option value="C">Cliente</option>
                                    <option value="A">Administrador</option>
                                </select>
                            </div>
                        @endif
                    @endif
                @endif

                <div>
                    <input class="btn btn-info btn-mg" type="submit" value="Crear usuario" id="submit" name="submit" />
            </form>
        </div>
    </div>

@endsection
