<template>
    <div class="modal fade" id="editar-cliente-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Editar</h4>
                    </div>
                    <div class="modal-body">
                        <label for="cliente">Actualizar cliente</label>      
                        <input type="text" name="cliente" class="form-control" v-model="editadoCliente.nombre">
                        <span v-for="error in errores" v-bind:key="error.id" class="text-danger">@{{ error }}</span>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" value="Actualizar" @click="updateCliente">
                    </div>
                
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'editarClienteModal',
    props: [
            'cliente',
            'editadoCliente',
            'errores'
            ],
    mounted(){
        console.log(this.editadoCliente.id)
    },
    methods:{
        updateCliente: function(){
            var url='clientesData/' + this.editadoCliente.id;
            axios.put(url, this.editadoCliente)
                 .then(response => {
                    // this.getClientes();
                    this.editadoCliente = {id: '', nombre: ''};
                    this.errores = [];
                    $('#editar-cliente-modal').modal('hide');
                    toastr.success('Cliente actualizada con éxito');
                    })
                 .catch(error => {
                    this.errores = error.response.data
                    }
                );
        },
    }
    
}
</script>