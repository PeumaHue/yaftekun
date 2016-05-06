$(document).ready(function () {
    $('#domicilio_body').on('shown.bs.collapse', function () {
        $('#flecha_domicilio').removeClass().addClass("fa fa-chevron-up");
    });

    $('#domicilio_body').on('hidden.bs.collapse', function () {
        $('#flecha_domicilio').removeClass().addClass("fa fa-chevron-down");
    });

    $('#dt_body').on('shown.bs.collapse', function () {
        $('#flecha_equipo').removeClass().addClass("fa fa-chevron-up");
    });

    $('#dt_body').on('hidden.bs.collapse', function () {
        $('#flecha_equipo').removeClass().addClass("fa fa-chevron-down");
    });




    $('#dt').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            apellido: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de equipo es obligatorio'
                    }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de equipo es obligatorio'
                    }
                }
            },
            tipo_documento: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar un tipo documento'
                    }
                }
            },
            numero_documento: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar el número de documento'
                    }
                }
            },            
            calle: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de la calle es obligatoria'
                    }
                }
            },
            numero: {
                validators: {
                    notEmpty: {
                        message: 'La altura es obligatoria'
                    },
                    regexp: {
                        regexp: /^[0-9]*$/,
                        message: "El valor debe ser numérico"
                    }

                }
            },
            fecha_nacimiento: {
                validators: {
                    regexp: {
                        regexp: /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[/\\/](19|20)\d{2}$/,
                        message: 'Código postal no valido'
                    }
                }
            },

            codigopostal: {
                validators: {
                    regexp: {
                        regexp: /(^[0-9]{4}$)|(^[A-Za-z]{1}[0-9]{4}[A-Za-z]{3}$)/,
                        message: 'Código postal no valido'
                    }
                }
            },
            provincia: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar una provincia'
                    }
                }
            },
            localidad: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar una localidad'
                    }
                }
            },
            telefono: {
                validators: {
                    digits: {
                        message: 'solo se admiten números'
                    },
                    notEmpty: {
                        message: 'debe ingresar un teléfono'
                    }
                }
            },
            celular: {
                validators: {
                    digits: {
                        message: 'solo se admiten números'
                    },
                    notEmpty: {
                        message: 'debe ingresar un teléfono'
                    }
                }
            },
            radio: {
                validators: {
                    digits: {
                        message: 'solo se admiten números'
                    },
                    notEmpty: {
                        message: 'debe ingresar un teléfono'
                    }
                }
            },
            mail: {
                validators: {
                    emailAddress: {
                        messge: 'mail incorrecto'
                    }
                }
            },
            equipo: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar un equipo'
                    }
                }
            },
                    
        }
    });
});