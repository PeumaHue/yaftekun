
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
            cantidad_equipos: {
                validators: {
                    digits: {
                        message: 'solo se admiten números'
                    },
                    notEmpty: {
                        message: 'debe ingresar la cantidad de equipos'
                    }
                }
            },
            modalidad_juego: {
                validators: {                   
                    notEmpty: {
                        message: 'debe seleccionar una modalidad de juego'
                    }
                }
            },
        }
    });
});