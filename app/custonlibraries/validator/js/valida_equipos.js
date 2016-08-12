$(document).ready(function () {
//	$('#principal_body').on('shown.bs.collapse', function () {
//		$('#flecha_principal').removeClass().addClass("fa fa-chevron-up");
//	});
	
//	$('#principal_body').on('hidden.bs.collapse', function () {
//		$('#flecha_principal').removeClass().addClass("fa fa-chevron-down");
//	});

	$("#imagen").filestyle('buttonText', 'Agregar');
	
	$("#imagen").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#thumbnail_fotoescudo_caption");
        image_holder.empty();
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) 
            {
              var reader = new FileReader();
              reader.onload = function(e) {
                $("<img />", {
                  "src": e.target.result,
                  "class": "img-thumbnail"
                }).appendTo(image_holder);
                var elem = document.getElementById("foto");
                if (elem != null)
              	  {
              	     elem.parentElement.removeChild(elem);
                          	  
              	  }
              }
              image_holder.show();
              reader.readAsDataURL($(this)[0].files[i]);
            }
          } else {
            alert("This browser does not support FileReader.");
          }
        } else {
          alert("Pls select only images");
        }
      });
	
	
	setear_autocomplete();
	setear_botones();
	validar_equipo();
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
				window.location.href = originalLocation + "/editar/" + $("#txt_busqueda").getSelectedItemData().id_equipo;
			},
			onKeyEnterEvent : function() {
				window.location.href = originalLocation + "/editar/" + $("#txt_busqueda").getSelectedItemData().id_equipo;
			}
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

function setear_botones() {
	originalLocation = window.location.href;
	if(originalLocation.indexOf("equipo/alta") >= 0)//Si esta en el alta no se muestra el boton eliminar y se deshabilita la búsqueda
	{
		$("#btn_eliminar").addClass("disabled");
		$('#txt_busqueda').attr('disabled', true);
	}
	if(originalLocation.indexOf("equipo/editar") >= 0)//Si esta en el alta no se deshabilita la búsqueda
	{
		$('#txt_busqueda').attr('disabled', true);
	}	
}

	    
	    
function validar_equipo() {	
    $('#equipos').bootstrapValidator( {
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
            id_liga: {
                validators: {
                    notEmpty: {
                        message: 'La liga en que juega el equipo os obligatoria'
                    }
                }
            },
            id_estadio: {
                validators: {
                    notEmpty: {
                        message: 'El estadio asignado al equipo es obligatorio'
                    }
                }
            },	
        }
    });
}


	
	