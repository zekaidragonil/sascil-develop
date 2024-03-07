@extends('principal')
@section('view_actualizar_estatus_solicitud_juridico')

<div class="col-lg-12 col-xs-12">
    <div class="box-content">
    <h4 class="box-title">Verificar Documentacion de la Solicitud N°: <b>{{$solicitud[0]->numero_asignado}}</b></h4>

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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->punto_cuenta}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->estimacion_costo}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->espesificaciones_tecnicas}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->forma_018}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->matriz_tecnica}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->memorandum}}">Ver Documento</a></div>
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
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->certificacion_presupuestaria}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="activity-item">
                <div class="bar bg-purple">
                    <div class="dot bg-purple"></div>
                    <div class="last-dot bg-purple"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                    <h4>Bienes Nacionales</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->bienes_nacionales}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="activity-item">
                <div class="bar bg-purple">
                    <div class="dot bg-purple"></div>
                    <div class="last-dot bg-purple"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                    <h4>Opinion de Asho</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->opinion_asho}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="activity-item">
                <div class="bar bg-purple">
                    <div class="dot bg-purple"></div>
                    <div class="last-dot bg-purple"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                    <h4>Punto de Cuenta de Adjudicación</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$solicitud[0]->punto_estatus}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            @if (count($fianza) != 0)
            @foreach ($fianza as $key=>$val)
            <div class="activity-item">
                <div class="bar bg-warning">
                    <div class="dot bg-warning"></div>
                    <div class="last-dot bg-warning"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                    <h4>{{$val->tipo_fianza}}</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$val->fianza}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            @endforeach
            @endif

            <div class="activity-item">
                <div class="bar bg-purple">
                    <div class="dot bg-purple"></div>
                    <div class="last-dot bg-purple"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                    <h4>Estatus</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date">{{$solicitud[0]->estatus}}</div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>

            
        </div>
        @if ($solicitud[0]->estatus != 'CONTRATO FIRMADO')
            <form action="{{url('actualizacion_estatus_solicitud_juridico')}}" method="post"  accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="activity-list">
                    <br>
                    <div class="form-group col-lg-6">
                        <input type="text" hidden name="id_solicitud" value='{{$solicitud[0]->id}}' >
                        <label for="">Definir Estatus del Proceso de Solicitud</label>
                        <select class="form-control" id="estatus" request name="estatus">
                            <option value="" selected>- Seleccione -</option>
                            @foreach ($estatus as $key1 => $value1)
                                @if ($solicitud[0]->estatus != $value1->nombre_estatus) 
                                    <option value="{{$value1->id}}">{{$value1->nombre_estatus}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-12" id="revision" style="display:none">
                        <label for="">Adjuntar Borrador de Contrato para su revisión</label>
                        <input type="file" name="borrador_contrato" title="Adjuntar Borrador de intrumento legal para su revisión" id="borrador_contrato" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                    </div>
                    <div class="form-group col-lg-12" id="contrato_firmado" style="display:none">
                        <div class="col-lg-6">
                            <label for="">N° del Instrumento Legal</label>
                            <input type="text" class="form-control" id="numero_contrato" name="numero_contrato">
                        </div>
                        <div class="col-lg-6">
                            <label for=""> Fecha de Suscripción del Contrato</label>
                            <input type="date" class="form-control" id="fecha_suscripcion" max="{{date('Y-m-d')}}" name="fecha_suscripcion">
                        </div>
                        
                        <div class="col-lg-6">
                            <br>
                            <label for="">Instrumento Legal</label>
                            <input type="file" name="instrumento_legal" title="Instrumento Legal Suscrito" id="instrumento_legal" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                        </div>
                        <div class="col-lg-6">
                            <br>
                            <label for="">Objeto del Instrumento Legal</label>
                            <textarea class="form-control" name="objeto" id="textarea" maxlength="3000" cols="12"style="height: 200px;"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <br>
                            <label for=""Plazo de Entrega>Plazo de Entrega</label>
                            <input type="date" class="form-control" name="plazo_entrega" min="{{date('Y-m-d')}}" id="plazo_entrega">
                        </div>
                        <div class="col-lg-6">
                            <br>
                            <label for="">Monto del Contrato</label>
                            <input type="text" name="monto_contrato" onkeypress="return SoloNumeros(event)" maxlength="20" id="monto_contrato" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <br>
                            <label for="">Moneda</label>
                            <select onchange="return cal_tasa()" class="form-control" name="moneda" id="moneda">
                                <option value="">- Seleccione -</option>
                                @foreach ($moneda as $key2 => $value2)
                                    <option value="{{$value2->id}}">{{$value2->tipo_moneda}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <br>
                            <label for="">Tasa en Bs.</label>
                            <input type="text" name="tasa_contrato" id="tasa_contrato" onkeypress="return SoloNumeros(event)" maxlength="20" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <button type="submit" name="boton1" value="1" class="btn btn-success btn-rounded">Actualizar <i class="fa fa-check"></i></button>
                        <a href="{{url('analizar_solicitud_contrato_juridico')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                    </div>
                    
                </div>
            </form>
        @else
            <a href="{{url('analizar_solicitud_contrato_juridico')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
        @endif
        

</div>
<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script>
function SoloNumeros(evt){
    if(window.event){//asignamos el valor de la tecla a keynum
    keynum = evt.keyCode; //IE
    }
    else{
    keynum = evt.which; //FF
    }
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
    return true;
    }
    else{
    return false;
    }
}
$(function(){
    $('#estatus').change(function(){
        console.log($('#estatus').val());
        if ($(this).val()=='') {
            $('#revision').hide();
            $('#contrato_firmado').hide();
            $('#contrato_firmado').val('');
            $('#borrador_contrato').prop("required",false);
            $('#borrador_contrato').val('');
            $('#textarea').prop('required',false);
            $('#textarea').val('');
            $('#numero_contrato').prop('required',false);
            $('#numero_contrato').val('');
            $('#instrumento_legal').prop('required',false);
            $('#instrumento_legal').val('');
            $('#plazo_entrega').prop('required',false);
            $('#plazo_entrega').val('');
            $('#monto_contrato').prop('required',false);
            $('#monto_contrato').val('');
            $('#moneda').prop('required',false);
            $('#moneda').val('');
            $('#fecha_suscripcion').prop('required',false);
            $('#fecha_suscripcion').val('');
            $('#tasa_contrato').prop('required',false);
            $('#tasa_contrato').val('');
        }
        if ($(this).val()==6) {
            $('#revision').hide();
            $('#contrato_firmado').show();
            $('#borrador_contrato').prop('required',false);
            $('#borrador_contrato').val('');
            $('#textarea').prop('required',true);
            $('#numero_contrato').prop('required',true);
            $('#instrumento_legal').prop('required',true);
            $('#plazo_entrega').prop('required',true);
            $('#monto_contrato').prop('required',true);
            $('#moneda').prop('required',true);
            $('#tasa_contrato').prop('required',true);
            $('#fecha_suscripcion').prop('required',true);
            $('#monto_contrato').on({
                'focus': function (event) {
                    $(event.target).select();
                },
                "keyup": function (event) {
                    $(event.target).val(function (index, value ) {
                        return value.replace(/\D/g, '')
                            .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                    });
                }
                });
            }
        if ($(this).val()==11){
            $('#revision').show();
            $('#contrato_firmado').hide();
            $('#borrador_contrato').prop("required",true);
            $('#textarea').prop('required',false);
            $('#textarea').val('');
            $('#numero_contrato').prop('required',false);
            $('#numero_contrato').val('');
            $('#instrumento_legal').prop('required',false);
            $('#instrumento_legal').val('');
            $('#plazo_entrega').prop('required',false);
            $('#plazo_entrega').val('');
            $('#monto_contrato').prop('required',false);
            $('#monto_contrato').val('');
            $('#moneda').prop('required',false);
            $('#moneda').val('');
            $('#fecha_suscripcion').prop('required',false);
            $('#fecha_suscripcion').val('');
        }
    });
});
$("#tasa_contrato").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
            $(event.target).val(function (index, value ) {
                return value.replace(/\D/g, "")
                    .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                });
            }
    });
    function cal_tasa(){
        var moneda = document.getElementById("moneda").value;
        //console.log(moneda);
        if (moneda == 4){
            document.getElementById("tasa_contrato").value=1;
            document.getElementById("tasa_contrato").readOnly = true;
        }else{
            document.getElementById("tasa_contrato").value='';
            document.getElementById("tasa_contrato").readOnly = false;
        }
    }
</script>
@endsection