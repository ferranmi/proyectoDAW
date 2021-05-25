@extends('layouts.base')
@section('products')
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 bg-danger rounded dissenyForms">
            <form class="register" name="register" method="post">
                @csrf
                <h3 class="display-4 mb-2">Register</h3>
                <div>
                    <label>DNI:</label>
                    <input type="text" id="dni" name="dni" required value="{{ old('dni') }}" />
                </div>
                <div>
                    <label>First Name:</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}" />
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
      /*  $("#name").blur(function() {
            console.log("hola")
            var correcto = true;
            if (this.value !== "") {
                //longitud debe ser mayor o igual a 3
                if (this.value.length < 3) {
                    correcto = false;
                    trataError(this, "wrong length");
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
                trataCorrecto(this);
            }
        })

                    $("#email").blur(function() {
                        if (this.value !== "") {
                            var expRegular = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

                            if (!expRegular.test(this.value)) {
                                trataError(this, "incorrect email");
                            } else {
                                trataCorrecto(this);
                            }
                        } else {
                            trataCorrecto(this);
                        }

                    })

                    $("#dni").blur(function() {
                        valor = $("#dni").val();
                        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V',
                            'H', 'L', 'C', 'K', 'E', 'T'
                        ];

                        if (!(/^\d{8}[A-Z]$/.test(valor))) {
                            trataError(this, "dni incorrecte");
                            return ;
                        }

                        if (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23]) {
                            trataError(this, " letra incorrecta")
                            return ;
                        }
                        trataCorrecto(this);
                    })

                               /*  $("#passwd").blur(function() {
                                      if (this.value !== "") {
                                          res = (this.value).length;
                                          // var res = validar_clave(this.value);

                                          if (res) {
                                              trataCorrecto(this);
                                          } else {
                                              trataError(this, "Invalid password");
                                          }
                                      } else {
                                          trataCorrecto(this);
                                      }
                                  })

                                  $("#passwd2").blur(function() {
                                      if (this.value !== "") {
                                          var pass1 = document.register.passwd.value;
                                          if (this.value !== pass1) {
                                              trataError(this, "passwords don't match");
                                          } else {
                                              trataCorrecto(this);
                                          }
                                      } else {
                                          trataCorrecto(this);
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
