<template>
<button class="bg-red-500 p-3 inline-block text-xs font-bold uppercase text-white" @click="rechazar"> Rechazar</button>
</template>

<script>
export default {
    props: ['candidatoId','candidatoEmail'],
    data: function(){
        return{
        texto: null
        }

    },

    methods:{
        rechazar(){

        this.$swal
        .fire({
          title: "Motivo del rechazo",
          type: "question",
          input: "textarea",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Enviar',
          cancelButtonText: 'Cancelar',
          cancelButtonColor: '#d33',
        })
        .then((result) => {
            if (result.isConfirmed) {
            this.texto = result.value
            const params ={
          id: this.candidatoId,
        descripcion: this.texto,
          estado2: '2',
          condicion2:'rechazado',
          candidatoa: this.candidatoEmail
      }
            axios.post('/candidatos/' + this.candidatoId + '/rechazar/', params)
             this.$swal.fire(
                {
                  position: 'center',
                 icon: 'success',
                 title: 'La aplicacion fue rechazada',
                showConfirmButton: false,
                timer: 2500
                }
                )
                setTimeout(function () {
        window.location.reload(1);

        }, 500);

        }})

        .catch(error=>{
          console.log(error);
      })
        }

    }

}




</script>
