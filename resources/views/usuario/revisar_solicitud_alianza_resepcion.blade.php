@extends('principal')
@section('revisar_solicitud_alianza')

<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Documentación de la Alianza N° {{$revisar->solicitud_alianza}}</h4>
        <!-- /.dropdown js__dropdown -->
        <div class="activity-list">
            <div class="activity-item">
                <div class="bar bg-primary">
                    <div class="dot bg-primary"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <!-- /.date -->
                    <div class="text">
                       <h4>Punto de Cuenta de Inicio</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$revisar->punto_cuenta}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-success">
                    <div class="dot bg-success"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                        <h4>Especificaciones Técnicas</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$revisar->espesificaciones_tecnicas}}">Ver Documento</a></div>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-warning">
                    <div class="dot bg-warning"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Matriz de Evaluación Técnica</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$revisar->matriz_tecnica}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Memorandum Solicitud de Inicio</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$revisar->memorandum}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
           
            <div class="activity-item col-lg-12">
                <form action="{{url('revisar_solicitud_alianza')}}" method="POST" >
                    @csrf
                    <div class="form-group">                        
                        <div class="col-lg-12">
                            <label for="">Estatus</label>
                            <input type="text" name='id_alianza' hidden ="true" value="{{$revisar->id}}">
                            <ul class="list-inline">
                                <li>
                                    <div class="radio success">
                                        <input type="radio" required name="estatus" value="Recibido" id="radio-10"><label for="radio-10">Recibido</label></div>
                                    <!-- /.radio -->
                                </li>
                                <li>
                                    <div class="radio danger">
                                        <input type="radio" required name="estatus" value="No Recibido" id="radio-11"><label for="radio-11">No Recibido</label></div>
                                    <!-- /.radio -->
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <br>
                        </div>
                        <div class="col-lg-12" id="observaciones" style="display: none">
                            <label for="">Observaciones</label>
                        </div>
                        <div class="col-lg-12" id="observaciones1"  style="display: none">
                            <textarea id="textarea" class="form-control" maxlength="3000" rows="2" placeholder="Indique las razones por las cuales se rechaza la solicitud de alianza estrategica."></textarea>
                            <br><br>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-rounded"><i class="fa fa-check"></i> Enviar</button>
                            <a href="{{url('lista_alianzas_solicitadas')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir atras</a>
                        </div>
                    </div>
                </form>
            </div>
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

    });

    $("#radio-10").click(function() {
      $("#textarea").hide();
      $("#observaciones1").hide();
      $("#textarea").prop("required", false);

    });
  });
</script>


@endsection