<template>
<div class="row" id="clientes">


        <div class="col-md-6 espacios">
            <h3 style="display: inline">Listado de Clientes</h3>
        </div>
        <div class="col-md-6" style="display: inline; float:rigth">
            <a style="float: right" class="btn btn-success" role="button" href="/clientes/crear">Nuevo cliente</a>
        </div> 
                
        <!-- tabla que muestra todos los clientes -->
        <!-- <div id="people">
            <v-server-table url="/clientes/getClientesNonTrashed" :data="clientes" :columns="columns" :options="options">
                <div slot="razon_social" slot-scope="props">
                    <a :href="'/clientes/ver/'+props.row.id" >{{props.row.razon_social}}</a>
                </div>
                <div slot="acciones" slot-scope="props" style="display: inline">
                    <a title="editar" class="btn btn-xs" :href="'/clientes/editar/'+props.row.id" >
                        <i class="material-icons" style="font-size: 18px; color:blue">edit</i>
                    </a>
                    <button title="eliminar" class="btn btn-xs" @click.prevent="deleteCliente(props.row.id)">
                        <i class="material-icons" style="font-size: 18px; color:red">delete</i>
                    </button>
                </div>
            </v-server-table>
        </div> -->
        <v-client-table ref="tabla" class="col-md-12" :data="clientes" :columns="columns" :options="options">
            <div slot="razon_social" slot-scope="props" style="display: inline">
                <a :href="'/clientes/ver/'+props.row.id" >{{props.row.razon_social}}</a>
            </div>
            <div slot="acciones" slot-scope="props" style="display: inline">
                <a title="editar" class="btn btn-xs" :href="'/clientes/editar/'+props.row.id" >
                    <i class="material-icons" style="font-size: 18px; color:blue">edit</i>
                </a>
                <button title="eliminar" class="btn btn-xs" @click.prevent="deleteCliente(props.row.id)">
                   <i class="material-icons" style="font-size: 18px; color:red">delete</i>
                </button>
            </div>
        </v-client-table> 
</div>
</template>



<script>

export default{
    data(){ //datos del componente
        return {
            columns: ['id', 'razon_social', 'nif', 'pais', 'ambito_cl', 'tipo_cl', 'acciones'],
            
            filterByColumn: true,

            options:{
                sortable: ['id', 'razon_social', 'nif', 'pais', 'ambito_cl', 'tipo_cl'],
                filterable: ['razon_social'],
                headings: {
                        id: 'ID',
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
                    console.log(response.error);
                    if(response.error){
                        this.$notification.error("response.error", {  timer: 3, position:'topRigth' });
                    }else{
                        let vue = this;
                        this.$notification.success("Cliente eliminado correctamente!", {  timer: 3, position:'topRigth' });
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

/* mio */
.espacios{
    margin-top: 10px;
}
.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

/* s */
.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    /* float: left; */
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}

/* vye tables 2 */
.VueTables__date-filter {
  border: 1px solid #ccc;
  padding: 6px;
  border-radius: 4px;
  cursor: pointer;
}
</style>