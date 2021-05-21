@extends('layouts.base')
@section('products')
    <div class="container">
        <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
            <div class=" col-lg-4 border border-info bg-danger rounded" style="width: 60px; height: 220px;">
                <form class="access" name="access" method="post">
                    @csrf
                    <h3 class="mb-2 display-4">Login</h3>
                    <div>
                        <label>Email: </label>
                        <input type="text" id="email" name="email" placeholder=" Mail " required/>
                    </div>
                    <div>
                        <label>Passwd: </label>
                        <input type="password" id="passwd_login" name="passwd"  placeholder="Contraseña" required/>
                    </div>
                    <input class="btn btn-info btn-mg" type="submit" value="Login" id="submit_login" name="submit"></input>
                    <p>   <a href="/register" rel="register" class="linkform">You don't have an account yet? Register here</a>    </p>
                </form>
            </div>
        </div>
    </div>

@endsection
