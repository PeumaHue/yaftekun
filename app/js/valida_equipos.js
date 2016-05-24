	
	$(document).ready(function () {
	    $('#principal_body').on('shown.bs.collapse', function () {
	        $('#flecha_principal').removeClass().addClass("fa fa-chevron-up");
	    });

	    $('#principal_body').on('hidden.bs.collapse', function () {
	        $('#flecha_principal').removeClass().addClass("fa fa-chevron-down");
	    });


	
    $('#equipos').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de equipo es obligatorio'
                    }
                }
            },            
        }
    });
});