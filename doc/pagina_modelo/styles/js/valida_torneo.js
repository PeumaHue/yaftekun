
$(document).ready(function () {
    $('#torneo').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre_torneo: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar un nombre de torneo'
                    }
                }
            },
            liga: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar una liga'
                    }
                }
            },
            anio: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese un año'
                    },
                    regexp: {
                        regexp: /^20[1-9]{2}|2[0-9]{3}$/,
                        message: "El año ingrsado no es valido"
                    }

                }
            },
            cantidad_equipos: {
                validators: {
                    digits: {
                        message: 'solo se admiten números'
                    },
                    notEmpty: {
                        message: 'debe ingresar la cantidad de equipos'
                    }
                }
            }
        }
    });
});