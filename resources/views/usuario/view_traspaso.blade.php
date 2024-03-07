@extends('principal')
@section('traspaso')
<form action="{{url('solicitud_traspaso')}}" id="solicitud_traspaso" method="POST"  enctype="multipart/form-data">
@csrf
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h3 class="box-title">Solicitud de Traspaso Presupuestario</h3>
    </div>
</div>
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <div class="card-content">
            <div class="form-group">
                <label for="seleccionar proyecto">Fondo Presupuestario</label>
                <select name="fuente" id="fuente" class="form-control">
                    <option selected value=''>- Seleccione -</option>
                    @foreach ($fondo as $key=>$value )
                        <option value="{{$value->id}}">{{$value->fondo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Fuente Presupuestaria Cedente</h4>
        <!-- /.box-title -->
        <div class="card-content">
            <div class="form-group">
                <label for="seleccionar proyecto">Seleccionar Area Funcional Cedente</label>
                <select {{--name="proyecto_traspaso"--}} id="proyecto_traspaso" class="form-control">
                   
                </select>
            </div>
            <div class="form-group">
                <label for="seleccionar partidas">Seleccionar Posición Presupuestaria Cedente</label>
                <select class="form-control" id="p_traspaso" {{--name="p_traspaso"--}}>
                </select>
            </div>
            <div class="form-group">
                <label for="monto de la partida">Monto Actual en la Posición Presupuestaria Cedente</label>
                <input type="text" title="Recuerde verificar que no halla consumido el total disponible en la solicitud que esta realizando en la tabla inferior" readonly {{--name="monto_traspaso"--}} dir="rtl" id="monto_traspaso" class="form-control">
            </div>
            <div class="form-group">
                <label for="seleccionar partidas">Monto a Ceder de la Posición Presupuestaria</label>
                <input type="text" dir="rtl" {{--name="monto_traspaso1"--}} id="monto_traspaso1" class="form-control">
            </div>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>
<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Fuente Presupuestaria Receptora</h4>
        <!-- /.box-title -->
        <div class="card-content">
            <div class="form-group">
                <label for="seleccionar proyecto">Seleccionar Área Funcional Receptora</label>
                <select {{--name="proyecto_destino"--}} id="proyecto_destino" class="form-control">
                   
                </select>
            </div>
            <div class="form-group">
                <label for="seleccionar partida">Seleccionar Posición Presupuestaria Receptora</label>
                <select {{--name="p_destino"--}} id="p_destino"  class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="seleccionar partidas">Monto Actual en la Posición Presupuestaria Receptora</label>
                <input type="text" dir="rtl" {{--name="monto_disponible"--}} readonly id="monto_disponible" class="form-control">
            </div>
            <div class="form-group">
                <label for="seleccionar partidas">Monto Disponible de la Posición Presupuestaria Receptora</label>
                <input type="text" dir="rtl" {{--name="monto_total"--}} id="monto_total" class="form-control">
            </div>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>

<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <div class="card-content">
            <div class="form-group col-lg-12">
                <label for="seleccionar partidas">Justificación de Traspaso Presupuestario</label><br>
                <textarea id="textarea" maxlength="3000" class="form-control" rows="4" required name="concepto"></textarea>
            </div>
            {{-- <div class="form-group col-lg-6">
                <label for="seleccionar partidas">Memorandum de aprobación</label><br>
                <input type="file" name="memorandum_traspaso" id="memorandum_traspaso" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-6">
                <label for="seleccionar partidas">Solicitud de Traspaso de Credito Presupuestario</label><br>
                <input type="file" name="solicitud_credito_presupuestario" id="solicitud_credito_presupuestario" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div> --}}
        </div>
    </div>
</div>
<div class="col-lg-6 col-xs-12">
    <button type="button" id="asignar" class="btn btn-success btn-circle btn-sm waves-effect waves-light" title='Agregar solicitud de traspaso a la tabla'><i class="fa fa-plus"></i></button>
    <br>
</div>

<div class="col-lg-12 col-xs-12">
    <br>
    <div class="box-content card white">
        <div class="card-content">
            <label for="">SOLICITUD DE TRASPASO DE CRÉDITOS PRESUPUESTARIOS</label>
            <table id="tabla"  class="table table-striped table-bordered display">
                <thead>
                    <tr>
                        <th colspan="7" style="background-color: rgb(239, 221, 221)"><center><h4>POSICIÓN PRESUPUESTARIA CEDENTE</h4></center></th>
                        <th colspan="8"  style="background-color: rgb(202, 224, 202)"><center><h4>POSICIÓN PRESUPUESTARIA RECEPTORA</h4></center></th>
                    </tr>
                    <tr style="background-color: rgb(236, 236, 248)">
                        <th>Fondo</th>
                        <th>Área Funcional</th>
                        <th>Descripción Area Funcional</th>
                        <th>Posición Presupuestaria</th>
                        <th>Descripción de la Posición</th>
                        <th>A Ceder</th>
                        <th>Disponibilidad de la Posición</th>
                        
                        <th>Fondo</th>
                        <th>Área Funcional</th>
                        <th>Descripción Area Funcional</th>
                        <th>Posición Receptora</th>
                        <th>Descripción Posición</th>
                        <th>A Recibir</th>
                        <th>Disponibilidad de la Posición</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-6 col-xs-12">
    <input type="text" hidden="true" id="doc" name="doc">
    <button type="submit" id="enviar" class="btn btn-success btn-rounded btn-sm waves-effect waves-light"><i class="fa fa-check"></i> Guardar Solicitud</button>
    <button type="submit" id="pdf" class="btn btn-info btn-rounded btn-sm waves-effect waves-light" title="Generar planilla en pdf">Generar PDF <i class="fa fa-file-pdf-o"></i></button>
</div>

</form>
<script src="assets/scripts/query-git.js"></script>
<script>
// $("#monto_traspaso").on({
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
$("#monto_traspaso1").on({
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
// $("#monto_disponible").on({
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
$("#monto_total").on({
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

    cont = 0
    let trs = 0;
    
    var valor_partida = [

            valor1={"id":null,"monto":null},
            valor2={"id":null,"monto":null},
            valor3={"id":null,"monto":null},
            valor4={"id":null,"monto":null},
            valor5={"id":null,"monto":null},
            valor6={"id":null,"monto":null},
            valor7={"id":null,"monto":null},
            valor8={"id":null,"monto":null},
            valor9={"id":null,"monto":null},
            valor10={"id":null,"monto":null},
            valor11={"id":null,"monto":null},
            valor12={"id":null,"monto":null},
            valor13={"id":null,"monto":null},
            valor14={"id":null,"monto":null},
            valor15={"id":null,"monto":null},
            valor16={"id":null,"monto":null},
            valor17={"id":null,"monto":null},
            valor18={"id":null,"monto":null},
            valor19={"id":null,"monto":null},
            valor20={"id":null,"monto":null},
    ];
    $(document).on('click','.del',function(event){
        event.preventDefault();
        $(this).closest('tr').remove();
        cont--;
    });
    function reversar(id,monto){
        for (let i = 0; i < 20; i++) {
            if (valor_partida[i].id == id) {
                valor_partida[i].monto = valor_partida[i].monto + monto;
                break;
            }
        }
        return false;
    }
    // const formatter = new Intl.NumberFormat('es-VE', {
    //     style: 'decimal',
    //     minimumFractionDigits: 2,
    //     maximumFractionDigits: 2
    // });
    $('#asignar').click(function(){
    if ($('#fuente').val()=='') {
        swal({
            title : "Seleccione una Fuente", 
            text: "Debe seleccionar una fuente de financiamiento presupuestaria", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#fuente").focus();
        return false;
    }
    if ($('#proyecto_traspaso').val()=='') {
        swal({
            title : "Seleccione un Proyecto", 
            text: "Debe seleccionar un Área Funcional cendente", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#proyecto_traspaso").focus();
        return false;
    }
    if ($('#p_traspaso').val()=='') {
        swal({
            title : "Seleccione una Posición Presupuestaria", 
            text: "Debe seleccionar un posición presupuestaria cendente", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#p_traspaso").focus();
        return false;
    }
    if ($('#monto_traspaso1').val()=='') {
        swal({
            title : "Ingrese un Monto", 
            text: "Debe ingresar el Monto a Ceder", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#monto_traspaso1").focus();
        return false;
    }
    if ($('#proyecto_destino').val()=='') {
        swal({
            title : "Seleccionar Proyecto Receptor", 
            text: "Debe seleccionar el Area Funcional receptora", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#proyecto_destino").focus();
        return false;
    }

    if ($('#p_destino').val()=='') {
        swal({
            title : "Seleccionar la Partida Receptora", 
            text: "Debe seleccionar la posicion presupuestaria receptora", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#p_destino").focus();
        return false;
    }

    if (cont < 20) {
            //Valores obtenidos de la partida cedente
        var proyecto_cedente = $('#proyecto_traspaso option:selected').text();
        console.log(proyecto_cedente.substring(0,12));
        var id_proyecto_cedente = $('#proyecto_traspaso').val();
        var partida_cedente = $('#p_traspaso option:selected').text();
        var id_presupuesto_cedente = $('#p_traspaso').val();
        //console.log($('#p_traspaso').val());
        var monto_disponible = parseFloat($('#monto_traspaso').val().replaceAll('.','').replace(',','.'));
        //console.log(monto_disponible);
        var monto_ceder = parseFloat($('#monto_traspaso1').val().replaceAll('.','').replace(',','.'));
        
        //valores obtenidos de la partida receptora
        var proyecto_receptor = $('#proyecto_destino option:selected').text();
        var id_proyecto_receptor = $('#proyecto_destino').val();
        var partida_receptora = $('#p_destino option:selected').text();
        var id_presupuesto_receptor = $('#p_destino').val();
        var monto_disponible_receptor = parseFloat($('#monto_disponible').val().replaceAll('.','').replace(',','.'));
        var monto_total = parseFloat($('#monto_total').val().replaceAll('.','').replace(',','.'));
        //console.log(monto_total);
        for (let i = 0; i < 20; i++) {
            if (valor_partida[i].id != null) {
                if (valor_partida[i].id == id_presupuesto_cedente) {
                    if ((valor_partida[i].monto - monto_ceder) > 0) {
                        //console.log(valor_partida[i].monto);
                        valor_partida[i].monto = valor_partida[i].monto - monto_ceder;
                         //(tr) del id "tabla"
                        var tds=$("#tabla tr:first td").length;
                        // Obtenemos el total de columnas (tr) del id "tabla"
                        trs=$("#tabla tr").length;

                        var nuevaFila="<tr>";
                        nuevaFila+="<td>"+$('#fuente option:selected').text()+"<input type='text' hidden name='fuente[]' value='"+$('#fuente option:selected').text()+"'>"; //fuente
                            
                        nuevaFila+="<td>"+proyecto_cedente.substring(0,12)+"<input type='text' hidden name='area_funcional[]' value='"+proyecto_cedente.substring(0,12)+"'>";

                        nuevaFila+="<td>"+proyecto_cedente.substring(11,500)+"<input type='text' hidden  value='"+id_proyecto_cedente+"' name='id_proyecto_cedente[]'><input type='text' name='descripcion_proyecto_cedente[]' hidden value='"+proyecto_cedente.substring(12,500)+"'>";//descriocion de area funcional

                        nuevaFila+="<td>"+partida_cedente.substring(0,14)+"<input type='text' hidden name='partida_cedente[]' value='"+partida_cedente.substring(0,14)+"'>";//partida
                            
                        nuevaFila+="<td>"+partida_cedente.substring(14,500)+"<input type='text' hidden value='"+id_presupuesto_cedente+"' name='id_presupuesto_cedente[]'><input hidden type='text' name='descripcion_posicion[]' value='"+partida_cedente.substring(14,500)+"'>"; //descripcion partida
                        
                        nuevaFila+="<td align='right'>"+formatter.format(monto_ceder)+"<input type='text' hidden value='"+monto_ceder+"' name='monto_ceder[]'>"; // monto a ceder
                        
                        nuevaFila+="<td align='right'>"+formatter.format((parseFloat($('#monto_traspaso').val().replaceAll('.','').replace(',','.'))-monto_ceder))+"<input hidden name='monto_disponible[]' value='"+formatter.format((parseFloat($('#monto_traspaso').val().replaceAll('.','').replace(',','.'))-monto_ceder))+"'>";
                        
                        nuevaFila+="<td>"+$('#fuente option:selected').text();

                        nuevaFila+="<td>"+proyecto_receptor.substring(0,11)+"<input type='text' hidden value='"+id_proyecto_receptor+"' name='id_proyecto_receptor[]'><input type='text' hidden name='area_funcional_proyecto_receptor[]' value='"+proyecto_receptor.substring(0,11)+"'>";
                        
                        nuevaFila+="<td>"+proyecto_receptor.substring(12,500)+"<input tape='text' name='descripcion_proyecto_receptor[]' hidden value='"+proyecto_receptor.substring(11,500)+"'>";z

                        nuevaFila+="<td>"+partida_receptora.substring(0,14)+"<input type='text' hidden value='"+id_presupuesto_receptor+"' name='id_presupuesto_receptor[]'><input type='text' hidden name='partida_receptora[]' value ='"+partida_receptora.substring(0,14)+"'>";

                        nuevaFila+="<td>"+partida_receptora.substring(14,500)+"<input type='text' name='descripcion_partida_receptora[]' hidden value='"+partida_receptora.substring(14,500)+"'>";
                        nuevaFila+="<td align='right'>"+formatter.format(monto_ceder)+"<input type='text' hidden value='"+monto_disponible_receptor+"' name='monto_disponible_receptor[]'>";
                        
                        nuevaFila+="<td>"+$('#monto_total').val()+"<input type='text' hidden value='"+monto_total+"' name='monto_total[]'>";
                        nuevaFila+="<td><input type='text' hidden id='valor"+trs+"' value='"+trs+"' ><button type='button' onclick='reversar("+id_presupuesto_cedente+","+monto_ceder+")' class='btn btn-danger btn-circle del'><i class='fa fa-minus'></i></button>";
                        nuevaFila+="</tr>";
                        $("#tabla").append(nuevaFila);
                        cont++;
                        break;
                    }
                    else{
                        swal({
                            title : "Fondo Insuficiente", 
                            text: "La partida cedente no tiene los fondos necesarios para realizar un traspaso, intente con otra partida presupuestaria", 
                            type: "error",
                            contentType: false,
                            processData: false,
                            //confirmButtonColor: '#f60e0e',
                            showConfirmButton: false,
                            timer: 5000
                        });
                        break;
                    }
                }
            }else{
                valor_partida[i].id = id_presupuesto_cedente;
                valor_partida[i].monto = monto_disponible - monto_ceder;
                 //(tr) del id "tabla"
                var tds=$("#tabla tr:first td").length;
                // Obtenemos el total de columnas (tr) del id "tabla"
                trs=$("#tabla tr").length;
                //console.log('tabla 2',trs);
                var nuevaFila="<tr>";
                nuevaFila+="<td>"+$('#fuente option:selected').text()+"<input type='text' hidden name='fuente[]' value='"+$('#fuente option:selected').text()+"'>";
                
                nuevaFila+="<td>"+proyecto_cedente.substring(0,11)+"<input type='text' hidden name='area_funcional[]' value='"+proyecto_cedente.substring(0,11)+"'>";

                nuevaFila+="<td>"+proyecto_cedente.substring(11,500)+"<input type='text' hidden value='"+id_proyecto_cedente+"' name='id_proyecto_cedente[]'><input type='text' name='descripcion_proyecto_cedente[]' hidden value='"+proyecto_cedente.substring(11,500)+"'>";

                nuevaFila+="<td>"+partida_cedente.substring(0,14)+"<input type='text' hidden name='partida_cedente[]' value='"+partida_cedente.substring(0,14)+"'>";

                nuevaFila+="<td>"+partida_cedente.substring(14,500)+"<input type='text' hidden value='"+id_presupuesto_cedente+"' name='id_presupuesto_cedente[]'><input hidden type='text' name='descripcion_posicion[]' value='"+partida_cedente.substring(14,500)+"'>";
                nuevaFila+="<td align='right'>"+formatter.format(monto_ceder)+"<input type='text' hidden value='"+monto_ceder+"' name='monto_ceder[]'>";
                
                nuevaFila+="<td align='right'>"+formatter.format((parseFloat($('#monto_traspaso').val().replaceAll('.','').replace(',','.'))-monto_ceder))+"<input type='text' hidden name='monto_disponible[]' value='"+formatter.format((parseFloat($('#monto_traspaso').val().replaceAll('.','').replace(',','.'))-monto_ceder))+"' >";
                
                nuevaFila+="<td>"+$('#fuente option:selected').text();
                
                nuevaFila+="<td>"+proyecto_receptor.substring(0,11)+"<input type='text' hidden value='"+id_proyecto_receptor+"' name='id_proyecto_receptor[]'><input type='text' hidden name='area_funcional_proyecto_receptor[]' value='"+proyecto_receptor.substring(0,11)+"'>";
                nuevaFila+="<td>"+proyecto_receptor.substring(11,500)+"<input tape='text' name='descripcion_proyecto_receptor[]' hidden value='"+proyecto_receptor.substring(11,500)+"'>";

                nuevaFila+="<td>"+partida_receptora.substring(0,14)+"<input type='text' hidden value='"+id_presupuesto_receptor+"' name='id_presupuesto_receptor[]'><input type='text' hidden name='partida_receptora[]' value ='"+partida_receptora.substring(0,14)+"'>";
                
                nuevaFila+="<td>"+partida_receptora.substring(14,500)+"<input type='text' hidden name='descripcion_partida_receptora[]' value='"+partida_receptora.substring(14,500)+"'>";
                
                nuevaFila+="<td align='right'>"+formatter.format(monto_ceder)+"<input type='text' hidden value='"+monto_disponible_receptor+"' name='monto_disponible_receptor[]'>";
                nuevaFila+="<td align='right'>"+$('#monto_total').val()+"<input type='text' hidden value='"+monto_total+"' name='monto_total[]'>";
                nuevaFila+="<td><input type='text' hidden id='valor"+trs+"' value='"+trs+"' ><button type='button' onclick='reversar("+id_presupuesto_cedente+","+monto_ceder+")' class='btn btn-danger btn-circle del'><i class='fa fa-minus'></i></button>";

                nuevaFila+="</tr>";
                $("#tabla").append(nuevaFila);
                cont++;
                break;
            }
        }
        $('#proyecto_traspaso').val('');
        $('#p_traspaso').val('');
        $('#monto_traspaso').val('');
        $('#monto_traspaso1').val('');
        $('#proyecto_destino').val('');
        $('#p_destino').val('');
        $('#monto_disponible').val('');
        $('#monto_total').val('');
        return false;
    }else{
        swal({
            title : "Limite Alcanzado", 
            text: "Solo se puede realizar un maximo de 20 traspasos de partidas por solicitud!", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 5000
        });
        //limpiar el contenido de los campos
        $('#proyecto_traspaso').val('');
        $('#p_traspaso').val('');
        $('#monto_traspaso').val('');
        $('#monto_traspaso1').val('');
        $('#proyecto_destino').val('');
        $('#p_destino').val('');
        $('#monto_disponible').val('');
        $('#monto_total').val('');
        return false;
    }
});

$("#pdf").on("click",function(){
   swal({   
    title: "Esta seguro que desea continuar?",   
    text: "Asegurese de haber colocado al menos una posición presupuestaria en la solicitud de traspaso de credito presupuestario.",
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Si, Continuar!", 
    cancelButtonText: "No, Cancelar!", 
    closeOnConfirm: false,
    closeOnCancel: false,
    confirmButtonColor: '#f60e0e',
  }, function(isConfirm){
    if (isConfirm) {
        
      if (trs==0) {187.378,00
        swal({
            title : "Error en la solicitud", 
            text: "La solicitud no puede estar vacia.", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 3000
        });
        if ($('#textarea').val()=='') {
            swal({
            title : "Justidicción Vacia", 
            text: "Debe colocar una descripción en la justificación del traspaso.", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 3000
        });
        }
      }else{
        //console.log(trs);
        //console.log('llegue al submit'); 
        $('#doc').val('1');
        $('#solicitud_traspaso').submit();
        swal({
            title : "Generando Solicitud de Traspaso", 
            text: "Se esta elaborando la solicitud de traspaso creditos presupuestarios, por favor espere.", 
            type: "info",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 8000
        });
        return false;
        
      }
     
    } else {  
      swal({
        title : "Solicitud Cancelada", 
        text: "Usted a cancelado la solicitud", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 3000
      });
    }
  });

  return false;    
});


$("#enviar").on("click",function(){
    //console.log('llegue a este punto');
    swal({   
    title: "Esta seguro que desea continuar?",   
    text: "Verifique si los datos son correctos antes de enviar la solicitud de traspaso.",
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Si, Continuar!", 
    cancelButtonText: "No, Cancelar!", 
    closeOnConfirm: false,
    closeOnCancel: false,
    confirmButtonColor: '#f60e0e',
    }, function(isConfirm){
    if (isConfirm) {
        //console.log($('#memorandum').val());
        if ($('#memorandum').val()=='') {
            swal({
            title : "Adjuntar Memorandum", 
            text: "Debe Adjuntar el memorandum de aprobación del traspaso.", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 3000
        });
        return false;
        }
        if ($('#solicitud_credito_presupuestario').val()=='') {
            swal({
            title : "Adjuntar Solicitud de Traspaso de Credito Presupuestario", 
            text: "Debe adjuntar la planilla de solicitud de traspaso de credito presupuestario (esta planilla es generada con el boton 'Generar PDF' ubicado en la parte inferior de la misma).", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton :false,
            timer: 3000
        });
        return false;
        }
      if (trs==0) {
        swal({
            title : "Error en la solicitud", 
            text: "La solicitud no puede estar vacia.", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 3000
        });
        if ($('#textarea').val()=='') {
            swal({
            title : "Justidicción Vacia", 
            text: "Debe colocar una descripción en la justificación del traspaso.", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 3000
        });
        }
      }else{
        $('#doc').val('0');
        $('#solicitud_traspaso').submit();
        return false;  
      }
     
    } else {  
      swal({
        title : "Solicitud Cancelada", 
        text: "Usted a cancelado la solicitud", 
        type: "error",
        contentType: false,
        processData: false,
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