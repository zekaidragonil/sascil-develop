@extends('principal')
@section('agregar_ente')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Agregar nuevo Ente</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form class="form-horizontal" id="form" onsubmit="return validar(this)" action="{{url('guardar_ente')}}" method="POST">
			@csrf
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-4 control-label">Nombre del Ente</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required name="nombre" id="inputName" onkeypress="return soloLetras(event)" placeholder="Engrese el nombre de la unidad">
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-2" class="col-sm-4 control-label">Rif</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" pattern="^([VEJPGvejpg]{1})-([0-9]{8})-([0-9]{1}$)" maxlength="12" required name="rif" placeholder="Engrese el nombre de la unidad">
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-2" class="col-sm-4 control-label">Estado:</label>
					<div class="col-sm-8">
						<select id="estado" required name="estado" class="form-control" >
							<option value="" selected>-Seleccione-</option>
							@foreach ($estado as $key => $value) 
								<option value="{{$value->id}}">{{$value->estado}}</option>
							@endforeach
						</select>	
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-2" class="col-sm-4 control-label">Municipio</label>
					<div class="col-sm-8">
						<select id="municipio" required name="municipio" class="form-control" >
						</select>	
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-2" class="col-sm-4 control-label">Parroquia</label>
					<div class="col-sm-8">
						<select id="parroquia" required name="parroquia" class="form-control" >
						</select>
					</div>
				</div>
				
				<div class="form-group col-lg-12">
				
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