<template>

	
	<tr>
		<td>
			<label for="">{{ personalInfo.id }}</label>
		</td>
		<td>
			<input type="text" v-model="personalInfo.first_name" :value="personalInfo.first_name" :disabled="disabled == 0 ? true : false">
		</td>	
		<td>
			<input type="text" v-model="personalInfo.last_name" :value="personalInfo.last_name" :disabled="disabled == 0 ? true : false">
		</td>
		<td>
			<button v-show="btnEditShow" @click="btnEdit" class="btn btn-primary">Edit</button>
			<button v-show="btnSaveShow" @click="btnSave" v-model="personalInfo.id" class="btn btn-default">Save</button>
			<button @click="btnDelete" v-model="personalInfo.id" class="btn btn-danger">Delete</button>
		</td>

	</tr>

</template>

<script>
	export default {

		name: 'TblRow',
		props: ['personalInfo'],
		methods:{
			btnEdit(){
				this.btnSaveShow = true,
				this.btnEditShow = false,
				this.disabled = (this.disabled + 1) %2
			},
			btnSave(){
				this.btnSaveShow = false,
				this.btnEditShow = true,
				this.disabled = (this.disabled + 1) %2
				axios.patch('webapi/crud/personal/update/' + this.personalInfo.id , {
					first_name: this.personalInfo.first_name,
					last_name: this.personalInfo.last_name,
				})
				.then(response => {
					console.log(response)

				})
				.catch(error => {
					console.log(error);
				});
			},
			btnDelete() {
				axios.delete('webapi/crud/personal/delete/' + this.personalInfo.id).then(response =>{
					for (var i = this.$parent.personalInfos.length - 1; i >= 0; i--) {
					if (this.$parent.personalInfos[i].id === this.personalInfo.id) {
						this.$parent.personalInfos.splice(i,1)
						break
					}
				}
				});
			}
		},

		data () {
			return {
				btnEditShow: true,
				btnSaveShow: false,
				disabled: 0


			};
		}
	};
</script>

<style lang="css" scoped>

	input[disabled]{
		background:white;
		border:none;
	}

</style>