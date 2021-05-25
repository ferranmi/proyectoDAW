@extends('layouts.base')

@section('products')
<div class="container">
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4  bg-danger rounded dissenyForms">
            <form class="contact" name="contact" method="post">
                @csrf
                <h3 class="mb-2 display-4">Contacto</h3>
                <div>
                    <label>First Name:</label>
                    <input type="text" id="name" name="name" maxlength="30" />
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" id="email" name="email" maxlength="50" />
                </div>

                <div>
                    <label>Asunto:</label>
                    <input type="text" id="asunto" name="asunto" maxlength="30" />
                </div>
                <div>
                    <label>Comentario:</label>
                    <input type="textarea" id="textarea" name="textarea" maxlength="200" />
                </div>
                <input class="mb-2" type="submit" value="Enviar" id="submit" name="submit" />
            </form>
        </div>
    </div>
</div>
@endsection
