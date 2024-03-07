@extends('principal')
@section('analizar_alianza_consultor')
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Documentación de la Solicitud de Alianza N°: {{$consultar_alianza[0]->solicitud_alianza}}</h4>
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
                    <div class="date">
                        <a target="_blank" href="{{$consultar_alianza[0]->punto_cuenta}}">Ver Documento</a>
                    </div>
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
                    <div class="date"><a target="_blank" href="{{$consultar_alianza[0]->espesificaciones_tecnicas}}">Ver Documento</a></div>
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
                       <h4>Matríz de Evaluación Técnica</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$consultar_alianza[0]->matriz_tecnica}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$consultar_alianza[0]->memorandum}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <br><br>
            @if ($consultar_alianza[0]->id_estatus  < 8 || $consultar_alianza[0]->id_estatus ==null)
                @if($consultar_alianza[0]->id_estatus != 5)
                    <div class="form-constrol">
                        <form action="{{url('actualizar_estatus_alianza')}}" class="validar_form" name="validar_form" id="validar_form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6">
                                <input type="text" name="id_unidad" hidden="true" value="{{$consultar_alianza[0]->id_unidad}}">
                                <input type="text" name='id_alianza' hidden ="true" value="{{$consultar_alianza[0]->id}}">
                                <label for="">Estatus de la Solicitud de a Alianza</label>
                                    <select class="form-control" id="estatus" name="id_estatus" required>
                                        <option value="" selected>- Seleccione -</option>
                                        @foreach ($estatus_solicitud as $key => $value)
                                            @if ($key >= $consultar_alianza[0]->id_estatus )
                                                <option value="{{$value->id}}">{{$value->nombre_estatus}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-lg-6" id="invitado" style="display: none">
                                <label for="">Lista de Contratistas</label>
                                <br>
                                <select class="form-control select2_2" id="id_empresas" multiple name="id_empresa[]" required>
                                    @foreach ($empresas as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12" style="display: none" id="adjudicado">
                                <br><br>
                                <div class="col-lg-3">
                                    <label for="">N° de Punto de Cuenta</label>
                                    <input type="text"  class="form-control" required  name="numero_punto_cuenta_estatus_alianza" id="numero_punto_cuenta_estatus_alianza">
                                </div>
                               
                                <div class="col-lg-3">
                                    <label for="">N° de Control</label>
                                    <input type="text"  class="form-control" required name="numero_control_estatus_alianza" id="numero_control_estatus_alianza">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Fecha del Punto de Cuenta</label>
                                    <input type="date" class="form-control" required value="" max="{{date('Y-m-d')}}" name="fecha_punto_estatus_alianza" id="fecha_punto_estatus_alianza">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Contratista a Adjudicar</label>
                                    <select name="id_empresa_adjudicado" class="form-control" id="id_empresa_seleccionada">
                                        <option value="" selected>-Seleccione-</option>
                                        @foreach ($empresa_adjudicar as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <label  >Objeto de la Contratista</label>
                                    <textarea class="form-control" readonly required name="objeto_empresa" id="objeto_empresa" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <label  >Punto de Adjudicación</label>
                                    <input type="file" name="punto_adjudicacion" title="Adjuntar Punto de Cuenta de Adjudicación" id="punto_adjudicacion" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <div class="col-lg-12">
                                        <label  >El proceso contempla Fianzas?</label>
                                    </div>
                                    <div id="fianza_si" class="col-lg-1 radio success">
                                        <input type="radio" class="success" name="fianza" id="radio-1" class="seleccion" value="SI">
                                        <label for="radio-1">SI</label>
                                    </div>
                                    <div id="fianza_no" style="margin-top: 10px;" class="col-lg-1 radio danger">
                                        <input type="radio" class="danger"  name="fianza" id="radio-2" class="seleccion" value="NO">
                                        <label for="radio-2">NO</label>
                                    </div>
                                </div>
                                <div id="fianza" style="display: none" style="" class="col-lg-12">
                                    <br>
                                    {{--Fianza de Anticipo--}}
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <label  >El Proceso contempla Fianza de Anticipo</label>
                                        </div>
                                        <div id="fianza_anticipo_si" class="col-lg-1 radio success">
                                            <input type="radio" class="success" name="fianza_anticipo_" id="radio-5" value="SI">
                                            <label for="radio-5">SI</label>
                                        </div>
                                        <div id="fianza_anticipo_no" style="margin-top: 10px;" class="col-lg-1 radio danger">
                                            <input type="radio" class="danger" name="fianza_anticipo_" id="radio-6" value="NO">
                                            <label for="radio-6">NO</label>
                                        </div>
                                        <br>
                                    </div>
                                    
                                    <div id="fianza_anticipo" style="display: none"  class="col-lg-12">
                                        <br>
                                        <div class="col-lg-4">
                                            <label  >Número de Fianza de Anticipo</label>
                                            <input class="form-control" name="n_anticipo" id="n_anticipo" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Monto de la Fianza de Anticipo</label>
                                            <input class="form-control" onkeypress="return SoloNumeros(event)" id="monto_anticipo" name="monto_anticipo" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Fecha de Caducidad de Anticipo</label>
                                            <input class="form-control" id="fecha_caducidad_anticipo" name="fecha_caducidad_anticipo" min="{{date('Y-m-d')}}" type="date">
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <label  >Fianza de Anticipo</label>
                                            <input type="file" name="fianza_anticipo_doc" title="Adjuntar fianza" id="fianza_anticipo" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12"><br></div>
                                    {{-- <div id="retencion_anticipo" style="display: none" class="col-lg-12">
                                        <div class="col-lg-6">
                                            <br>
                                            <label  >Retenciones Anticipo</label>
                                            <input type="file" name="retenciones_anticipo_doc" title="Retenciones Anticipo" id="retenciones_anticipo" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000"/>
                                        </div>
                                        <div class="col-lg-6">
                                            <br>
                                            <label  >Observaciones</label>
                                            <textarea name="obj_retenciones_anticipo" class="form-control" style="height:200px"  id="textarea" min="3000" maxlength="3000"></textarea>
                                        </div>
                                    </div> --}}
                                    {{--Fianza de fiel cumplimiento--}}
                                    {{-------------------------------}}
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <label  >El Proceso contempla Fianza de Fiel Cumplimiento?</label>
                                        </div>
                                        <div id="fiel_cumplimiento_si" class="col-lg-1 radio success">
                                            <input type="radio" class="success" name="fiel_cumplimiento_" id="radio-9" value="SI">
                                            <label for="radio-9">SI</label>
                                        </div>
                                        <div id="fiel_cumplimiento_si" style="margin-top: 10px;" class="col-lg-1 radio danger">
                                            <input type="radio" class="danger" name="fiel_cumplimiento_" id="radio-10" value="NO">
                                            <label for="radio-10">NO</label>
                                        </div>
                                        <br>
                                    </div>
                                    <div id="fianza4" style="display: none" class="col-lg-12">
                                        <div class="col-lg-4">
                                            <label  >Número de Fianza de Fiel Cumplimiento</label>
                                            <input class="form-control" name="n_fiel_cumplimineto" id="n_fiel_cumplimineto" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Monto de la Fianza de Fiel Cumplimiento</label>
                                            <input class="form-control" id="monto_fiel_cumplimiento" onkeypress="return SoloNumeros(event)" name="monto_fiel_cumplimiento" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Fecha de Caducidad de la Fianza de Fiel Cumplimineto</label>
                                            <input class="form-control" id="fecha_caducidad_fiel_cumplimiento" name="fecha_caducidad_fiel_cumplimiento" min="{{date('Y-m-d')}}" type="date">
                                        </div>
                                        <div class='col-lg-12'><br></div>
                                        <div class="col-lg-12">
                                            <label  >Fianza de Fiel Cumplimiento</label>
                                            <input type="file" name="fianza_fiel_cumplomiento_doc" title="Adjuntar fianza" id="fianza_fiel_cumplomiento_doc" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000"/>
                                        </div>
                                    </div>
                                    <div id="retencion_fiel_cumplimiento" style="display: none" class="col-lg-12">
                                        <div class="col-lg-6">
                                            <label  >Carta de Retención Fiel Cumplimiento</label>
                                            <input type="file" name="retencion_fiel_cumplimiento_doc" id="retencion_fiel_cumplimiento_doc" title="Adjuntar Fianza" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label  >Observaciones</label>
                                            <textarea name="obj_retenciones_fiel_cumplimiento" class="form-control" style="height:200px"  id="textarea" min="3000" maxlength="3000"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"><br><br></div>
                                    
                                    {{--Fianza Laboral --}}
                                    {{-------------------}}
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <label  >El Poceso contempla Fianza Laboral?</label>
                                        </div>
                                        <div id="fianza_laboral_si" class="col-lg-1 radio success">
                                            <input type="radio" class="success" name="fianza_laboral" id="radio-3" value="SI">
                                            <label for="radio-3">SI</label>
                                        </div>
                                        <div id="fianza_laboral_no" style="margin-top: 10px;" class="col-lg-1 radio danger">
                                            <input type="radio" class="danger" name="fianza_laboral" id="radio-4" value="NO">
                                            <label for="radio-4">NO</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"></div>
                                    <div id="numero_fianza_laboral" style="display: none" class="col-lg-12">
                                        <div class="col-lg-4">
                                            <label  >Número de Fianza Laboral</label>
                                            <input class="form-control" id="n_laboral" title="número de de fianza laboral" name="n_laboral" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Monto de la Fianza Laboral</label>
                                            <input class="form-control" onkeypress="return SoloNumeros(event)" id="monto_laboral" name="monto_laboral" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Fecha de Caducidad Laboral</label>
                                            <input class="form-control" name="fecha_caducidad_laboral" id="fecha_caducidad_laboral" min="{{date('Y-m-d')}}" type="date">
                                        </div>
                                        <div class="col-lg-12"><br></div>
                                        <div class="col-lg-12">
                                            <label  >Fianza Laboral</label>
                                            <input type="file" name="fianza_laboral_doc" title="Adjuntar Fianza" id="fianza_laboral_doc" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                        </div>
                                    </div>
                                    <div id="retencion_laboral" style="display: none" class="col-lg-12">
                                        <div class="col-lg-6">
                                            <label  >Carta de Retención Laboral</label>
                                            <input type="file" name="retencion_laboral_doc" id="retencion_laboral_doc" title="Adjuntar Fianza" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label  >Observaciones</label>
                                            <textarea name="obj_retenciones_laborales" class="form-control" style="height:200px"  id="textarea1" min="3000" maxlength="3000"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"><br></div>
                                    {{--Fianza de Buena Calidad--}}
                                    {{----------------------------------}}
                                    <div class="col-lg-12" id="fianza_buena_calidad">
                                        <div class="col-lg-12">
                                            <label  >El Proceso contempla Fianza de buena calidad?</label>
                                        </div>
                                        <div id="fianza_buena_calidad_si" class="col-lg-1 radio success">
                                            <input type="radio" class="success" name="fianza_buena_calidad_" id="radio-7" value="SI">
                                            <label for="radio-7">SI</label>
                                        </div>
                                        <div id="fianza_buena_calidad_no" style="margin-top: 10px;" class="col-lg-1 radio danger">
                                            <input type="radio" class="danger" name="fianza_buena_calidad_" id="radio-8" value="NO">
                                            <label for="radio-8">NO</label>
                                        </div>
                                        <br>
                                    </div>
                                    {{--fianza debuena calidad--}}
                                    {{-- <div id="buena_calidad" style="display: none"  class="col-lg-12">
                                        <br>
                                        <div class="col-lg-4">
                                            <label  >Número de Fianza de Buena Calidad</label>
                                            <input class="form-control" id="n_buena_calidad" name="n_buena_calidad" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Monto de la Fianza de Buena Calidad</label>
                                            <input class="form-control" onkeypress="return SoloNumeros(event)" id="monto_buena_calidad" name="monto_buena_calidad" type="text">
                                        </div>
                                        <div class="col-lg-4">
                                            <label  >Fecha de Caducidad de Fianza de Buena Calidad</label>
                                            <input class="form-control" name="fecha_buena_calidad_caducidad" min="{{date('Y-m-d')}}" type="date">
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <label  >Fianza de Buena Calidad</label>
                                            <input type="file" name="fianza_buena_calidad_doc" title="Adjuntar fianza" id="fianza_buena_calidad_doc" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                        </div>
                                    </div>
                                    <div id="retencion_buena_calidad" style="display: none" class="col-lg-12">
                                        <div class="col-lg-6">
                                            <br>
                                            <label  >Retenciones Buenas Calidad</label>
                                            <input type="file" name="retenciones_buena_calidad" title="Retencion de Buena Calidad" id="retenciones_buena_calidad" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                                        </div>
                                        <div class="col-lg-6">
                                            <br>
                                            <label  >Observaciones</label>
                                            <textarea name="obj_retenciones_buena_calidad" class="form-control" style="height:200px"  id="textarea" min="3000" maxlength="3000"></textarea>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-12" style="display:none" id="contrato_firmado">
                                <br><br>
                                <input type="file" name="contrato_firmado" title="Adjuntar Punto de Cuenta de Adjudicación" id="contrato_firmado" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                            </div>
                            <div class="col-lg-12" style="display:none" id="desierto">
                                <br><br>
                                <input type="file" name="punto_desierto" id="punto_desierto" title="Adjuntar punto de cuenta Declarando decierto el proceso" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                            </div>
                            <div class="col-lg-12" style="display:none" id="terminado">
                                <br><br>
                                <input type="file" name="punto_terminado" id="punto_terminado" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                            </div>
                            <div class="col-lg-12" style="display: none" id="devuelto">
                                <br><br>
                                <input type="file" name="memorandum_devuelto" id="memorandum_devuelto" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                            </div>
                            <div class="col-lg-12" style="display: none" id="contrato">
                                <br><br>
                                <input type="file" name="contrato_firmado" id="contrato_firmado" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                            </div>
                            <div class="col-lg-12">
                                <br><br>
                                {{-- <input id="actualizar" type="submit" value="Actualizar" class="btn btn-rounded btn-success"> --}}
                                <button id="actualizar" type="submit" onclick="document.forms.validar_form.submit();" class="btn btn-rounded btn-success">Actualizar <i class="fa fa-check"></i> </button>
                                <a href="{{url('lista_alianza_consultor_analizar')}}" class="btn btn-warning btn-rounded" style="color: white"><i class="fa fa-arrow-left" style="color: white"></i> Ir atras</a>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-lg-12">
                        <br>
                        <a href="{{url('lista_alianza_consultor_analizar')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                    </div>
                @endif
            @else
            <div class="col-lg-12">
                <br><br>
                <a href="{{url('lista_alianza_consultor_analizar')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
            </div>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery-3.2.1.js"></script> 
<script>
    $(document).ready(function(){
  $("#id_empresa_seleccionada").change(function(){
    var id_empresa_seleccionada = $(this).val();
    if(id_empresa_seleccionada === ""){
        var id_empresa_seleccionada = 0;
        $('#objeto_empresa').val('');
    }
      
    $.get('objeto/'+id_empresa_seleccionada, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    $('#objeto_empresa').val(data);
  });
});
});

$(function() {
    $('#estatus').change(function(){
        $('#adjudicado').hide();
        $('#punto_adjudicacion').prop('disabled',true);
        $('#desierto').hide();
        $('#terminado').hide();
        $('#devuelto').hide();
        $('#contrato').hide();
        $('#invitado').hide();
        if ($('#estatus').val() == 3) {
           $('#invitado').show();
        }

        if ($(this).val() < 5){
            $("input:radio[name=fianza]:checked").checked = false;
            $('#radio-1').prop('required',false);// Selección de respuesta SI fianza
            $('#radio-2').prop('required',false);// Seleccion de Rspuesta NO fianza
            $("input:radio[name=fianza_laboral]:checked").checked = false;
            $('#radio-3').prop('required',false);// Selección de respuesta SI fianza lavoral
            $('#radio-4').prop('required',false);// Seleccion de Rspuesta NO fianza laboral
            $("input:radio[name=fianza_anticipo_]:checked").checked = false;
            $('#radio-5').prop('required',false);// Selección de respuesta SI fianza anicipo
            $('#radio-6').prop('required',false);// Seleccion de Rspuesta NO fianza anticipo
            $("input:radio[name=fianza_buena_calidad_]:checked").checked = false;
            $('#radio-7').prop('required',false);// Selección de respuesta SI fianza buena calidad
            $('#radio-8').prop('required',false);// Seleccion de Rspuesta NO fianza buena calidad
            $("input:radio[name=fiel_cumplimiento_]:checked").checked = false;
            $('#radio-9').prop('required',false);// Selección de respuesta SI fianza fiel cumplimiento
            $('#radio-10').prop('required',false);// Seleccion de Rspuesta NO fianza fiel cumplimiento
            $('#punto_adjudicacion').prop('required',false);
            $('#control').prop('required',false);
            $('#numero_punto_cuenta_adjudicacion').prop('required',false);
            $('#numero_control_adjudicacion').prop('required',false);
            $('#fecha_punto_adjudicacion').prop('required',false);
            $('#id_empresa').prop('required',false);

            $('#n_laboral').prop('required',false);
            $('#monto_laboral').prop('required',false);
            $('#fecha_caducidad_laboral').prop('required',false);
            $('#fianza_laboral_doc').prop('required',false);
            $('#retencion_laboral_doc').prop('required',false);

            $('#n_fiel_cumplimineto').prop('required',false);
            $('#monto_fiel_cumplimiento').prop('required',false);
            $('#fecha_caducidad_fiel_cumplimiento').prop('required',false);
            $('#fianza_fiel_cumplomiento_doc').prop('required',false);

            $('#n_anticipo').prop('required',false);
            $('#monto_anticipo').prop('required',false);
            $('#fecha_caducidad_anticipo').prop('required',false);
            $('#retenciones_anticipo_doc').prop('required',false);

            $('#n_buena_calidad').prop('required',false);
            $('#monto_buena_calidad').prop('required',false);
            $('#fianza_buena_calidad_doc').prop('required',false);
            $('#retenciones_buena_calidad').prop('required',false);
            // $('#radio-1').prop('disabled',true)
            // $('#radio-2').prop('disabled',true)
        }
        if ($(this).val() == 5)
        {
             $('#adjudicado').show();
             $('#punto_adjudicacion').prop('disabled',false);
             $('#punto_adjudicacion').prop('required',true);
             $('#numero_punto_cuenta_adjudicacion').prop('required',true);
             $('#numero_control_adjudicacion').prop('required',true);
             $('#fecha_punto_adjudicacion').prop('required',true);
             $('#id_empresa').prop('required',true);
             
             $(".validar_form").submit(function () {
                var fianza = $("input[name='fianza']:checked").length;
               
                if (fianza == "") {
                    $(document).ready(function(){
                            swal({
                                    title: "¡Selección Vacía!",
                                    text:  "Debe seleccionar un si el proceso tiene fianza o no",
                                    type:  "error",
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                        });
                    return false;
                } 
             });
             $('#radio-1').click(function(){
                if ($(this).val() == 'SI' ) {
                    $('#fianza').show();
                    $('#fianza2').show();
                    $('#radio-3').click(function(){
                        if ($(this).val()=='SI') {
                            $('#numero_fianza_laboral').show();
                            $('#n_laboral').prop('required',true);
                            $('#monto_laboral').prop('required',true);
                            $('#fecha_caducidad_laboral').prop('required',true);
                            $('#fianza_laboral_doc').prop('required',true);
                            $('#retencion_laboral').hide();
                            $('#retencion_laboral_doc').prop('required',false);
                        }
                    });

                    $('#n_fiel_cumplimineto').prop('required',true);
                    $('#monto_fiel_cumplimiento').prop('required',true);
                    $('#fecha_caducidad_fiel_cumplimiento').prop('required',true);
                    $('#fianza_fiel_cumplomiento_doc').prop('required',true);
                    $('#radio-4').click(function(){
                        if ($(this).val()=='NO') {
                            $('#numero_fianza_laboral').hide();
                            $('#n_laboral').prop('required',false);
                            $('#monto_laboral').prop('required',false);
                            $('#fecha_caducidad_laboral').prop('required',false);
                            $('#fianza_laboral_doc').prop('required',false);
                            $('#retencion_laboral').show();
                            $('#retencion_laboral_doc').prop('required',true);
                        }
                    });
                    $(".validar_form").submit(function () {
                        var fianza_bunea_calidad = $("input[name='fianza_buena_calidad_']:checked").length;
                        // var radio = $("input[type='radio']:checked").length;
                        // var select = $("select option:selected").val();
                        if (fianza_bunea_calidad == "") {
                            $(document).ready(function(){
                                    swal({
                                            title: "¡Selección Vacía!",
                                            text:  "Debe seleccionar si el proceso tiene fianza de buena calidad o no",
                                            type:  "error",
                                            showConfirmButton: false,
                                            timer: 3000
                                        })
                                });
                            return false;
                        } 
                    });
                    $(".validar_form").submit(function () {
                        var fianza_anticipo_ = $("input[name='fianza_anticipo_']:checked").length;
                        // var radio = $("input[type='radio']:checked").length;
                        // var select = $("select option:selected").val();
                        if (fianza_anticipo_ == "") {
                            $(document).ready(function(){
                                    swal({
                                            title: "¡Selección Vacía!",
                                            text:  "Debe seleccionar si el proceso tiene fianza de anticipo o no",
                                            type:  "error",
                                            showConfirmButton: false,
                                            timer: 3000
                                        })
                                });
                            return false;
                        } 
                    });
                    $(".validar_form").submit(function () {
                        var fianza_laboral = $("input[name='fianza_laboral']:checked").length;
                        console.log(fianza_laboral);
                        // var radio = $("input[type='radio']:checked").length;
                        // var select = $("select option:selected").val();
                        if (fianza_laboral == "") {
                            $(document).ready(function(){
                                    swal({
                                            title: "¡Selección Laboral Vacía!",
                                            text:  "Debe seleccionar si el proceso tiene fianza de Laboral o no",
                                            type:  "error",
                                            showConfirmButton: false,
                                            timer: 3000
                                        })
                                });
                            return false;
                        } 
                    });
                    
                    $('#radio-5').click(function(){
                        if ($(this).val()=='SI') {
                            $('#fianza_anticipo').show();
                            $('#n_anticipo').prop('required',true);
                            $('#monto_anticipo').prop('required',true);
                            $('#fecha_caducidad_anticipo').prop('required',true);
                            $('#retencion_anticipo').hide();
                            $('#retenciones_anticipo_doc').prop('required',false);
                        }
                    });
                    
                    $('#radio-6').click(function(){
                        if ($(this).val()=='NO') {
                            $('#fianza_anticipo').hide();
                            $('#n_anticipo').prop('required',false);
                            $('#monto_anticipo').prop('required',false);
                            $('#fecha_caducidad_anticipo').prop('required',false);
                            $('#retencion_anticipo').show();
                            $('#retenciones_anticipo_doc').prop('required',false);
                        }
                    });

                    $('#radio-7').click(function(){
                        if($(this).val() == 'SI') {
                            console.log('buena calidad');
                            $('#buena_calidad').show();
                            $('#n_buena_calidad').prop('required',true);
                            $('#monto_buena_calidad').prop('required',true);
                            $('#fianza_buena_calidad_doc').prop('required',true);
                            $('#retencion_buena_calidad').hide();
                            $('#retenciones_buena_calidad').prop('required',false);
                        }
                    });
                    $('#radio-8').click(function(){
                        if($(this).val() == 'NO') {
                            //console.log('buena calidad');
                            $('#buena_calidad').hide();
                            $('#n_buena_calidad').prop('required',false);
                            $('#monto_buena_calidad').prop('required',false);
                            $('#fianza_buena_calidad_doc').prop('required',false);
                            $('#retencion_buena_calidad').show();
                            $('#retenciones_buena_calidad').prop('required',true);
                        }
                    });
                    $('#radio-9').click(function(){
                        if ($(this).val() == 'SI') {
                            $('#fianza4').show();
                            $('#n_fiel_cumplimineto').prop('required',true);
                            $('#monto_fiel_cumplimiento').prop('required',true);
                            $('#fecha_caducidad_fiel_cumplimiento').prop('required',true);
                            $('#fianza_fiel_cumplomiento_doc').prop('required',true);
                            $('#retencion_fiel_cumplimiento').hide();
                            $('#retencion_fiel_cumplimiento_doc').prop('required',false);
                        }
                    });
                    $('#radio-10').click(function(){
                        if ($(this).val() == 'NO') {
                            $('#fianza4').hide();
                            $('#n_fiel_cumplimineto').prop('required',false);
                            $('#monto_fiel_cumplimiento').prop('required',false);
                            $('#fecha_caducidad_fiel_cumplimiento').prop('required',false);
                            $('#fianza_fiel_cumplomiento_doc').prop('required',false);
                            $('#retencion_fiel_cumplimiento').show();
                            $('#retencion_fiel_cumplimiento_doc').prop('required',true);
                        }
                    });
                }
                $('#actualizar').click(function(){
                    $('#validar_form').submit();
                    console.log('llegue');
                    document.validar_form.submit();
                });
             });
             $('#radio-2').click(function(){
                if ($(this).val() == 'NO' ) {
                    console.log('llegue a este punto del no');
                    $('#fianza').hide();
                    $('#fianza2').hide();
                    $('#n_laboral').prop('required',false);
                    $('#monto_laboral').prop('required',false);
                    $('#fecha_caducidad_laboral').prop('required',false);
                    $('#fianza_laboral_doc').prop('required',false);
                    $('#retencion_laboral').hide();
                    $('#retencion_laboral_doc').prop('required',false);
                    $('#n_fiel_cumplimineto').prop('required',false);
                    $('#monto_fiel_cumplimiento').prop('required',false);
                    $('#fecha_caducidad_fiel_cumplimiento').prop('required',false);
                    $('#fianza_fiel_cumplomiento_doc').prop('required',false);
                    $('#actualizar').click(function(){
                         $('.validar_form').submit();
                         document.validar_form.submit();
                    });
                }
             });
        }
        if ($(this).val() == 6)
        {
             $('#contrato').show();
             $('#punto_adjudicacion').prop('required',false);
             $('#punto_desierto').prop('required',false);
             $('#punto_terminado').prop('required',false);
             $('#memorandum_devuelto').prop('required',false);
             $('#numero_control_adjudicacion').prop('required',false);
             $('#fecha_punto_adjudicacion').prop('required',false);
             $('#id_empresa').prop('required',false);
             $('#carta_retencion').prop('required',false)
        }
       
        if ($(this).val() == 7) {
            $('#terminado').show();
            $('#punto_terminado').prop('required',true);
            $('#punto_desierto').prop('required',false);
            $('#punto_adjudicacion').prop('required',false);
            $('#memorandum_devuelto').prop('required',false);
            $('#numero_control_adjudicacion').prop('required',false);
            $('#fecha_punto_adjudicacion').prop('required',false);
            $('#id_empresa').prop('required',false);
            $('#carta_retencion').prop('required',false)
        }
        if ($(this).val() == 8) {
            $('#devuelto').show();
            $('#memorandum_devuelto').prop('required',true);
            $('#punto_terminado').prop('required',false);
            $('#punto_desierto').prop('required',false);
            $('#punto_adjudicacion').prop('required',false);

            $('#numero_control_adjudicacion').prop('required',false);
            $('#fecha_punto_adjudicacion').prop('required',false);
            $('#id_empresa').prop('required',false);
            $('#carta_retencion').prop('required',false)
        }
        if ($(this).val() == 9)
        {
            $('#desierto').show();
            $('#punto_desierto').prop('required',true);
            $('#punto_adjudicacion').prop('required',false);
            $('#punto_terminado').prop('required',false);
            $('#memorandum_devuelto').prop('required',false);

            $('#numero_control_adjudicacion').prop('required',false);
            $('#fecha_punto_adjudicacion').prop('required',false);
            $('#id_empresa').prop('required',false);
            $('#carta_retencion').prop('required',false)
        }
    });
});
</script>
@endsection