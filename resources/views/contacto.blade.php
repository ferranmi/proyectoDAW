@extends('layouts.base')

@section('content')
    <form class="register" name="register" method="post">
        @csrf
        <h3>Register</h3>
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
        <input type="submit" value="Enviar" id="submit" name="submit" />
    </form>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.1368376191117!2d2.020867815288395!3d41.349379379267596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49b79bbb7b6a5%3A0x58d4d335637bcc86!2sInstitut%20P%C3%BAblic%20Marianao!5e0!3m2!1sca!2ses!4v1620840914797!5m2!1sca!2ses"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br>
    Telefon:999999999<br>
    Email: admin@trialrunningworld.es<br>
    Adreça: Passeig de les Mimoses, 18, 08830 Sant Boi de Llobregat, Barcelona

@endsection
