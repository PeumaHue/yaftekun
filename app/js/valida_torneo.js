$(document).ready(function () {
	setear_botones();
	validar_torneo();
});

function setear_botones()
{
	originalLocation = window.location.href;
	if(originalLocation.indexOf("torneo/alta") >= 0)//Si esta en el alta no se muestra el boton eliminar
	{
		$("#btn_eliminar").addClass("disabled");
	}	
}

function validar_torneo()
{
    $('#torneo').bootstrapValidator({
        message: 'Este valor no es válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar un nombre de torneo'
                    }
                }
            },            
            cantidad_equipos: {
                validators: {
                    digits: {
                        message: 'Sólo se admiten números'
                    },
                    notEmpty: {
                        message: 'Debe ingresar la cantidad de equipos'
                    }
                }
            },
            id_tipo_modalidad: {
                validators: {                   
                    notEmpty: {
                        message: 'Debe seleccionar una modalidad de juego'
                    }
                }
            },
        }
    });
}