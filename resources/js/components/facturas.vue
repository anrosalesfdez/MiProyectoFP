<template>
<div class="row" id="facturas">


        <div class="col-md-12 espacios">
            <h3 style="display: inline">Facturación</h3>
            <a class="nuevaPag" href="/facturas/crear">
                <i class="material-icons">control_point</i>
                Nueva factura
            </a>
        </div> 
                
        <v-client-table ref="tabla" class="col-md-12" :data="misFacturas" :columns="columns" :options="options">
            
            <div slot="numero" slot-scope="props" style="display: inline">
                <a :href="'ver/'+props.row.id" >{{props.row.numero}}</a>
            </div>

            <div slot="total" slot-scope="props" style="display: inline">
                <span style="font-family: Lato, sans-serif; text-align: right;">{{ props.row.total +' €'}}</span>
                <!-- <input type="number" v-model="props.row.total" name="total" disabled readonly/> -->
            </div>

            <div v-if="props.row.anulada == 0"slot="anulada" slot-scope="props" style="display: inline">
                <input type="checkbox" name="anulada" @click.prevent="anular(props.row.id)">
            </div>
            <div v-else slot="anulada" slot-scope="props" style="display: inline">
                <input type="checkbox" :checked="props.row.anulada == 1" name="anulada" disabled readonly>
            </div>

            <div slot="pagada" slot-scope="props" style="display: inline">
                <input type="checkbox" :checked="props.row.pagada == 1" name="pagada" @click.prevent="pagar(props.row.id)">
            </div>

            <div slot="presentada" slot-scope="props" style="display: inline">
                <input type="checkbox" :checked="props.row.presentada == 1" name="presentada" @click.prevent="presentar(props.row.id)">
            </div>

        </v-client-table> 
</div>
</template>



<script>

export default{
    data(){ //datos del componente
        return {
            misFacturas: this.facturas,

            columns: ['serie', 'numero', 'fecha', 'cli_razon_social', 'total', 'anulada', 'pagada', 'presentada'],
            
            filterByColumn: true,

            options:{
                dateColumns:['created_at','updated_at'],
                toMomentFormat: 'YYYY-MM-DD',
                sortable: ['serie', 'numero', 'fecha', 'cli_razon_social', 'total', 'anulada', 'pagada', 'presentada'],
                filterable: ['serie', 'numero', 'cliente_id'],
                headings: {
                        serie: 'SERIE',
                        numero: 'Nº',
                        fecha: 'FECHA',
                        cli_razon_social: 'CLIENTE',
                        total: 'TOTAL',
                        anulada: 'ANULADA',
                        pagada: 'PAGADA',
                        presentada: 'PRESENTADA',
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
    computed: {

    },
    created() {
        
    },
    methods:{
        //mostrar datos
        pagar(){
            for(var i=0; i< this.facturas.length; i++){
                console.log(this.facturas[i].pagada == 0)
                if(this.facturas[i].pagada == 0){
                    this.pagada.push('NO PAGADA');
                    console.log(this.pagada);
                }else{
                    this.pagada.push('PAGADA');
                    console.log(this.pagada);
                }
            }
        },
        
        //acciones
        anular(id){
            console.log(this.facturas);
            console.log(id)
            console.log(typeof(this.facturas[id].anulada))
            let anu = this.facturas.find(f => f.id == id);
            if( anu !== 1){
                if(confirm("Estás seguro de querer anular la factura?")){
                    let url='/facturas/delete/'+id;
                    console.log('eliminando: '+id)
                    axios.delete(url)
                    .then(response => {
                        console.log(response);
                        this.misFacturas = response.data;
                        this.$notify({
                            text: 'Factura anulada correctamente',
                            type: 'success',
                        });
                        // location.reload();
                    }).catch((error) => {
                        console.log(error);
                        this.$notify({
                            text: error,
                            type: 'error',
                        });
                    });
                }
            }
        },

        pagar(id){
            let url='/facturas/pagar/' + id;
            console.log('pagando: '+id)
            axios.post(url, {id})
            .then(response => {
                console.log(response);
                this.misFacturas = response.data;
            }).catch((error) => {
                console.log(error);
                this.$notify({
                    text: error,
                    type: 'error',
                });
            });
        },

        presentar(id){
            let url='/facturas/presentar/' + id;
            console.log('presentando: '+id)
            axios.post(url, {id})
            .then(response => {
                console.log(response);
                this.misFacturas = response.data;
            }).catch((error) => {
                console.log(error);
                this.$notify({
                    text: error,
                    type: 'error',
                });
            });
        }
    },

}
</script>
