
$(document).ready(function () {
    
    $('#torneo_body').on('shown.bs.collapse', function () {
        $('#flecha_torneo').removeClass().addClass("fa fa-chevron-up");
        });

    $('#torneo_body').on('hidden.bs.collapse', function () {
        $('#flecha_torneo').removeClass().addClass("fa fa-chevron-down");
        });



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