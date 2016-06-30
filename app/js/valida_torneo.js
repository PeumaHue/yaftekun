$(document).ready(function () {
	setear_autocomplete();
	setear_botones();
	validar_torneo();
});

function setear_autocomplete()
{ 
	originalLocation = window.location.href;
	var options = {
		    url: function(phrase) { 
		            return  originalLocation + "/obtener_autocomplete/" + phrase;    
		    },
		    getValue: "nombre",
		    ajaxSettings: {
		        dataType: "json"
		    },
		    list: {
				match: {
					enabled: true
				},
				onClickEvent: function() {
					window.location.href = originalLocation + "/editar/" + $("#txt_busqueda").getSelectedItemData().id_torneo;
				}/*,
				onKeyEnterEvent : function() {
					window.location.href = originalLocation + "/editar/" + $("#txt_busqueda").getSelectedItemData().id_torneo;
				}*/
				/* Si es necesario guardar el id en un campo oculto
				onSelectItemEvent: function() {
					var value = $("#txt_busqueda").getSelectedItemData().id_torneo;
					$("#id_torneo").val(value).trigger("change");
				}*/
			},
		    requestDelay: 500
		};
		$("#txt_busqueda").easyAutocomplete(options);
}

function setear_botones()
{
	originalLocation = window.location.href;
	if(originalLocation.indexOf("torneo/alta") >= 0)//Si esta en el alta no se muestra el boton eliminar y se deshabilita la búsqueda
	{
		$("#btn_eliminar").addClass("disabled");
		$('#txt_busqueda').attr('disabled', true);
	}
	if(originalLocation.indexOf("torneo/editar") >= 0)//Si esta en el alta no se deshabilita la búsqueda
	{
		$('#txt_busqueda').attr('disabled', true);
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