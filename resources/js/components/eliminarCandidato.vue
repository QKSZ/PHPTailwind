<template>
<button class="bg-red-500 p-3 inline-block text-xs font-bold uppercase text-white" @click="eliminar"> Eliminar </button>
</template>

<script>
export default {
    props:['candidatoId'],
    methods:{
        eliminar(){
            this.$swal.fire({
  title: 'Seguro?',
  text: "Esta accion no se puede revertir",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.isConfirmed) {

const params ={
          id: this.candidatoId,
          estado3: '2',
      }

    axios.post('/candidatos/' + this.candidatoId + '/eliminar/', params)
    this.$swal.fire({
  position: 'center',
  icon: 'success',
  title: 'La aplicacion fue borrada',
  showConfirmButton: false,
  timer: 1500
})
        setTimeout(function () {
        window.location.reload(1);

        }, 1100);
  }
})

        }


    }
}
</script>
