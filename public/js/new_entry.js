window.onload = function() {
    $("#titulo_noticia").on("blur", titulo_noticia, false);
    $("#d_corta").on("blur", d_corta, false);
    $("#d_larga").on("blur", d_larga, false);
    console.log("tienes algun problema?")

    function titulo_noticia() {
        if (this.value !== "") {
            trataCorrecto(this);
        } else {
            trataIncorrecto(this, "Rellena el campo");
        }
    }
    function d_corta() {
        if (this.value !== "") {
            trataCorrecto(this);
        } else {
            trataIncorrecto(this, "Rellena el campo");
        }
    }

    function d_larga() {
        if (this.value !== "") {
            trataCorrecto(this);
        } else {
            trataIncorrecto(this, "Rellena el campo");
        }
    }



        function trataCorrecto(objeto) {
            objeto.setCustomValidity("");
        }


        function trataError(objeto, texto) {
            objeto.setCustomValidity(texto);
        }



    }



