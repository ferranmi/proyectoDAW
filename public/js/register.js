$(document).ready(function () {



    $("#name").on("blur", validaNom);
    /*
    $("#lastname").on("blur", validaCognom, false);
    $("#email").on("blur", validaMail, false);
    $("#passwd").on("blur", validaPasswd1, false);
    $("#passwd2").on("blur", validaPasswd2, false);
    $("#datanac").on("blur", validaData, false);*/

    //Validación de los campos del formulario de registro

    function validaNom() {
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
        }


    /*
    function validaMail() {
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

    }

    function validaPasswd1() {
        if (this.value !== "") {

            var res = validar_clave(this.value);

            if (res) {
                trataCorrecto(this);
            } else {
                trataError(this, "Invalid password");
            }
        } else {
            trataCorrecto(this);
        }
    }

    function validaPasswd2() {
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
    }*/

    function trataCorrecto(objeto) {
        objeto.setCustomValidity("");
    }

    function trataError(objeto, texto) {
        objeto.setCustomValidity(texto);
        objeto.reportValidity();
    }







});



