<template>
<div class="row" id="clientes">
    <div class="col-sm-12">
        <h3>Mantenimiento de Clientes</h3>
    </div>

    <div class="col-sm-12">
        <div class="espacios" style="display: inline; float: left">
            <!-- link a crear nuevo cliente -->
            <a class="btn btn-success pull-right" role="button" href="/clientes/crear">Nuevo cliente</a>
        </div>
              
        <!-- tabla que muestra todos los clientes -->
        <v-client-table :data="clientes" :columns="titulos" :options="options">
            
            <a slot="razon_social" slot-scope="props" target="_blank" :href="props.row.razon_social" class="glyphicon glyphicon-eye-open"></a>
        </v-client-table>
            
    </div>
</div>
</template>



<script>

export default{
    data(){ //datos del componente
        return {
            clientes: [],    //array de clientes recogidos de db. Coge el valor que le pasa blade
            titulos: ['ID', 'RAZÓN SOCIAL', 'NIVA', 'PAÍS', 'ÁMBITO', 'TIPO', 'OPCIONES'],
            filterByColumn: true,
            options:{
                sortable: ['ID', 'RAZÓN SOCIAL', 'NIVA', 'PAÍS', 'ÁMBITO', 'TIPO'],
                sortIcon: {
                    down: 'arrow arrow-down',
                    up: 'arrow arrow-up'
                },
                filterable: ['ID', 'RAZÓN SOCIAL', 'NIVA', 'PAÍS', 'ÁMBITO', 'TIPO'],
                perPage:5,
                texts: {
                        filter: "Filtrar resultados:",
                        filterPlaceholder: "Filtrar resultados",
                        filterBy: 'Filtrar por {column}',
                        count:' '
                    },
            }
            // paginate: ['misClientes']  //para paginar resultados de clientes obtenido
        }
    },
    created() {
            this.getClientes(); //carga datos BD
    },
    methods:{
        getClientes(){  //Envía http request a la url dada. El método del controlador obtiene los clientes en JSON. Los devuelve y se almacenan en clientes[] (data del objeto clientes de vue)
            var url = '/clientes/get';
            console.log('dentro');
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log('de vuelta');
                console.log(this.clientes);
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