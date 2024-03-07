@extends('principal')
@section('agregar_unidad')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Agregar Unidad Administrativa al ente {{$ente[0]->nombre}}</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form class="form-horizontal" id="form" onsubmit="return validar(this)" action="{{url('guardar_unidad')}}" method="POST">
			@csrf
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-6 control-label">Nombre de la Unidad</label>
					<div class="col-sm-6">
						<input type="text" hidden="true" name="id_ente" value="{{$ente[0]->id}}">
						<input type="text" class="form-control" required name="nombre" id="inputName" onkeypress="return soloLetras(event)" placeholder="Engrese el nombre de la unidad">
					</div>
				</div>
				
				<div class="form-group col-lg-2">
					<div class="col-sm-9">
						<button type="submit" onclick="return validar(form)" class="btn btn-success btn-rounded btn-bordered waves-effect waves-light">Guardar</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content card white -->
</div>
{{--
<div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<div class="remodal-content">
		<h2 id="modal1Title">Advertencia!!!</h2>
		<p id="modal1Desc">
		¿Esta seguro de que desea guardar los datos del nuevo usuario?
		</p>
	</div>
	<button data-remodal-action="cancel" class="remodal-cancel btn btn-rounded">Cancelar</button>
	<button data-remodal-action="confirm" class="remodal-confirm btn btn-rounded">Guardar</button>
</div>
--}}
<script>
	function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
@endsection