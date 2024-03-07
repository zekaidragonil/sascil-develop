$(document).ready(function(){
  $("#ente").change(function(){
    var ente = $(this).val();
    if(ente === "")
      var ente = 0;
    //console.log(ente);
    $.get('unidad/'+ente, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    var unidad = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
      unidad+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
    $("#unidad").html(unidad);
    });
  });
});

$(document).ready(function(){
  $("#estado").change(function(){
    var estado = $(this).val();
    if(estado === "")
      var estado = 0;
    $.get('municipio/'+estado, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var municipio = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
      municipio+='<option value="'+data[i].id+'">'+data[i].municipio+'</option>';
      $("#municipio").html(municipio);
    });
  });
});

$(document).ready(function(){
  $("#fondo").change(function(){
    var fondo = $(this).val();
    if(fondo === "")
      var fondo = 0;
    $.get('area_funcional/'+fondo, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var id_proyecto = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    id_proyecto+='<option value="'+data[i].id+'">'+data[i].nombre_proyecto+'</option>';
      $("#id_proyecto").html(id_proyecto);
    });
  });
});

$(document).ready(function(){
  $("#municipio").change(function(){
    var municipio = $(this).val();
    if(municipio === "")
      var municipio = 0;
    //console.log(municipio);
    $.get('parroquia/'+municipio, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    //console.log(data);
    var parroquia = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
      parroquia+='<option value="'+data[i].id+'">'+data[i].parroquia+'</option>';
      //console.log(parroquia);
      $("#parroquia").html(parroquia);
    });
  });
});

$(document).ready(function(){
    $("#proyecto").change(function(){
      var proyecto = $(this).val();
      if(proyecto === "")
        var proyecto = 0;
      //console.log(proyecto);
      $.get('proyecto/'+proyecto, function(data){
  //esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
      var partida = '<option value="">- Seleccione -</option>'
      for (var i=0; i<data.length;i++)
        partida+='<option value="'+data[i].id+'">'+data[i].codigo_partida+'</option>';
      $("#partida").html(partida);
      });
    });
  });

  $(document).ready(function(){
    $("#partida").change(function(){
      var partida = $(this).val();
      var proyecto = $('#proyecto').val();
      //console.log(proyecto);
      if(partida === "")
        var partida = 0;
      //console.log(partida);
      $.get('partida/'+partida+'/'+proyecto, function(data){
  //esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
      var monto = data;
      //console.log(data);
      document.getElementById('monto').value = monto;
      //console.log(monto);
      $("#monto").html(monto);
      });
    });
  });

  $(document).ready(function(){
    $("#proyecto_p").change(function(){
      var proyecto_p = $(this).val();
      var proyecto_p = $('#proyecto_p').val();
      //console.log(proyecto);
      if(proyecto_p === "")
        var proyecto_p = 0;
      //console.log(partida);
      $.get('proyecto_p/'+proyecto_p, function(data){
  //esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
      var nombre_p = data;
      //console.log(data);
      document.getElementById('nombre_p').value = nombre_p;
      //console.log(monto);
      $("#nombre_p").html(nombre_p);
      });
    });
  });



function validar(form) {
  clave1=form.pass1.value;
  clave2=form.pass2.value;

  var espacios = false;
  var cont = 0;

  while (!espacios && (cont < clave1.length)) {
    if (clave1.charAt(cont) == " ")
    espacios = true;
    cont++;
  }
  if(clave1.length < 8 || clave2.length < 8){
    swal({
        title: "Algo salio mal",
        text:  "La contraseña debe tener al menos 8 dígitos de logitud",
        type:  "warning",
        showConfirmButton: false,
        timer: 3000
    });
    //alert('La contraseña debe tener al menos 8 dígitos de logitud');
    return false;
  }
  if (espacios) {
    swal({
        title: "Algo salio mal",
        text:  "La contraseña no puede contener espacios en blanco",
        type:  "warning",
        showConfirmButton: false,
        timer: 3000
    });
    //alert('La contraseña no puede contener espacios en blanco');
    return false;
  }
  if (clave1.length == 0 || clave2.length == 0) {
    swal({
        title: "Algo salio mal",
        text:  "Los campos de contraseña no pueden quedar vacios",
        type:  "warning",
        showConfirmButton: false,
        timer: 3000
    });
    //alert('Los campos de contraseña no pueden quedar vacios');
    return false;
  }
  if (clave1 != clave2) {
    swal({
        title: "Algo salio mal",
        text:  "Las contraseñas deben de coincidir",
        type:  "warning",
        showConfirmButton: false,
        timer: 3000
    });
    //alert('Las contraseñas deben de coincidir')
    return false;
  } else {
    return true;
  }
}

  $("#agregar").on("click",function(){
    swal({   
      title: "Esta seguro que desea continuar?",   
      text: "Una vez hecha la soliciud esta no podra ser revertida!",   
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
        form.submit();
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

  $("#enviar_solictud").on("click",function(){
    swal({   
      title: "Esta seguro que desea continuar?",   
      text: "Se recomineda verificar los datos antes de guardar la solicitud, ",type: "warning",   
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Si, Continuar!", 
      cancelButtonText: "No, Cancelar!", 
      closeOnConfirm: false,
      closeOnCancel: false,
      confirmButtonColor: '#f60e0e',
    }, function(isConfirm){   
      if (isConfirm) {    
        $('#solicitud_certificado').submit();
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
  
$("#generar_solicitud_").on("click",function(){
   swal({   
    title: "Esta seguro que desea continuar?",   
    text: "Verifique los datos antes de generar el documento, una vez generada la solicitud asegurese de guardar el archivo.",
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
      $('#solicitud_certificado').submit();
      return false;  
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
  //console.log('retorne falso');
  return false;    
});

$(document).ready(function(){
  $("#fuente").change(function(){
    var fondo = $('#fuente').val();
    if(fondo === "")
      {
        $('#proyecto_traspaso').val('');
        $('#proyecto_destino').val('');
        $('#monto_traspaso1').val('');
        $('#p_traspaso').val('');
        $('#monto_traspaso').val('');
        $('#p_destino').val('');
        $('#monto_disponible').val('');
        $('#monto_total').val('');
      }
    //console.log(fondo);
    $.get('fondo/'+fondo, function(data){
      $('#proyecto_traspaso').val('');
      $('#proyecto_destino').val('');
      $('#monto_traspaso1').val('');
      $('#p_traspaso').val('');
      $('#monto_traspaso').val('');
      $('#p_destino').val('');
      $('#monto_disponible').val('');
      $('#monto_total').val('');
      var proy_traspaso = '<option value="">- Seleccione -</option>'
      for (var i=0; i<data.length;i++)
        proy_traspaso+='<option value="'+data[i].id_proyecto+'">'+data[i].proyecto_presupuestario+' '+data[i].nombre_proyecto +'</option>';
        $("#proyecto_traspaso").html(proy_traspaso);
      
      for (var i=0; i<data.length;i++)
        proy_traspaso+='<option value="'+data[i].id_proyecto+'">'+data[i].proyecto_presupuestario+' '+data[i].nombre_proyecto +'</option>';
        $("#proyecto_destino").html(proy_traspaso);
      });
  });
});


$(document).ready(function(){
  $("#proyecto_traspaso").change(function(){
    var proyecto_traspaso = $('#proyecto_traspaso').val();
    if(proyecto_traspaso === "")
      {
        var proyecto_traspaso = 0;
        //console.log('proyecto_traspaso');
        document.getElementById('monto_traspaso').value='';
        document.getElementById('monto_traspaso1').value='';
        document.getElementById('monto_total').value='';
      }
    $.get('proyecto_traspaso/'+proyecto_traspaso, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    var p_traspaso = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    p_traspaso+='<option value="'+data[i].id+'">'+data[i].codigo_partida+' '+data[i].descripcion +'</option>';
    $("#p_traspaso").html(p_traspaso);
        document.getElementById('monto_traspaso').value='';
        document.getElementById('monto_traspaso1').value='';
        document.getElementById('monto_total').value='';
    });
  });
});
 const formatter = new Intl.NumberFormat('es-VE', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
$(document).ready(function(){
  $("#p_traspaso").change(function(){
    var p_traspaso = $(this).val();
    var proyecto_traspaso = $('#proyecto_traspaso').val();
    if(p_traspaso === "")
      {
        document.getElementById('monto_traspaso').value='';
        document.getElementById('monto_traspaso1').value='';
        var p_traspaso = 0;
      }
    //console.log(p_traspaso);
    $.get('partida_traspaso/'+p_traspaso+'/'+proyecto_traspaso, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    var monto = data;
    //console.log(data);
    document.getElementById('monto_traspaso').value = formatter.format(monto[0].saldo_disponible.toFixed(2));
    document.getElementById('monto_traspaso1').value='';
    //console.log(monto[0].saldo_disponible);
    $("#monto_traspaso").html(monto_traspaso);
    });
  });
});

//--------------------------------------------------------------------

$(document).ready(function(){
  $("#proyecto_destino").change(function(){
    var proyecto_destino = $(this).val();
    if(proyecto_destino === "")
      {
        var proyecto_destino = 0;
        document.getElementById('monto_total').value='';
        document.getElementById('monto_disponible').value='';
        document.getElementById('monto_total').value='';
      }
    //console.log(proyecto);
    $.get('proyecto_destino/'+proyecto_destino, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    var p_destino = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    p_destino+='<option value="'+data[i].id+'">'+data[i].codigo_partida+' '+data[i].descripcion +'</option>';
    $("#p_destino").html(p_destino);
    });
    document.getElementById('monto_total').value='';
    document.getElementById('monto_disponible').value='';
        document.getElementById('monto_total').value='';
  });
});

$(document).ready(function(){
  $("#monto_traspaso1").change(function(){
    var monto_disponible = parseFloat($("#monto_disponible").val().replaceAll('.','').replace(',','.'));
    var monto_traspaso1 = parseFloat($("#monto_traspaso1").val().replaceAll('.','').replace(',','.'));
    var monto_total = monto_disponible + monto_traspaso1;
    //console.log(monto_disponible,monto_total);
    if (monto_total==null) {
      $("#monto_disponible").val('');
    }else{
      $('#monto_total').val(formatter.format(monto_total));
    }
  });
});

$(document).ready(function(){
  $("#p_destino").change(function(){
    var p_destino = $(this).val();
    var proyecto_destino = $('#proyecto_destino').val();
    if(p_destino === "")
      {
        document.getElementById('monto_total').value;
        var p_destino = 0;
      }
    //console.log(p_traspaso);
    $.get('partida_destino/'+p_destino+'/'+proyecto_destino, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion
    var monto_total = data;
    
    if(document.getElementById('monto_traspaso').value === '')
      document.getElementById('monto_total').value='';
    else{
      var aux1 = monto_total[0].saldo_disponible;  
      var aux2 = document.getElementById('monto_traspaso1').value;
      var aux12 = aux1.replaceAll('.','');
      monto_cedente = aux12.replace(',','.');
      var aux3 = aux2.split('.').join('');
      monto_destino = aux3.replace(',','.'); 
      //console.log(monto_cedente)
      var resultado = parseFloat(monto_cedente) + parseFloat(monto_destino);
      //console.log(parseFloat(monto_cedente),monto_destino,resultado);
      document.getElementById('monto_disponible').value = aux1;
      document.getElementById('monto_total').value = formatter.format(resultado.toFixed(2));
      //console.log(monto[0].saldo_disponible);

    $("#monto_total").html(monto_total);
    }
    });
  });
});

$(document).ready(function(){
  $("#monto_traspaso1").change(function(){

    var aux1 = document.getElementById('monto_traspaso').value.replace('.','');
    var aux3 = aux1.split('.').join('');
    var aux6 = aux3.replace(',','.');
    //console.log(aux6);
    var aux2 = document.getElementById('monto_traspaso1').value;
    var aux4 = aux2.split('.').join('');
    var aux5 = aux4.replace(',','.');
    var monto_traspaso1 = parseFloat(aux5);
    var monto_traspaso = parseFloat(aux6);
    //console.log(monto_traspaso,monto_traspaso1);
    //console.log(monto_traspaso,monto_traspaso1);
  if(monto_traspaso1 > monto_traspaso)
  {
    //console.log(monto_traspaso,monto_traspaso1);
    swal({
      title: "Monto incorrecto",
      text:  "El monto ingresado no puede ser superior al monto disponible e la partida",
      type:  "warning",
      showConfirmButton: false,
      timer: 3000
  });
   document.getElementById('monto_traspaso1').value='';
  }
});
});

// ----------------------------------------------------------------
// validacion de carga de factura para instrumento legal

$(document).ready(function(){
  $("#id_contrato").change(function(){
    var contrato = $(this).val();
    //console.log('llegue');
    if(contrato === "")
      var contrato = 0;
    $.get('contrato/'+contrato, function(data){
//esta ella peticion get, la cual se divide en tres partes. ruta,variables y funcion    
    var tipo_factura = '<option value="">- Seleccione -</option>'
    if (data) {
      tipo_factura+='<option value=1>Anticipo</option>';
      tipo_factura+='<option value=2>Factura</option>';
      $("#tipo_factura").html(tipo_factura);
    } else {
      tipo_factura+='<option value=2>Factura</option>';
      $("#tipo_factura").html(tipo_factura);
    }
   
    });
  });
});

//-----------------------------------------------------------------
// validacion de la interfaz de reportes de presupuesto

$('#fecha_desde').blur(function(){
  var inicio = $('#fecha_desde').val();
  var fin = $('#fecha_hasta').val();
  if (fin != "") {
    if (inicio > fin) {
      swal({
          title: "Periodo incorrecto",
          text:  "La fecha de inicio no puedo ser mayor a la fecha fin",
          type:  "warning",
          showConfirmButton: false,
          timer: 3000
      });
      $('#fecha_desde').val('');
      $('#fecha_hasta').val('');
    }
  }
});


$('#fecha_hasta').blur(function(){
  var inicio = $('#fecha_desde').val();
  var fin = $('#fecha_hasta').val();
  if (inicio > fin) {
      swal({
          title: "Periodo incorrecto",
          text:  "La fecha de inicio no puedo ser mayor a la fecha fin",
          type:  "warning",
          showConfirmButton: false,
          timer: 3000
      });
      $('#fecha_desde').val('');
      $('#fecha_hasta').val('');
  }
});


$(document).ready(function(){
  $("#gerencia").change(function(){
    var gerencia = $(this).val();
    if(gerencia === "")
      var gerencia = 0;
    $.get('gerencia/'+gerencia, function(data){
    var proyecto = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    proyecto+='<option value="'+data[i].id_proyecto+'">'+data[i].nombre_proyecto+'</option>';
      $("#proyecto").html(proyecto);
    });
  });
});

$(document).ready(function(){
  $("#proyecto").change(function(){
    var proyecto = $(this).val();
    if(proyecto === "")
      var proyecto = 0;
    $.get('proyecto/'+proyecto, function(data){
    var partida = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
      partida+='<option value="'+data[i].id_clasificador_presupuestario+'">'+data[i].codigo_partida+' '+data[i].descripcion+'</option>';
    $("#partida_desde").html(partida);
    var fuente = '<option value="">- Seleccione -</option>'
    for (let j = 0; j < data.length; j++){
      fuente+='<option value="'+data[j].id_fondo+'">'+data[j].fondo+'</option>';
      break;
    }
    $("#fuente").html(fuente);
    });
  });
});

$(document).ready(function(){
  $("#partida_desde").change(function(){
    var partida_desde = $(this).val();
    var proyecto = $('#proyecto').val();
    if(partida_desde === "" || proyecto === ''){
      var partida_desde = 0;
      var proyecto = 0;
    }
    console.log(proyecto, partida_desde);
    $.get('partida_hasta/'+proyecto+'/'+partida_desde, function(data){
    var partida_hasta = '<option value="">- Seleccione -</option>'
    for (var i=0; i<data.length;i++)
    partida_hasta+='<option value="'+data[i].id+'">'+data[i].codigo_partida+' '+data[i].descripcion+'</option>';
      $("#partida_hasta").html(partida_hasta);
    });
  });
});


// ----------------------------------------------------------------

//------------------------------------------------------------------
//inabilitar el boton hasta que se suban los archivos adjuntos
  // $("#punto_financiero").change(function(){
  //   $("#enviar_solictud").prop("disabled", this.files.length == 0);
  // });
//------------------------------------------------------------------
