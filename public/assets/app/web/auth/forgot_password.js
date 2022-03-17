$('#forgot_password').on('click', function(e){
	//var CustomerKey = 1234;//your customer key value.
	Swal.fire({
		title: '¿Olvidó su contraseña?',
		text: 'Ingrese su dirección de correo a continuación.',
		input: 'text',
		inputAttributes: {
			autocapitalize: 'off'
		},
		showCancelButton: true,
		confirmButtonText: 'Enviar',
		showLoaderOnConfirm: true,
		preConfirm: (login) => {
			return fetch(URL_PATH + `/auth/password/${login}`)
			.then(response => {
				if (!response.ok) {
					//console.log(response);
					throw new Error(response.statusText)
				}
				console.log(response);
				return response;
			})
			.catch(error => {
				Swal.showValidationMessage(
				`Request failed: ${error}`
				)
			})
		},
		allowOutsideClick: () => !Swal.isLoading()
		}).then((result) => {
			console.log(result);
		if (result.value) {
			Swal.fire({
				icon: 'success',
				title: `Solicitud recibida`,
				text: 'Enviamos un link al correo especificado para reestablecer su contraseña.'
			})

		}

	})

	e.preventDefault();
  })