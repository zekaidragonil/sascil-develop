@extends('principal')
@section('view_analisis_alianza')

<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Documentación de la Alianza {{$actualizar_alianza->numero_alianza}}</h4>
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
                       <h4>Punto de Cuenta</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->punto_cuenta}}">Ver</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-primary">
                    <div class="dot bg-primary"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <!-- /.date -->
                    <div class="text">
                        <h4>Estimación de Costos</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->estimacion_costo}}">Ver</a></div>
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
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->espesificaciones_tecnicas}}">Ver</a></div>
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
                    <div class="texts">
                       <h4>Forma 018</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->forma_018}}">Ver</a></div>
                    <!-- /.text -->
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
                       <h4>Matriz Técnica</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->matriz_tecnica}}">Ver</a></div>
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
                       <h4>Memorandum</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->memorandum}}">Ver</a></div>
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
                       <h4>SOLPE</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$actualizar_alianza->solpe}}">Ver</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="activity-item col-lg-12">
                <form action="{{url('actualizar_solicitud_alianza')}}" method="POST" >
                    @csrf
                    <div class="form-group">                        
                        <div class="col-lg-12">
                            <label for="">Estatus</label>
                            <input type="text" name='id_alianza' hidden ="true" value="{{$actualizar_alianza->id}}">
                            <ul class="list-inline">
                                <li>
                                    <div class="radio success">
                                        <input type="radio" required name="estatus" value="Recibido" id="radio-10"><label for="radio-10">Revisada</label></div>
                                    <!-- /.radio -->
                                </li>
                                <li>
                                    <div class="radio danger">
                                        <input type="radio" required name="estatus" value="No Recibido" id="radio-11"><label for="radio-11">No Recibido</label></div>
                                    <!-- /.radio -->
                                </li>
                            </ul>
                        </div>
                        {{-- <div id="contrato" style="display:none">
                            <div class="form-group col-lg-6">
                                <label for="">Modalidad de Contratación</label>
                                <select class="form-control" name="modalidad" id="modalidad">
                                    <option value="" selected>- Seleccione -</option>
                                    @foreach ($modalidad_contratacion as $key => $value)
                                        <option value="{{$value->siglas}}">{{$value->modalidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Tipo de Contratación</label>
                                <select class="form-control" name="tipo_cont" id="tipo_cont" style="width: 736px;">
                                    <option value="" selected>- Seleccione -</option>
                                    @foreach ($tipo_contratacion as $key => $value)
                                        <option value="{{$value->siglas}}">{{$value->tipo_cont}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group col-lg-6" id="lista_empresa" >
                            <label for="">Lista de Empresas a Asociar</label>
                            <br>
                            <select class="form-control select2_1" title="Hacer Clic para Desplegar" name="empresas[]" multiple="multiple">
                                @foreach ($empresa as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nombre}} {{$value->rif}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="form-group col-lg-6" id="agregar_empresa" style="display: none">
                            <a href="{{url('view_registro_empresa')}}" class="btn btn-success btn-circle" title="Puede registrar la empresa aquí" style="border-top-style: solid;border-top-width: 0px;margin-top: 33px;"><i class="fa fa-plus"></i></a>
                            <br>
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
                            <a href="{{url('analisis_alianza')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir atras</a>
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
      $("#lista_empresa").hide();
      $("#agregar_empresa").hide();
      $("#contrato").hide();
    });

    $("#radio-10").click(function() {
      $("#textarea").hide();
      $("#observaciones1").hide();
      $("#textarea").prop("required", false);
      $("#lista_empresa").show();
      $("#agregar_empresa").show();
      $("#contrato").show();
    });
  });
</script>


@endsection