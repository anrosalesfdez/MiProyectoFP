<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SELF') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <link rel="stylesheet" href="/css/all.css" type="text/css">

    <!-- open-material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    
    <!-- open-iconic-bootstrap (icon set for bootstrap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <style>
        .imprimir{
            margin: 50px;
        }
        p{
            line-height: 15px;
        }
        body{
            background-color: white;
            margin: 80px;
        }
        .abajo {
            position: fixed;
            bottom: 0;
        }
        .lineas{
            margin-top: 70px;
            height:350px;
        }
        .observ{
            margin-top: 70px;
            margin-bottom: 70px;
        }
    </style>
</head>

<body>
    <div class="card-body espacios imprimir">

        <div class="row espacios">
            <h3 id="tituloFact">FACTURA</h3>
		</div>

		<div class="row espacios">
            <!-- LOGO -->
            <div class="col-md-8" style="float:left;">
              <img id="image" src="/pictures/logo.png" alt="logo" width="200px" height="140px" style="float:left;"/>
            </div>
            <!-- DATOS EMISOR FACTURA -->
            <div class="col-md-4 espacios" style="float: right">
                <p>{{ $factura[0]->emi_nombre_fiscal }}</p>
                <p>{{ $factura[0]->emi_nif.' - '.$factura[0]->emi_niva}}</p>
                <p>{{ $factura[0]->emi_direccion_fiscal.' '.$factura[0]->emi_cp_fiscal }}</p>
                <p>{{ $factura[0]->emi_provincia_fiscal.' '.$factura[0]->emi_pais_fiscal}}</p>
                <p>{{ $factura[0]->emi_email.' '.$factura[0]->emi_telefono}}</p>
            </div>
        </div>

        <div class="row espacios">
            <!-- DATOS CLIENTE FACTURA -->
            <div class="col-md-8 espacios" style="float:left;">
                <p> {{ $factura[0]->cli_razon_social}} </p>
                <p> {{ $factura[0]->cli_nif.' '.$factura[0]->cli_niva}} </p>
                <p> {{ $factura[0]->cli_direccion.' '.$factura[0]->cli_cp}} </p>
                <p> {{ $factura[0]->cli_provincia.' '.$factura[0]->cli_pais}} </p>
                <p> {{ $factura[0]->cli_email.' '.$factura[0]->cli_telefono}} </p>
            </div>
            <!-- DATOS BÁSICOS FRA -->
    		<div class="col-md-4 espacios"  style="float:right;">
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
        <div class="col-md-12 espacios lineas">
            <table class="table">
                <thead>
                    <tr class="row" style="display: table-row;">
                        <th class="cabecera-title" class="col-md-2">Item</th>
                        <th class="cabecera-title" class="col-md-3">Descripción</th>
                        <th class="cabecera-title" class="col-md-1">Precio</th>
                        <th class="cabecera-title" class="col-md-2">Unidad</th>
                        <th class="cabecera-title" class="col-md-2">Cantidad</th>
                        <th class="cabecera-title" class="col-md-2">Subtotal</th>
                    </tr> 
                </thead>

                <tbody>
                    @foreach ($factura[1] as $linea)
                        <tr>
                            <td>
                                {{ $linea->producto_nombre}}
                            </td>
                            <td>
                                {{ $linea->producto_descripcion}}
                            </td>
                            <td style="text-align: right;">
                                {{ $linea->producto_precio}}
                            </td>
                            <td>
                                {{ $linea->producto_unidad}}
                            </td>
                            <td style="text-align: right;">
                                {{ $linea->cantidad}}
                            </td>
                            <td style="text-align: right;">
                                {{ $linea->producto_precio * $linea->cantidad}}
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

            <div class="form-group observ">
                <textarea style="margin-top:20px;" class="form-control" id="observaciones" rows="3">{{ $factura[0]->observaciones}}</textarea>
            </div>
        </div>

            
        <div id="terms" class="espacios">
            <h5>Condiciones</h5>
            <span>Forma de pago: {{ $factura[0]->cli_forma_pago}} a {{ $factura[0]->cli_dias_pago}} días.</span>
        </div>
		
	
	</div>

</body>

</html>
