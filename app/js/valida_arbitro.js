$(document).ready(function () {
	mostrar_foto();
	setear_botones();
	setear_autocomplete();
	validar_arbitro();
});

function mostrar_foto()
{
	$("#nombre_archivo_foto").filestyle('buttonText', 'Agregar');
    $("#nombre_archivo_foto").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#thumbnail_fotoparticipante_caption");
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
            alert("Navegador no soportado.");
          }
        } else {
          alert("Por favor seleccione un archivo de imagen valido: GIF, PNG, JPG o JPEG.");
        }
      });	
}

function setear_botones()
{
	originalLocation = window.location.href;
	if(originalLocation.indexOf("arbitro/alta") >= 0)//Si esta en el alta no se muestra el boton eliminar
	{
		$("#btn_eliminar").hide();
	}	
}

function setear_autocomplete()
{ 
	originalLocation = window.location.href;
	var options = {
		    url: function(phrase) { 
		            return  originalLocation + "/obtener_autocomplete/" + phrase;    
		    },
		    getValue: function(element){
		    	return element.nombre + ' ' + element.apellido;
		    },
		    ajaxSettings: {
		        dataType: "json"
		    },
		    list: {
				match: {
					enabled: true
				},
				onClickEvent: function() {
					window.location.href = originalLocation + "/editar/" + $("#txt_busqueda").getSelectedItemData().id_participante;
				},
				onKeyEnterEvent : function() {
					window.location.href = originalLocation + "/editar/" + $("#txt_busqueda").getSelectedItemData().id_participante;
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

function validar_arbitro()
{
    $('#participante').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            apellido: {
                validators: {
                    notEmpty: {
                        message: 'Hey!! no te olvides de ingresar el apellido del jugador'
                    	},
                    	regexp: {
                            regexp: /^[a-zA-Z ]*$/,
                            message: 'Ups! Solo se admiten letras!'
                        }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Ups!! no te olvides de ingresar el nombre del jugador'
                    },
                	regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'Ups! Solo se admiten letras!'
                    }
                }
            },            
            id_tipo_doc: {
                validators: {
                    notEmpty: {
                        message: 'Ojo!! selecciona un tipo de documento'
                    }
                }
            },
            nro_doc: {
                validators: {
                    notEmpty: {
                        message: 'Hey!! ingresa un numero de documento'
                    	},
            		digits: {
            			message: 'Ojo!! solo se admiten numeros'
            			}
                	},
            }, 
            fecha_nacimiento: {
                validators: {
                    regexp: {
                        regexp: /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[/\\/](19|20)\d{2}$|^\s*$/,
                        message: 'Ups! El formato de la fecha no es el correcto! deberia ser DD/MM/AAAA'
                    }
                }
            },
            nacionalidad:{
                validators: {
                	regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'Ups! Solo se admiten letras!'
                    }
                	},
            }, 
            conyuge_nombre:{
                validators: {
                	regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'Ups! Solo se admiten letras!'
                    }
                	},
            }, 
            numero: {
                validators: {
                	regexp: {
                		regexp: /^[0-9]*$|^\s*$/,
                        message: 'Ojo!! solo se admiten numeros'
                    }
                }
            },
            telefono:{
                validators: {
                	regexp: {
                		regexp: /^[0-9]*$|^\s*$/,
                        message: 'Ojo!! solo se admiten numeros'
                    }
                	},
            }, 
            telefono_celular:{
                validators: {
                	regexp: {
                		regexp: /^[0-9]*$|^\s*$/,
                        message: 'Ojo!! solo se admiten numeros'
                    }
                	},
            }, 
            telefono_radio:{
                validators: {
                	regexp: {
                		regexp: /^[0-9]*$|^\s*$/,
                        message: 'Ojo!! solo se admiten numeros'
                    }
                	},
            }, 
            email:{
            	 validators: {
            		 regexp: {
                 		regexp: /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$|^\s*$/,
                         message: 'Hey!! la direccion de email no es correcta!'
                     }
            	 	 },
            },
           }
       });
   }
