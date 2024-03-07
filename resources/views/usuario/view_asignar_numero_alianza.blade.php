@extends('principal')
@section('asignar_numero_alianza')
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Documentación de la Solicitud de Alianza N° {{$consulta[0]->solicitud_alianza}}</h4>
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
                    <div class="date"><a target="_blank" href="{{$consulta[0]->punto_cuenta}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$consulta[0]->espesificaciones_tecnicas}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$consulta[0]->matriz_tecnica}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$consulta[0]->memorandum}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <br><br>
            <!-- /.activity-item -->
            @if ($consulta[0]->estatus == 'Recibido' && $buton == 1)
            <div class="form-group col-lg-12">
                <form action="{{url('numero_alianza')}}" method="POST" >
                    @csrf
                         <div id="aceptar" class="col-lg-12 form-group">
                            <input type="text" name='id_alianza' hidden ="true" value="{{$consulta[0]->id}}">
                            <div class="col-lg-6">
                                <label for="">Modalidad de Contratación</label>
                                <select class="form-control" name="modalidad_contratacion" id="modalidad">
                                    <option value="" selected>- Seleccionar -</option>
                                    @foreach ($modalidad_contratacion as $key => $value)
                                        <option value="{{$value->siglas}}">{{$value->modalidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Tipo de Contratación</label>
                                <select class="form-control" name="tipo_contratacion" id="tipo">
                                    <option value="" selected>- Seleccionar -</option>
                                        <option value="ALZ">ALIANZA</option>
                                </select>
                            </div>
                                
                            <div class="form-group col-lg-12">
                                <br>
                                <button type="submit" class="btn btn-success btn-rounded"><i class="fa fa-check"></i> Asignar</button>
                                <a href="{{url('lista_alianzas_recibidas_analizar')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            @else
            <div class="col-lg-12">
                <br><br>
                <a href="{{url('lista_alianzas_recibidas')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
            </div>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
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
</script>
@endsection