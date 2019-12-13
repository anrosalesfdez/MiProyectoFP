<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{-- {{dd($factura)}} --}}
   
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
                                    value="{{ $factura[0]->emi_nombre_fiscal }}">
                <input type="text" id="emiNif" size="50" readonly
                                    tabindex="-1" 
                                    value="{{ $factura[0]->emi_nif}}">
                <input type="text" id="emi_niva" size="50" readonly
                                    tabindex="-1" 
                                    value="{{ $factura[0]->emi_niva}}">
                {{-- <input type="text" id="emi_direccion1" size="50" readonly
                                    tabindex="-1" 
                                    value="factura.emi_direccion1">
                <input type="text" id="emi_direccion2" size="50" readonly
                                    tabindex="-1" 
                                    value="emi_direccion2">
                <input type="text" id="emi_contacto" size="50" readonly
                                    tabindex="-1" 
                                    value="emi_contacto"> --}}
            </div>
        </div>
        <!-- DATOS CLIENTE FACTURA -->
        <div class="row espacios">
    		<div id="cliente" class="col-md-7 espacios">
                <input type="text" id="cli_razon_social" size="50" readonly
                                    tabindex="-1" 
                                    value="{{ $factura[0]->cli_razon_social}}">
                <input type="text" id="cli_nif" size="50" readonly
                                    tabindex="-1" 
                                    value="{{ $factura[0]->cli_nif}}">
                {{-- <input type="text" id="cli_direccion1" size="50" readonly
                                    tabindex="-1" 
                                    value="cli_direccion1">
                <input type="text" id="cli_direccion2" size="50" readonly
                                    tabindex="-1" 
                                    value="cli_direccion2">
                <input type="text" id="cli_contacto" size="50" readonly
                                    tabindex="-1" 
                                    value="cli_contacto"> --}}
            </div>

    		<div id="idFra" class="col-md-5 espacios">
                <!-- DATOS BÁSICOS FRA -->
                <table>
                    <tr>
                        <td class="cabecera-title">Número factura</td>
                        <td class="cabecera-text">
                            <span>
                                {{ $factura[0]->serie. '/' .$factura[0]->numero }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text">
                            <input type="date" id="fecha" readonly
                                    value="{{ $factura[0]->fecha}}">
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Vencimiento</td>
                        <td class="cabecera-text">
                            <input type="date" readonly
                                    tabindex="-1" 
                                    value="{{ $factura[0]->vencimiento}}">
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
                    {{-- @foreach ($lineas as $linea)
                        <tr>
                            <td style="width: 20%">
                                <input type="text" readonly maxlength="50" size="16" value="{{ $linea->producto_nombre}}">
                            </td>
                            <td style="width: 20%">
                                <input type="text" readonly maxlength="50" size="16" value="{{ $linea->producto_descripcion}}">
                            </td>
                            <td style="width: 15%">
                                <input type="number" readonly class="dcha" style="width: 100%" step="0.01" value="{{ $linea->producto_precio}}">
                            </td>
                            <td style="width: 15%">
                                <input type="text" readonly maxlength="18" size="11" tabindex="-1" value="{{ $linea->producto_unidad}}">
                            </td>
                            <td style="width: 15%">
                                <input type="number" readonly class="dcha" style="width: 100%" value="{{ $linea->cantidad}}">
                            </td>
                            <td style="width: 15%">
                                <input type="number" readonly class="dcha" style="width: 100%" tabindex="-1" value="{{ $linea->producto_precio * $linea->cantidad}}">
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>

        <div id="pieFra" class="col-md-12 espacios">
            <table id="totalesFra">
                <tr>
                    <td class="cabecera-title" style="width: 10%">21%</td>
                    <td class="cabecera-text" style="width: 10%">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->base21}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title" style="width: 15%">Subtotal</td>
                    <td class="cabecera-text" style="width: 15%">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->gransubtotal}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">10%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->base10}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->impuesto}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">4%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->base04}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Retención</td>
                    <td class="cabecera-text">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->retencion}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">0%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->base00}}"
                                    readonly
                                    tabindex="-1">
                    </td>
                    <td style="width: 50%">
                    <td class="cabecera-title">Total Factura</td>
                    <td class="cabecera-text">
                        <input type="text" class="dcha"
                                    value="{{ $factura[0]->total}}"
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
                                value="{{ $factura[0]->observaciones}}"></textarea>
                    </td>
                </tr>
            </table>
        </div>
		
		<div id="terms" class="espacios">
		  <h5>Condiciones</h5>
		  <span>Forma de pago: {{ $factura[0]->cli_forma_pago}} a {{ $factura[0]->cli_dias_pago}} días.</span>
		</div>
	
	</div>

</body>
</html>