<template>
<div>
    <ul class="flex flex-wrap justify-center">
    <li class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4" 
    :class="verificarClaseActiva(skill)"
    v-for="( skill, i ) in this.skills" v-bind:key="i" v-on:click="activar($event)">{{skill}}</li>
    </ul>

    <input type="hidden" name="skills" id="skills" > 
</div>
</template>

<script>
  export default{
      props: ['skills', 'oldskills'],
       data: function() {
           return {              
                abilities: new Set()
           }
       },
       created: function() {
         if(this.oldskills) {
             const skillsArray = this.oldskills.split(',');
             skillsArray.forEach(skill => this.abilities.add(skill) );
         }
       },
       mounted: function() {
         document.querySelector('#skills').value = this.oldskills;
       }, 
       //accion de click
       methods: {
           activar(e) {
                //    console.log('diste click', e.target.textContent);
                if( e.target.classList.contains('bg-green-400') ) {
                    //el skill esta activo
                    e.target.classList.remove('bg-green-400');
                    //Eliminar del set de habilidades
                    this.abilities.delete(e.target.textContent);
                }else{
                    //no esta activo
                    e.target.classList.add('bg-green-400');
                    //Agregar al set de habilidades
                    this.abilities.add(e.target.textContent); 
                } 
                
                //Agregar elemento de habilidades al input hidden
                //Convertirlo en string
                const stringabilities = [...this.abilities];
                document.querySelector('#skills').value = stringabilities;
           },
           
           verificarClaseActiva(skill) {
               return this.abilities.has(skill) ? 'bg-green-400' : '';
           }

       } 

  }
</script>