$(document).ready(function () {	
	validar_jugador();
});


function validar_jugador()
{
    $('#participante').bootstrapValidator({        
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
			
            fecha_apto_medico: {
                validators: {
                    regexp: {
                		regexp: /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[/\\/](19|20)\d{2}$|^\s*$/,
                        message: 'Ups! El formato de la fecha no es el correcto! deberia ser DD/MM/AAAA'
                    }
                }
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
