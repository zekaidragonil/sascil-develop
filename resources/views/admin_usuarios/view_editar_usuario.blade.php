@extends('principal')
@section('view_editar_usuario')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Datos del Usuarios</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form class="form-horizontal" id="form" onsubmit="return validar(this)" action="{{url('editar_usuario')}}" method="POST">
			@csrf
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Correo</label>
					<div class="col-sm-9">
						<input type="text" hidden="true" name="id" value="{{$usuario[0]->id}}">
						<input type="email" class="form-control" value="{{$usuario[0]->correo}}" required name="correo" id="inputName" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="Ingrese el correo institucional">
					</div>
				</div>
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="{{$usuario[0]->nombre_user}}" required pattern="[a-zA-Z ]{2,254}" name="nombre" id="nombre" placeholder="Nombre del usuario">
					</div>
				</div>
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="{{$usuario[0]->apellido}}" required pattern="[a-zA-Z ]{2,254}" name="apellido" id="apellido" placeholder="Apellido del usuario">
					</div>
				</div>
				<div class="col-lg-6 form-group">
					<label for="inp-type-2" class="col-sm-3 control-label">Cédula</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="{{$usuario[0]->cedula}}" required maxlength="8" min="8" name="cedula" id="cedula">
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-1" class="col-sm-3 control-label">Cargo</label>
					<div class="col-sm-9">
						<select name=cargo required class="form-control" >
							<option value="" selected>- Seleccione -</option>
							@foreach($cargo as $key=>$value)
                                @if($value->id==$usuario[0]->id_cargo)
								<option selected value="{{$value->id}}">{{$value->cargo}}</option>
                                @else
                                <option value="{{$value->id}}">{{$value->cargo}}</option>
                                @endif
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
                                @if($value->id==$usuario[0]->id_ente)
                                    <option selected value="{{$value->id}}">{{$value->nombre}}</option>
                                @else
								    <option value="{{$value->id}}">{{$value->nombre}}</option>
                                @endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-3" class="col-sm-3 control-label">Unidad</label>
					<div class="col-sm-9">
						<select name="unidad" required id="unidad" class="form-control" >
							@if($usuario[0]->id_unidad)
							<option value="{{$usuario[0]->id_unidad}}" selected>{{$usuario[0]->nombre}}</option>
							@else							
                            <option value="" selected></option>
							@endif
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-1" class="col-sm-3 control-label">Perfil</label>
					<div class="col-sm-9">
						<select name=id_perfil required class="form-control" >
							<option value="" selected>- Seleccione -</option>
							@foreach($perfil as $key=>$value)
                                @if($value->id==$usuario[0]->id_perfil)
								    <option selected value="{{$value->id}}">{{$value->nombre_perfil}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->nombre_perfil}}</option>
                                @endif
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="form-group col-lg-6">
					<label for="inp-type-3" class="col-sm-3 control-label">Clave</label>
					<div class="col-sm-9">
						<input type="password" required name="pass1" maxlength="8" title="ingrese la clave, maximo 8 caracteres" value="{{$usuario[0]->clave}}" class="form-control" id="pass1" placeholder="Clave">
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label for="inp-type-3" class="col-sm-3 control-label">Confirmar</label>
					<div class="col-sm-9">
						<input type="password" required name="pass2" maxlength="8" title="Confirmar la Clave, maximo 8 caracteres" value="{{$usuario[0]->clave}}" class="form-control" id="pass2" placeholder="Confirmar Clave">
					</div>
				</div>
				<div align="center" class="form-group col-lg-4 switch primary margin-bottom-20">
					@if($usuario[0]->estatus==1)
					<input type="checkbox" id="switch-inline" name="estatus" checked><label for="switch-inline"><strong>Estatus Usuario</strong></label>
					@else
					<input type="checkbox" id="switch-inline" readonly name="estatus" checked><label for="switch-inline"><strong>Estatus Usuario</strong></label>
					@endif
				</div>
				<div class="form-group col-lg-10">

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
@endsection