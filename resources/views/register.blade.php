@extends('layouts.base')
@section('home')
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 fondos_targetas rounded dissenyBorders">
            <form class="register" name="register" method="post">
                @csrf
                <h3 class="display-4 mb-2">Register</h3>
                <div>
                    <label>DNI:</label>
                    <input class="dni" type="text" id="dni" name="dni" required value="{{ old('dni') }}" />
                </div>
                <div>
                    <label>First Name:</label>
                    <input class="name" type="text" id="name" name="name" required value="{{ old('name') }}" />
                </div>
                <div>
                    <label>Last Name:</label>
                    <input class="lastname" type="text" id="lastname" name="lastname" required
                        value="{{ old('lastname') }}" />
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" id="email" name="email" required value="{{ old('email') }}" />
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" id="passwd" name="passwd" required />
                </div>
                <div>
                    <label>Repeat Password:</label>
                    <input type="password" id="passwd2" name="passwd2" required />
                </div>
                <div>
                    <label>Data nacimiento:</label>
                    <input type="date" id="datanac" name="datanac" required value="{{ old('datanac') }}" />
                </div>
                <div>
                    <label>Codigo Postal:</label>
                    <input type="text" id="C_postal" name="C_postal" required value='{{ old('C_postal') }}' />
                </div>
                <div>
                    <label>Poblacion:</label>
                    <input type="text" id="Poblacion" name="Poblacion" required value='{{ old('Poblacion') }}' />
                </div>
                <div>

                    <input class="btn btn-danger" type="submit" value="Register" id="submit" name="submit" />
                    <p> <a href="/login" class="linkform text-dark">You have an account already? Log in here</a></p>
            </form>
        </div>
    </div>

@endsection
