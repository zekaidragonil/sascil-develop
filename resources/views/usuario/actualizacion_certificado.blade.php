@extends('principal')
@section('actualizar_certificado')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Revisión y Certificación Presupuestaria</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form class="form-horizontal" id="revision_certificacion" accept-charset="UTF-8" enctype="multipart/form-data" action="{{url('actualizar_solicitud_certificado')}}" method="POST">
			@csrf
            <input type="text" name="id_certificacion_presupuestaria" hidden value="{{$revision[0]->id}}">
            {{-- <input type="text" name="pre_comprometido" hidden value="{{$pre_comprometido}}"> --}}
                <div class="form-group col-sm-12">
                    <div class="col-sm-12">                        
                        <div class="col-xl-12">
                            <p>Para verificar la solicitud de certificación presupuestaria pulse aquí &nbsp;&nbsp;<a class="btn btn-circle btn-success" href="{{$revision[0]->adjunto}}"target="_blank"><i class="fa fa-download"></i></a></p>
                        </div>
                        <hr>
                        <div class="col-xl-12">
                            <label>Estatus de la certificación presupuestaria</label>
                            <!--vista del analista de presupuesto-->
                        </div>
                        <div class="radio col-sm-1">
                            <input type="radio" name="estatus" value="Revisado" id="underwear1" required>
                            <label for="underwear1">Revisado</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="radio col-sm-1">
                            <input type="radio" name="estatus" value="Rechazado" id="underwear2" required>
                            <label for="underwear2">Rechazado</label>
                        </div>
                    </div>
                </div>
				<div class="form-group col-lg-12">
					<label for="inp-type-2" class="col-sm-1 control-label">Observaciones</label>
					<div class="col-sm-12">
                        <textarea class="form-control" required name="observaciones" id="textarea" maxlength="3000" placeholder="Indicar observaciones referidas a la certificacion presupuestaria"></textarea>
					</div>
				</div>
				<div id="adjunto" class="form-group col-lg-12" style="display:none;">
					<div class ="col-sm-12">
                        <label>
                            <h3>Descargar el formato de Certificacion Presupuestaria <button type="submit" id="generar_formato" name="generar_formato" value="1" class="btn btn-circle btn-success"><i class="fa fa fa-download"></i></button></h3> </label>
                    </div>
				</div>
				<div class="form-group col-lg-6">
					<div class="col-sm-12">
						<button type="button" id="enviar" class="btn btn-success btn-rounded waves-effect waves-light">Guardar <i class="fa fa-check"></i></button>
                        <a href="{{url('revisar_certificaciones')}}" class="btn btn-warning btn-rounded waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Atras</a>
					</div>
				</div>
			</form>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content card white -->
</div>
<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script>
 $(document).ready(function() {
    $("#underwear1").click(function() {
      $("#adjunto").show();
    });

    $("#underwear2").click(function() {
      $("#adjunto").hide();
    });
  });

  $("#enviar").on("click",function()
  {
    swal({   
        title: "Esta seguro que desea continuar?",   
        text: "Verifique si descargo el formato de certificación presupuestaria antes de Guardar.",
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, Continuar!", 
        cancelButtonText: "No, Cancelar!", 
        closeOnConfirm: false,
        closeOnCancel: false,
        confirmButtonColor: '#f60e0e',
    }, function(isConfirm)
    {
        if (isConfirm) 
        {
            $('#revision_certificacion').submit();
            return false; 
        }else 
        {  
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
