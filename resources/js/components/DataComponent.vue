<template>
	<div class="row">
		<div class="col-md-4 mb-2">
			<div class="form-inline">
				<label class="mr-2"></label>
				<select v-model="meta.per_page" @change="loadPerPage" class="form-control">
					<option value="10">10</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
				<label class="ml-2">Entries</label>
			</div>
		</div>

		<div class="col-md-4 offset-md-4">
			<div class="form-inline float-right">
				<label class="mr-2">Search</label>
				<input type="text" class="form-control" @input="search">
			</div>
		</div>

		<div class="col-md-12">
			<b-table striped hover :items="items" :fields="fields" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc" show-empty></b-table>
		</div>

		<div class="col-md-6">
			<p>Showing {{ meta.from }} to {{ meta.to }} of {{ meta.total }} items</p>
		</div>

		<div class="col-md-6">
			<b-pagination v-model="meta.current_page" :total-rows="meta.total" :per-page="meta.per_page" align="right" @change="changePage" aria-controls="covid-datatables"></b-pagination>
		</div>
	</div>
	<!-- <div class="table">
		<table id="table-data" class="table table-bordered">
			<thead>
				<th>Nama Kecamatan</th>
				<th>Jumlah Positif</th>
				<th>Jumlah Meninggal</th>
				<th>Jumlah Sembuh</th>
				<th>Jumlah ODP</th>
				<th>Jumlah PDP</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<tr v-for="covid in covids" :key="covid.id">
					<td>{{ covid.nama_kecamatan }}</td>
					<td>{{ covid.jumlah_positif }}</td>
					<td>{{ covid.jumlah_meninggal }}</td>
					<td>{{ covid.jumlah_sembuh }}</td>
					<td>{{ covid.jumlah_odp }}</td>
					<td>{{ covid.jumlah_pdp }}</td>
					<td><button class="btn btn-sm btn-danger" @click="deleteData(covid.id)">Delete</button></td>
				</tr>
			</tbody>
		</table>
	</div> -->
</template>

<script>
	import _ from 'lodash'

	export default {
		props: {
			items: {
				type: Array,
				required: true
			},
			fields: {
				type: Array,
				required: true
			},
			meta: {
				required: true
			}
		},
		data() {
			return {
				sortBy: null,
				sortDesc: false
			}
		},
		mounted() {
			this.getData()
		},
		watch: {
			sortBy(val) {
				this.$emit('sort', {
					sortBy: this.sortBy,
					sortDesc: this.sortDesc
				})
			},
			sortDesc(val) {
				this.$emit('sort', {
					sortBy: this.sortBy,
					sortDesc: this.sortDesc
				})
			}
		},
		methods: {
			loadPerPage(val) {
				this.$emit('per_page', this.meta.per_page)
			},
			changePage(val) {
				this.$emit('pagination', val)
			},
			search: _.debounce(function(e) {
				this.$emit('search', e.target.value)
			}, 500)
		}
	}
</script>