

$("#formodal").validate({

			rules: {
				inputuser: {
					required: true,
					minlength: 4,
					maxlength: 20

				},
				inputpass: {
					required: false,
					minlength: 5
				},
				inputname: "required",
				inputapellidos:"required",
				inputdni: "required",
				inputdireccion: "required",
				inputpoblacion: "required",
				inputfechaalta: {
					required: true,
					date: true,
					dateLessThan : '#inputfechabaja'

				},
				inputfechabaja: {
					required: false,
					date: true,
					dateGreaterThan : '#inputfechaalta'
				},
				inputcodigopostal: {
					required: true,
					maxlength: 5
				},
				inputprovincia: {
					required: true,
					maxlength: 45
				},
				inputfechanac: {
					required: true,
					date: true,
				},



			},
			messages: {
				inputuser: {
					required: "Inserta un usuario",
					minlength: "El nombre de usuario necesita al menos 4 carácteres",
					maxlength: "El nombre de usuario admite 20 caracteres como máximo"
				},
				inputpass: {
					minlength: "Tu contraseña tiene que tener al menos 5 carácteres"
				},
				inputname: "Inserta un nombre",
				inputapellidos: "Inserta los apellidos",
				inputdni: "Inserta el DNI",
				inputdireccion: "Inserta la direccion",
				inputpoblacion: "Inserta la población ",
				inputfechaalta: {
					required: "Inserte una fecha de alta",
					date: "Tiene que ser un formato de fecha válida (AAAA-MM-DD)",
					dateLessThan : 'Esta fecha tiene que ser anterior a la fecha de baja'

				},
				inputfechabaja: {
					required: "Inserte una fecha de baja",
					date: "Tiene que ser un formato de fecha válida (AAAA-MM-DD)",
					dateLessThan : 'Esta fecha tiene que ser posterior a la fecha de alta'
				},
				inputcodigopostal: {
					required: "Inserte un código postal",
					maxlength: "5 dígitos como máximo"
				},
				inputprovincia: {
					required: "Inserte una provincia",
					maxlength: "Como máximo 45 caracteres"
				},
				inputfechanac: {
					required: "Inserte una fecha de nacimiento",
					date: "Tiene que ser un formato de fecha válida (AAAA-MM-DD)"
				}


			},
			  submitHandler: function(form) {
			    form.submit();
			  }


		});

