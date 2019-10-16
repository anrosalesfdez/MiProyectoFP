<template>
<div class="row" id="clientes">
    <div class="col-sm-12">
        <h3>Mantenimiento de Clientes</h3>
    </div>

    <div class="col-sm-12">
        <div class="espacios">
            <!-- link a crear nuevo cliente -->
            <a class="btn btn-success pull-right" role="button" href="/clientes/crear">Nuevo cliente</a>
        </div>
        
        <div class="espacios">
            <!-- buscador por razon_social. Ata el data:clienteBuscado del objeto vue con el HTML-->
            <input type="text" placeholder="Buscar cliente por razón social" class="form-control" v-model="clienteBuscado">
        </div>
        
        <!-- tabla que muestra todos los clientes -->
        <table class="table table-hover table-striped ">
            <thead>
                <tr>
                    <th width="10px" scope="col">ID</th>
                    <th scope="col">Razón social</th>
                    <!-- <th>NIF</th> -->
                    <th scope="col">NIVA</th>
                    <!-- <th>Dirección</th> -->
                    <!-- <th>Provincia</th> -->
                    <th scope="col">País</th>
                    <th scope="col">Ámbito</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" colspan="2">&nbsp;Opciones</th>
                </tr>
            </thead>
            <!-- <tbody> -->
            <paginate name="misClientes" :list="buscarCliente" :per="5" tag="tbody"> <!--busca en la propiedad computada-->
                <!-- Partiendo del data buscarCliente, se recorren los elementos y se muestran sus atributos -->
                <tr v-for="cliente in paginated('misClientes')" v-bind:key="cliente.id">

                    <td width="10px" scope="row">{{ cliente.id }}</td>
                    <td><a v-bind:href="'/clientes/ver/'+cliente.id">{{ cliente.razon_social }}</a></td>
                    <!-- <td>{{ cliente.nif }}</td> -->
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
                        <!-- <button class="btn btn-outline-primary btn-sm" v-on:click="getCliente(cliente)">Editar</button> -->
                        <a scope="row" v-bind:href="'/clientes/editar/'+cliente.id" class="btn btn-outline-primary btn-sm">Editar</a>
                    </td>

                    <td width="10px">
                        <button class="btn btn-outline-danger btn-sm" v-on:click="deleteCliente(cliente)">Eliminar</button>
                    </td>
                </tr>
            </paginate>
            <!-- </tbody> -->
            <paginate-links 
                for="misClientes"
                :show-step-links="true"
                :hide-single-page="true"
                :simple="{
                    prev: 'Anterior',
                    next: 'Siguiente'  
                }">
                <!--FIXME: inhabilitar cuando no hay más páginas-->
            </paginate-links>
        </table>
    </div>
</div>
</template>



<script>
import clientes_nuevoVue from './clientes_nuevo.vue';
// https://styde.net/paginacion-en-vue-js-con-vue-paginate/

export default{
    data(){ //datos del componente
        return {
            clientes:[],    //array de clientes recogidos de db. Coge el valor que le pasa blade
            clienteBuscado:'',  //recoge el cliente que se usa para buscador
            paginate: ['misClientes']  //para paginar resultados de clientes obtenido
        }
    },
    created() {
        this.getClientes(); //carga datos BD
    },
    methods:{
        getClientes(){  //Envía http request a la url dada. El método del controlador obtiene los clientes en JSON. Los devuelve y se almacenan en clientes[] (data del objeto clientes de vue)
            var url = '/clientes/get';
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log(response);
            });
        },
        deleteCliente(cliente){   //Envía http request a la URL dada. Le envía el id del cliente seleccionado para que el método del controlador lo elimine (soft) de la bd
            var url='/clientes/delete/' + cliente.id;
            axios.delete(url).then(response => {
                console.log('eliminando cliente');
                // this.getClientes(); //recarga listado
                let clDelete = clientes.filter((cl) => cl.id = cliente.id);
                console.log(clDelete);

            });
        }
    },
    computed:{  //propiedad computada
        buscarCliente(){
            this.clienteBuscado = this.clienteBuscado.toUpperCase(); //todo en bd está en upperCase. Buscamos pues como upperCase.
            console.log(this.clienteBuscado);
            return this.clientes.filter((cliente) => cliente.razon_social.includes(this.clienteBuscado)); //a la data clientes [] se le aplica filtro
                                                                                                          //el filtro aplica a los clientes que coincidan con el data clienteBuscado.
        }
    }
}
</script>

<style>
  .paginate-links{
    width:100%;
    list-style: none;
    text-align: center;
}
.paginate-links li {
    display: inline;
    background-color:#6c757d;
    color:white;
    padding:0.5rem;
    margin-left:0.3rem;
    margin-right: 0.3rem;
    cursor:pointer;
    border-radius: 3px;
}
.paginate-result{
    width: 100%;
    text-align:center;
    margin-bottom: 1rem;
}
.espacios{
    margin-top: 10px;
}
</style>