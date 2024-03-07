<head>
    <meta charset="UTF-8">
    <title>Certificación Presupuestaria</title>
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
    <style>
        body{
          font-family: sans-serif;
        }
        @page {
          margin: 160px 50px;
        }
        header { position: fixed;
          left: 0px;
          top: -160px;
          right: 0px;
          height: 100px;
          background-color: #ddd;
          text-align: center;
        }
        header h1{
          margin: 10px 0;
        }
        header h2{
          margin: 0 0 10px 0;
        }
        footer {
          position: fixed;
          left: 0px;
          bottom: -60px;
          right: 0px;
          height: 40px;
          border-bottom: 0px solid #ddd;
          text-align: center;
        }
        footer .page:after {
          content: counter(page);
        }
        footer table {
          width: 100%;
        }
        footer p {
          text-align: right;
        }
        footer {
          text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <img src="formatos/cintillo.jpg" width="100%" alt="">
    </header>
    
    <center><h4 class="box-title">DISPONIBILIDAD PRESUPUESTARIA</h4></center>
    Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{date('d-m-Y H:i:s a')}}</b>
    <br>
    Unidad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$consulta[0]->nombre}}</b>
    <br>
    Ejercicio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$consulta[0]->fecha_presupuesto}}</b>
    <br>
    Fondo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$consulta[0]->fondo}}</b>
    <br>
    Area Funcional: <b>&nbsp;&nbsp;&nbsp;{{$consulta[0]->proyecto_presupuestario}}</b>
    <br>
    <div class="box-content card white">
        <div class="card-content">
            <table id="table" class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Partida Cedente</th>
                        <th>Monto Original</th>
                        <th>Monto Cedido</th>
                        <th>Precomprometido</th>
                        <th>Causado</th>
                        <th>Saldo Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $key=>$value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->codigo_partida}}</td>
                        <td>{{number_format($value->monto,2,',','.')}}</td>
                        <td>
                            @if ($value->monto_cedido != null)
                                {{number_format($value->monto_cedido,2,',','.')}}
                            @else
                                -
                            @endif
                            
                        </td>
                        <td>
                            @if ($value->pre_comprometido != null)
                                {{number_format($value->pre_comprometido,2,',','.')}}
                            @else
                                -
                            @endif
                        </td>
                        <td>@if ($value->causado != null)
                                {{number_format($value->causado,2,',','.')}}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{number_format($value->saldo_disponible,2,',','.')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>