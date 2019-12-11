<template>
<div class="row card" id="factura_nueva">

    <div class="card-header">
        <h3 style="display: inline">Factura: {{ factura.ejercicio +' '+factura.serie+' '+factura.numero}}</h3>
        <div style="display: inline; float: right">
            <button type="submit" class="btn btn-success" >Guardar</button>
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
                            <span type="text" readonly
                                    v-text="factura.serie+'/'+factura.numero">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text">
                            <input type="date" id="fecha" readonly
                                    v-model="factura.fecha">
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Vencimiento</td>
                        <td class="cabecera-text">
                            <input type="date" readonly
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
                            <input type="number" readonly style="width: 100%" step="0.01" v-model="linea.producto_precio">
                        </td>
                        <td style="width: 15%">
                            <input type="text" readonly maxlength="18" size="11" tabindex="-1" v-model="linea.producto_unidad">
                        </td>
                        <td style="width: 15%">
                            <input type="number" readonly style="width: 100%" v-model="linea.cantidad">
                        </td>
                        <td style="width: 15%">
                            <input type="number" readonly class="dcha" style="width: 100%" tabindex="-1" v-model="subtotal">
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
                        <input type="number" class="dcha"
                                    v-model="factura.base21"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title" style="width: 15%">Subtotal</td>
                    <td class="cabecera-text" style="width: 15%">
                        <input type="number" class="dcha"
                                    v-model="factura.gransubtotal"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">10%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="number" class="dcha"
                                    v-html="factura.base10"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">
                        <input type="number" class="dcha"
                                    v-model="factura.impuesto"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">4%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="number" class="dcha"
                                    v-model="factura.base04"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Retención</td>
                    <td class="cabecera-text">
                        <input type="number" class="dcha"
                                    v-model="factura.retencion"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">0%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="number" class="dcha"
                                    v-model="factura.base00"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Total Factura</td>
                    <td class="cabecera-text">
                        <!-- <span>{{ formatPrice(nuevaFactura.total) € }}</span> -->
                        <input type="number" class="dcha"
                                    v-model="factura.total"
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
                                v-model="factura.observaciones"></textarea>
                    </td>
                </tr>
            </table>
        </div>
		
		<div id="terms" class="espacios">
		  <h5>Condiciones</h5>
		  <span>Forma de pago: {{this.factura.cli_forma_pago}} a {{this.factura.cli_dias_pago}} días.</span>
		</div>
	
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
        subtotal: function() { //este dato no se almacena
            return parseFloat(this.linea.producto_precio * this.linea.cantidad).toFixed(2);;
        }
    },
    methods: {
        
    },
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
        },
        
    },
}
</script>