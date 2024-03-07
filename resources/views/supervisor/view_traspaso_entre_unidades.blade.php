@extends('principal')
@section('traspaso_entre_unidades')
<form action="{{url('traspaso_entre_unidades')}}" id="solicitud_traspaso" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
            <h3 class="box-title">Proceso de Traspaso entre Unidades Administrativas</h3>
        </div>
    </div>
    <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
            <div class="card-content">
                <div class="form-group">
                    <label for="seleccionar proyecto">Fondo Presupuestario</label>
                    <select name="fuente" id="fuente_traspaso" required class="form-control">
                        <option selected value=''>- Seleccione -</option>
                        @foreach ($fuente as $key=>$value )
                            <option value="{{$value->id}}">{{$value->fondo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="box-content card white">
            <h4 class="box-title">Unidad Administrativa Cedente</h4>
            <!-- /.box-title -->
            <div class="card-content">
                <div class="form-group">
                    <label for="seleccionar proyecto">Seleccionar la Unidad Administrativa</label>
                    <select id="unidad_cedente" name="unidad_cedente" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="seleccionar proyecto">Seleccione Área Funcional Cedente</label>
                    <select  id="area_funcional_cedente" name="area_funcional_cedente" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="seleccionar partidas">Seleccionar Posición Presupuestaria Cedente</label>
                    <select class="form-control" id="posicion_cedente" name="posicion_cedente" {{--name="p_traspaso"--}}>
                    </select>
                </div>
                <div class="form-group">
                    <label for="monto de la partida">Monto Actual en la Posición Presupuestaria Cedente</label>
                    <input type="text" title="" readonly {{--name="monto_traspaso"--}} id="monto_disponible" name ='monto_disponible' class="form-control">
                </div>
                <div class="form-group">
                    <label for="seleccionar partidas">Monto a Ceder de la Posición Presupuestaria</label>
                    <input type="text" {{--name="monto_traspaso1"--}} onblur="return validar_monto()" id="monto_ceder" class="form-control">
                </div>
            </div>
            <!-- /.card-content -->
        </div>
        <!-- /.box-content -->
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="box-content card white">
            <h4 class="box-title">Unidad Administrativa Receptora</h4>
            <!-- /.box-title -->
            <div class="card-content">
                <div class="form-group">
                    <label for="seleccionar proyecto">Seleccione la Unidad Receptora</label>
                    <select {{--name="proyecto_traspaso"--}} id="unidad_receptora" name="unidad_receptora" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="seleccionar proyecto">Seleccione Área Funcional Receptora</label>
                    <select {{--name="proyecto_traspaso"--}} id="area_funcional_receptora" name = "area_funcional_receptora" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="seleccionar partida">Seleccionar Posición Presupuestaria Receptora</label>
                    <select {{--name="p_destino"--}} id="posicion_receptora" name="posicion_receptora" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="seleccionar partidas">Monto Actual en la Posición Presupuestaria Receptora</label>
                    <input type="text" {{--name="monto_disponible"--}} readonly name="monto_disponible_receptora" id="monto_disponible_receptora" class="form-control">
                </div>
                <div class="form-group">
                    <label for="seleccionar partidas">Monto Disponible de la Posición Presupuestaria Receptora</label>
                    <input type="text" {{--name="monto_total"--}} id="monto_total" readonly name="monto_total" class="form-control">
                </div>
            </div>
            <!-- /.card-content -->
        </div>
        <!-- /.box-content -->
    </div>
    <div class="col-lg-12 col-xs-12">
      <div class="">
          <div class="card-content">
            <div class="form-group">
              <button id="agregar1" type="button" class="btn btn-circle btn-success"><i class="fa fa-plus"></i></button>
              <br>
              <br>
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-12 col-xs-12">
      <div class="box-content card white">
          <div class="card-content">
            <label for="">SOLICITUD DE TRASPASO DE CRÉDITOS PRESUPUESTARIOS ENTRE UNIDADES ADMINISTRATIVAS</label>
            <div class="form-group">
              <table id="tabla1"  class="table table-striped table-bordered display">
                <thead>
                  <tr>
                    <td colspan='5'  style="background-color: rgb(239, 221, 221)" align='center'><h4> UNIDAD ADMINISTRATIVA CEDENTE </h4></td>
                    <td colspan='6' style="background-color: rgb(202, 224, 202)" align='center'><h4> UNIDAD ADMINISTRATIVA RECEPTORA </h4></td>
                  </tr>
                  <tr>
                    <th>Unidad Cedente</th>
                    <th>Área Funcional Cedente</th>
                    <th>Posición Cedente</th>
                    <th>Monto a Ceder</th>
                    <th>Fuente</th>
                    <th>Unidad Receptora</th>
                    <th>Área Funcional Receptora</th>
                    <th>Posición Receptora</th>
                    <th>Monto a Recibir</th>
                    <th>Monto Disponible</th>
                    <th>Fuente</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
      </div>
    </div>


    <div class="col-lg-12 col-xs-12">
        <div class="box-content card white">
            <div class="card-content">
                <div class="form-group col-lg-12">
                    <label for="seleccionar partidas">Adjuntar Archivo de Solicitud de Traspaso entre Unidades</label><br>
                    <input type="file"  accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" name="traspaso_entre_unidades">
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
    {{-- <div class="col-lg-6 col-xs-12">
        <button type="button" id="asignar" class="btn btn-success btn-circle btn-sm waves-effect waves-light" title='Agregar solicitud de traspaso a la tabla'><i class="fa fa-plus"></i></button>
        <br>
    </div> --}}
    
    {{-- <div class="col-lg-12 col-xs-12">
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
     --}}
    <div class="col-lg-6 col-xs-12">
        <button type="submit" id="enviar" class="btn btn-success btn-rounded btn-sm waves-effect waves-light"><i class="fa fa-check"></i>Guardar</button>
    </div>
    
</form>
<script src="assets/scripts/query-git.js"></script>
<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script>

$(document).ready(function(){
  $("#fuente_traspaso").change(function(){
    var fondo = $(this).val();
    if(fondo === ""){
      
       //limpiar campos cedentes
        $('#unidad_cedente').empty();
        $('#area_funcional_cedente').empty();
        $('#posicion_cedente').empty();
        $('#monto_disponible').empty();
        $('#monto_ceder').val('');
        //limpiar campos receptores
        $('#area_funcional_receptora').empty();
        $('#posicion_receptora').empty();
        $('#monto_disponible_receptora').val('');
        $('#monto_total').val('');
        var fondo = 0;
    }
      
    $.get('fondo_traspaso/'+fondo, function(data){
    //esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var unidad_cedente = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    unidad_cedente+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
      $("#unidad_cedente").html(unidad_cedente);
    var unidad_receptora = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    unidad_receptora+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

      //limpiar campos cedentes
      $('#area_funcional_cedente').empty();
      $('#posicion_cedente').empty();
      $('#monto_disponible').val('');
      $('#monto_ceder').val('');
      //limpiar campos receptores
      $('#area_funcional_receptora').empty();
      $('#posicion_receptora').empty();
      $('#monto_disponible_receptora').val('');
      $('#monto_total').val('');
      $("#unidad_receptora").html(unidad_receptora);
    });
  });
});

//unidad cedente
$(document).ready(function(){
  $("#unidad_cedente").change(function(){
    var unidad_cedente = $(this).val();
    if(unidad_cedente === ""){
      $('#area_funcional_cedente').empty();
      $('#posicion_cedente').empty();
      $('#monto_disponible').val('');
      $('#monto_ceder').val('');
      var unidad_cedente = 0;
    }
      
    $.get('unidad_cedente/'+unidad_cedente, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var area_funcional_cedente = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    area_funcional_cedente+='<option value="'+data[i].id+'">'+data[i].proyecto_presupuestario+' '+data[i].nombre_proyecto+'</option>';
      $('#area_funcional_cedente').empty();
      $('#posicion_cedente').empty();
      $('#monto_disponible').val('');
      $('#monto_ceder').val('');
      $("#area_funcional_cedente").html(area_funcional_cedente);

    });
  });
});

//area funcional cedente
$(document).ready(function(){
  $("#area_funcional_cedente").change(function(){
    var area_funcional_cedente = $(this).val();
    if(area_funcional_cedente === "")
      var area_funcional_cedente = 0;
    $.get('area_funcional_cedente/'+area_funcional_cedente, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var posicion_cedente = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    posicion_cedente+='<option value="'+data[i].id+'">'+data[i].codigo_partida+' '+data[i].descripcion+'</option>';
      $('#monto_disponible').val('');
      $('#monto_ceder').val('');
      $("#posicion_cedente").html(posicion_cedente);
  });
});

//Monto actual de la posicion presupuestaria
$(document).ready(function(){
  $("#posicion_cedente").change(function(){
    var posicion_cedente = $(this).val();

    if(posicion_cedente === "")
      var posicion_cedente = 0;
    $.get('posicion_cedente/'+posicion_cedente, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var monto_ceder = parseFloat($('#monto_ceder').val().replaceAll('.','').replace(',','.'));
      var monto_disponible_receptora = parseFloat($('#monto_disponible_receptora').val().replaceAll('.','').replace(',','.'));
      var total = monto_ceder + monto_disponible_receptora;
      $('#monto_total').val(formatter.format(total));
      $("#monto_disponible").val(formatter.format(data));
      $("#monto_disponible").html(formatter.format(data));
    });
    });
  });
});

$("#monto_ceder").on({
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

function validar_monto(){
    disponible = parseFloat($("#monto_disponible").val().replaceAll('.','').replace(',','.'));
    monto_ceder = parseFloat($("#monto_ceder").val().replaceAll('.','').replace(',','.'));
    if(monto_ceder > disponible){
        swal({
            title : "Monto Incorrecto", 
            text: "El monto a ceder no puede ser mayor al monto asignado", 
            type: "error",
            contentType: false,
            processData: false,
            //confirmButtonColor: '#f60e0e',
            showConfirmButton: false,
            timer: 2000
        });
        $("#monto_ceder").val('');
    }

}

//area funcinoal receptora
$(document).ready(function(){
  $("#unidad_receptora").change(function(){
    var unidad_receptora = $(this).val();
    if(unidad_receptora === $('#unidad_cedente').val()){
      swal({
        title : "Error en Seleccionar la Unidad Receptora", 
        text: "Debe seleccionar una unidad receptora diferente", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    $("#unidad_receptora").val('')
    $('#unidad_cedente').val('');
    return false;
    }
    if(unidad_receptora === ""){
      $('#area_funcional_receptora').empty();
      $('#posicion_receptora').empty();
      $('#monto_disponible_receptora').val('');
      $('#monto_ceder').val('');

      var unidad_receptora = 0;
    }
    //console.log(unidad_receptora);
    $.get('unidad_cedente/'+unidad_receptora, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var area_funcional_receptora = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
      area_funcional_receptora+='<option value="'+data[i].id+'">'+data[i].proyecto_presupuestario+' '+data[i].nombre_proyecto+'</option>';
    $('#area_funcional_receptora').empty();
      $('#posicion_receptora').empty();
      $('#monto_disponible_receptora').val('');
      $('#monto_total').val('');
      $("#area_funcional_receptora").html(area_funcional_receptora);
    });
  });
});

$(document).ready(function(){
  $("#monto_ceder").change(function(){
    var monto_disponible_receptora = parseFloat($("#monto_disponible_receptora").val().replaceAll('.','').replace(',','.'));
    var monto_ceder = parseFloat($("#monto_ceder").val().replaceAll('.','').replace(',','.'));
    var monto_total = monto_disponible_receptora + monto_ceder;
    //console.log(monto_disponible,monto_total);
    if (monto_total==null) {
      $("#monto_ceder").val('');
    }else{
      $('#monto_total').val(formatter.format(monto_total));
    }
  });
});


//area funcional cedente
$(document).ready(function(){
  $("#area_funcional_receptora").change(function(){
    var area_funcional_receptora = $(this).val();
    if(area_funcional_receptora === ""){
      $('#posicion_receptora').empty();
      $('#monto_disponible_receptora').val('');
      //$('#monto_ceder').val('');
      var area_funcional_receptora = 0;
    }

    $.get('area_funcional_cedente/'+area_funcional_receptora, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var posicion_receptora = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    posicion_receptora+='<option value="'+data[i].id+'">'+data[i].codigo_partida+' '+data[i].descripcion+'</option>';
      $('#posicion_receptora').empty();
      $('#monto_disponible_receptora').val('');
      //$('#monto_ceder').val('');
      $("#posicion_receptora").html(posicion_receptora);
    });
  });
});
$(document).ready(function(){
  $("#posicion_receptora").change(function(){
    var posicion_receptora = $(this).val();
    //console.log(posicion_cedente);
    if(posicion_receptora === ""){
      $('#monto_disponible_receptora').val('');
      $('#monto_ceder').val('');
      var posicion_receptora = 0;
    }
    $.get('posicion_cedente/'+posicion_receptora, function(data){
      $("#monto_disponible_receptora").val(formatter.format(data));
      $("#monto_disponible_receptora").html(formatter.format(data));
    
    var monto_ceder = parseFloat($('#monto_ceder').val().replaceAll('.','').replace(',','.'));
    var monto_disponible_receptora = parseFloat($('#monto_disponible_receptora').val().replaceAll('.','').replace(',','.'));
    var total = monto_ceder + monto_disponible_receptora;
    $('#monto_ceder').val('');
    $('#monto_total').val(formatter.format(total));
    });
  });
});

$('#agregar1').click(function(){
  var fuente = $('#fuente_traspaso').val();
  if(fuente===''){
    swal({
        title : "Fuente Incorrecta", 
        text: "Debe seleccionar una fuente de financiamiento", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
  var unidad_cedente = $('#unidad_cedente').val();
  if(unidad_cedente===''){
    swal({
        title : "Unidad Incorrecta", 
        text: "Debe seleccionar una Unidad Adminsitrativa", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
  var area_funcional_cedente= $('#area_funcional_cedente').val();
  if(area_funcional_cedente===''){
    swal({
        title : "Area Funcional Incorrecta", 
        text: "Debe seleccionar un Área Funcional correcta", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
  var posicion_cedente = $('#posicion_cedente').val();
  if(posicion_cedente===''){
    swal({
        title : "Posición Incorrecta", 
        text: "Debe seleccionar una Posicion Presupuestaria Correcta", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
  var monto_ceder = $('#monto_ceder').val();
  if(monto_ceder===''){
    swal({
        title : "Monto Vacio", 
        text: "Debe colocar una cantidad en el monto a ceder", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }

  var unidad_receptora = $('#unidad_receptora').val();
  if(unidad_receptora===''){
    swal({
        title : "Unidad Incorrecta", 
        text: "Debe seleccionar una unidad Adminsitrativa Receptora", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
 
  var area_funcional_receptora = $('#area_funcional_receptora').val();
  if(area_funcional_receptora===''){
    swal({
        title : "Área Funcional Incorrecta", 
        text: "Debe seleccionar un área funcional Receptora", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
  var posicion_receptora = $('#posicion_receptora').val();
  if(posicion_receptora===''){
    swal({
        title : "Posición Receptora Incorrecta", 
        text: "Debe seleccionar una posición presupuestaria Receptora ", 
        type: "error",
        contentType: false,
        processData: false,
        //confirmButtonColor: '#f60e0e',
        showConfirmButton: false,
        timer: 5000
    });
    return false;
  }
  var monto_disponible_receptor = $('#monto_total').val();
    console.log($('#area_funcional_cedente option:selected').text());
    //(tr) del id "tabla"
    var tds=$("#tabla1 tr:first td").length;
    // Obtenemos el total de columnas (tr) del id "tabla"
    trs=$("#tabla1 tr").length;
    var nueva_fila='<tr>';
    nueva_fila+='<td>'+$('#unidad_cedente option:selected').text()+'<input type="text" hidden name="unidad_cedente[]" value="'+unidad_cedente+'">';
    nueva_fila+='<td>'+$('#area_funcional_cedente option:selected').text() +'<input type="text" hidden name="area_funcional_cedente[]" value="'+area_funcional_cedente+'">';
    nueva_fila+='<td>'+$('#posicion_cedente option:selected').text()+'<input type="text" hidden name="posicion_cedente[]" value="'+posicion_cedente+'">';
    nueva_fila+='<td>'+$('#monto_ceder').val()+'<input type="text" hidden name="monto_ceder[]" value="'+monto_ceder+'">';
    nueva_fila+='<td>'+$('#fuente_traspaso option:selected').text()+'<input type="text" hidden name="fondo[]" value="'+fuente+'">';
    nueva_fila+='<td>'+$('#unidad_receptora option:selected').text()+'<input type="text" hidden name="unidad_receptora[]" value="'+unidad_receptora+'">';
    nueva_fila+='<td>'+$('#area_funcional_receptora option:selected').text()+'<input type="text" hidden name="area_funcional_receptora[]" value="'+area_funcional_receptora+'">';
    nueva_fila+='<td>'+$('#posicion_receptora option:selected').text()+'<input type="text" hidden name="posicion_receptora[]" value="'+posicion_receptora+'">';
    nueva_fila+='<td>'+$('#monto_ceder').val();
    nueva_fila+='<td>'+$('#monto_total').val()+'<input type="text" hidden name="saldo_disponible_receptor[]" value="'+monto_disponible_receptor+'">';
    nueva_fila+='<td>'+$('#fuente_traspaso option:selected').text()+'<input type="text" hidden>';
    nueva_fila+='</tr>';
    $("#tabla1").append(nueva_fila);
    $('#monto_ceder').val('');
    $('#area_funcional_receptora').val('');
    $('#posicion_receptora').val('');
    $('#posicion_receptora').val('');
    $('#posicion_receptora').val('');
    $('#monto_disponible_receptora').val('');
    $('#monto_total').val('');
});

</script>
@endsection