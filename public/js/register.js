
document.register.name.addEventListener("blur", validaNom, false);
document.register.lastname.addEventListener("blur", validaNom, false);
document.register.passwd.addEventListener("blur", validaPasswd1, false);
document.register.username.addEventListener("blur", validaUsuari, false);
document.register.email.addEventListener("blur", validaMail, false);
document.register.passwd2.addEventListener("blur", validaPasswd2, false);

//Validación de los campos del formulario de registro
function validaNom() {
    if (this.value !== "") {
        var correcto = true;
        var res = this.value.split("");

        //longitud debe ser mayor o igual a 3
        if (this.value.length < 3) {
            correcto = false;
            trataError(this, "wrong length");
        }

        //No puede contener numeros
        if (correcto) {
            var i = 0;
            while (correcto && i < res.length) {
                if (!isNaN(parseInt(res[i]))) {
                    correcto = false;
                }
                i++;
            }

            if (!correcto) {
                trataError(this, "can not contain numbers");
            }
        }

        if (correcto) {
            trataCorrecto(this);
        }
    } else {
        trataCorrecto(this);
    }
}

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

function validaUsuari() {
    if (this.value !== "") {

        if (this.value.length < 5) {
            trataError(this, "minimum length 5 characters");

        } else {
            if (this.value.length > 15) {
                trataError(this, "maximum length 15 characters");
            } else {
                trataCorrecto(this);
            }
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
}

function trataCorrecto(objeto) {
    objeto.setCustomValidity("");
}


function trataError(objeto, texto) {
    objeto.setCustomValidity(texto);
}
