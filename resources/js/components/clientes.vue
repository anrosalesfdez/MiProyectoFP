<template>
<div class="row" id="clientes">
    <div class="col-sm-12">
        <h1>Listado de Clientes</h1>
    </div>
    <div class="col-sm-12">
        <button id="abrirModalCliente" class="btn btn-primary pull-right" @click="abrirModalCrear">
            Nuevo cliente
        </button>
        <!-- Modal con formulario CREAR -->
        <div id="modalCrearCliente" class="modal fade"> <!--- El id es necesario para el evento en boton js-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Crear</h4>
                    </div>
                    <div class="modal-body">
                        <label for="cliente">Nuevo cliente</label>      
                        <input type="text" name="cliente" class="form-control" v-model="nuevoCliente.nombre">
                        <!-- El input cliente linka con data nuevoCliente -->
                        <span v-for="error in errores" v-bind:key="error.id" class="text-danger">{{ error }}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="storeCliente">Guardar</button>
                    </div>
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
                <!-- Tabla listado clientes ***clientes está def en data -->
                <tr v-for="cliente in clientes" v-bind:key="cliente.id">

                    <td>{{ cliente.id }}</td>
                    
                    <td>{{ cliente.nombre }}</td>
                    
                    <td width="10px">
                        <button class="btn btn-warning btn-sm" @click="abrirModalEditar(cliente)">Editar</button>
                        
                        <!-- Modal con formulario EDITAR -->
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

export default{
    data(){ //datos del componente
        return {
            clientes:[],    //array de clientes recogidos de db
            nuevoCliente: { //objeto que recoge datos del request a usuario para nuevo
                nombre: ''
            },
            editadoCliente: {  //objeto que muestra datos del cliente seleccionado
                id: '',
                nombre: ''
            },
            errores:[], //array para recoger errores en validación
            // modalEditarAbierto: false,
        }
    },
    created(){  //acciones a realizar en cuanto se crea el componente
        this.getClientes();
    },
    methods:{
        getClientes(){  //conecta con bd y obtiene todos los clientes
            var url = 'clientesData';
            axios.get(url).then(response => {
                this.clientes = response.data //guarda respuesta en data clientes[]
            });
            //TODO: paginado!
        },
        deleteCliente(cliente){ //conecta con bd y elimina(soft) el cliente seleccionado
            var url='clientesData/' + cliente.id;
            axios.delete(url).then(response => {
                this.getClientes(); //recarga listado
            });
        },
        storeCliente(){ //conecta con bd y guarda nuevo cliente
        //TODO: añadir validaciones y notificaciones, mejor desde laravel?
            var url='clientesData';
            axios.post(url, this.nuevoCliente) //envía valor nuevoCliente
                .then(response => {   
                    this.getClientes(); //recarga listado
                    this.nuevoCliente = {nombre:''};    //blanquea var
                    this.errores=[];    //blanquea var
                    $('#modalCrearCliente').modal('hide'); //oculta formulario de creación
                })
                .catch(error => {
                    this.errores = error.response.data
                });
        },
        updateCliente(){ //conecta con bd y actualiza cleinte seleccionado
        //TODO: añadir validaciones y notificaciones
            var url='clientesData/' + this.editadoCliente.id;
            axios.put(url, this.editadoCliente) //envía valor del cliente editado
                 .then(response => {
                    this.getClientes();
                    this.editadoCliente = {id: '', nombre: ''};//blanquea var
                    this.errores = [];//blanquea var
                    $('#editar-cliente-modal').modal('hide');   //oculta modal
                    })
                 .catch(error => {
                    this.errores = error.response.data
                    }
                );
        },
        abrirModalCrear(){  //muestra modal CREAR
            $('#modalCrearCliente').modal('show');
        },
        abrirModalEditar(cliente){  //muestra modal CREAR ***se le pasa cliente desde html
                                    //
            $('#editar-cliente-modal').modal('show');
            // console.log(cliente)
            this.editadoCliente = Object.assign({},cliente); //pasa datos para que muestre el modal
                                                            //si hago this.editadoCliente = this.cliente son lo mismo
        }
    }
}
</script>