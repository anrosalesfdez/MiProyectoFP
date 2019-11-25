<template>
<div class="row card" id="page-wrap">

    <div class="card-header">
        <h3 style="display: inline">Alta nueva factura</h3>
        <div style="display: inline; float: right">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/facturas/listar" class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    <div class="card-body espacios">

        <div class="row espacios">
            <h3 id="tituloFact">FACTURA</h3>
		</div>

		<div class="row espacios">

            <div id="logo" class="col-md-3">
              <img id="image" src="/pictures/logo.png" alt="logo" width="200px" height="140px"/>
            </div>

            <div id="emisor" class="col-md-6" style="float: left">
                <span type="text" class="form-control-plaintext form-control-sm" readonly
                    v-text="nuevaFactura.emiNombrecomercial"></span>
                <span v-if="cliente.ambito_cl != 'NACIONAL'" type="text" class="form-control-plaintext form-control-sm" readonly
                            v-text="nuevaFactura.emiNiva"></span>
                <span v-else type="text" class="form-control-plaintext form-control-sm" readonly
                            v-text="nuevaFactura.emiNif"></span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly 
                            v-text="nuevaFactura.emiDireccionfiscal"></span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly 
                            v-text="nuevaFactura.emiEmail"></span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly 
                            v-text="nuevaFactura.emiTelefono"></span>
            </div>
        </div>

        <div class="row espacios">
    		<div id="cliente" class="col-md-7 espacios">
                <select class="form-control-plaintext editable" id="cliente" v-model="cliente" @change="clFra($event)">
                    <option disabled value="null">Seleccione un cliente</option>
                    <option v-for="cliente in clientes" v-bind:value="cliente"> {{ cliente.razon_social }} </option>
                </select>
                <span type="text" class="form-control-plaintext" readonly v-model="cliente.nif">{{cliente.nif}}</span>
                <span type="text" class="form-control-plaintext" readonly v-model="cliente.direccionfiscal">{{cliente.direccionfiscal}}</span>
            </div>

    		<div id="idFra" class="col-md-5 espacios">
                <!-- <input type="text" class="form-control-plaintext form-control-sm" value="ORIGINAL"> -->
                <table>
                    <tr>
                        <td class="cabecera-title">Número factura</td>
                        <td class="cabecera-text">
                            <span type="text" readonly
                                    v-text="nuevaFactura.serie+'/'+nuevaFactura.numero">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text">
                            <input type="date" id="fecha" class="editable"
                                    v-model="nuevaFactura.fechaFra">
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Vencimiento</td>
                        <td class="cabecera-text">
                            <input type="date" readonly
                                    tabindex="-1" 
                                    v-model="nuevaFactura.vencimiento">
                        </td>
                    </tr>
                </table>
            </div>
		
		</div>

        <div id="cuerpoFra" class="col-md-12 espacios">
            <table id="items">
                <thead>
                    <tr>
                        <th class="cabecera-title" style="width: 20%">Item</th>
                        <th class="cabecera-title" style="width: 30%">Descripción</th>
                        <th class="cabecera-title" style="width: 20%" colspan="2">Precio</th>
                        <th class="cabecera-title" style="width: 15%">Cantidad</th>
                        <th class="cabecera-title" style="width: 15%">Subtotal</th>
                    </tr>
                </thead>

                <tbody v-for="linea in lineas" v-bind:key="linea">
                    <tr id="nuevoItem">
                        <td style="width: 20%">
                            <div class="delete-wpr">
                                <select class="form-control-plaintext form-control-sm editable" v-model="linea.producto">
                                    <option disabled value="null">Seleccione un producto</option>
                                    <option v-for="producto in productos" v-bind:key="producto"> {{ producto.nombre }} </option>
                                </select>
                                <a class="delete" role="button" @click="eliminarLinea(index)" title="Eliminar línea">X</a>
                            </div>
                        </td>
                        <td style="width: 30%">
                            <input type="text" class="form-control-plaintext form-control-sm editable"  
                                    v-model="linea.producto.descripcion">
                        </td>
                        <td style="width: 10%">
                            <input type="number" class="dcha editable" 
                                    step="0.01" 
                                    v-model="linea.producto.precio">
                        </td>
                        <td style="width: 10%">
                            <input type="text" class="form-control-plaintext form-control-sm"
                                    v-model="linea.producto.unidad">
                        </td>
                        <td style="width: 10%">
                            <input type="number" class=" editable dcha" 
                                    v-model="linea.cantidad" 
                                    value="1">
                        </td>
                        <td style="width: 10%">
                            <input type="number" class="dcha"
                                    step="0.01"
                                    value="(linea.precio*linea.cantidad)().toFixed(2)">
                        </td>
                    </tr>
                </tbody>
                    <button title="nuevaLinea" class="btn-default btn-xs" @click="crearLinea">
                        Nueva línea
                    </button>
            </table>
        </div>

        <div id="pieFra" class="col-md-12 espacios">
            <table id="totalesFra">
                <tr>
                    <td rowspan="4" style="width: 60%" >
                        <textarea rows="6" cols="50" placeholder="Observaciones..."></textarea>
                    </td>
                    <td class="cabecera-title" style="width: 20%">Subtotal</td>
                    <td class="cabecera-text" style="width: 20%">
                        <span type="number" class="dcha"
                                    v-text="nuevaFactura.subtotal"
                                    step="0.01">
                                {{nuevaFactura.subtotal}} €
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">xxx</td>
                </tr>
                <tr>
                    <td class="cabecera-title">Retención</td>
                    <td class="cabecera-text">xxx</td>
                </tr>
                <tr>
                    <td class="cabecera-title">Total Factura</td>
                    <td class="cabecera-text">
                        <span type="number" class="dcha"
                                    v-text="nuevaFactura.total"
                                    step="0.01">
                                {{nuevaFactura.total}} €
                        </span>
                    </td>
                </tr>
            </table>
        </div>
		
		<div id="terms" class="espacios">
		  <h5>Condiciones</h5>
		  <span>Forma de pago: {{this.cliente.forma_pago}} a {{this.cliente.dias_pago}} días.</span>
		</div>
	
	</div>
</div>
</template> 


<script>

export default{
    data(){ //datos del componente
        return {
            nuevaFactura: { // datos de factura creada
                //propios fra
                ejercicio: '',
                serie: 'VEND',
                numero: '',
                fechaFra: '',
                subtotal:'',
                total: '',
                vencimiento: '',
                formaPago: '',
                observ: '',
                //de emisor
                emiId: '',
                emiNif : '',
                emiNiva: '',
                emiNombrecomercial: '',
                emiEmail: '',
                emiTelefono: '',
                emiDireccionfiscal: '',
                emiCp: '',
                emiCiudad: '',
                emiPais: '',
                emiMoneda: '',
                emiCnae: '',
                //de cliente
                cliId:'',
                cliRazon_social:'',
                cliNif:'',
                cliNiva:'',
                cliDireccion:'',
                cliProvincia:'',
                cliPais:'',
                cliCp:'',
                cliTlfn:'',
                cliEmail:'',
                cliAmbito_cl:'',
                cliTipo_cl:'',
                cliForma_pago:'',
                cliDias_pago:'',

            },
            
            emisor: { // datos de emisor fra. (modelo UsuarioFactura)
                id:'',
                nif: '',
                niva: '',
                nombrefiscal: '',
                nombrecomercial: '',
                email:'',
                telefono: '',
                direccionfiscal: '',
                cp: '',
                ciudad: '',
                pais: '',
                moneda:'',
                cnae: '',
            },

            clientes: [], // datos de todos los clientes activos en BD (modelo Cliente)

            cliente:{ // cliente seleccionado para emitir fra
                id:'',
                razon_social:'',
                nif:'',
                niva:'',
                direccion:'',
                provincia:'',
                pais:'',
                cp:'',
                tlfn:'',
                email:'',
                ambito_cl:'',
                tipo_cl:'',
                forma_pago:'',
                dias_pago:'',
            },

            productos:[], // datos de todos los productos activos en BD (modelo Producto)

            producto:{ // producto seleccionado para ser linea
                id:'',
                nombre:'',
                descripcion: '',
                precio:0,
                unidad:''
            },

            lineas:[], //array de líneas de la factura

            linea:{
                producto:{
                    id:'',
                    nombre:'',
                    descripcion: '',
                    precio:0,
                    unidad:'',
                },
                cantidad:1,
            },

            ultimaFra:'',

            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            validado:'', //recoge errores en form. Cliente,
        }
    },
    computed: {

    },
    props:[
        'olds',
        'errors'
    ],
    created(){
        //CARGA DATOS PARA FRA
        this.datosEmisor();
        this.datosClientes();
        this.datosFactura();
        this.datosProductos();
        this.hoy(); //fecha inicial para fra. modificable.
    },
    mounted() {
        //MIN Y MAX FECHA FRA: en base al trimestre en el que estamos.
        this.minFecha();
        this.maxFecha();
    },
    methods:{
        hoy(){
            let fecha = new Date();
            return this.nuevaFactura.fechaFra = fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate();
        },
        clFra(event){
            this.nuevaFactura.cliId = this.cliente.id;
            this.nuevaFactura.cliRazon_social = this.cliente.razon_social;
            this.nuevaFactura.cliNif = this.cliente.nif;
            this.nuevaFactura.cliNiva = this.cliente.niva;
            this.nuevaFactura.cliDireccion = this.cliente.direccion;
            this.nuevaFactura.cliProvincia = this.cliente.provincia;
            this.nuevaFactura.cliPais = this.cliente.pais;
            this.nuevaFactura.cliCp = this.cliente.cp;
            this.nuevaFactura.cliTlfn = this.cliente.tlfn;
            this.nuevaFactura.cliEmail = this.cliente.email;
            this.nuevaFactura.cliAmbito_cl = this.cliente.ambito_cl;
            this.nuevaFactura.cliTipo_cl = this.cliente.tipo_cl;
            this.nuevaFactura.cliForma_pago = this.cliente.forma_pago;
            this.nuevaFactura.cliDias_pago = this.cliente.dias_pago;
            //si cliente no NACIONAL y no tenemos NIVA en emisor:
            if(this.cliente.ambito_cl !== 'NACIONAL' && this.emisor.niva === null){
                this.$notification.error("Necesitas NIVA para emitir a extranjeros", {  timer: 2, position:'topRigth' });
            }
            //calcula vencimiento
            console.log(this.nuevaFactura.fechaFra);
            let v = new Date(this.nuevaFactura.fechaFra);
            v.setDate(v.getDate() + parseInt(this.nuevaFactura.cliDias_pago));
            console.log(v);
            let mes = v.getMonth()+1;
            let dia = v.getDate();
            if (mes < 10) 
                mes = "0" + mes;
            if (dia < 10) 
                dia = "0" + dia;
            console.log(mes);
            this.nuevaFactura.vencimiento =v.getFullYear()+'-'+(mes)+'-'+dia;
        },
        //RECUPERA DEL SERVER DATOS EMISOR FRA
        datosEmisor(){
            let url = "/usuariofactura";
            axios.get(url).then(response => {
                this.emisor = response.data;
                console.log(this.emisor);
                this.nuevaFactura.emiId = this.emisor.id;
                this.nuevaFactura.emiNif = this.emisor.nif;
                this.nuevaFactura.emiNiva = this.emisor.niva;
                this.nuevaFactura.emiNombrecomercial = this.emisor.nombrecomercial;
                this.nuevaFactura.emiEmail = this.emisor.email;
                this.nuevaFactura.emiTelefono = this.emisor.telefono;
                this.nuevaFactura.emiDireccionfiscal = this.emisor.direccionfiscal;
                this.nuevaFactura.emiCp = this.emisor.cp;
                this.nuevaFactura.emiCiudad = this.emisor.ciudad;
                this.nuevaFactura.emiPais = this.emisor.pais;
                this.nuevaFactura.emiMoneda = this.emisor.moneda;
                this.nuevaFactura.emiCnae = this.emisor.cnae;
            }).catch((error) => {
                console.log(error);
            });
        },
        //RECUPERA DEL SERVER DATOS PARA INICIALIZAR NUEVA FRA
        datosFactura(){
            let url = "/facturas/getlast";
            axios.get(url).then(response => {
                this.ultimaFra = response.data.numero;
                console.log(this.ultimaFra);
                if(!this.ultimaFra)
                    this.nuevaFactura.numero = 1;
                else
                    this.nuevaFactura.numero += this.ultimaFra;
                this.nuevaFactura.ejercicio = new Date().getFullYear();
            }).catch((error) => {
                console.log(error);
            });
        },
        //RECUPERA DEL SERVER DATOS DE CLIENTES
        datosClientes(){
            let url = "/clientes/listarCl";
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log(this.clientes);
            }).catch((error) => {
                console.log(error);
            });
        },
        //RECUPERA DEL SERVER DATOS DE PRODUCTOS
        datosProductos(){
            let url = "/getProductos";
            axios.get(url).then(response => {
                this.productos = response.data;
                console.log(this.productos);
            }).catch((error) => {
                console.log(error);
            });
        },
        //MÉTODOS AUXILIARES
        minFecha(){
            let mesHoy = (new Date().getMonth()+1);
            let minMes = '';
            if(mesHoy >= 10)
                minMes = '10';
            else if(mesHoy >=7)
                minMes='07';
            else if(mesHoy >=4)
                minMes='04';
            else
                minMes='01';
            let minDia = '01';
            let minFecha = new Date().getFullYear()+'-'+minMes+'-'+minDia;
            document.getElementById("fecha").setAttribute("min", minFecha);
            console.log('minFecha: '+minFecha);
        },
        maxFecha(){
            let mesHoy = (new Date().getMonth()+1);
            let maxMes = '';
            let maxDia = '';
            if(mesHoy >= 10){
                maxMes = '12';
                maxDia = '31';
            }else if(mesHoy >=7){
                maxMes='09';
                maxDia = '30';
            }else if(mesHoy >=4){
                maxMes='06';
                maxDia = '30';
            }else{
                maxMes='03';
                maxDia = '31';
            }
            let maxFecha = new Date().getFullYear()+'-'+maxMes+'-'+maxDia;
            document.getElementById("fecha").setAttribute("max", maxFecha);
            console.log('maxFecha: '+maxFecha);
        },
        //MÉTODOS GESTIÓN INTERFAZ
        //NUEVA LÍNEA FRA
        crearLinea() {
            this.lineas.push(Vue.util.extend({}, this.linea))
        },
        //ELIMINA LÍNEA FRA
        eliminarLinea(index){
            Vue.delete(this.lineas, index);
        }
    } //end methods
}
</script>

<style>
.espacios { margin-top: 20px; margin-bottom: 20px; }

* { margin: 0; padding: 0; }

body { font: 14px/1.4 Georgia, serif; }

#page-wrap { width: 800px; margin: 0 auto; } /* tamaño A4¿? */

/**titulo: F A C T U R A */
#tituloFact { width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

/*logo */
#logo { text-align: right; float: right; position: relative; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }

/*inputs // span */
input { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; padding: 5px; }
span { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; padding: 5px; }
.editable { background-color:#08FBA1; }
td {padding: 5px;}
.dcha{float: right; text-align: right;}
/* todas las tablas */
table { border-collapse: collapse; } /** solapa los bordes*/
.cabecera-title{ padding: 5px; text-align: left; font-weight: bold;  background: #eee; border: 1px solid black;}
.cabecera-text{ padding: 5px; text-align: rigth; float: rigth; border: 1px solid black;}
#items{width: 100%;}
#totalesFra{width: 100%;}
/*terminos de la fra */
#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }

/* textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; } */

/* textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; } */




/*#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }



textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }*/

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

</style>