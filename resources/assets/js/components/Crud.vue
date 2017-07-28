<template>
	<div>
		<table class="table">

			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>

				<tbl-row :personal-info="personalInfo" v-for="personalInfo in personalInfos" :key="personalInfo.id"></tbl-row>
				<tr v-for="(row, index) in rows">

					<td></td>
					<td>
						<input type="text" v-model="row.first_name">
					</td>
					<td>
						<input type="text" v-model="row.last_name">
					</td>
					<td>
						<button  @click="btnNewInfo" class="btn btn-default" ><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
						<a v-on:click="removeElement(index);" style="cursor: pointer">Remove</a>
					</td>
				</tr>	
			</tbody>
		</table>
		
		
		<div>
			<button v-if="!count" class="button btn-primary btnAddRow" @click="addRow">Add row</button>
		</div>
	</div>

</template>

<script>
	import TblRow from './TblRow.vue'
	export default {
		name: 'Crud',
		components: {
			TblRow
		},
		data: function () {
			return {
				rows: [],
				personalInfos: [],
				count: 0
			};
		},
		methods: {
			addRow: function() {
				var count = 1;
				this.count = count;
				var elem = document.createElement('tr');
				this.rows.push({
					first_name: "",
					last_name: "",
					file: {
						name: 'Choose File'
					}
				});
			},
			removeElement: function(index) {
				this.rows.splice(index, 1);
				this.count = 0
			},
			setFilename: function(event, row) {
				var file = event.target.files[0];
				row.file = file
			},
			btnNewInfo(){
				axios.post('webapi/crud/personal/create', {
					first_name: this.rows[0].first_name,
					last_name: this.rows[0].last_name
				})
				.then(response => {
					this.personalInfos.push({
						id: response.data.id,
						first_name: response.data.first_name,
						last_name: response.data.last_name,
					});

					this.rows[0].first_name = ''
					this.rows[0].last_name	= ''
					this.count = 0
					this.rows = []
				})
				.catch(error => {
					console.log(error);
				});
			}

		},
		mounted(){
			axios.get('webapi/crud/personal/').then(response =>{
				this.personalInfos = response.data
			})
		},

		
	};
</script>

<style lang="scss" scoped>
	table{
		width: 100%;
	}
</style>