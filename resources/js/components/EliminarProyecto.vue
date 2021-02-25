<template>
<button class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarProyecto"

>Eliminar</button>
</template>


<script>
export default {
    props:['proyectoId'],

    methods:{
        eliminarProyecto(){
            //console.log('eliminando', this.proyectoId)

            this.$swal.fire({
            title: 'Estas seguro?',
            text: "Si lo borras no se podra revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText:'NO'
            }).then((result) => {
            if (result.isConfirmed) {

                const params = {
                   id: this.proyectoId,
                   _method: 'delete'

                }
                //Enviar peticion a Axios
                axios.post(`/proyectos/${this.proyectoId}`, params)
                .then(respuesta =>{
                    console.log(respuesta)

                    this.$swal.fire(
                    'Borrado',
                    respuesta.data.mensaje,
                    'success'
                );
                    //eliminar del DOM
                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);


                })
                .catch(error=>{
                    console.log(error);
                })



            }
})

        }
    }
}
</script>
