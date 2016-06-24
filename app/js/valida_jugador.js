$(document).ready(function () {
	setear_botones();
	validar_jugador();
	$("#imagen").filestyle('buttonText', 'Agregar');
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
                        message: 'Debe ingresar el apellido del jugador'
                    }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar el nombre del jugador'
                    }
                }
            },            
            id_tipo_doc: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar un tipo de documento'
                    }
                }
            },
            nro_doc: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar un numero de documento'
                    	},
            		digits: {
            			message: 'Solo se admiten numeros'
            			}
                	},
            }, 
            fecha_nacimiento: {
            	validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
}

$(document).ready(function() {
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


