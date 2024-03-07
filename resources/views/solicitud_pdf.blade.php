<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Main Styles -->
        <link rel="stylesheet" href="assets/styles/style.min.css">

        <!-- mCustomScrollbar -->
        <link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

        <!-- mCustomScrollbar -->
        <link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">


        <!-- Waves Effect -->
        <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

        <!-- Sweet Alert -->
        <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">


        <!-- Fontello Icon -->
        <link rel="stylesheet" href="assets/fonts/fontello/fontello.css">

        <!-- Jquery UI -->
        <link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.structure.min.css">
        <link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.theme.min.css">

        <!-- Color Picker -->
        <link rel="stylesheet" href="assets/color-switcher/color-switcher.min.css">

        <!-- Remodal -->
        <link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css">
        <link rel="stylesheet" href="assets/plugin/modal/remodal/remodal-default-theme.css">
        <!-- Google Design Iconic -->
        <link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

        <!-- Data Tables -->
        <link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

        <!-- Dropify -->
        <link rel="stylesheet" href="assets/plugin/dropify/css/dropify.min.css">

        <!-- Datepicker -->
        <link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="assets/plugin/select2/css/select2.min.css">
    </head>
    <style>
        body{
          font-family: sans-serif;
          top: 100px;
          right: 0px;
          height: 4000px;
        }
        @page {
          margin: 160px 50px 50px 50px ;
        }
        header { position: fixed;
          left: 0px;
          top: -160px;
          right: 0px;
          height: 200px;
          background-color: #ddd;
          text-align: center;
        }

    </style>
    <header>
            <img src="formatos/cintillo.jpg" width="100%" alt="">
            <div>
                <center><h3>SOLICITUD DE CERTIFICACIÓN PRESUPUESTARIA</h3></center>
                <h5 align="right">Caracas, {{date('d-m-Y')}}&nbsp;</h5>
                <b align="right">NÚMERO DE DOCUMENTO:</b> {{$cert}}
            </div>
        </header>
    <body>
            <br><br>
            <table class="table-bordered">
                <tr>
                    <th style="text-align: top"><b>PARA:</b></th>
                    <td style="width: 623px">&nbsp;{{$gerente_pre['nombre']}} {{$gerente_pre['apellido']}}<br>
                        &nbsp;GERENTE GENERAL DE PLANIFICACIÓN, PRESUPUESTO SEGUIMIENTO Y CONTROL
                    </td>
                </tr>
                <tr>
                    <th><b>DE:</b></th>
                    <td>
                        &nbsp;{{$gerente_un['nombre']}}&nbsp;{{$gerente_un['apellido']}}
                        <br>
                        &nbsp;{{$doc['unidad']}}
                    </td>
                </tr>
                <tr>
                    <th><b>ASUNTO:&nbsp;</b></th>
                    <td>&nbsp;SOLICITUD DE CERTIFICACIÓN PRESUPUESTARIA</td>
                </tr>
            </table>
            <br>
            <p align="justify">
                Tengo el honor de dirigirme a usted, en la oportunidad de expresarle un saludo Bolivariano, Revolucionario, Socialista, Anti-imperialista e infinitamente Chavista, que hago extensivo a todo el equipo de trabajo que lo acompaña y a su vez,  solicitar CERTIFICACIÓN ASOCIADA AL PROYECTO PRESUPUESTARIO: 
                @foreach ($var as $key => $value)
                    @if ($key==0)
                        <b>{{$value['nombre_proyecto']}}</b>
                    @else
                        @if ($var[$key]['nombre_proyecto']==$var[$key-1]['nombre_proyecto'])
                        @else
                            <b>{{$value['nombre_proyecto']}}</b>
                        @endif
                    @endif
                @endforeach
                
                para contratar lo siguiente:
            </p>
            <p align="justify"><b>OBJETO DE LA CONTRATACIÓN:</b> {{$objeto}}</p>
             <p>Monto estimado de {{number_format($divisa,2,',','.')}}
                @switch($moneda)
                @case(1)
                    <b>Dólares</b>
                    @break
                @case(2)
                    <b>Euros</b>
                    @break
                @case(3)
                     <b>Petros</b>
                    @break
                @case(4)
                     <b>Bs</b>
                    @break
            @endswitch a una tasa de {{number_format($tasa,2,',','.')}} Bs. (BCV)
             equivalente a Bs. {{number_format($monto_estimado,2,',','.')}}</p>
            <h5>COMBINACIÓN PRESUPUESTARIA REQUERIDA:</h5>
            <table class="table-bordered">
                <thead>
                    <th style="width: 20%"><h6>GERENCIA GENERAL</h6></th>
                    <th><h6>ÁREA FUNCIONAL</h6></th>
                    <th style="width: 15%"><h6>FONDO</h6></th>
                    <th><h6>POSICIÓN PRESUPUESTARIA</h6></th>
                    <th><h6>MONTO ORIGINAL</h6></th>
                    <th><h6>MONTO SOLICITADO</h6></th>
                    <th><h6>SALDO DISPONIBLE</h6></th>
                </thead>
                <tbody>
                    @for ($i=0; $i < $cont;$i++)
                    <tr>
                        <td><font size=1>{{$doc['unidad']}}</font></td>
                        <td><font size=1>{{$var[$i]["codigo_proyecto"]}}</font></td>
                        <td><font size=1>{{$var[$i]["fondo"]}}</font></td>
                        <td><font size=1>{{$var[$i]["codigo_partida"]}}</font></td>
                        <td align="right"><font size=1>{{$var[$i]["monto_partida"]}}</font></td>
                        <td align="right"><font size=1>{{$var[$i]["monto_certificar"]}}</font></td>
                        <td align="right"><font size=1>{{number_format($var[$i]["saldo_disponible"],2,',','.')}}</font></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
            <br>
            El total de la <b>CERTIFICACIÓN PRESUPUESTARIA SOLICITADA</b> es de Bs {{number_format($total,2,',','.')}}            
            <br>
            <br>
            <p align="justify">
                Agradeciendo la atención que le pueda prestar a la presente solicitud, quedo de usted, con gran estima y consideración, convencido en que juntos estamos construyendo la patria libre y soberana que nos legaron nuestros libertadores.
            </p>
            <br>
            <br>
            <div align="center">
                <label>Atentamente</label>
                <br>
                <label>______________________________</label><br>
                    <label>{{$gerente_un['nombre']}} {{$gerente_un['apellido']}}</label><br>
                    {{$doc['unidad']}}
            </div>

    </body>
</html>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Jquery UI -->
	<script src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
	<script src="assets/color-switcher/color-switcher.min.js"></script>

	<!-- Remodal -->
	<script src="assets/plugin/modal/remodal/remodal.min.js"></script>
	<!-- validacion de formulario -->
	<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
    <script src="assets/scripts/filtro.js"></script>

	<!-- Validator -->
	<script src="assets/plugin/validator/validator.min.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<!-- Dropify -->
	<script src="assets/plugin/dropify/js/dropify.min.js"></script>
	<script src="assets/scripts/fileUpload.demo.min.js"></script>

	<!-- Datepicker -->
	<script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

	<!-- Popover -->
	<script src="assets/plugin/popover/jquery.popSelect.min.js"></script>

		<!-- Select2 -->
		<script src="assets/plugin/select2/js/select2.min.js"></script>

	<!-- Multi Select -->
	<script src="assets/plugin/multiselect/multiselect.min.js"></script>

