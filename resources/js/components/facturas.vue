<template>
<div class="row" id="facturas">


        <div class="col-md-12 espacios">
            <h3 style="display: inline">Facturación</h3>
            <a class="btn btn-success" role="button" href="/facturas/crear">Nueva factura</a>
        </div> 
                
        <v-client-table ref="tabla" class="col-md-12" :data="facturas" :columns="columns" :options="options">
            <div slot="razon_social" slot-scope="props" style="display: inline">
                <a :href="'/facturas/ver/'+props.row.id" >{{props.row.id}}</a>
            </div>
            <div slot="acciones" slot-scope="props" style="display: inline">
                <a title="duplicar" class="btn btn-xs" :href="'/clientes/editar/'+props.row.id" >
                    Duplicar
                </a>
                <button title="anular" class="btn btn-xs" @click.prevent="anular(props.row.id)">
                   Anular
                </button>
            </div>
        </v-client-table> 
</div>
</template>



<script>

export default{
    data(){ //datos del componente
        return {
            columns: ['serie', 'numero', 'fecha_fra', 'cliente_id', 'total', 'anulada', 'pagada', 'presentada'],
            
            filterByColumn: true,

            options:{
                sortable: ['serie', 'numero', 'fecha_fra', 'cliente_id', 'anulada', 'pagada', 'presentada'],
                filterable: ['serie', 'numero', 'cliente_id'],
                headings: {
                        serie: 'SERIE',
                        numero: 'NÚMERO',
                        fecha_fra: 'FECHA',
                        cliente_id: 'CLIENTE',
                        anulada: 'ANULADA',
                        pagada: 'PAGADA',
                        presentada: 'PRESENTADA',
                        'acciones': 'ACCIONES'
                    },

                orderBy: {
                    column: 'id',
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
        'facturas'
    ],
    methods:{
        
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