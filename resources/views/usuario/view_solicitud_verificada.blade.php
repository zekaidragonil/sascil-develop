@extends('principal')
@section('view_solicitudes_procesadas')
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Documentación de la Solicitud N° {{$lista_solicitudes[0]->numero_solicitud}}</h4>
        <!-- /.dropdown js__dropdown -->
        <div class="activity-list">
            <div class="activity-item">
                <div class="bar bg-primary">
                    <div class="dot bg-primary"></div>
                    <div class="last-dot bg-primary"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <!-- /.date -->
                    <div class="text">
                       <h4>Punto de Cuenta Inicio de Proceso</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->punto_cuenta}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-primary">
                    <div class="dot bg-primary"></div>
                    <div class="last-dot bg-primary
                    "></div>
                </div>
                <!-- /.bar -->
                <div class="content">
                    <!-- /.date -->
                    <div class="text">
                        <h4>Estimación de Costos</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->estimacion_costo}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-success">
                    <div class="dot bg-success"></div>
                    <div class="last-dot bg-success"></div>
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                        <h4>Especificaciones Técnicas</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->espesificaciones_tecnicas}}">Ver Documento</a></div>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-success">
                    <div class="dot bg-success"></div>
                    <div class="last-dot bg-success"></div>
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="texts">
                       <h4>Forma 018</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->forma_018}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-warning">
                    <div class="dot bg-warning"></div>
                    <div class="last-dot bg-warning"></div>
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Matriz de Evaluación Técnica</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->matriz_tecnica}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <div class="last-dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Memorandum de Solicitud de Inicio de Contratación</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->memorandum}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <div class="last-dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Certificación Presupuestaria</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->certificacion_presupuestaria}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <div class="last-dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Bienes Nacionales</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->bienes_nacionales}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <div class="last-dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Opinion Asho</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$lista_solicitudes[0]->opinion_asho}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="col-lg-12">
                <br><br>
                <a href="{{url('lista_solicitudes_procesadas')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir atras</a>
            </div>
        </div>
    </div>
</div>

{{-- <script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script>
 $(document).ready(function() {
    $("#radio-11").click(function() {
      $("#textarea").show();
      $("#observaciones1").show();
      $("#textarea").prop("required", true);
      $("#modalidad").prop("required", false);
      $("#tipo").prop("required", false);
      $("#aceptar").hide();

    });

    $("#radio-10").click(function() {
      $("#textarea").hide();
      $("#observaciones1").hide();
      $("#textarea").prop("required", false);
      $("#modalidad").prop("required", true);
      $("#tipo").prop("required", true);
      $("#aceptar").show();
    });
  });
</script> --}}
@endsection