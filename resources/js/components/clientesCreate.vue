<template>
<div class="modal fade" id="crear-cliente-modal" v-show="modalAbierto">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" v-on:submit.prevent="storeCliente">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Crear</h4>
                </div>
                <div class="modal-body">
                    <label for="cliente">Nuevo cliente</label>      
                    <input type="text" name="cliente" class="form-control" v-model="nuevoCliente">
                    <span v-for="error in errores" v-bind:key="error.id" class="text-danger">{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
  export default {
        name: 'crearClienteModal',
        props: [
            'cliente',
            'nuevoCliente',
            'errores',
            'modalAbierto'
            ]
    };
</script>