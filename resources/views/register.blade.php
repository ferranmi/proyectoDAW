@extends('layouts.base')
@section('products')
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 bg-danger rounded dissenyBorders">
            <form class="register" name="register" method="post">
                @csrf
                <h3 class="display-4 mb-2">Register</h3>
                <div>
                    <label>DNI:</label>
                    <input type="text" id="dni" name="dni" required value="{{ old('dni') }}" />
                </div>
                <div>
                    <label>First Name:</label>
                    <input class="name" type="text" id="name" name="name" required value="{{ old('name') }}" />
                </div>
                <div>
                    <label>Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required value="{{ old('lastname') }}" />
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
                <input class="btn btn-info btn-mg" type="submit" value="Register" id="submit" name="submit" />
                <p> <a href="/login" class="linkform">You have an account already? Log in here</a></p>
            </form>
        </div>
    </div>

    <script>
       /* $("#dni").blur(function() {
            valor = $("#dni").val();
            var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V',
            'H', 'L', 'C', 'K', 'E', 'T'];
            if(this.value !== ""){
                if (!(/^\d{8}[A-Z]$/.test(valor))) {
                trataError(this, "Dni incorrecte");
                return ;
            }

            if (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23]) {
                trataError(this, "Letra incorrecta")
                return ;
            }
            }else{
                trataError(this,"Rellena este campo")
            }

            trataCorrecto(this);
        })

        $("#name").blur(function() {
            console.log("hola")
            var correcto = true;
            if (this.value !== "") {
                //longitud debe ser mayor o igual a 3
                if (this.value.length < 3) {
                    correcto = false;
                    trataError(this, "Nombre no valido muy corto");
                    return ;
                }
                //No puede contener numeros
                if (correcto) {
                    for(var j = 0; j<this.value.length; j++ ){
                        if( !isNaN(parseInt(this.value[j]))  ){
                            correcto = false;
                            trataError(this,"No se permiten valores numericos") ;
                            return  ;
                        }
                    }
                }
            }else{
                trataError(this, "Rellena este campo")
            }
            trataCorrecto(this);
        })
        $("#lastname").blur(function() {
            console.log("hola")
            var correcto = true;
            if (this.value !== "") {
                if (correcto) {
                    for(var j = 0; j<this.value.length; j++ ){
                        if( !isNaN(parseInt(this.value[j]))  ){
                            correcto = false;
                            trataError(this,"No se permiten valores numericos") ;
                            return  ;
                        }
                    }
                }
            }else{
                trataError(this,"Rellena el campo")
            }
            trataCorrecto(this);

        })

        $("#email").blur(function() {
            if (this.value !== "") {
                var expRegular = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                if (!expRegular.test(this.value)) {
                    trataError(this, "incorrect email");
                }
            }else{
                trataError(this, "Rellena el campo")
            }
            trataCorrecto(this)

        })



        $("#passwd").blur(function() {
            if (this.value !== "") {
                return;
            }else{
                trataError(this, "Rellena el campo");
            }
                trataCorrecto(this);
        })

        /*$("#passwd2").blur(function() {
        var pass2 = $("#passwd").value;
            if (this.value !== "") {
                if (this.value !== pass2) {
                    trataError(this, "Las contraseñas no coinciden");
                    return;
                }
            }else{
                trataError(this, " rellena el campo")
                return;
            }
            trataCorrecto(this);
        })

        $('#datanac').blur(function(){
        var d = document.getElementById("datanac").value;
        var inDate = new Date(d);
        var anio = inDate.getFullYear();
        var fec_actual = new Date() ;
        var fec_anio = fec_actual.getFullYear() ;
        var edad   =  fec_anio -anio ;
            if (edad >= 18) {
            document.getElementById("result").innerHTML = edad + " Bienvenido al blog www.programacionparatodos.com";
            } else{
            document.getElementById("result").innerHTML = "ACCESO NO VALIDO";
            }
        })




        function trataCorrecto(objeto) {
            objeto.setCustomValidity("");
        }
        function trataError(objeto, texto) {
            objeto.setCustomValidity(texto);
            objeto.reportValidity();
        }*/

    </script>

@endsection
