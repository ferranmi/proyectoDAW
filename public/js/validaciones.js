$(document).ready(function () {

    $("#dni").on("blur", validaDNI)
    $("#name").on("blur", validaNom);
    $("#lastname").on("blur", validaCognom);
    $("#email").on("blur", validaMail);
    $("#passwd").on("blur", validaPasswd1);
    $("#passwd2").on("blur", validaPasswd2);
    $("#datanac").on("blur", validaData);
    $("#C_postal").on("blur", validaNulos);
    $("#Poblacion").on("blur", validaNulos);

    //validaciones de contacto
    $("#asunto").on("blur", validaNulos);
    $("#comentario").on("blur", validaNulos);

    //llamadas para la nueva entrada
    $("#titulo_noticia").on("blur", validaNulos);
    $("#d_corta").on("blur", validaNulos);
    $("#d_larga").on("blur", validaNulos);

    //validacion compras
    $("#cantidad").on("blur", validaCantidad);



    function validaDNI() {
        valor = $("#dni").val();
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V',
            'H', 'L', 'C', 'K', 'E', 'T'];
        if (this.value !== "") {
            if (!(/^\d{8}[A-Z]$/.test(valor))) {
                trataError(this, "Dni incorrecte");
                return;
            }

            if (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23]) {
                trataError(this, "Letra incorrecta")
                return;
            }
        } else {
            trataError(this, "Rellena este campo")
        }

        trataCorrecto(this);
    }

    function validaNom() {
        var correcto = true;
        if (this.value !== "") {
            //longitud debe ser mayor o igual a 3
            if (this.value.length < 3) {
                correcto = false;
                trataError(this, "Nombre no valido muy corto");
                return;
            }
            //No puede contener numeros
            if (correcto) {
                for (var j = 0; j < this.value.length; j++) {
                    if (!isNaN(parseInt(this.value[j]))) {
                        correcto = false;
                        trataError(this, "No se permiten valores numericos");
                        return;
                    }
                }
            }
        } else {
            trataError(this, "Rellena este campo")
        }
        trataCorrecto(this);
    }

    function validaCognom() {
        var correcto = true;
        if (this.value !== "") {
            if (correcto) {
                for (var j = 0; j < this.value.length; j++) {
                    if (!isNaN(parseInt(this.value[j]))) {
                        correcto = false;
                        trataError(this, "No se permiten valores numericos");
                        return;
                    }
                }
            }
        } else {
            trataError(this, "Rellena el campo")
        }
        trataCorrecto(this);

    }

    function validaMail() {
        if (this.value !== "") {
            var expRegular = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            if (!expRegular.test(this.value)) {
                trataError(this, "incorrect email");
                return;
            }
        } else {
            trataError(this, "Rellena el campo")
            return;
        }
        trataCorrecto(this);
    }


    function validaPasswd1() {
        if (this.value == "") {
            trataError(this, "Rellena el campo");
            return;
        }
        trataCorrecto(this);
    }

    function validaPasswd2() {
        var passwd = $("#passwd").val();
        if (this.value !== "") {
            if (this.value != passwd) {
                trataError(this, "Las contraseñas no coinciden");
                return;
            }
        } else {
            trataError(this, "Rellena el campo");
            return;
        }
        trataCorrecto(this);
    }

    //new_entry validaciones
    function validaNulos() {
        if (this.value !== "") {
            trataCorrecto(this);
        } else {
            trataError(this, "Rellena el campo");
        }
    }
    function validaData() {
        console.log("Hola");
        console.log(this.value);
        var arrayData = this.value.split('-');
        var any = parseInt(arrayData[0]);
        var mes = parseInt(arrayData[1]);
        var dia = parseInt(arrayData[2]);

        var objecteData = new Date(any, mes - 1, dia);   //El mes comença per 0 (Gener)

        if (objecteData.getFullYear() === any && objecteData.getMonth() === (mes - 1) && objecteData.getDate() === dia) {
            var avui = new Date();
            var mayor18 = new Date(any + 18, mes - 1, dia);
            if (mayor18 >= avui) {
                trataError(this, "Eres menor");
            } else {
                trataCorrecto(this);
            }
        } else {
            trataError(this, "Fecha incorrecta");
        }
    }

    function validaCantidad() {
        var cantidad = $("#cantidad").val();
        console.log(cantidad);
        if (this.value !== "") {
            if (cantidad <= 0) {
                console.log("Hola");
                trataError(this, "valor no valido")
            } else {
                trataCorrecto(this)
            }
        } else {
            trataError(this, "valor incorrecto o nulo")
        }
    }

    function trataCorrecto(objeto) {
        objeto.setCustomValidity("");
    }

    function trataError(objeto, texto) {
        objeto.setCustomValidity(texto);
        objeto.reportValidity();
    }

    ajustarPie();
    function ajustarPie() {
        var winH = $(window).height();
        var docH = $("body").height();
        var pieH = $("footer").height();
        console.log(docH, pieH, winH);
        if (docH < winH) {
            console.log("Hola");
            $("#footer").addClass("position-fixed");
        } else {
            console.log("bye");
            $("#footer").removeClass("position-fixed");
        }
    }

    $(window).on("resize", ajustarPie);

});

