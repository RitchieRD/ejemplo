<template>
	<div>
		<h1>LISTA DE ASISTENTES</h1>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-6">
					<table class="table">
						<thead>
							<tr>
								<th>N°</th>
								<th>NOMBRE</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(item, index) in asistentes" :key="index">
								<td>{{ index + 1 }}</td>
								<td>{{ item.nombre }}</td>
							</tr>
						</tbody>
					</table>

					<p>{{ pie_pagina }}</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: { pie_pagina: String },

	data() {
		return {
			asistentes: [],
		};
	},

	methods: {
		MostrarMensaje() {
			this.$swal.fire({
				icon: "succes",
				title: "¡ÉXITO!",
				text: "Registro exitoso",
			});
		},
	},
};
</script>

<style>
</style>