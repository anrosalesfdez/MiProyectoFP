<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <style>
        *, body{ font-family: 'Lato', sans-serif; }
        table { border-collapse: collapse; } /** solapa los bordes*/
        .cabecera-title{ padding: 5px; text-align: left; font-weight: bold;  background: #eee; border: 1px solid black;}
        .cabecera-text{ padding: 5px; text-align: right; border: 1px solid black;}
        #items{width: 100%;}
        #totalesFra{width: 100%;}
        .espacios { margin-top: 20px; margin-bottom: 20px; }
        #tituloFact { width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }
        /*terminos de la fra */
        #terms { text-align: center; margin: 20px 0 0 0; }
        #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }

    </style>
</head>
<body>
   
    <div class="card-body espacios">

        <div class="row espacios">
            <h3 id="tituloFact">FACTURA</h3>
		</div>

		<div class="row espacios">

            <div id="logo" class="col-md-3">
              {{-- <img id="image" src="pictures/logo.png" alt="logo" width="200px" height="140px"/> --}}
            </div>
            
            <!-- DATOS EMISOR FACTURA -->
            <div id="emisor" class="col-md-6" style="float: left">
                <p>{{ $factura[0]->emi_nombre_fiscal }}</p>
                <p>{{ $factura[0]->emi_nif.' - '.$factura[0]->emi_niva}}</p>
                <p>{{ $factura[0]->emi_direccion_fiscal.' '.$factura[0]->emi_cp_fiscal }}</p>
                <p>{{ $factura[0]->emi_provincia_fiscal.' '.$factura[0]->emi_pais_fiscal}}</p>
                <p>{{ $factura[0]->emi_email.' '.$factura[0]->emi_telefono}}</p>
            </div>
        </div>
        <!-- DATOS CLIENTE FACTURA -->
        <div class="row espacios">
    		<div id="cliente" class="col-md-7 espacios" style="float:left;">
                <p> {{ $factura[0]->cli_razon_social}} </p>
                <p> {{ $factura[0]->cli_nif.' '.$factura[0]->cli_niva}} </p>
                <p> {{ $factura[0]->cli_direccion.' '.$factura[0]->cli_cp}} </p>
                <p> {{ $factura[0]->cli_provincia.' '.$factura[0]->cli_pais}} </p>
                <p> {{ $factura[0]->cli_email.' '.$factura[0]->cli_telefono}} </p>
            </div>

    		<div id="idFra" class="col-md-5 espacios"  style="float:right;">
                <!-- DATOS BÁSICOS FRA -->
                <table>
                    <tr>
                        <td class="cabecera-title">Número factura</td>
                        <td class="cabecera-text">
                            <p>{{ $factura[0]->serie. '/' .$factura[0]->numero }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Fecha factura</td>
                        <td class="cabecera-text">
                            <p>{{ $factura[0]->fecha}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="cabecera-title">Vencimiento</td>
                        <td class="cabecera-text">
                            <p>{{ $factura[0]->vencimiento}}</p>
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
                    @foreach ($factura[1] as $linea)
                        <tr>
                            <td style="width: 20%">
                                <p>{{ $linea->producto_nombre}}</p>
                            </td>
                            <td style="width: 20%">
                                <p>{{ $linea->producto_descripcion}}</p>
                            </td>
                            <td style="width: 15%" class="cabecera-text" >
                                <p>{{ $linea->producto_precio}}</p>
                            </td>
                            <td style="width: 15%">
                                <p>{{ $linea->producto_unidad}}</p>
                            </td>
                            <td style="width: 15%" class="cabecera-text" >
                                <p>{{ $linea->cantidad}}</p>
                            </td>
                            <td style="width: 15%" class="cabecera-text" >
                                <p>{{ $linea->producto_precio * $linea->cantidad}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="pieFra" class="col-md-12 espacios">
            <table id="totalesFra">
                <tr>
                    <td class="cabecera-title" style="width: 20%">21%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <p>{{ $factura[0]->base21.' €'}}</p>
                    </td>
                    <td style="width: 30%; border:none;">
                    <td class="cabecera-title" style="width: 20%">Subtotal</td>
                    <td class="cabecera-text" style="width: 20%">
                        <p>{{ $factura[0]->gransubtotal.' €'}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">10%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <p>{{ $factura[0]->base10.' €'}}</p>
                    </td>
                    <td style="width: 30%;border:none;">
                    <td class="cabecera-title">Impuestos</td>
                    <td class="cabecera-text">
                        <p>{{ $factura[0]->impuesto.' €'}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">4%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <p>{{ $factura[0]->base04.' €'}}</p>
                    </td>
                    <td style="width: 30%;border:none;">
                    <td class="cabecera-title">Retención</td>
                    <td class="cabecera-text">
                        <p>{{ $factura[0]->retencion.' €'}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="cabecera-title" style="width: 20%">0%</td>
                    <td class="cabecera-text" style="width: 20%">
                        <p>{{ $factura[0]->base00.' €'}}</p>
                    </td>
                    <td style="width: 30%;border:none;">
                    <td class="cabecera-title">Total Factura</td>
                    <td class="cabecera-text">
                        <p>{{ $factura[0]->total.' €'}}</p>
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