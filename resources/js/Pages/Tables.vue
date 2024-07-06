<template>
	<div>
		<h1 class="color-blue color-red">DATATABLES - JQUERY</h1>

		<table class="table" id="tblUsuarios">
			<thead>
				<tr>
					<th>N°</th>
					<th>Usuario</th>
					<th>Fecha registro</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in usuarios" :key="index">
					<td>{{ index + 1 }}</td>
					<td>{{ item.usuario }}</td>
					<td>{{ item.fecha }}</td>
				</tr>
			</tbody>
		</table>

		<h1 class="color-blue color-red">DATATABLES - PRIMEVUE</h1>

		<DataTable
			:value="usuarios"
			:paginator="true"
			:rowsPerPageOptions="[10, 20, 50]"
			:scrollable="true"
			scrollDirection="both"
			scrollHeight="375px"
			:rows="20"
			selectionMode="single"
			paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport"
			currentPageReportTemplate="Mostrando {first} a {last} de {totalRecords} registro(s)"
			:selection.sync="usuarios_seleccionados"
			dataKey="id"
		>
			<Column selectionMode="multiple" :headerStyle="{ width: '3em' }"></Column>
			<Column field="id" header="N°" sortable></Column>
			<Column field="usuario" header="Usuario" sortable></Column>
			<Column field="fecha" header="Fecha" sortable></Column>
		</DataTable>

		<hr />

		<div class="container">
			<div class="row">
				<div class="col-4 offset-4">
					<button class="btn btn-success" @click="Exportar">EXPORTAR</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import $ from "jquery";
import "datatables.net";
import "datatables.net-dt/css/dataTables.dataTables.css";

import DataTable from "primevue/datatable/datatable.common";
import Column from "primevue/column/column.common";

export default {
	props: { usuarios: Array },
	components: { DataTable, Column },
	data() {
		return {
			// usuarios: [
			// 	{
			// 		id: 1,
			// 		usuario: "usuario 1",
			// 		fecha: "2024-06-26",
			// 	},
			// 	{
			// 		id: 2,
			// 		usuario: "usuario 2",
			// 		fecha: "2024-06-22",
			// 	},
			// 	{
			// 		id: 3,
			// 		usuario: "usuario 3",
			// 		fecha: "2024-06-24",
			// 	},
			// 	{
			// 		id: 4,
			// 		usuario: "usuario 4",
			// 		fecha: "2024-06-23",
			// 	},
			// ],
			usuarios_seleccionados: null,
		};
	},
	mounted() {
		$(document).ready(function () {
			$("#tblUsuarios").DataTable({
				language: {
					sProcessing: "Procesando...",
					sLengthMenu: "Mostrar _MENU_ registros",
					sZeroRecords: "No se encontraron resultados",
					sEmptyTable: "Ningún dato disponible en esta tabla",
					sInfo:
						"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					sInfoEmpty:
						"Mostrando registros del 0 al 0 de un total de 0 registros",
					sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
					sInfoPostFix: "",
					sSearch: "Buscar:",
					sUrl: "",
					sInfoThousands: ",",
					sLoadingRecords: "Cargando...",
					oPaginate: {
						sFirst: "Primero",
						sLast: "Último",
						sNext: "Siguiente",
						sPrevious: "Anterior",
					},
					oAria: {
						sSortAscending:
							": Activar para ordenar la columna de manera ascendente",
						sSortDescending:
							": Activar para ordenar la columna de manera descendente",
					},
				},
			});
		});
	},

	methods: {
		async Exportar() {
			let data = new FormData();
			data.append("usuarios", JSON.stringify(this.usuarios));

			await axios.post("/api/tables/export", data).then(function (response) {
				console.log(response.data);
			});
		},
	},
};
</script>

<style lang="css">
.color-blue {
	color: blue;
}

.color-red {
	color: red;
}

.p-datatable-thead th {
	background-color: blue !important;
	color: white !important;
	text-transform: uppercase;
}

.p-datatable-thead th :hover {
	color: red;
}
</style>