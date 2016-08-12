
function validarNumeroControl(e) {
    tecla_codigo = (document.all) ? e.keyCode : e.which;
    
    if (tecla_codigo == 8) return true;
    if (tecla_codigo == 32) return false;
    patron = /[0-9]/;
    tecla_valor = String.fromCharCode(tecla_codigo);
    return patron.test(tecla_valor);

}


function esNumero(text) {
    rexp = new RegExp('(^[0-9]*$)');
    splitText = rexp.exec(text);

    if (splitText != null) {
        return text;
    }
    else {
        return "";
    }
}

function maskFecha(objeto) {

    if (!
           (event.keyCode == 8 ||
            event.keyCode == 9 ||
            event.keyCode == 13 ||
            event.keyCode == 35 ||
            event.keyCode == 36 ||
            event.keyCode == 46 ||
           (event.keyCode >= 48 && event.keyCode <= 57) ||
           (event.keyCode >= 96 && event.keyCode <= 105) ||
           (event.keyCode >= 37 && event.keyCode <= 40)))
        return false;

    if (event.keyCode != 8) {
        if (objeto.value.length == 2 || objeto.value.length == 5) {
            objeto.value += "/";
        }
    }
    return true;
}
