@extends('layouts.base')

@section('products')

    <form class="access" name="access" method="post">
        @csrf
        <h3>Login</h3>
        <div>
            <label>email:</label>
            <input type="text" id="email" name="email" required />
        </div>
        <div>
            <label>Password:</label>
            <input type="password" id="passwd_login" name="passwd" required />
        </div>
        <input type="submit" value="Login" id="submit_login" name="submit"></input>
        <a href="/register" rel="register" class="linkform">You don't have an account yet? Register here</a>
    </form>
@endsection
