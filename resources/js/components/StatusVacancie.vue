<template>
  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" 
  :class="ClaseEstadoVacancie()"
  @click="CambiarEstado" :key="estadoVacancieData">
      {{ estadoVacancie }}
   </span>
</template>

<script>
 export default {
  props: ['estado','vacancieId'],
  mounted() {
   	this.estadoVacancieData = Number(this.estado)
  },
  data: function(){
	  return  {
	    estadoVacancieData: null
	   }
    },
    methods: {
     ClaseEstadoVacancie(){
       return this.estadoVacancieData === 1 ? " bg-green-100 text-green-800" : " bg-red-100 text-red-800"
     },
     CambiarEstado() {
	      if(this.estadoVacancieData === 1){
	        this.estadoVacancieData = 0;
	      } else {
	        this.estadoVacancieData = 1;
	      }

	      //enviar peticion a axios 
	      const params = {
	       	estado:  this.estadoVacancieData
	      }
	      axios
	        .post( '/vacantes/' + this.vacancieId, params)
	        .then(respuesta => console.log(respuesta))
	        .catch(error => console.log(error))
        }
    },
    computed: {
	    estadoVacancie() {
            return this.estadoVacancieData === 1 ? 'Activa' : 'inactiva'
	    }
    }
 }
</script>