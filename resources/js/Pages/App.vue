<template>
	<div>
		<h1>Welcome to Inertia.js with Vue 2 and Laravel 10</h1>

		<form>
			<div class="row">
				<div class="col-md-6 col-6 offset-md-3 offset-3">
					<label for="txtUsuario">USUARIO</label>
					<input
						type="text"
						class="form-control"
						id="txtUsuario"
						v-model="usuario"
					/>
					<label for="txtClave"> CLAVE</label>
					<input
						type="text"
						class="form-control"
						id="txtClave"
						v-model="clave"
					/>
				</div>
			</div>
		</form>

		<button type="button" class="btn btn-primary" @click="guardar">
			Guardar
		</button>

		<button type="button" class="btn btn-primary" @click="ingresar">
			Ingresar
		</button>
	</div>
</template>

<script>
export default {
	name: "App",
	props: { numero: Number },
	data() {
		return {
			usuario: null,
			clave: null,
		};
	},
	methods: {
		guardar() {
			let self = this;

			this.$swal
				.fire({
					icon: "question",
					text: "¿Desea guardar los cambios?",
					confirmButtonText: "Si",
					showCancelButton: true,
					cancelButtonText: "No",
					allowOutsideClick: false,
					backdrop: true,
					showLoaderOnConfirm: true,
					preConfirm: () => {
						let data = new FormData();
						data.append("usuario", this.usuario);
						data.append("clave", this.clave);

						return axios
							.post("/api/login/registrar", data)
							.then(async (response) => {
								console.log(response.data);
							})
							.catch((error) => {
								self.$swal.showValidationMessage(`Ha ocurrido un error.`);
							});
					},
					allowOutsideClick: () => !self.$swal.isLoading(),
				})
				.then((result) => {
					if (result.isConfirmed) {
						this.$swal.fire({
							icon: "success",
							title: "¡ÉXITO!",
							timer: 1200,
							showConfirmButton: false,
						});
					}
				});
		},

		ingresar() {
			let self = this;

			// let data = new FormData();
			// data.append("usuario", this.usuario);
			// data.append("clave", this.clave);

			let data = {
				usuario: this.usuario,
				clave: this.clave,
			};

			return axios
				.get("/api/login/ingresar", { params: data })
				.then(async (response) => {
					console.log(response.data);
					// self.$swal.fire({
					// 	text: response.data,
					// 	timer: 1200,
					// 	showConfirmButton: false,
					// });
				})
				.catch((error) => {
					self.$swal.showValidationMessage(`Ha ocurrido un error.`);
				});
		},
	},
};
</script>