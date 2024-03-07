@extends('principal')
@section('solicitar_certificacion')
<style>
    figcaption {
  display:none; 
  transition: all .5s;
}
/* Visible texto */figure:hover > figcaption {
  display:block;
  transition: all .5s;
}
</style>
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Solicitud de Certificación Presupuestaria</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
                <div>
                <h4 class="box-title">Partidas Presupuestarias Asignadas a la Unidad: {{$nombre_unidad}}</h4>
                <!-- /.dropdown js__dropdown -->
                <table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código de Proyecto</th>
                            <th>Proyecto</th>
                            <th>Partida</th>
                            <th>Descripción</th>
                            <th>Fondo</th>
                            <th>Monto Original</th>
                            <th>Saldo Disponible</th>
                            <th>Monto a Certificar</th>
                            <th>Añadir</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Código de Proyecto</th>
                            <th>Proyecto</th>
                            <th>Partida</th>
                            <th>Descripción</th>
                            <th>Fondo</th>
                            <th>Monto Original</th>
                            <th>Saldo Disponible</th>
                            <th>Monto a Certificar</th>
                            <th>Añadir</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @for ($i=0;$i < count($proyecto) ;$i++)
                        <tr>
                            <form id="agregar{{$i}}">
                            <td align="center">
                                <input type="text" name="conteo" id="conteo" value="{{count($proyecto)}}" hidden="true">
                                <label style="margin-top: 12px;" for="">{{$i+1}}</label> <input hidden="true" id="numero{{$i}}" name="numero{{$i}}" value="{{$i+1}}" type="text">
                            </td>
                            <td>
                                <label style="margin-top: 12px;">{{$proyecto[$i]->proyecto_presupuestario}}
                                    <input type="text" hidden name="codigo_proyecto{{$i}}" id="codigo_proyecto{{$i}}" value="{{$proyecto[$i]->proyecto_presupuestario}}" >
                                </label>
                            </td>
                            <td>
                                <input type="text" name="id_proyecto{{$i}}" id="id_proyecto{{$i}}" hidden="true" value="{{$proyecto[$i]->id_proyecto}}">
                                <input type="text" value="{{$proyecto[$i]->nombre_proyecto}}" name="nombre_proyecto{{$i}}" id="nombre_proyecto{{$i}}" hidden="true">  
                                <label style="margin-top: 12px;">{{$proyecto[$i]->nombre_proyecto}}</label>
                            </td>
                            <td>
                                <input type="text" name="id_partida{{$i}}" id="id_partida{{$i}}" hidden="true" value="{{$proyecto[$i]->codigo_partida}}"><label style="margin-top: 12px;">{{$proyecto[$i]->codigo_partida}}</label>
                            </td>
                            <td>
                                <label style="margin-top: 12px;" >{{$proyecto[$i]->descripcion}}</label>
                                <input type="text" hidden name="descripcion{{$i}}" id="descripcion{{$i}}" value="{{$proyecto[$i]->descripcion}}">
                            </td>
                            <td>
                                <label style="margin-top: 12px;" >{{$proyecto[$i]->fondo}}</label>
                                <input type="text" name="fondo{{$i}}" id="fondo{{$i}}" hidden="true" value="{{$proyecto[$i]->fondo}}">
                            </td>
                            <td align="right">
                                    <label style="margin-top: 12px;">{{number_format($proyecto[$i]->monto,2,',','.')}}</label>
                                <input type="text" name="monto_partida{{$i}}" id="monto_partida{{$i}}" hidden true value="{{number_format($proyecto[$i]->monto,2,',','.')}}">
                            </td>
                            <td align="right">
                                <input type="text" hidden="true" value="{{count($proyecto)}}" id="aux">
                                <input type="text" value="{{number_format($proyecto[$i]->saldo_disponible,2,',','.')}}"hidden ="true" id="saldo_disponible{{$i}}" name="saldo_disponible{{$i}}">
                                @if ($proyecto[$i]->saldo_disponible != 0.0)
                                    <label style="margin-top: 12px;color:green">{{number_format($proyecto[$i]->saldo_disponible,2,',','.')}}</label>
                                @else
                                    <label style="margin-top: 12px;color:rgb(184, 57, 57)">{{number_format($proyecto[$i]->saldo_disponible,2,',','.')}}</label>
                                @endif
                            </td>
                            <td>
                                <input class="form-control" name="monto_certificar{{$i}}" dir="rtl" onblur="return consultar()" onkeypress="return SoloNumeros(event)" size="8" type="text" id="monto_certificar{{$i}}">
                            </td>
                            <td>
                                <button type="button" id="partidas{{$i}}" value="1" class="btn btn-success btn-circle"><i class="fa fa-plus"></i></button>
                            </td>
                            </form>
                        </tr>
                        @endfor
                        {{-- @foreach ($proyecto as $key=>$value)
                        
                        @endforeach --}}
                    </tbody>
                </table>
                <!-- /.box-content -->
                </div>
            </div>
            <div class="form-group col-xs-12">
                <form action="{{url('solicitud_certificado_presupuesto')}}" method="POST" id="solicitud_certificado">
                @csrf
                <br>
                <h4 class="box-title">Llave presupuestaria </h4>
                <table  class="table table-striped table-bordered display" id="tabla">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código de Proyecto</th>
                            <th>Proyecto</th>
                            <th>Partida</th>
                            <th>Descripción</th>
                            <th>Fondo</th>
                            <th>Monto Original</th>
                            <th>Saldo Disponible</th>
                            <th>Monto a Certificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                </table>
                {{-- <button type="button" class="btn btn-danger btn-circle" id="del"><i class='fa fa-minus'></i></button> --}}
            </div>
            <div class="form-group col-xs-12">
                <br>
                <h4 class="box-title">Información para la solicitud de certificación presupuestaria</h4>
                    <input type="text" hidden="true" id="_token" value="{{ csrf_token() }}">
                    <div class="form-group col-lg-12">
                        <label for="exampleInputFile"> Objeto</label>
                        <textarea required="true" required name="objeto" id="textarea" max="3000" maxlength="3000" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="exampleInputFile">Moneda</label>
                        <select class="form-control" onchange="return cal_tasa()" required id="moneda" name="moneda">
                            <option value="">- Seleccione -</option>
                            @foreach ($divisa as $key => $value)
                                <option value="{{$value->id}}">{{$value->tipo_moneda}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="exampleInputFile">Monto Estimado Bolivares</label>
                        <input required class="form-control" readonly required name="estimado" dir="rtl" id="estimado" {{--onkeypress="return SoloNumeros(event);"--}} type="text">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="exampleInputFile">Tasa de Cambio Bolivares</label>
                        <input required class="form-control" required name="tasa" id="tasa" dir="rtl" onchange="return est()" type="text" onkeypress="return SoloNumeros(event)">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="exampleInputFile">Cálculo Estimado en Divisa</label>
                        <input required class="form-control" name="divisa" dir="rtl" readonly id="divisa" type="text" id="">
    
                    </div>
                    <br><br>
                    <button type="submit" name="generar_solicitud" id="generar_solicitud" value="1" class="btn btn-info btn-rounded btn-sm waves-effect waves-light">Generar PDF <i class="fa fa-file-pdf-o"></i> </button>
                    <button type="submit" id="enviar_solictud" value="1" class="btn btn-success btn-rounded btn-sm waves-effect waves-light">Guardar <i class="fa fa-check"></i></button>
                </form>
            </div>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="assets/scripts/min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    
    function cal_tasa(){
        var moneda = document.getElementById("moneda").value;
        //console.log(moneda);
        if (moneda == 4){
            document.getElementById("tasa").value=1;
            document.getElementById("tasa").readOnly = true;
            document.getElementById('divisa').value = formatter.format(estimado.toFixed(2));
        }else{
            document.getElementById("tasa").value='';
            document.getElementById("tasa").readOnly = false;
            document.getElementById('divisa').value='';
        }
    }
    $('#divisa').blur(function(){
        divisa = $('#divisa').val();

        if (!divisa.includes(',')) {
            swal({
                title: "Error en el monto",
                text:  "Debe colocar los decimales en el monto en divisa",
                type:  "warning",
                showConfirmButton: false,
                timer: 3000
                });
            $('#divisa').val('');
            return false;
        }
    });
    $('#tasa').blur(function(){
        tasa = $('#tasa').val();
       
        if (!tasa.includes(',')) {
            swal({
                title: "Error en el monto",
                text:  "Debe colocar los decimales en el monto estimad",
                type:  "warning",
                showConfirmButton: false,
                timer: 3000
                });
            $('#tasa').val('');
            return false;
        }
    });
        

    function est(){
        var aux = document.getElementById('tasa').value.replace('.','');
        var aux1 = aux.replace(',','.');
        var tasa = parseFloat(aux1);
        aux1 = document.getElementById('estimado').value.replace('.','');
        aux2 = aux1.replace('.','');
        estimado = parseFloat(aux2.replace(',','.'));
        //console.log(divisa,tasa);
        var total = estimado/tasa;
        var estimado = formatter.format(total.toFixed(2));
        //console.log(estimado);
        //Svar estimado = aux3.replace('.',',');
        //console.log(estimado);
        
        document.getElementById("divisa").value = estimado;
        document.getElementById("divisa").readOnly = true;
    }
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
    function consultar(){
        aux=document.getElementById('aux').value;
        for (let index = 0; index < $('#conteo').val(); index++) {
            var monto = document.getElementById("saldo_disponible"+index).value;
            monto = parseFloat(monto.replace(/\./g,""));
            var monto_certificar=document.getElementById("monto_certificar"+index).value;
            //console.log('llegue',monto_certificar);
            if (monto_certificar.includes(',')==false && (monto_certificar!='')) {
                swal({
                    title: "Error en el monto",
                    text:  "Debe colocar los decimales en el monto a certificar",
                    type:  "warning",
                    showConfirmButton: false,
                    timer: 3000
                    });
                    document.getElementById("monto_certificar"+index).value = null;
                    break;
                    return false;
            }else{
                monto_certificar1 = parseFloat(monto_certificar.replace(/\./g,""));
                if(monto < monto_certificar1)
                {
                    swal({
                    title: "Monto incorrecto",
                    text:  "El monto a certificar no puede ser mayor al saldo disponible",
                    type:  "warning",
                    showConfirmButton: false,
                    timer: 3000
                    });
                    document.getElementById("monto_certificar"+index).value='';
                    break;
                    return false;
                }
            }
        }
    }
    $("#tasa").on({
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
    $("#estimado").on({
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
    // $("#estimado").on({
    //     "focus": function (event) {
    //         $(event.target).select();
    //     },
    //     "keyup": function (event) {
    //         $(event.target).val(function (index, value ) {
    //             return value.replace(/\D/g, "")
    //                 .replace(/([0-9])([0-9]{2})$/, '$1,$2')
    //                 .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
    //             });
    //         }
    // });

    aux=$("#aux").val();
    //consoSolicitud de Certificación Presupuestariale.log(aux);
    for (let index = 0; index < aux; index++) {
        $("#monto_certificar"+index).on({
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

        $("#boton").on({
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
        $("#monto"+index).on({
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
    }
  $(document).ready(function(){
    swal({
        title:"Advertencia",
            text: "Antes de guardar la solicitud debe crear el archivo .pdf, asegurese de llenar la información correspondiente para generar dicho documento",
            type: "warning",
            timer: 6000,
            showConfirmButton: false,
        })
  });

var estimado = 0;
for (let i = 0; i < $('#conteo').val(); i++) {
    var aux = '#monto_certificar'+i;
    var aux2 = '#partidas'+i;
    $('#partidas'+i).click(function(){
        //console.log($(aux).val());
        var click = $('#partidas'+i).val();
        var monto = document.getElementById('monto_certificar'+i).value;
        if (click == 1 && monto.length == 0 ) {
            document.getElementById('partidas'+i).disabled = false;
            swal({
                title:"Advertencia",
                    text: "Debe ingresar un monto en el campo de texto para incluirlo en la llave presupuestaria",
                    type: "warning",
                    timer: 3000,
                    showConfirmButton: false,
                })

        } else {
            document.getElementById('partidas'+i).disabled = true;
            swal({
            title:"Monto Agregado",
                text: "El monto seleccionado se ha agregado en la llave presupueataria indicada en la tabla inferior",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            });
            aux = monto.replaceAll('.','');
            aux1 = parseFloat(aux.replace(',','.'));
            //console.log(aux1);
            estimado = estimado + aux1;
            $('#estimado').val(formatter.format(estimado.toFixed(2)));
        }
    });
}

var numero;
var num;
var nombre_proyecto;
var descripcion;
var monto_certificar;
var codigo_proyecto;
var id_proyecto;
var id_partida;
var fondo;
var monto_partida;
var saldo_disponible;
var id_proyecto;

for (let i = 0;i < $('#conteo').val(); i++) {
    //console.log(monto_certificar);
    $('#partidas'+i).click(function(){
        numero = '#numero'+i;
        var nombre_proyecto = "#nombre_proyecto"+i;
        var descripcion = "#descripcion"+i;
        var monto_certificar = '#monto_certificar'+i;
        var codigo_proyecto = '#codigo_proyecto'+i;
        var id_proyecto = '#id_proyecto'+i;
        var id_partida = '#id_partida'+i;
        var fondo = '#fondo'+i;
        var monto_partida = '#monto_partida'+i;
        var saldo_disponible = '#saldo_disponible'+i;
        var id_proyecto = '#id_proyecto'+i;
        //console.log(numero);
        if ($(monto_certificar).val()!='') {
             // Obtenemos el numero de filas (td) que tiene la primera columna
            // (tr) del id "tabla"
            var tds=$("#tabla tr:first td").length;
            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#tabla tr").length;
            var nuevaFila="<tr>";
            nuevaFila+="<td>"+$(numero).val()+"<input type='text' hidden value='"+$(numero).val()+"' name='numero[]'> <input type='text' name='id_proyecto[]' hidden value='"+$(id_proyecto).val()+"'>";
            
            nuevaFila+="<td>"+$(codigo_proyecto).val()+"<input type='text' hidden value='"+$(codigo_proyecto).val()+"' id='codigo_proyecto[]' name='codigo_proyecto[]'>";
            nuevaFila+="<td>"+$(nombre_proyecto).val()+"<input type='text' hidden value='"+$(nombre_proyecto).val()+"' name='nombre_proyecto[]'>";
            nuevaFila+="<td>"+$(id_partida).val()+"<input type='text' hidden value='"+$(id_partida).val()+"' name='id_partida[]'>";
            nuevaFila+="<td>"+$(descripcion).val()+"<input type='text' hidden value='"+$(descripcion).val()+"' name='descripcion[]'>";
            nuevaFila+="<td>"+$(fondo).val()+"<input type='text' hidden value='"+$(fondo).val()+"' name='fondo[]'>";
            nuevaFila+="<td align='right'>"+$(monto_partida).val()+"<input type='text' hidden value='"+$(monto_partida).val()+"' name='monto_partida[]'>";
            nuevaFila+="<td align='right'>"+$(saldo_disponible).val()+"<input type='text' hidden value='"+$(saldo_disponible).val()+"' name='saldo_disponible[]'>";
            nuevaFila+="<td align='right'>"+$(monto_certificar).val()+"<input type='text' hidden value='"+$(monto_certificar).val()+"' id='monto_certificar[]' name='monto_certificar[]'>";
            nuevaFila+="<td><button type='button' onclick='devolverid(this)' id='"+trs+"' name='borrar[]' value='"+i+"' class='btn btn-danger btn-circle borrar'><i class='fa fa-minus'></i></button>";
            nuevaFila+="</tr>";
            $("#tabla").append(nuevaFila);
            //monto estimado
            return false;
        }else
            return false;
    });
}
function devolverid(bnt){
    var id = $(bnt).attr("value");
    document.getElementById('partidas'+id).disabled = false;
    event.preventDefault();
    resta = parseFloat(id.replace('.',''));
    est = parseFloat($('#estimado').val().replace('.',''));
    estimado = est - resta;
    document.getElementById("estimado").value = formatter.format(estimado.toFixed(2));
    document.getElementById("estimado").readOnly = true;
    document.getElementById("divisa").readOnly = true;
    $(this).closest('tr').remove();
}

$(document).on('click', '.borrar', function(event) {
    $(this).closest('tr').remove();
});


</script>
@endsection