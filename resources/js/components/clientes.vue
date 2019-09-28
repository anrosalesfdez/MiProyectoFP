<template>
<div class="row" id="clientes">
    <div class="col-sm-12">
        <h1>Mantenimiento de Clientes</h1>
    </div>

    <div class="col-sm-12">
        <a class="btn btn-primary pull-right" href="clientes_nuevo">Nuevo cliente</a>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razón social</th>
                    <th>NIF</th>
                    <th>NIVA</th>
                    <!-- <th>Dirección</th> -->
                    <!-- <th>Provincia</th> -->
                    <th>País</th>
                    <th>Ámbito</th>
                    <th>Tipo</th>
                    <th colspan="2">&nbsp;Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tabla listado clientes ***clientes está def en data -->
                <tr v-for="cliente in clientes" v-bind:key="cliente.id">

                    <td>{{ cliente.id }}</td>
                    <td>{{ cliente.razon_social }}</td>
                    <td>{{ cliente.nif }}</td>
                    <td>{{ cliente.niva }}</td>
                    <!-- <td>{{ cliente.direccion }}</td> -->
                    <!-- <td>{{ cliente.provincia }}</td> -->
                    <td>{{ cliente.pais }}</td>
                    <!-- <td>{{ cliente.cp }}</td> -->
                    <!-- <td>{{ cliente.tlfn }}</td> -->
                    <!-- <td>{{ cliente.email }}</td> -->
                    <td>{{ cliente.ambito_cl }}</td>
                    <td>{{ cliente.tipo_cl }}</td>
                    <!-- <td>{{ cliente.forma_pago }}</td> -->
                    <!-- <td>{{ cliente.dias_pago }}</td> -->
                    <!-- <td>{{ cliente.observ }}</td> -->
                    
                    <td width="10px">
                        <a href=cliente name="cliente" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <!--FIXME: no lleva datos del cliente seleccionado...-->

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
        getCliente(cliente){
            var url="clientesData/";
            axios.get(url, {cliente: this.cliente}).then(response => {
                // console.log(cliente);
            })
        }
    }
}
</script>