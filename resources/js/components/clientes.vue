<template>
<div class="row" id="clientes">
    <div class="col-sm-12">
        <h1>Listado de Clientes</h1>
    </div>
    <div class="col-sm-12">
        <button id="abrirModalCliente" class="btn btn-primary pull-right" @click="abrirModalCrear">
            Nuevo cliente
        </button>
        <!-- <crearClienteModal v-model="modalCrearAbierto"></crearClienteModal> -->
        <div id="modalCrearCliente" class="modal fade">
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
                            <input type="text" name="cliente" class="form-control" v-model="nuevoCliente.nombre">
                            <span v-for="error in errores" v-bind:key="error.id" class="text-danger">{{ error }}</span>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cliente in clientes" v-bind:key="cliente.id">
                    <td>{{ cliente.id }}</td>
                    <td>{{ cliente.nombre }}</td>
                    <td width="10px">
                        <button class="btn btn-warning btn-sm" @click="abrirModalEditar(cliente)">Editar</button>
                        <editarClienteModal :editadoCliente="editadoCliente"></editarClienteModal>
                    </td>
                    <td width="10px">
                        <button class="btn btn-danger btn-sm" v-on:click.prevent="deleteCliente(cliente)">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</template>

<script>
import crearClienteModal from './clientesCreate';   //nombre y ruta
import editarClienteModal from './clientesEdit';


export default{
    data: function(){
        return {
            clientes:[],
            nuevoCliente: {
                nombre: ""
            },
            editadoCliente: { //pasa tb para props del modal hijo
                id: '',
                nombre: ''
            },
            errores:[],
            modalEditarAbierto: false,
            // cliente:''  //no entiendo esto... ver clientesCreate v-show!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
    },
    components: {
        editarClienteModal //componente modal Editar 
    },
    created: function(){
        this.getClientes();
    },
    methods:{
        getClientes: function(){
            var url = 'clientesData';
            axios.get(url).then(response => {
                this.clientes = response.data
            });
        },
        deleteCliente: function(cliente){
            var url='clientesData/' + cliente.id;
            axios.delete(url).then(response => {
                this.getClientes();
                toastr.success('Registro eliminado correctamente!');
            });
        },
        storeCliente: function(){
            var url='clientesData';
            axios.post(url, this.nuevoCliente).then(response => {
                this.getClientes();
                this.nuevoCliente = {nombre:''};
                this.errores=[];
                $('#modalCrearCliente').modal('hide'); //oculta formulario de creación
                toastr.success('Registro creado correctamente!');
            }).catch(error => {
                this.errores = error.response.data
            });
        },
        abrirModalCrear: function(){
            $('#modalCrearCliente').modal('show');
        },
        abrirModalEditar: function(cliente){
            $('#editar-cliente-modal').modal('show');
            console.log(cliente)
            this.editadoCliente = Object.assign({},cliente); //pasa datos para que muestre el modal
            // $('#editar-cliente-modal').modal('show');  //abre el modal
        }
    }
}
</script>