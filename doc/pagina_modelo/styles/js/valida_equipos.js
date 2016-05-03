
$(document).ready(function () {
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
            mail: {
                validators: {
                    emailAddress: {
                        messge: 'mail incorrecto'
                    }
                }
            }
        }
    });
});