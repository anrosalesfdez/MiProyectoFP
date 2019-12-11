<template>
<div class="row card" id="page-wrap">

    <div class="card-header">
        <h3 style="display: inline">Alta nueva factura</h3>
        <div style="display: inline; float: right">
            <button type="submit" class="btn btn-success" @click="enviar">Guardar</button>
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
                <input type="hidden" v-model="emisor.id">
                <input type="text" id="emi_nombre_fiscal" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.nombre_fiscal">
                <input v-if="nuevaFactura.emi_nif == ''" type="text" id="emiNif" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.nif">
                <input v-else type="text" id="emi_niva" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emisor.niva">
                <input type="text" id="emi_direccion1" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emi_direccion1">
                <input type="text" id="emi_direccion2" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emi_direccion2">
                <input type="text" id="emi_contacto" size="50" readonly
                                    tabindex="-1" 
                                    v-model="emi_contacto">
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
                                    v-model="cliente.nif">
                <input type="text" id="cli_direccion1" size="50" readonly
                                    tabindex="-1" 
                                    v-model="cli_direccion1">
                <input type="text" id="cli_direccion2" size="50" readonly
                                    tabindex="-1" 
                                    v-model="cli_direccion2">
                <input type="text" id="cli_contacto" size="50" readonly
                                    tabindex="-1" 
                                    v-model="cli_contacto">
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
                        <th class="cabecera-title" style="width: 20%">Item</th>
                        <th class="cabecera-title" style="width: 20%">Descripción</th>
                        <th class="cabecera-title" style="width: 15%">Precio</th>
                        <th class="cabecera-title" style="width: 15%">Unidad</th>
                        <th class="cabecera-title" style="width: 15%">Cantidad</th>
                        <th class="cabecera-title" style="width: 15%">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- CADA LÍNEA DE FACTURA -->
                    <!-- trae el componente "item" con las propiedades linea y productos -->
                    <!-- <tr class="row" v-for="linea in lineas" :key="linea.id" is="item" :linea="linea" :productos="productos" v-on:calcula="calculaBase" v-on:elimina="eliminarLinea(index)"></tr> -->
                    <tr class="row" v-for="(linea, index) in lineas" :key="linea.id" is="item" :linea="linea" :productos="productos" v-on:calcula="calculaBase" v-on:elimina="eliminarLinea(index)"></tr>
                </tbody>
                <button title="nuevaLinea" class="btn-default btn-xs" @click="crearLinea">
                    Nueva línea
                </button>
                <button title="calculaTotales" class="btn-default btn-xs" @click="calculaTotales">
                    Calcular factura
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
                                    v-html="nuevaFactura.base10"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">
                        <input type="number" class="dcha"
                                    v-model="nuevaFactura.impuesto"
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
                                    v-model="nuevaFactura.retencion"
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
                        <!-- <span>{{ formatPrice(nuevaFactura.total) € }}</span> -->
                        <input type="number" class="dcha"
                                    v-model="nuevaFactura.total"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style="width: 100%">
                        <textarea class="form-control" name="observaciones" id="observaciones"
                                placeholder="Observaciones"
                                v-model="nuevaFactura.observaciones"></textarea>
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

import item from './item.vue';

export default{
    data(){ //datos del componente
        return {
            nuevaFactura: { // datos de factura creada
                //propios fra (se calculan al iniciar factura)
                ejercicio: '',
                serie: 'VEND',
                numero: '',
                fecha: '',
                vencimiento: '',
                observ: '',
                //se calculan con el método calcularTotales()
                base00:0,
                base04:0,
                base10:0,
                base21:0,
                retencion:0,
                impuesto:0,
                gransubtotal:0,
                total:0,
                //de emisor
                emi_id:'', 
                emi_nif:'', 
                emi_niva:'', 
                emi_nombre_fiscal:'', 
                emi_direccion_fiscal:'', 
                emi_cp_fiscal:'', 
                emi_provincia_fiscal:'', 
                emi_pais_fiscal:'', 
                emi_telefono:'', 
                emi_email:'', 
                //de cliente
                cli_id:'',
                cli_razon_social:'',
                cli_nif:'',
                cli_niva:'',
                cli_direccion:'',
                cli_cp:'',
                cli_provincia:'',
                cli_pais:'',
                cli_telefono:'',
                cli_email:'',
                cli_ambito:'',
                cli_tipo:'',
                cli_forma_pago:'',
                cli_dias_pago:'',

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
                ambito:'',
                tipo:'',
                forma_pago:'',
                dias_pago:'',
            },
            lineas:[], //array de líneas de la factura
            linea:{
                id:'',
                factura_id:'',
                ejercicio:'',
                serie:'',
                numero_fra:'',
                numero:'',
                producto:{
                    producto_id:'',
                    nombre:'',
                    descripcion: '',
                    precio:0,
                    unidad:'',
                    actividades_impuesto:'',
                },
                cantidad:1,
                impuesto:0,
                retencion:0
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
            return parseFloat((this.lineas.reduce((sum, i) => sum + i.cantidad * i.producto.precio, 0))).toFixed(2);
        },
        emi_direccion1: function(){
            return this.emisor.direccion_fiscal + ' - ' + this.emisor.cp_fiscal;
        },
        emi_direccion2: function(){
            return this.emisor.provincia_fiscal + ' - ' + this.emisor.pais_fiscal;
        },
        emi_contacto: function(){
            return this.emisor.email + ' - ' + this.emisor.telefono;
        },
        cli_direccion1: function(){
            return this.cliente.direccion + ' - ' + this.cliente.cp;
        },
        cli_direccion2: function(){
            return this.cliente.provincia + ' - ' + this.cliente.pais;
        },
        cli_contacto: function(){
            return (this.cliente.email == null ? '' : this.cliente.email) + (this.cliente.telefono == null ? '' : ' - ' + this.cliente.telefono);
        },
        
    },
    components: {
        item
    },
    created(){
    },
    mounted() {
        //MIN Y MAX FECHA FRA: en base al trimestre en el que estamos.
        this.datosFactura();
        this.hoy(); //fecha inicial para fra. modificable.
        this.minFecha();
        this.maxFecha();

        if(!this.emisor.nif)
            this.$notification.error("Necesitas NIF para emitir facturas", {  timer: 4, position:'topRigth' });
    },
    methods:{
        //RECUPERA DEL SERVER DATOS PARA INICIALIZAR NUEVA FRA
        datosFactura(){
            if(!this.ultima)
                    this.nuevaFactura.numero = 1;
            else
                this.nuevaFactura.numero += this.ultima.numero+1;
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
            let minFecha = new Date().getFullYear()+'-'+minMes+'-'+'01';
            document.getElementById("fecha").setAttribute("min", minFecha);
            // console.log('minFecha: '+minFecha);
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
            // console.log('maxFecha: '+maxFecha);
        },
        hoy(){
            let fecha = new Date();
            let mes = fecha.getMonth()+1;
            if(mes.toString().length == 1)
                mes = '0'+mes;
            let dia = fecha.getDate();
            if(dia.toString().length == 1)
                dia = '0'+dia;
            // console.log('hoy!!!'+fecha.getFullYear()+'-'+mes+'-'+dia);
            return this.nuevaFactura.fecha = fecha.getFullYear()+'-'+mes+'-'+dia;
        },
        //EVENTO AL ELEGIR CLIENTE
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
        //NUEVA LÍNEA FRA
        crearLinea() {
            console.log('crearLinea');
            this.lineas.push(Vue.util.extend({}, this.linea));
            console.log(this.lineas);
            this.lineas.slice(-1)[0].id = this.lineas.length;
            
        },
        //ELIMINA LÍNEA FRA
        eliminarLinea(index){
            Vue.delete(this.lineas, index);
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        //CALCULAR CORRESPONDENCIA EN BASES PARA ESA LÍNEA
        calculaBase(impto){
            //1---cuando cambie subtotal, recoge impuesto de la actividad para poder hacer cruce
            // console.log(impto);
            //ahora ya tenemos los tres parámetros para buscar en impuesto_facturacions => array of objects
            let buscar = {
                tipo_cl: this.cliente.tipo,
                ambito_cl: this.cliente.ambito,
                impto_act: impto,
            };
            console.log('datos a localizar!');
            console.log(buscar);

            for(var i=0; i<this.impuestosfacturacion.length; i++){
                console.log('analizando.......................'+i);
                console.log(this.impuestosfacturacion[i]);
                let instancia = {
                    tipo_cl: this.impuestosfacturacion[i].tipo_cl,
                    ambito_cl: this.impuestosfacturacion[i].ambito_cl,
                    impto_act: this.impuestosfacturacion[i].impto_act,
                    impto_linea: this.impuestosfacturacion[i].impto_linea,
                    retencion_linea: this.impuestosfacturacion[i].retencion_linea
                }

                if(instancia.tipo_cl == buscar.tipo_cl && instancia.ambito_cl == buscar.ambito_cl && instancia.impto_act == buscar.impto_act){
                    console.log('se dieron las 3 condiciones!')
                    //recoge datos para linea
                    this.lineas[this.lineas.length-1].impuesto = instancia.impto_linea;
                    this.lineas[this.lineas.length-1].retencion = instancia.retencion_linea;

                    return true;
                }

                console.log('no se cumplen condiciones!');
            }

        },
        calculaTotales(){
            //blanquea totales
            this.nuevaFactura.base21 = 0;
            this.nuevaFactura.base10 = 0;
            this.nuevaFactura.base04 = 0;
            this.nuevaFactura.base00 = 0;
            this.nuevaFactura.retencion = 0;
            this.nuevaFactura.impuesto = 0;
            this.nuevaFactura.gransubtotal = 0;
            this.nuevaFactura.total = 0;

            if(this.lineas.length==0){
                this.$notification.error("Debes introducir líneas primero!", {  timer: 4, position:'topRigth' });
                return false;
            }

            //calcula totales en bases más retención fra
            for(var i=0; i<this.lineas.length; i++){
                
                //suma a basexx según corresponda
                if(this.lineas[i].impuesto == 21)
                    this.nuevaFactura.base21 += (this.lineas[i].producto.precio * this.lineas[i].cantidad);
                
                if(this.lineas[i].impuesto == 10)
                    this.nuevaFactura.base10 += (this.lineas[i].producto.precio * this.lineas[i].cantidad);

                if(this.lineas[i].impuesto == 4)
                    this.nuevaFactura.base04 += (this.lineas[i].producto.precio * this.lineas[i].cantidad);
                
                if(this.lineas[i].impuesto == 0)
                    this.nuevaFactura.base00 += (this.lineas[i].producto.precio * this.lineas[i].cantidad);
                
                //suma a retención fra
                if(this.lineas[i].retencion !== 0)
                    this.nuevaFactura.retencion += ((this.lineas[i].producto.precio * this.lineas[i].cantidad)*0.15);

            }
            //suma a impuestos, grantotal y total
            this.nuevaFactura.impuesto += (this.nuevaFactura.base21*0.21+this.nuevaFactura.base10*0.10+this.nuevaFactura.base04*0.04);
            this.nuevaFactura.gransubtotal = parseFloat(this.gransubtotal);
            this.nuevaFactura.total += (this.nuevaFactura.gransubtotal + parseFloat(this.nuevaFactura.impuesto + this.nuevaFactura.retencion)).toFixed(2);

            //asigna el resto de valores a nuevaFactura
            //de emisor
            this.nuevaFactura.emi_id = this.emisor.id;
            this.nuevaFactura.emi_nif = this.emisor.nombre_fiscal;
            this.nuevaFactura.emi_niva = this.emisor.nif;
            this.nuevaFactura.emi_nombre_fiscal = this.emisor.niva;
            this.nuevaFactura.emi_direccion_fiscal = this.emisor.direccion_fiscal;
            this.nuevaFactura.emi_cp_fiscal = this.emisor.cp_fiscal;
            this.nuevaFactura.emi_provincia_fiscal = this.emisor.provincia_fiscal;
            this.nuevaFactura.emi_pais_fiscal = this.emisor.pais_fiscal;
            this.nuevaFactura.emi_telefono = this.emisor.email;
            this.nuevaFactura.emi_email = this.emisor.telefono;
            //de cliente
            this.nuevaFactura.cli_id = this. cliente.id;
            this.nuevaFactura.cli_razon_social = this.cliente.razon_social;
            this.nuevaFactura.cli_nif = this.cliente.nif;
            this.nuevaFactura.cli_niva = this.cliente.niva;
            this.nuevaFactura.cli_direccion = this.cliente.direccion;
            this.nuevaFactura.cli_cp = this.cliente.cp;
            this.nuevaFactura.cli_provincia = this.cliente.provincia;
            this.nuevaFactura.cli_pais = this.cliente.pais;
            this.nuevaFactura.cli_telefono = this.cliente.telefono;
            this.nuevaFactura.cli_email = this.cliente.email;
            this.nuevaFactura.cli_ambito = this.cliente.ambito;
            this.nuevaFactura.cli_tipo = this.cliente.tipo;
            this.nuevaFactura.cli_forma_pago = this.cliente.forma_pago;
            this.nuevaFactura.cli_dias_pago = this.cliente.dias_pago;

            //datos de líneas
            for(var i=0; i<this.lineas.length; i++){
                this.lineas[i].ejercicio = this.nuevaFactura.ejercicio;
                this.lineas[i].serie = this.nuevaFactura.serie;
                this.lineas[i].factura_id = this.nuevaFactura.factura_id;
                this.lineas[i].numero_fra = this.nuevaFactura.numero;
                this.lineas[i].numero = this.lineas[i].id;
            }
        },
        enviar(){
            let url='/facturas/store';
            axios.post(url, {
                ejercicio: this.nuevaFactura.ejercicio,
                serie: this.nuevaFactura.serie,
                numero: this.nuevaFactura.numero,
                fecha: this.nuevaFactura.fecha,
                vencimiento: this.nuevaFactura.vencimiento,
                observaciones: this.nuevaFactura.observaciones,
                gransubtotal: this.nuevaFactura.gransubtotal,
                base21: this.nuevaFactura.base21,
                base10: this.nuevaFactura.base10,
                base04: this.nuevaFactura.base04,
                base00: this.nuevaFactura.base00,
                impuesto: this.nuevaFactura.impuesto,
                retencion: this.nuevaFactura.retencion,
                total: this.nuevaFactura.total,
                emisores_id: this.nuevaFactura.emi_id,
                emi_nif: this.nuevaFactura.emi_nif,
                emi_niva: this.nuevaFactura.emi_niva,
                emi_nombre_fiscal: this.nuevaFactura.emi_nombre_fiscal,
                emi_direccion_fiscal: this.nuevaFactura.emi_direccion_fiscal,
                emi_cp_fiscal: this.nuevaFactura.emi_cp_fiscal,
                emi_provincia_fiscal: this.nuevaFactura.emi_provincia_fiscal,
                emi_pais_fiscal: this.nuevaFactura.emi_pais_fiscal,
                emi_telefono: this.nuevaFactura.emi_telefono,
                emi_email: this.nuevaFactura.emi_email,
                clientes_id: this.nuevaFactura.cli_id,
                cli_razon_social: this.nuevaFactura.cli_razon_social,
                cli_nif: this.nuevaFactura.cli_nif,
                cli_niva: this.nuevaFactura.cli_niva,
                cli_direccion: this.nuevaFactura.cli_direccion,
                cli_cp: this.nuevaFactura.cli_cp,
                cli_provincia: this.nuevaFactura.cli_provincia,
                cli_pais: this.nuevaFactura.cli_pais,
                cli_telefono: this.nuevaFactura.cli_telefono,
                cli_email: this.nuevaFactura.cli_email,
                cli_ambito: this.nuevaFactura.cli_ambito,
                cli_tipo: this.nuevaFactura.cli_tipo,
                cli_forma_pago: this.nuevaFactura.cli_forma_pago,
                cli_dias_pago: this.nuevaFactura.cli_dias_pago,
            }).then(response => {
                console.log(response);
                let url2 = 'lineas';
                for(var i=0; i<this.lineas.length; i++){
                    this.lineas[i].factura_id = response.data.last_insert_id;
                }
                axios.post(url2, {
                    lineas: (this.lineas),
                }).then(response => {
                    console.log(response);
                    this.$notification.success("Factura creada correctamente!", {  timer: 4, position:'topRigth' });
                    // location.href('facturas/listas');
                    $(location).attr('href', 'listar')
                }).catch((error) => {
                    console.log(error); // error = Error object
                });
            }).catch((error) => { //(error) es el param que le paso a la funcion anónima
                console.log(error); // error = Error object
            });
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