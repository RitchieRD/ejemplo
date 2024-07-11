<template>
	<div>
		<div class="container">
			<h1 class="text-center">Gestión de productos</h1>

			<button class="btn btn-primary" @click="Nuevo">Crear producto</button>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>N°</th>
						<th>Producto</th>
						<th>Marca</th>
						<th>Tipo</th>
						<th>Precio</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(item, index) in productos" :key="index">
						<td>{{ index + 1 }}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>

			<!-- Modal -->

			<div
				class="modal fade"
				id="modalProducto"
				tabindex="-1"
				aria-labelledby="modalLabel"
				aria-hidden="true"
			>
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">{{ titulo_modal }}</div>
						<div class="modal-body">
							<div class="row">
								<div>
									<label class="form-label" for="txtProducto"
										>Nombre del producto</label
									>
									<input
										type="text"
										class="form-control"
										id="txtProducto"
										v-model="frmProducto.producto"
									/>
								</div>

								<div>
									<label class="form-label" for="slcMarcas"
										>Marca del producto</label
									>
									<select
										class="form-select"
										id="slcMarcas"
										v-model="frmProducto.marca_id"
									>
										<option :value="0">Seleccione...</option>
										<option
											v-for="(item, index) in marcas"
											:key="index"
											:value="item.id"
										>
											{{ item.marca }}
										</option>
									</select>
								</div>
								<div>
									<label class="form-label" for="slcTipos"
										>Tipo del producto</label
									>
									<select
										class="form-select"
										id="slcTipos"
										v-model="frmProducto.tipo_id"
									>
										<option :value="0">Seleccione...</option>
										<option
											v-for="(item, index) in tipos"
											:key="index"
											:value="item.id"
										>
											{{ item.tipo }}
										</option>
									</select>
								</div>
								<div>
									<label class="form-label" for="txtPrecio"
										>Precio del producto</label
									>
									<input
										type="number"
										class="form-control"
										id="txtPrecio"
										step="0.1"
										v-model="frmProducto.precio"
									/>
								</div>
								<div>
									<label class="form-label" for="txtCantidad"
										>Cantidad del producto</label
									>
									<input
										type="number"
										class="form-control"
										id="txtCantidad"
										step="0.1"
										v-model="frmProducto.cantidad"
									/>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" @click="Guardar">Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";

export default {
	props: { marcas: Array, tipos: Array },

	data() {
		return {
			productos: [],

			titulo_modal: null,

			frmProducto: {
				id: null,
				producto: null,
				marca_id: 0,
				tipo_id: 0,
				precio: 0,
				cantidad: 0,
			},
		};
	},
	methods: {
		Nuevo() {
			this.titulo_modal = "CREAR PRODUCTO";

			let modal = new bootstrap.Modal(document.getElementById("modalProducto"));
			modal.show();
		},
		Guardar() {
			let data = new FormData();
			data.append("frmProducto", JSON.stringify(this.frmProducto));
			axios.post("/api/productos/crear", data).then(function (response) {
				console.log(response.data);
			});
		},
	},
};
</script>

<style>
</style>