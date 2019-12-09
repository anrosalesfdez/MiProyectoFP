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
            <!-- DATOS EMISOR FACTURA -->
            <div id="emisor" class="col-md-6" style="float: left">
                <input type="text" id="emi_nombre_fiscal" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.nombre_fiscal">
                <input v-if="nuevaFactura.emi_nif == ''" type="text" id="emiNif" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.nif">
                <input v-else type="text" id="emi_niva" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.niva">
                <input type="text" id="emi_direccion_fiscal" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.direccion_fiscal">
                <input type="text" id="emi_email" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.email">
                <input type="text" id="emi_telefono" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.telefono">
            </div>
        </div>
        <!-- DATOS CLIENTE FACTURA -->
        <div class="row espacios">
    		<div id="cliente" class="col-md-7 espacios">
                <select class="form-control-plaintext editable" id="cliente" v-model="cliente" @change="clFra($event)">
                    <option disabled value="null">Seleccione un cliente</option>
                    <option v-for="cliente in clientes" :key="cliente.id" :value="cliente"> {{ cliente.razon_social }} </option>
                </select>
                <input type="text" id="cli_nif" size="50" readonly
                                    tabindex="-1" 
                                    v-model="cliente.nif"
                                    value="cliente.nif">
                <input type="text" id="cli_direccion" size="50" readonly
                                    tabindex="-1" 
                                    v-model="cliente.direccion"
                                    value="cliente.direccion">
            </div>

    		<div id="idFra" class="col-md-5 espacios">
                <!-- DATOS BÁSICOS FRA -->
                <!-- <input type="text" class="form-control-plaintext form-control-sm" value="ORIGINAL"> -->
                <table>
                    <tr>
                        <td class="cabecera-title">Número factura</td>
                        <td class="cabecera-text">
                            <!-- <input type="text" id="cliDireccion" size="50" readonly
                                    tabindex="-1" 
                                    value="nuevaFactura.serie+'/'+nuevaFactura.numero"> -->
                            <span type="text" readonly
                                    v-text="nuevaFactura.serie+'/'+nuevaFactura.numero">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text">
                            <input type="date" id="fecha" class="editable"
                                    v-model="nuevaFactura.fecha">
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
        <!-- BLOQUE LÍNEAS FACTURA -->
        <div id="cuerpoFra" class="col-md-12 espacios">
            <table id="items">
                <thead>
                    <tr class="row">
                        <!-- <th class="cabecera-title" style="width: 20%">Item</th> -->
                        <th class="cabecera-title" style="width: 20%">Item</th>
                        <th class="cabecera-title" style="width: 30%">Descripción</th>
                        <th class="cabecera-title" style="width: 10%">Precio</th>
                        <th class="cabecera-title" style="width: 10%">Unidad</th>
                        <th class="cabecera-title" style="width: 10%">Cantidad</th>
                        <th class="cabecera-title" style="width: 20%">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- CADA LÍNEA DE FACTURA -->
                    <!-- trae el componente "item" con las propiedades linea y productos -->
                    <tr class="row" v-for="linea in lineas" :key="linea.id" is="item" :linea="linea" :productos="productos"></tr>
                </tbody>
                <button title="nuevaLinea" class="btn-default btn-xs" @click="crearLinea">
                    Nueva línea
                </button>
            </table>
        </div>

        <div id="pieFra" class="col-md-12 espacios">
            <table id="totalesFra">
                <tr>
                    <td class="cabecera-title" style="width: 10%">21%</td>
                    <td class="cabecera-text" style="width: 10%">
                        <input type="number" class="dcha"
                                    v-model="nuevaFactura.base21"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title" style="width: 15%">Subtotal</td>
                    <td class="cabecera-text" style="width: 15%">
                        <input type="number" class="dcha"
                                    v-model="gransubtotal"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">10%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="number" class="dcha"
                                    v-model="nuevaFactura.base10"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">
                        <input type="number" class="dcha"
                                    v-model="impuestos"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">4%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="number" class="dcha"
                                    v-model="nuevaFactura.base04"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Retención</td>
                    <td class="cabecera-text">
                        <input type="number" class="dcha"
                                    v-model="retencion"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">0%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="number" class="dcha"
                                    v-model="nuevaFactura.base00"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Total Factura</td>
                    <td class="cabecera-text">
                        <input type="number" class="dcha"
                                    v-model="total"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td rowspan="12" style="width: 100%" >
                        <textarea rows="12" cols="20" placeholder="Observaciones..."></textarea>
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
                fecha: '',
                vencimiento: '',
                observ: '',
                base00:'',
                base04:'',
                base10:'',
                base21:'',
                //de emisor
                emi_nif:'', 
                emi_niva:'', 
                emi_nombre_fiscal:'', 
                emi_nombre_comercial:'', 
                emi_direccion_fiscal:'', 
                emi_direccion_comercial:'', 
                emi_cp_fiscal:'', 
                emi_cp_comercial:'', 
                emi_provincia_fiscal:'', 
                emi_provincia_comercial:'', 
                emi_pais_fiscal:'', 
                emi_pais_comercial:'', 
                emi_telefono:'', 
                emi_email:'', 
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
            lineas:[], //array de líneas de la factura
            linea:{
                id:'',
                producto:{
                    id:'',
                    nombre:'',
                    descripcion: '',
                    precio:0,
                    unidad:'',
                    actividades_codigo:'',
                },
                cantidad:1,
            },
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            validado:'', //recoge errores
        }
    },
    props:[
        'olds',
        'errors', //lo genera Laravel
        'emisor',
        'clientes',
        'productos',
        'ultima',
        'impuestosfacturacion'
    ],
    computed: {
		gransubtotal: function() {
            return (this.lineas.reduce((sum, i) => sum + i.cantidad * i.producto.precio, 0));
        },
        impuestos: function(){
            return
        },
        retencion: function(){
            return
        },
        total: function() {
            return this.gransubtotal + this.impuestos + this.retencion;
        }
    },
    components: {
        item: {
            props: [
                'productos',
                'linea',
            ],
            template: '<tr><td style="width: 20%"><div class="delete-wpr"><select class="form-control-plaintext form-control-sm editable" v-model="linea.producto"><option disabled value="null">Seleccione un producto</option><option v-for="producto in productos" :key="producto.id" :value="producto"> {{ producto.nombre }} </option></select><a class="delete" role="button" @click="eliminarLinea(index)" title="Eliminar línea">X</a></div></td><td style="width: 30%"><input type="text" class="editable" maxlength="50" size="27" v-model="linea.producto.descripcion"></td><td style="width: 10%"><input type="number" class="editable dcha" style="width: 100%" step="0.01" v-model="linea.producto.precio"></td><td style="width: 10%"><input type="text"  readonly maxlength="10" size="10" tabindex="-1" v-model="linea.producto.unidad"></td><td style="width: 10%"><input type="number" class="editable dcha" style="width: 100%" v-model="linea.cantidad" value="1"></td><td style="width: 10%"><input type="number" readonly class="dcha" style="width: 100%" tabindex="-1" v-model="subtotal" @change="calculaBase"></td><td style="width: 10%"><input type="hidden"  readonly maxlength="10" size="10" tabindex="-1" v-model="linea.producto.actividades_codigo"></td></tr>',
            computed: {
                subtotal: function() { //este dato no se almacena
                    return this.linea.producto.precio * this.linea.cantidad;
                }
            }
        }
    },
    created(){
        this.datosFactura();
        this.hoy(); //fecha inicial para fra. modificable.
        console.log(typeof this.productos);
    },
    mounted() {
        //MIN Y MAX FECHA FRA: en base al trimestre en el que estamos.
        this.minFecha();
        this.maxFecha();

        if(!this.emisor.nif)
            this.$notification.error("Necesitas NIF para emitir facturas", {  timer: 4, position:'topRigth' });
    },
    methods:{
        calculaBase(){
            //1---cuando cambie subtotal, recoge impuesto de la línea y 
            //busca impto_facturacion en array of objects impuestosfacturacion
            var devReact = this.impuestosfacturacion.filter(obj => obj.tipo.includes(this.cliente.tipo)).map(obj => ({"impto_linea":obj.impto_linea_fra, "retencion_linea":obj.retencion_linea_fra}));
            console.log(devReact);
            //2---una vez tiene el tipo a aplicar: tipo*subtotal y lo añade a base que corresponda
        },
        encuentraImpuesto(tipo, ambito, impto_act){ //ej: PERSONA FISICA NACIONAL GE
            // var filter = {
            //     tipo: tipo,  //'PERSONA FISICA'
            //     ambito: ambito, //'NACIONAL'
            //     impto_act: impto_act,  //'GE'
            // };
            // for (var key in filter) {
            //     if (filter[key] === undefined || filter[key] != this.[key])
            //     return false;
            // }
            //     return true;
        },
        
        hoy(){
            let fecha = new Date();
            let mes = fecha.getMonth()+1;
            if(mes.toString().length == 1)
                mes = '0'+mes;
            let dia = fecha.getDate();
            if(dia.toString().length == 1)
                dia = '0'+dia;
            console.log('hoy!!!'+fecha.getFullYear()+'-'+mes+'-'+dia);
            return this.nuevaFactura.fecha = fecha.getFullYear()+'-'+mes+'-'+dia;
        },
        clFra(event){
            //si cliente no NACIONAL y no tenemos NIVA en emisor:
            if(this.cliente.ambito !== 'NACIONAL' && this.emisor.niva === null){
                this.$notification.error("Necesitas NIVA para emitir a extranjeros", {  timer: 2, position:'topRigth' });
            }
            //calcula vencimiento
            let v = new Date(this.nuevaFactura.fecha);
            v.setDate(v.getDate() + parseInt(this.cliente.dias_pago));
            let mes = v.getMonth()+1;
            let dia = v.getDate();
            if (mes < 10) 
                mes = "0" + mes;
            if (dia < 10) 
                dia = "0" + dia;
            this.nuevaFactura.vencimiento =v.getFullYear()+'-'+(mes)+'-'+dia;
        },
        //RECUPERA DEL SERVER DATOS PARA INICIALIZAR NUEVA FRA
        datosFactura(){
            if(!this.ultima)
                    this.nuevaFactura.numero = 1;
                else
                    this.nuevaFactura.numero += this.ultima;
                this.nuevaFactura.ejercicio = new Date().getFullYear();
        },
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
            this.lineas.push(Vue.util.extend({}, this.linea));
            this.lineas.slice(-1)[0].id = this.lineas.length+1;
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