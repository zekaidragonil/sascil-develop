<!DOCTYPE html>
<html lang="en">
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
    </head>
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
<body>
    <header>
        <img src="formatos/cintillo.jpg" width="100%" alt="">
    </header>
    
    <footer>
        <label class="page">Página &nbsp;</label>
    </footer>
        <h5 align="right">Caracas, {{date('d-m-Y')}}</h5>
        <center>
            <h5>CERTIFICACIÓN DE DISPONIBILIDAD PRESUPUESTARIA <br>Nro {{$dom}} <!--colocar el id de la certificación  --> </h5>
        </center>
        <br>
        <p align="justify">Yo, {{$gerente_pre['nombre']}} {{$gerente_pre['apellido']}} titular de la Cédula de Identidad Nº {{$gerente_pre['cedula']}} en mi carácter de Gerente General de Planificación, Presupuesto y Seguimiento y Control de la Corporación Eléctrica Nacional (CORPOELEC), atendiendo la Solicitud de Certificación Presupuestaria Nro. <b>{{$certificar[0]->nombre_solicitud}}.</b></p>
        <p align="justify">
          Objeto de la Solicitud: {{$data[0]->observaciones}}
        </p>
        <p>El Monto estimado de la solicitud es de @switch($data[0]->tipo_moneda)
          @case("Dolar")
            Dolares {{number_format($data[0]->monto_estimado/$data[0]->tasa,2,',','.')}}
            @break
          @case("Euro")
            Euros {{number_format($data[0]->monto_estimado/$data[0]->tasa,2,',','.')}}
            @break
          @case("Petro")
            @if($data[0]->monto_estimado > 1)
              Petros {{number_format($data[0]->monto_estimado/$data[0]->tasa,2,',','.')}}
            @else
              Petro {{number_format($data[0]->monto_estimado/$data[0]->tasa,2,',','.')}}
            @endif
            @break
          @case('Bolivares')
            Bs
            @break
        @endswitch 
          </p>
        <center><b>CERTIFICO<b></center>
        <p align="justify">
            Que existe disponibilidad en el PROYECTO PRESUPUESTARIO:
            @foreach ($certificar as $key => $value)
              @if ($key==0)
                <b>{{$value->nombre_proyecto}}</b>
              @else
                @if ($certificar[$key]->nombre_proyecto==$certificar[$key-1]->nombre_proyecto)
                @else
                <b>{{$value->nombre_proyecto}}</b>
                @endif
              @endif
            @endforeach
            {{--<b>{{$certificar[0]->proyecto_presupuestario}}</b><!--colocar el area funcional a la que se le certifica el presupuesto-->, del POA {{date('Y')}}, bajo las combinaciones que se muestran:--}}
        </p>
        <table class="table-responsive table-bordered">
            <thead>
                <th><center><h6>GERENCIA GENERAL</h6></center></th>
                <th><center><h6>AREA FUNCIONAL</h6></center></th>
                <th style="width: 10%"><center><h6>FONDO</h6></center></th>
                <th><center><h6>POSICIÓN PRESUPUESTARÍA</h6></center></th>
                <th><center><h6>MONTO ASIGNADO</h6></center></th>
                <th><center><h6>PRE-COMPROMISO</h6></center></th>
                <th><center><h6>SALDO DISPONIBLE<h6></center></th>
            </thead>
            <tbody>
                @foreach ($certificar as $key => $value)
                <tr>
                  <td style="font-size: 0.6em;"><center>{{$value->nombre}}</small></center></td>
                  <td style="font-size: 0.6em;"><center>{{$value->proyecto_presupuestario}}</center></td>
                  <td style="font-size: 0.6em;"><center>{{$value->fondo}}</center></td>
                  <td style="font-size: 0.6em;"><center>{{$value->codigo_partida}}</center></td>
                  <td align="right" style="font-size: 0.6em;">{{number_format($value->monto,2,',','.')}}</td>
                  <td align="right" style="font-size: 0.6em;">{{number_format($value->pre_comprometido,2,',','.')}}</td>
                  <td align="right" style="font-size: 0.6em;">{{number_format($value->saldo_disponible,2,',','.')}}</td>
              </tr>
                @endforeach
            </tbody>
            <!--COLOCAR LA ESTIMACION DE LA CERTIFICACION PRESUPUESTARIA-->
        </table>
        <p>Total de la certificación aprobada es de Bs {{number_format($total,2,',','.')}} </p>
        <br><br>
        <div align="center">
          <br>
          <label>______________________________</label>
              <br>
              <p><label>{{$gerente_pre['nombre']}} {{$gerente_pre['apellido']}}</label></p>
              <label>Gerente General de Planificación, Presupuesto y Seguimiento y Control de (CORPOELEC)</label>
        </div>
</body>
</html>