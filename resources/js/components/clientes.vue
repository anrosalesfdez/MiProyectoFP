<template>
<div class="row" id="clientes">


        <div class="col-md-6">
            <h3 style="display: inline; float: left">Listado de Clientes</h3>
        </div>
        <div class="col-md-6" style="display: inline; margin-rigth:0; float:left">
            <div class="col-md-4 funkyradio" style="display: inline; float:left">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="checkbox1" id="checkbox1" checked @change="getClientesNonTrashed()" />
                        <span class="oi oi-check"></span>
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        Clientes activos
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="checkbox2" id="checkbox2" @change="getClientesAll()" />
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        Todos los clientes
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="checkbox3" id="checkbox3" @change="getClientesTrashed()" />
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        Clientes inactivos
                    </label>
                </div>
            </div>
            
            <div class="col-md-1" style="display: inline; float:rigth">
                <a style="float: right" class="btn btn-success" role="button" href="/clientes/crear">Nuevo cliente</a>
            </div>       
    </div>
        
        <!-- tabla que muestra todos los clientes -->
<!--         
        <div id="people">
            <v-server-table url="/clientes/get" :columns="columns" :options="options">
                <div slot="razon_social" slot-scope="props">
                    <a :href="'/clientes/ver/'+props.row.id" >{{props.row.razon_social}}</a>
                </div>
                <div slot="acciones" slot-scope="props">
                    <a type="button" class="btn btn-outline-primary btn-sm" :href="'/clientes/editar/'+props.row.id" >Editar</a>
                    <button class="btn btn-outline-danger btn-sm" @click.prevent="deleteCliente(props.row.id)">Eliminar</button>
                </div>
            </v-server-table>
        </div> -->
        
        <v-client-table class="col-md-12" :data="clientes" :columns="columns" :options="options">
            <div slot="razon_social" slot-scope="props">
                <a :href="'/clientes/ver/'+props.row.id" >{{props.row.razon_social}}</a>
            </div>
            <div slot="acciones" slot-scope="props">
                <a type="button" class="btn btn-outline-primary btn-sm" :href="'/clientes/editar/'+props.row.id" >Editar</a>
                <button class="btn btn-outline-danger btn-sm" @click.prevent="deleteCliente(props.row.id)">Eliminar</button>
            </div>
        </v-client-table> 
</div>
</template>



<script>

export default{
    data(){ //datos del componente
        return {
            clientes: [],    //array de clientes recogidos de db. Coge el valor que le pasa blade
            columns: ['id', 'razon_social', 'niva', 'pais', 'ambito_cl', 'tipo_cl', 'acciones'],
            
            filterByColumn: true,

            options:{
                sortable: ['id', 'razon_social', 'niva', 'pais', 'ambito_cl', 'tipo_cl'],
                filterable: ['razon_social'],
                headings: {
                        id: 'ID',
                        razon_social: 'RAZÓN SOCIAL',
                        niva: 'NIVA',
                        pais: 'PAÍS',
                        ambito_cl: 'ÁMBITO',
                        tipo_cl: 'TIPO',
                        'acciones': 'ACCIONES'
                    },

                orderBy: {
                    column: 'razon_social',
                    ascending: true
                },

                sortIcon: { base:'glyphicon',
                            up:'glyphicon-chevron-up',
                            down:'glyphicon-chevron-down',
                            is:'glyphicon-sort'
                            },

                perPage:10,

                texts: {
                        filter: "",
                        filterPlaceholder: "Filtrar resultados",
                        filterBy: 'Filtrar por {razon_social}',
                        count:' '
                    },
            }
        }
    },
    created() {
            this.getClientesNonTrashed(); //carga datos BD
    },
    methods:{
        getClientesNonTrashed(){  //Envía http request a la url dada. El método del controlador obtiene los clientes en JSON. Los devuelve y se almacenan en clientes[] (data del objeto clientes de vue)
            var url = '/clientes/getNonTrashed';
            console.log('dentro get cl');
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log('respuesta getNonTrashed');
                console.log(response);
            });
        },
        getClientesAll(){  //Envía http request a la url dada. El método del controlador obtiene los clientes en JSON. Los devuelve y se almacenan en clientes[] (data del objeto clientes de vue)
            var url = '/clientes/getAll';
            console.log('dentro get cl');
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log('respuesta getAll');
                console.log(response);
                console.log(response.data);
                console.log(response.count);
                
            });
        },
        getClientesTrashed(){  //Envía http request a la url dada. El método del controlador obtiene los clientes en JSON. Los devuelve y se almacenan en clientes[] (data del objeto clientes de vue)
            var url = '/clientes/getTrashed';
            console.log('dentro get cl');
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log('respuesta getTrashed');
                console.log(response);
                console.log(response.data);
                console.log(response.count);
                
            });
        },
        deleteCliente(id){   //Envía http request a la URL dada. Le envía el id del cliente seleccionado para que el método del controlador lo elimine (soft) de la bd
            var url='/clientes/delete/' + id;
            axios.delete(url).then(response => {
                console.log(response.error);
                if(response.error){
                    this.$notification.error("response.error", {  timer: 3, position:'topRigth' });
                }else{
                    this.$notification.success("Cliente guardado correctamente!", {  timer: 2, position:'topRigth' });
                }
                this.getClientes(); //recarga listado
            });
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
.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
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
</style>