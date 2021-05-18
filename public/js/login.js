
document.getElementById("passwd").addEventListener("blur", validaPasswd1, false);
document.getElementById("email").addEventListener("blur", validaMail, false);

//Validación de los campos del formulario de login
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

function trataCorrecto(objeto) {
    objeto.setCustomValidity("");
}


function trataError(objeto, texto) {
    objeto.setCustomValidity(texto);
}
