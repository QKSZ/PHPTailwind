<template>
<button class="bg-green-500 p-3 inline-block text-xs font-bold uppercase text-white" @click="aprobar" > Aprobar </button>
</template>

<script>
export default {
props: ['candidatoId','candidatoEmail','candidatoUbicacion'],
 methods:{
        aprobar(){
            this.$swal.fire({
  title: 'Desea aprobar la solicitud?',
  text: "Una vez aprobada se enviara el correo automaticamente",
  icon: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.isConfirmed) {

      const params ={
          id: this.candidatoId,
          estado1: '1',
          condicion1: 'aprobado',
          candidatoe: this.candidatoEmail,
          ubicacioncandi: this.candidatoUbicacion
      }


      //enviando peticion a Axios
      axios.post('/candidatos/' + this.candidatoId + '/aprobar/', params)
      .then(respuesta =>{

    this.$swal.fire({
  position: 'center',
  icon: 'success',
  title: 'El correo fue enviado',
  showConfirmButton: false,
  timer: 1500
})
    setTimeout(function () {
        window.location.reload(1);

}, 1100);

      })

      .catch(error=>{
          console.log(error);
      })



  }

});
       }

    }

}




</script>
