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
    <body>
        <table border='1' id="" class="">
            <tr>
                <td colspan="4"><img width="200%" src="assets/images/imgen_corpoelec.png" alt=""></td>
                <td colspan="11"><center><h1>SOLICITUD DE TRASPASO DE CRÉDITOS PRESUPUESTARIOS</h1></center></td>
            </tr>
            <tr>
                <td colspan="13" rowspan="2"><center><h3>1. UNIDAD ORGANIZATIVA <br> {{$unidad}}</h3></center></td>
                <td colspan="2">2. <b>N°: {{$n_solicitud}}</b></td>
                
            </tr>
            <tr>
                <td colspan="2" >3. LUGAR Y FECHA: <b>CARACAS, <br>{{date('d-m-Y')}}</b> </td>
            </tr>
            <tr>
                <td colspan="15"><h3>4. POR UN MONTO DE BOLÍVARES DIGITALES DE: {{$total}}
                    <b>({{number_format($suma,2,',','.')}}) Bs. </h3></b>
                </td>
            </tr>
            <tr> 
                <td colspan='7' style="background-color: rgb(239, 221, 221)" align="center"><h4><b> 5. DE LA POSICIÓN PRESUPUESTARIA CEDENTE</b></h4></td>
                <td colspan='7' style="background-color: rgb(202, 224, 202)" align="center"><h4><b> 6. A LA POSICIÓN PRESUPUESTARIA RECEPTORA</b></h4></td>
                <td style="background-color: rgb(236, 236, 248)" rowspan="2" width="5%" ><h4>7. MONTO</h4></td>
            </tr>
           
            <tr style="background-color: rgb(236, 236, 248)">
                <td>a. <b>FONDO</b></td>
                <td>b. <b>ÁREA FUNCIONAL</b></td>
                <td>c. <b>DESCRIPCIÓN ÁREA FUNCIONAL</b></td>
                <td>d. <b>POSICIÓN PRESUPUESTARIA</b></td>
                <td>e. <b>DESCRIPCIÓN POSICIÓN PRESUPUESTARIA</b></td>
                <td>f. <b>A CEDER</b></td>
                <td>g. <b>DISPONIBILIDAD DE LA POSICIÓN</b></td>
            
                <td>h. <b>FONDO</b></td>
                <td>i. <b>ÁREA FUNCIONAL</b></td>
                <td>j. <b>DESCRIPCIÓN ÁREA FUNCIONAL</b></td>
                <td>k. <b>POSICIÓN PRESUPUESTARIA</b></td>
                <td>l. <b>DESCRIPCIÓN POSICIÓN PRESUPUESTARIA</b></td>
                <td>m. <b>A RECIBIR</b></td>
                <td>n. <b>DISPONIBILIDAD DE LA POSICIÓN</b></td>
            </tr>
            @for($i=0; $i < $cont; $i++)
            <tr>
                <td>{{$request->fuente[$i]}}</td>
                <td>{{$request->area_funcional[$i]}}</td>
                <td>{{$request->descripcion_proyecto_cedente[$i]}}</td>
                <td>{{$request->partida_cedente[$i]}}</td>
                <td>{{$request->descripcion_posicion[$i]}}</td>
                <td align="right">{{number_format($request->monto_ceder[$i],2,',','.')}}</td>
                <td align="right">{{$request->monto_disponible[$i]}}</td>

                <td>{{$request->fuente[$i]}}</td>
                <td>{{$request->area_funcional_proyecto_receptor[$i]}}</td>
                <td>{{$request->descripcion_proyecto_receptor[$i]}}</td>
                <td>{{$request->partida_receptora[$i]}}</td>
                <td>{{$request->descripcion_partida_receptora[$i]}}</td>
                <td align="right">{{number_format($request->monto_ceder[$i],2,',','.')}}</td>
                <td align="right">{{number_format($request->monto_total[$i],2,',','.')}}</td>
                <td align="right">{{number_format($request->monto_ceder[$i],2,',','.')}}</td>
            </tr>
            @endfor
            <tr>
                <td colspan='14'><h3>TOTAL</h3></td>
                <td align="right"><b>{{number_format($suma,2,',','.')}}</b></td>
            </tr>
            <tr>
                <td colspan="15"><h3>Observaciones:<br>{{$request->concepto}}</h3></td>
            </tr>
            <tr>
                <td colspan="7">
                    <center><h2>GERENCIA  GENERAL/REGIONAL/ TERRITORIAL</h2></center><br><br>
                    FECHA:____/_____/_____
                </td>
                <td colspan="8">
                    <center><h2>GERENTE GENERAL DE PLANIFICACIÓN Y PRESUPUESTO</h2></center><br><br>
                    FECHA:____/____/____
                </td>
            </tr>
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

