$(document).ready(function () {
	setear_botones();
	validar_jugador();
	$("#imagen").filestyle('buttonText', 'Agregar');
    $("#imagen").on('change', function() {
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
            alert("This browser does not support FileReader.");
          }
        } else {
          alert("Pls select only images");
        }
      });

});

function setear_botones()
{
	originalLocation = window.location.href;
	if(originalLocation.indexOf("jugador/alta") >= 0)//Si esta en el alta no se muestra el boton eliminar
	{
		document.getElementById('btn_eliminar').style.visibility = "hidden";
	}	
}

function validar_jugador()
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
                        regexp: /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[/\\/](19|20)\d{2}$/,
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
            fecha_apto_medico: {
                validators: {
                    regexp: {
                        regexp: /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[/\\/](19|20)\d{2}$/,
                        message: 'Ups! El formato de la fecha no es el correcto! deberia ser DD/MM/AAAA'
                    }
                }
            },
            numero: {
                validators: {
            		digits: {
            			message: 'Ojo!! solo se admiten numeros'
            			}
                	},
            },
            localidad:{
                validators: {
                	regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'Ups! Solo se admiten letras!'
                    }
                	},
            }, 
           }
       });
   }
