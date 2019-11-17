<template>
<div class="row card" id="page-wrap">

    <div class="card-header espacios">
        <h3 style="display: inline">Alta nueva factura</h3>
        <div style="display: inline; float: right">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/clientes/listar" class="btn btn-danger">Cancelar</a>
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
                <span type="text" class="form-control-plaintext form-control-sm" readonly v-model="emisor.nombrefiscal" >{{emisor.nombrefiscal}}</span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly v-model="emisor.nif">{{emisor.nif}}</span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly v-model="emisor.direccionfiscal">{{emisor.direccionfiscal}}</span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly v-model="emisor.email">{{emisor.email}}</span>
                <span type="text" class="form-control-plaintext form-control-sm" readonly v-model="emisor.telefono">{{emisor.telefono}}</span>
            </div>
        </div>

        <div class="row espacios">
    		<div id="cliente" class="col-md-7 espacios">
                <select class="form-control-plaintext" id="cliente" v-model="cliente">
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
                                    v-model="nuevaFactura.numero">
                                {{nuevaFactura.numero}}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text editable">
                            <input type="date" id="fecha"
                                    v-model="nuevaFactura.fecha_fra">
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Vencimiento</td>
                        <td class="cabecera-text editable">
                            <span type="date" readonly
                                    v-model="nuevaFactura.vencimiento">
                                {{nuevaFactura.vencimiento}}
                            </span>
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
                        <th class="cabecera-title" style="width: 40%">Descripción</th>
                        <th class="cabecera-title" style="width: 10%">Precio</th>
                        <th class="cabecera-title" style="width: 20%" colspan="2">Cantidad</th>
                        <th class="cabecera-title" style="width: 10%">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <tr id="nuevoItem">
                        <td>
                            <div class="delete-wpr">
                            <select class="form-control-plaintext" id="cliente" v-model="producto">
                                <option disabled value="null">Seleccione un producto</option>
                                <option v-for="producto in productos" v-bind:value="producto"> {{ producto.nombre }} </option>
                            </select>
                                <a class="delete" href="javascript:;" title="Remove row">X</a>
                            </div>
                        </td>
                        <td class="editable">
                            <input type="text" class="form-control-plaintext form-control-sm"  
                                    v-model="producto.descripcion"
                                    value="producto.descripcion">
                        </td>
                        <td class="editable">
                            <input type="number" class="form-control-plaintext form-control-sm dcha" 
                                    step="0.01" 
                                    v-model="producto.precio" 
                                    value="producto.precio">
                        </td>
                        <td class="editable" style="width: 10%">
                            <input type="number" class="form-control-plaintext form-control-sm dcha" 
                                    v-model="cantidad" 
                                    value="1">
                        </td>
                        <td style="width: 10%">
                            <span type="text" class="form-control-plaintext form-control-sm"
                                    v-model="producto.unidad">
                                €/{{producto.unidad}}
                            </span>
                        </td>
                        <td>
                            <span type="number" class="form-control-plaintext form-control-sm dcha"
                                    v-model="cantidad"
                                    step="0.01">
                                {{producto.precio*cantidad}}
                                </span>
                        </td>
                    </tr>

                    
                    <!-- <tr id="hiderow">
                        <td colspan="5"><button id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
                    </tr> -->

                </tbody>
                    <button title="nuevaLinea" class="btn-default btn-xs" @click="addrow">
                        Nueva línea
                    </button>
            </table>
        </div>

        <div id="pieFra" class="col-md-12 espacios">
            <table id="totalesFra">
                <tr>
                    <td rowspan="3" style="width: 60%" >
                        <textarea placeholder="Observaciones..."></textarea>
                    </td>
                    <td class="cabecera-title" style="width: 20%">Subtotal</td>
                    <td class="cabecera-text" style="width: 20%">xxx</td>
                </tr>
                <tr>
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">xxx</td>
                </tr>
                <tr>
                    <td class="cabecera-title">Total</td>
                    <td class="cabecera-text">xxx</td>
                </tr>
            </table>
        </div>
		
		<div id="terms">
		  <h5>Condiciones</h5>
		  <span>Forma de pago: {{this.cliente.forma_pago}} a {{this.cliente.dias_pago}} días.</span>
		</div>
	
	</div>
</div>
</template> 


<script>
//FIXME: enviar notificación desde server cuando se guarda OK.
//FIXME: meter control si NIF ya existe. traer datos desde clientes.vue
//FIXME: No funciona la directiva de pintar en mayusc

export default{
    data(){ //datos del componente
        return {
            nuevaFactura: { // datos de factura creada
                ejercicio: '',
                serie: '',
                numero: 0,
                fecha_fra: '',
                cliente_id: '',
                total: 0,
                vencimiento: '',
                forma_pago: '',
                observ: '',
                moneda: ''          
            },
            
            emisor: { // datos de emisor fra. OBLIGATORIO NIF
                nif: '',
                niva: '',
                nombrefiscal: '',
                nombrecomercial: '',
                telefono: '',
                direccionfiscal: '',
                cp: '',
                ciudad: '',
                pais: ''
            },

            clientes: [], // recoge todos los clientes en BD

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
            productos:[],
            producto:{
                id:'',
                nombre:'',
                descripcion: '',
                precio:0,
                unidad:''
            },
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            validado:'', //recoge errores en form. Cliente,
            cantidad:1,
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

        //TRAE DATOS VIEJOS
        if('ejercicio' in this.olds) { this.nuevaFactura.ejercicio = this.olds.ejercicio; }
        if('serie' in this.olds) { this.nuevaFactura.serie = this.olds.serie; }
        if('numero' in this.olds) { this.nuevaFactura.numero = this.olds.numero; }
        if('fecha_fra' in this.olds) { this.nuevaFactura.fecha_fra = this.olds.fecha_fra; }
        if('cliente_id' in this.olds) { this.nuevaFactura.cliente_id = this.olds.cliente_id; }
        if('total' in this.olds) { this.nuevaFactura.total = this.olds.total; }
        if('vencimiento' in this.olds) { this.nuevaFactura.vencimiento = this.olds.vencimiento; }
        if('observ' in this.olds) { this.nuevaFactura.observ = this.olds.observ; }
        if('moneda' in this.olds) { this.nuevaFactura.moneda = this.olds.moneda; }
        
        //si form validado en cliente pero falla en servidor.
        console.log('enviado true, devuelve errors: '+this.errors);
        if(this.errors.length !== 0){
            this.validado = '';
            for(let i=0; i < this.errors.length; i++){
                this.validado += this.errors[i];
            }
            
            this.$notification.error(this.validado, {  timer: 2, position:'topRigth' });
        };
    },
    mounted() {
        //MIN Y MAX FECHA FRA: en base al trimestre en el que estamos.
        this.minFecha();
        this.maxFecha();
    },
    methods:{
        datosEmisor(){
            let url = "/usuariofactura";
            axios.get(url).then(response => {
                this.emisor = response.data;
                console.log(this.emisor);
            }).catch((error) => {
                console.log(error);
            });
        },
        datosClientes(){
            let url = "/clientes/listarCl";
            axios.get(url).then(response => {
                this.clientes = response.data;
                console.log(this.clientes);
            }).catch((error) => {
                console.log(error);
            });
        },
        datosFactura(){
            let url = "/facturas/getlast";
            axios.get(url).then(response => {
                if(response.data == ''){
                    this.nuevaFactura.numero = 1;
                    //FIXME: como darle formato tipo: 2019/00001 ¿?
                }
                else{
                    this.nuevaFactura.numero = response.data.numero + 1;
                }
            }).catch((error) => {
                console.log(error);
            });
        },
        minFecha(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

            today = yyyy+'-'+mm+'-'+dd;
            let minMes = '';
            let minDia = '01';
            if(mm >= 10)
                minMes = '10';
            else if(mm >=7)
                minMes='07';
            else if(mm >=4)
                minMes='04';
            else
                minMes='01';
            let minimo = yyyy+'-'+minMes+'-'+minDia;
            document.getElementById("fecha").setAttribute("min", minimo);
            console.log(minimo);

        },
        maxFecha(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

            today = yyyy+'-'+mm+'-'+dd;
            let maxMes = '';
            let maxDia = '30'; //FIXME: habría que calcular final mes en función del mes
            if(mm >= 10)
                maxMes = '12';
            else if(mm >=7)
                maxMes='09';
            else if(mm >=4)
                maxMes='06';
            else
                maxMes='03';
            let maximo = yyyy+'-'+maxMes+'-'+maxDia;
            document.getElementById("fecha").setAttribute("max", maximo);
            console.log(maximo);

        },
        datosProductos(){
            let url = "/getProductos";
            axios.get(url).then(response => {
                this.productos = response.data;
                console.log(this.productos);
            }).catch((error) => {
                console.log(error);
            });
        },
        addrow(){
            // let linea = $('#nuevoItem');
            $('#items').find('tbody').append("hola");

        },
        //VALIDACION DEL FORM. SI TODO OK ENVÍA HTTP REQUEST, SINO, MUESTRA NOTIFICACIÓN CON ERRORES.
        validarForm(e){
            this.validado=''; //blanquea
            //Ejecuta validaciones en cliente

            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                e.preventDefault();
                return;
            }          
        },
    } //end methods
}
</script>

<style>
.espacios {
    margin-top: 10px;
    margin-bottom: 10px;
}

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
.editable td:hover: { background-color:#EEFF88 !important; }
td {padding: 5px;}
.dcha{text-align: rigth}
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