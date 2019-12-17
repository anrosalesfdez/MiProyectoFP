<template>
<div class="row card container col-md-10" style="margin-left: 80px;" id="factura_nueva">

    <div class="card-header" >
        <h3 style="display: inline">Factura: {{ factura.ejercicio +' '+factura.serie+' '+factura.numero}}</h3>
        <div style="display: inline; float: right">
            <button class="crearButton" @click="imprimir(factura.id)">Imprimir</button>
            <!-- <a target="_blank" :href="'/facturas/imprimir2/'+factura.id" class="crearButton" @click="imprimir">Imprimir</a> -->
            <a href="/facturas/listar" class="cancelarButton">Cancelar</a>
        </div>
    </div>

    <div class="card-body espacios" >

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
                                    v-model="factura.emi_nombre_fiscal">
                <input v-if="factura.emi_nif !== ''" type="text" id="emiNif" size="50" readonly
                                    tabindex="-1" 
                                    v-model="factura.emi_nif">
                <input v-else type="text" id="emi_niva" size="50" readonly
                                    tabindex="-1" 
                                    v-model="factura.emi_niva">
                <input type="text" id="emi_direccion1" size="50" readonly
                                    tabindex="-1" 
                                    v-model="factura.emi_direccion1">
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
                <input type="text" id="cli_razon_social" size="50" readonly
                                    tabindex="-1" 
                                    v-model="factura.cli_razon_social">
                <input type="text" id="cli_nif" size="50" readonly
                                    tabindex="-1" 
                                    v-model="factura.cli_nif">
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
                            <p class="h5" style="text-align: center; font-weight: bold;" 
                                    v-text="factura.serie+'/'+factura.numero">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text">
                            <input type="date" id="fecha" readonly style="text-align: right"
                                    v-model="factura.fecha">
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Vencimiento</td>
                        <td class="cabecera-text">
                            <input type="date" readonly style="text-align: right"
                                    tabindex="-1" 
                                    v-model="factura.vencimiento">
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
                    <tr class="row" v-for="(linea, index) in lineas" :key="linea.id">
                        <td style="width: 20%">
                            <input type="text" readonly maxlength="50" size="16" v-model="linea.producto_nombre">
                        </td>
                        <td style="width: 20%">
                            <input type="text" readonly maxlength="50" size="16" v-model="linea.producto_descripcion">
                        </td>
                        <td style="width: 15%">
                            <input type="number" readonly class="dcha" style="width: 100%" step="0.01" v-model="linea.producto_precio">
                        </td>
                        <td style="width: 15%">
                            <input type="text" readonly maxlength="18" size="11" tabindex="-1" v-model="linea.producto_unidad">
                        </td>
                        <td style="width: 15%">
                            <input type="number" readonly class="dcha" style="width: 100%" v-model="linea.cantidad">
                        </td>
                        <td style="width: 15%">
                            <input type="number" readonly class="dcha" style="width: 100%" tabindex="-1" :value="subtotal(linea.producto_precio, linea.cantidad)">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="pieFra" class="col-md-12 espacios">
            <table id="totalesFra">
                <tr>
                    <td class="cabecera-title" style="width: 10%">21%</td>
                    <td class="cabecera-text" style="width: 10%">
                        <currency-input style="text-align: right"
                                    v-model="factura.base21"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title" style="width: 15%">Subtotal</td>
                    <td class="cabecera-text" style="width: 15%">
                        <currency-input style="text-align: right"
                                    v-model="factura.gransubtotal"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">10%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <currency-input style="text-align: right"
                                    v-model="factura.base10"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">
                        <currency-input style="text-align: right"
                                    v-model="factura.impuesto"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">4%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <currency-input style="text-align: right"
                                    v-model="factura.base04"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Retención</td>
                    <td class="cabecera-text">
                        <currency-input style="text-align: right"
                                    v-model="factura.retencion"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">0%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <currency-input style="text-align: right"
                                    v-model="factura.base00"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Total Factura</td>
                    <td class="cabecera-text">
                        <currency-input style="text-align: right"
                                    v-model="factura.total"
                                    readonly
                                    tabindex="-1"
                                    currency="EUR"
                                    locale="de"/>
                    </td>
                </tr>
            </table>
            <div class="form-group">
                <textarea textarea style="margin-top:20px;" class="form-control" id="observaciones" rows="3" 
                                v-model="factura.observaciones"></textarea>
            </div>
            
        </div>
		
		<div id="terms" class="espacios">
		  <h5>Condiciones</h5>
		  <span style="font-family: 'Lato', sans-serif !important;">Forma de pago: {{this.factura.cli_forma_pago}} a {{this.factura.cli_dias_pago}} días.</span>
		</div>
	
	</div>
    <div class="modal-footer">
        <button class="crearButton" @click="imprimir(factura.id)">Imprimir</button>
        <a href="/facturas/listar" class="cancelarButton">Cancelar</a>
    </div>
</div>
</template>

<script>
export default{

    data() {
        return {
            
        }
    },
    props:[
        'factura',
        'lineas'
    ],
    computed: {
        
        emi_direccion1: function(){
            return this.factura.emi_direccion_fiscal + ' - ' + this.factura.emi_cp_fiscal;
        },
        emi_direccion2: function(){
            return this.factura.emi_provincia_fiscal + ' - ' + this.factura.emi_pais_fiscal;
        },
        emi_contacto: function(){
            return this.factura.emi_email + ' - ' + this.factura.emi_telefono;
        },
        cli_direccion1: function(){
            return this.factura.cli_direccion + ' - ' + this.factura.cli_cp;
        },
        cli_direccion2: function(){
            return this.factura.cli_provincia + ' - ' + this.factura.cli_pais;
        },
        cli_contacto: function(){
            return (this.factura.cli_email == null ? '' : this.factura.cli_email) + (this.factura.cli_telefono == null ? '' : ' - ' + this.factura.cli_telefono);
        }
    },
    methods: {
        subtotal(p, c) { //este dato no se almacena
            return parseFloat(p * c).toFixed(2);
        },
        imprimir(id){
            console.log("hola")
            var printWindow = window.open("/facturas/imprimir2/"+id, '_blank', 'height=600,width=980');
            // printWindow.document.write(this.texto);
            printWindow.document.close();
            printWindow.onload = function(){
                printWindow.focus();
                printWindow.print();
                // printWindow.close();
            // window.location.reload(true);
            }
        }
    }
}
</script>