@extends('principal')
@section('lista_presupuestaria')
<!-- /.col-xs-12 -->

<div class="col-xs-12">
	<div class="box-content">
        <h4 class="box-title">Solicitud de Modificación Presupuestaria al Proyecto: <b>{{$proyecto[0]->nombre_proyecto}}</b></h4>
		<div class="card-content">
            <form action="{{url('agregar_partida')}}" accept-charset="UTF-8" enctype="multipart/form-data" id="agregar_partida" name="form" method="post">
                @csrf
                <div class="form-group col-lg-6">
                    <label for="">N° del Punto</label>
                    <input type="text" id="nombre_proyecto" value="{{$proyecto[0]->nombre_proyecto}}" hidden="true">
                    <input type="text" id="area_funcional" hidden="true" value="{{$proyecto[0]->proyecto_presupuestario}}">
                    <input type="text" name="numero_punto" id="numero_punto" title="Número de identificaciond del punto de cuenta" required placeholder="indique el número del punto de la Modificación Presupuestaria" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" hidden value="{{$proyecto[0]->id}}" id="id_proyecto" name="id_proyecto">
                    <label for="">Fuente</label>
                    <select class="form-control" name="id_fondo" required id="id_fondo">
                        <option value="" selected>- Seleccione -</option>
                        @foreach ($fondo as $key => $value)
                            <option value="{{$value->id}}">{{$value->fondo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Moneda</label>
                    <select class="form-control" id="id_moneda" required name="id_moneda">
                        <option value="">- Seleccionar -</option>
                        @foreach ($divisa as $key => $value)
                            <option value="{{$value->id}}">{{$value->tipo_moneda}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Tasa (Bs)</label>
                    <input type="text" name="tasa" id="tasa" onblur="return comp()" required placeholder="Indique la tasa referencial según el BCV" maxlength="7" required onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Monto Total </label>
                    <input type="text" name="monto_divisa" id="monto_divisa" onblur="return comp1()" required placeholder="Indique la cantidad de la divisa seleccionada" title="La Cantidad Ingresada es la que esta definida en el punto de cuenta" onkeypress="return SoloNumeros(event)" maxlength="20" class="form-control">
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Monto Total (Bs)</label>
                    <input type="text" name="monto_bs" id="monto_bs" readonly required id="monto_bs" onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Adjuntar Punto de Cuenta</label>
                    <input type="file" required name="punto_cuenta_adjudicacion" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Lista de Modificación Presupuestaria</label>
                    <input type="file" required name="lista_modificacion" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Memorandum de Modificación</label>
                    <input type="file" required name="memorandum_modificacion" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                </div>
                <div class="col-lg-12"> <hr></div>
                <div class="form-group col-lg-4">
                    <label for="">Código de Partida</label>
                        <select class="form-control" required  id="id_clasificador_presupuestario">
                            <option value=""  selected>- Seleccione -</option>
                            @foreach ($clasificador_presupuestario as $key => $value)
                                <option value="{{$value->id}}">{{$value->codigo_partida}} {{$value->descripcion}}</option>
                            @endforeach
                        </select>
                </div>
                
                <div class="form-group col-lg-4">
                    <label for="">Monto a Asignar (en divisa)</label>
                    <input type="text" id="monto_asignar" onblur="return comp2()" onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Monto a Asignar (en bs)</label>
                    <input type="text" id="monto_asignar_bs" readonly onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-1">
                    <button class="btn btn-success btn-circle" type="button" title="agregar a la lista" id="asignar"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-lg-12">
                    <table id="tabla" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre de proyecto</th>
                                <th>Área Funcional</th>
                                <th>Fuente</th>
                                <th>Código de la Partida</th>
                                <th>Monto a Asignar</th>
                                <th>Monto a Asignar (Bs)</th>
                                <th>Punto de Cuenta</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="form-group col-lg-12">
                    <button class="btn btn-success btn-rounded" id="enviar" onsubmit="return verificar()" style="margin-top: 30px;">Agregar <i class="fa fa-check"></i></button>
                    <a href="{{url('añadir_llave_presupuestaria')}}" style="margin-top: 30px;" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                </div>
            </form>
		</div>
    </div>
</div>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Llaves Presupuestarias del Proyecto: {{$proyecto[0]->nombre_proyecto}}</h4>
        <!-- /.box-title -->
        <!-- /.dropdown js__dropdown -->
        <div id="accordion" class="js__ui_accordion">
            <h3 class="accordion-title">Establecidas en el POA</h3>
            <div class="accordion-content">
                <table id="example1" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre de proyecto</th>
                            <th>Código de la Partida</th>
                            <th>Descripción de la Partída</th>
                            <th style="width: 9%">Saldo Disponible</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre de proyecto</th>
                            <th>Código de la Partida</th>
                            <th>Descripción de la Partída</th>
                            <th>Saldo Disponible</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($llave_presupuestaria == true)
                            @foreach ($llave_presupuestaria as $key => $value)
                                <tr>
                                    <td>{{$value->nombre_proyecto}}</td>
                                    <td>{{$value->codigo_partida}}</td>
                                    <td>{{$value->descripcion}}</td>
                                    <td align="right">{{number_format($value->saldo_disponible,2,',','.')}}</td>
                                </tr>
                            @endforeach
                        @else

                        @endif
                    </tbody>
                </table>
            </div>
            <h3 class="accordion-title">Solicitud Presupuestaria Adicional</h3>
            <div class="accordion-content">
                <table id="example2" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre de proyecto</th>
                            <th>Área Funcional</th>
                            <th>Fuente</th>
                            <th>Monto (Divisa)</th>
                            <th>Moneda</th>
                            <th>Tasa</th>
                            <th>Monto en Bs</th>
                            <th>Estatus</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Nombre de proyecto</th>
                            <th>Área Funcional</th>
                            <th>Fuente</th>
                            <th>Monto (Divisa)</th>
                            <th>Moneda</th>
                            <th>Tasa</th>
                            <th>Monto en Bs</th>
                            <th>Estatus</th>
                            <th>Ver</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($presupuesto_modificado as $key => $value)
                            <tr>
                                
                            <td>{{$key+1}}</td>
                            <td>{{$value->nombre_proyecto}}</td>
                            <td>{{$value->proyecto_presupuestario}}</td>
                            <td>{{$value->fondo}}</td>
                            <td>{{number_format($value->monto_asignar_divisa,2,',','.')}}</td>
                            <td>{{$value->tipo_moneda}}</td>
                            <td>{{number_format($value->tasa,2,',','.')}}</td>
                            <td>{{number_format($value->monto_asignar_bs,2,',','.')}}</td>
                            <td>
                                @switch($value->estatus)
                                    @case('Aprobado')
                                        <label style="margin-top: 12px; color:green">{{$value->estatus}}</label>
                                        @break
                                    @case('Rechazado')
                                        <label style="margin-top: 12px; color:red">{{$value->estatus}}</label>
                                        @break
                                    @case('En Transito')
                                        <label style="margin-top: 12px; color:blue">{{$value->estatus}}</label>
                                        @break
                                @endswitch
                            </td>
                            <td><button id="modificacion" onclick="return mostrar({{$value->id}})" value="{{$value->id}}" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#boostrapModal-modificacion"><i class="fa fa-search"></i></button></td>
                        </tr>   
                        @endforeach
                     </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box-content -->
</div>

<script type="text/javascript" src="assets/scripts/jquery-3.2.1.js"></script>
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
$("#monto").on({
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

function comp(){
    var tasa = $("#tasa").val();
    if(tasa.includes(',') == false){
        swal({
            title: "Error en el monto",
            text:  "Debe colocar los decimales en el monto de la tasa",
            type:  "warning",
            showConfirmButton: false,
            timer: 3000
            });
            $("#tasa").val('');
            return false;
    }
}
function comp1(){
    var divisa = $("#monto_divisa").val();
    if(divisa.includes(',') == false){
        swal({
            title: "Error en el monto",
            text:  "Debe colocar los decimales en el monto de la divisa ",
            type:  "warning",
            showConfirmButton: false,
            timer: 3000
            });
            $("#monto_divisa").val('');
            return false;
    }
}

function comp2(){
    var divisa = $("#monto_asignar").val();
    if(divisa.includes(',') == false){
        swal({
            title: "Error en el monto",
            text:  "Debe colocar los decimales en el monto a asignar ",
            type:  "warning",
            showConfirmButton: false,
            timer: 3000
            });
            $("#monto_asignar").val('');
            return false;
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


$("#monto_divisa").on({
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
// $("#monto_bs").on({
//     "focus": function (event) {
//         $(event.target).select();
//     },
//     "keyup": function (event) {
//         $(event.target).val(function (index, value ) {
//             return value.replace(/\D/g, "")
//                         .replace(/([0-9])([0-9]{2})$/, '$1,$2')
//                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
//         });
//     }
    
// });
$("#monto_asignar").on({
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

$("#monto_asignar_bs").on({
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

$(document).ready(function(){
    $('#monto_divisa').blur(function(){
        var valor1 = $('#monto_divisa').val();
        var aux = valor1.replaceAll('.','');
        aux = aux.replace(',','.');
        var monto_divisa = parseFloat(aux).toFixed(2);
        

        var valor2 = $('#tasa').val();       
        var aux1 = valor2.replaceAll('.','');
        aux1 = aux1.replace(',','.');
        var tasa = parseFloat(aux1).toFixed(2);

        var valor = monto_divisa * tasa;
        //console.log(valor);
        var total = formatter.format(valor.toFixed(2));

        //console.log(total,valor1,valor2);
        var aux = total.toString();
        //console.log(aux);
        var monto_bs = aux;
        $('#monto_bs').val(monto_bs);
        
    });
});
$(document).ready(function(){
    $('#monto_asignar').blur(function(){
        var valor1 = $('#monto_asignar').val();
        var aux = valor1.replaceAll('.','');
        aux = aux.replace(',','.');
        var monto_asignar = parseFloat(aux).toFixed(2);
        

        var valor2 = $('#tasa').val();       
        var aux1 = valor2.replaceAll('.','');
        aux1 = aux1.replace(',','.');
        var tasa = parseFloat(aux1).toFixed(2);
        //console.log(tasa);
        var valor = monto_asignar * tasa;
        //console.log(valor);
        var total = valor.toFixed(2);

        //console.log(total,valor1,valor2);
        var aux = total.toString();
        var monto_asignar_bs = formatter.format(aux);
        //console.log(aux);
        $('#monto_asignar_bs').val(monto_asignar_bs);
    });
});

$(document).ready(function(){
    $('#id_moneda').click(function(){
        //console.log($('#id_moneda').val());
        if ($('#id_moneda').val() == '4') {
            //console.log('llegue');
            $('#tasa').val('1,00');
            $('#tasa').prop('readonly', true);
        }else{
            $('#tasa').val('');
            $('#tasa').prop('readonly', false);
        }
    });
    // cambios aqui
    $('#id_moneda').change(function(){
        $('#monto_divisa').val('');
        $('#monto_bs').val('');
    });
});



var acun = 0;
var monto_divisa = parseFloat($('#monto_divisa').val().replaceAll('.','').replace(',','.'));
$(document).on('click','.del',function(event){
    // Obtenemos el total de columnas (tr) del id "tabla"
    var val = $('#val').val();
    //console.log($('#val').val());
    monto_asignar = parseFloat($('#monto_asignar'+val).val().replaceAll('.','').replace(',','.'));
    acun = acun-monto_asignar;
    console.log(acun);
    event.preventDefault();
    $(this).closest('tr').remove();
});
    $('#asignar').click(function(){
        if($('#monto_asignar').val() == ''|| $('#id_clasificador_presupuestario').val() == '' || $('#monto_asignar_bs').val() == ''){
            swal({
                title : "Campos Vacios", 
                text: "No debe dejar campos vacios al momento de asignar la partida presupuestaria y el monto en divisa", 
                type: "error",
                contentType: false,
                processData: false,
                //confirmButtonColor: '#f60e0e',
                showConfirmButton: false,
                timer: 5000
            });
            return false;
        }
        //valor para comparar el total del valor asignado en dolares
        var monto_divisa = parseFloat($('#monto_divisa').val().replaceAll('.','').replace(',','.'));
        
        var id_proyecto = $('#id_proyecto').val();
        var nombre_proyecto = $('#nombre_proyecto').val();
        var area_funcional=$('#area_funcional').val();
        var fondo = $('#id_fondo option:selected').text();
        var id_fondo = $('#id_fondo').val();
        var moneda = $('#id_moneda option:selected').text();
        var id_moneda = $('#id_moneda').val();
        var codigo_partida = $('#id_clasificador_presupuestario option:selected').text();
        var id_partida = $('#id_clasificador_presupuestario').val();
       
        //monto a asignar en la partida
        var monto_asignar = parseFloat($('#monto_asignar').val().replaceAll('.','').replace(',','.'));
        //console.log(monto_asignar);
        if (monto_asignar > monto_divisa) {
            swal({
                title : "Monto Incorrecto", 
                text: "El monto a asignar no puede ser mayor al monto indicado en el punto de cuenta", 
                type: "error",
                contentType: false,
                processData: false,
                //confirmButtonColor: '#f60e0e',
                showConfirmButton: false,
                timer: 5000
            });
            $('#monto_asignar').val('');
            $('#monto_asignar_bs').val('');
            //console.log('el monto asignar es mayor al monto del punto');
            return false;
        }
        
        if(acun >= monto_divisa){
            swal({
                title : "Monto asignado alcanzado", 
                text: "No puede asignar más partidas porque el monto asignado en el punto de cuenta fue alcanzado", 
                type: "error",
                contentType: false,
                processData: false,
                //confirmButtonColor: '#f60e0e',
                showConfirmButton: false,
                timer: 5000
            });
            $('#monto_asignar').val('');
            $('#monto_asignar_bs').val('');
            return false
        }

        if (acun+monto_asignar > monto_divisa ) {
            swal({
                title : "Monto Exedido", 
                text: "EL monto que intenta ingresar excede el total asignado por el punto de cuenta, intente ingresando un monto inferior", 
                type: "error",
                contentType: false,
                processData: false,
                //confirmButtonColor: '#f60e0e',
                showConfirmButton: false,
                timer: 5000
            });
            $('#monto_asignar').val('');
            $('#monto_asignar_bs').val('');
            return false;
        }
        if (acun == null) {
            //console.log('acun es igual a nulo y lo voy a convertir en 0');
            acun = 0;
        }
        acun = acun + monto_asignar;
             // Obtenemos el numero de filas (td) que tiene la primera columna
            // (tr) del id "tabla"
            var tds=$("#tabla tr:first td").length;
            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#tabla tr").length;
            //console.log(trs);
            var nuevaFila="<tr>";
            nuevaFila+="<td>"+nombre_proyecto+"<input type='text' hidden value='"+$('#nombre_proyecto').val()+"' name='nombre_proyecto'> <input type='text' name='id_proyecto' hidden value='"+$('#id_proyecto').val()+"'>";
            nuevaFila+="<td>"+area_funcional+"<input type='text' hidden value='"+area_funcional+"' name='area_funcional'>";
            nuevaFila+="<td>"+fondo+"<input type='text' hidden value='"+$('#id_fondo').val()+"' name='fondo'>";
            nuevaFila+="<td>"+codigo_partida+"<input type='text' hidden value='"+id_partida+"' name='id_partida[]'>";
            nuevaFila+="<td>"+$('#monto_asignar').val()+"<input type='text' hidden value='"+$('#monto_asignar').val()+"' name='monto_asignar_divisa[]' id='monto_asignar"+trs+"'>";
            nuevaFila+="<td>"+$('#monto_asignar_bs').val()+"<input type='text' hidden value='"+$('#monto_asignar_bs').val()+"' name='monto_asignar_bs[]' id='monto_asignar_bs"+trs+"'>";
            nuevaFila+="<td>"+$('#numero_punto').val()+"<input type='text' hidden value='"+$('#numero_punto').val()+"'>";

            nuevaFila+="<td><input type='text' name='val' hidden id='val' value='"+trs+"'><button type='button' class='btn btn-danger btn-circle del' ><i class='fa fa-minus'></i></button>";
            nuevaFila+="</tr>";
            $("#tabla").append(nuevaFila);
            $('#monto_asignar').val('');
            $('#monto_asignar_bs').val('');
            $('#id_clasificador_presupuestario').val('');
            return false;
    });

    function mostrar(event){
        $(document).ready(function(){
            //console.log(event);
            var nuevaFila ='';
            $(".fila").remove();
            $.ajax({
                url:"{{url('modificacion_presupuestaria')}}"+"/"+event,
                method:"get",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var cont = 0;
                    for (let index = 0; index < data.length; index++) {
                        cont++;
                        var tds=$("#tabla1 tr:first td").length;
                        // Obtenemos el total de columnas (tr) del id "tabla"
                        var trs=$("#tabla1 tr").length;
                        // console.log(trs);
                        nuevaFila="<tr class='fila'>";
                        nuevaFila+="<td>"+cont;
                        nuevaFila+="<td>"+data[index]['codigo_partida'];
                        nuevaFila+="<td>"+data[index]['tipo_moneda'];
                        nuevaFila+="<td>"+data[index]['tasa'];
                        nuevaFila+="<td>"+formatter.format(data[index]['monto_asignar_divisa']);
                        nuevaFila+="<td>"+formatter.format(data[index]['monto_asignar_bs']);
                        nuevaFila+="</tr>";
                        $("#tabla1").append(nuevaFila);
                    
                    }
                }
            });
         });
    }
    

    $("#enviar").on("click",function(){
    swal({   
      title: "Esta seguro que desea continuar?",   
      text: "Se recomineda verificar los datos antes de enviar la solicitud de modificación, ",type: "warning",   
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Si, Continuar!", 
      cancelButtonText: "No, Cancelar!", 
      closeOnConfirm: false,
      closeOnCancel: false,
      confirmButtonColor: '#f60e0e',
    }, function(isConfirm){   
      if (isConfirm) 
        {
            console.log(acun,parseFloat($('#monto_divisa').val().replaceAll('.','').replace(',','.')));
            if (acun == parseFloat($('#monto_divisa').val().replaceAll('.','').replace(',','.'))) {
                
                $('#agregar_partida').submit();
                //return false
            }
            else{
                
                swal({
                    title : "Solicitud Cancelada", 
                    text: "Debe asignar la totalidad del monto indicado el punto de cuenta", 
                    type: "error",
                    //confirmButtonColor: '#f60e0e',
                    showConfirmButton: false,
                    timer: 3000
                    });
            }
      } else {  
        swal({
          title : "Solicitud Cancelada", 
          text: "Usted a cancelado la solicitud", 
          type: "error",
          //confirmButtonColor: '#f60e0e',
          showConfirmButton: false,
          timer: 3000
        });
      }
    });
    return false;
  });
</script>
@endsection
