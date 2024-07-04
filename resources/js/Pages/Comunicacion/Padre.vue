<template>
	<div>
		<h1>COMUNICACIÓN ENTRE COMPONENTES</h1>
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-6">
					<label for="txtNombre" class="form-label">Ingrese un nombre</label>
					<input
						type="text"
						class="form-control"
						id="txtNombre"
						v-model="asistente"
					/>
				</div>
				<div class="col-md-1 col-2">
					<button class="btn btn-primary" @click="Agregar">Registrar</button>
				</div>

				<div class="col-4">
					<Hijo
						:pie_pagina="'COLEGIO NACIONAL N° 202513'"
						ref="hijoTabla"
					></Hijo>
				</div>
			</div>
		</div>

		<!-- <Hijo :asistentes="lista"></Hijo> -->
	</div>
</template>

<script>
import Hijo from "@/Pages/Comunicacion/Hijo.vue";

export default {
	components: { Hijo },
	data() {
		return {
			lista: [],

			asistente: null,
		};
	},

	methods: {
		Agregar() {
			let obj = {
				nombre: this.asistente,
			};

			this.lista.push(obj);

			this.$refs.hijoTabla.asistentes = this.lista;
			this.$refs.hijoTabla.MostrarMensaje();

			this.asistente = null;
		},
	},
};
</script>

<style>
</style>