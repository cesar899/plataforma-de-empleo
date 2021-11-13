<template>

   <buttom class="text-red-600 hover:text-blue-900 mr-5"
  				 @click="DeleteVacancie"
   >Eliminar</buttom>

</template>

<script>
  export default {
   props: ['vacancieId'],
	   methods: {
		    DeleteVacancie() {
		     console.log('eliminando', this.vacancieId);

		  this.$swal.fire({
				title: 'Deseas eliminar esta Vacante?',
				text: "Una vez eliminada no se puede recuperar!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si!',
				cancelButtonText: 'No!'
				}).then((result) => {
					if (result.isConfirmed) {

					   const params = {
					   	 id: this.vacancieId,
					   	 _method: 'delete'
					   }
					   //enviar peticion a axios
					    axios.post(`/vacantes/${this.vacancieId}`, params)
					    .then(respuesta => {
					      //console.log(respuesta)
					       this.$swal.fire(
						      'Vacante eliminada!',
						       respuesta.data.mensaje,
						      'success'
					        );
					        //eliminarla del dom
					        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
					    })
					    .catch(error => {
					    console.log(error);
					    })  
					} 
				})
		    }
	   }
    }
</script>