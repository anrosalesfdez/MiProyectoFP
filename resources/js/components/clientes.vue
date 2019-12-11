<template>
<div class="row" id="clientes">
    <notifications classes="my-style" position="top right"/>

        <div class="col-md-12 espacios">
            <h3 style="display: inline">Mantenimiento de Clientes</h3>
            <a class="nuevaPag" href="/clientes/crear">
                <i class="material-icons">control_point</i>
                Nuevo cliente
            </a>

        </div> 
                
        <v-client-table ref="tabla" class="col-md-12" :data="clientes" :columns="columns" :options="options">
            <div slot="razon_social" slot-scope="props" style="display: inline">
                <a :href="'/clientes/ver/'+props.row.id" >{{props.row.razon_social}}</a>
            </div>
            <div slot="acciones" slot-scope="props" style="display: inline">
                <a title="editar" class="btn btn-xs" :href="'/clientes/editar/'+props.row.id" >
                    <i class="material-icons iconosEdicion">edit</i>
                </a>
                <button title="eliminar" class="btn btn-xs" @click.prevent="deleteCliente(props.row.id)">
                   <i class="material-icons iconosEdicion">delete</i>
                </button>
            </div>
        </v-client-table> 
</div>
</template>



<script>

export default{
    data(){ //datos del componente
        return {
            columns: ['razon_social', 'nif', 'pais', 'ambito', 'tipo', 'acciones'],
            
            filterByColumn: true,

            options:{
                sortable: ['razon_social', 'nif', 'pais', 'ambito', 'tipo'],
                filterable: ['razon_social'],
                headings: {
                        razon_social: 'RAZÓN SOCIAL',
                        nif: 'NIF',
                        pais: 'PAÍS',
                        ambito_cl: 'ÁMBITO',
                        tipo_cl: 'TIPO',
                        'acciones': 'ACCIONES'
                    },

                orderBy: {
                    column: 'razon_social',
                    ascending: true
                },
                
                pagination: { chunk:10,dropdown:false,nav: 'scroll'},

                sortIcon: {
                    base: 'icon',
                    up: 'icon-sort-up',
                    down: 'icon-sort-down',
                    is: 'icon-sort'
                },

                perPage:5,

                texts: {
                        filter: "",
                        filterPlaceholder: "Filtrar resultados",
                        // filterBy: 'Filtrar por {razon_social}',
                        count:' '
                    },
                columnsDropdown: false, //permite que el user elija que columnas ver.
            }
        }
    },
    props:[
        'clientes'
    ],
    methods:{
        deleteCliente(id){   //Envía http request a la URL dada. Le envía el id del cliente seleccionado para que el método del controlador lo elimine (soft) de la bd
            if(confirm("Estás seguro de eliminar?")){

                var url='/clientes/delete/' + id;
                axios.delete(url).then(response => {
                    // console.log(response.error);
                    if(response.error){
                        this.$notify({
                            text: response.error,
                            type: 'error',
                        });
                    }else{
                        this.$notify({
                            text: 'Cliente eliminado correctamente',
                            type: 'success',
                        });
                        let vue = this;
                        vue.clientes = _.remove(vue.clientes, user => {
                            return user.id != id;
                        });
                    }
                });
            }
        }
    }
}
</script>