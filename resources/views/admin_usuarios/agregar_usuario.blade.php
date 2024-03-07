@extends('principal')
@section('agregar_usuarios')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Datos del Usuarios</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form class="form-horizontal" id="form" onsubmit="return validar(this)" action="{{url('agregar_usuarios')}}" method="POST">
			@csrf
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Correo</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" required name="correo" id="inputName" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="Ingrese el correo institucional">
					</div>
				</div>
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" onkeypress="return soloLetras(event)" required pattern="[a-zA-Z ]{2,254}" name="nombre" id="nombre" placeholder="Nombre del usuario">
					</div>
				</div>
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" onkeypress="return soloLetras(event)" required pattern="[a-zA-Z ]{2,254}" name="apellido" id="apellido" placeholder="Apellido del usuario">
					</div>
				</div>
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Cédula</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" onkeypress="return soloNumero(event)" required name="cedula" id="cedula" maxlength="9" placeholder="Cédula del usuario">
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-1" class="col-sm-3 control-label">Cargo</label>
					<div class="col-sm-9">
						<select name="cargo" required required class="form-control" >
							<option value="" selected="true">- Seleccione -</option>
							@foreach($cargo as $key=>$value)
								<option value="{{$value->id}}">{{$value->cargo}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-2" class="col-sm-3 control-label">Ente</label>
					<div class="col-sm-9">
						<select id="ente" required name="ente" class="form-control" >
							<option value="" selected>- Seleccione -</option>
							@foreach($ente as $key=>$value)
								<option value="{{$value->id}}">{{$value->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-3" class="col-sm-3 control-label">Unidad</label>
					<div class="col-sm-9">
						<select name="unidad" required id="unidad" class="form-control" >
							<option value="" selected>- Seleccione -</option>
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-1" class="col-sm-3 control-label">Perfil</label>
					<div class="col-sm-9">
						<select name=id_perfil required class="form-control" >
							<option value="" selected>- Seleccione -</option>
							@foreach($perfil as $key=>$value)
								<option value="{{$value->id}}">{{$value->nombre_perfil}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group col-lg-6">
					<label for="inp-type-3" class="col-sm-3 control-label">Clave</label>
					<div class="col-sm-9">
						<input type="password" required name="pass1" title="Máximo 8 caracteres"class="form-control" id="pass1" max="8" maxlength="8" placeholder="Clave">
					</div>
				</div>

				<div class="form-group col-lg-6">
					<label for="inp-type-3" class="col-sm-3 control-label">Confirmar</label>
					<div class="col-sm-9">
						<input type="password" required name="pass2" title="Máximo 8 caracteres" class="form-control" id="pass2" maxlength="8" max="8" placeholder="Confirmar Clave">
					</div>
				</div>
				<div class="form-group col-lg-10">
				</div>
				<div class="form-group col-lg-2">
					<div class="col-sm-9">
						<button type="submit" onclick="return validar(form)" class="btn btn-success btn-rounded waves-effect waves-light">Guardar</button>
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
