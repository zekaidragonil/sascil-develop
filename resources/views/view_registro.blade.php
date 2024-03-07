@extends('principal')
@section('view_registro')
<div class="col-lg-12 col-xs-12">
	    <div class="box-content card white">
	    	<h4 class="box-title">Agregar Documento Legal</h4>
	    	<!-- /.box-title -->
	    	<div class="card-content">
	    		<form class="form-horizontal">
	    			<div class="form-group">
	    				<label for="inp-type-1" class="col-sm-3 control-label">Número de contrato</label>
	    				<div class="col-sm-9">
	    					<input type="text" name="numero_contrato" class="form-control" id="inp-type-1" placeholder="">
	    				</div>
	    			</div>
	    			<div class="form-group">
	    				<label for="inp-type-3" class="col-sm-3 control-label">Fecha del instrumento</label>
	    				<div class="col-sm-9">
	    					<input type="date" name="fecha_instrumento" class="form-control" id="inp-type-2" placeholder="fecha">
	    				</div>
	    			</div>
	    			<div class="form-group">
	    				<label for="inp-type-3" class="col-sm-3 control-label">Fecha del registro</label>
	    				<div class="col-sm-9">
	    					<input type="date" date="fecha_registro" class="form-control" id="inp-type-3" placeholder="" value="">
	    				</div>
	    			</div>
	    			<div class="form-group">
	    				<label for="inp-type-4" class="col-sm-3 control-label">Cargar documento</label>
	    				<div class="col-sm-9">
							<input type="file" id="exampleInputFile">
							<p class="help-block">Subir instrumento legal en pdf.</p>
	    				</div>
	    			</div>
					<div class="form-group">
					<label for="inp-type-4" class="col-sm-3 control-label">¿Tiene documentos asociados? </label>
						<div class="col-sm-1 radio">
							<input type="radio" name="inst_asociado" id="inst_asociado1" required>
							<label for="inst_asociado1">Si</label>
						</div>
						<div class="col-sm-1  radio">
							<input type="radio" name="inst_asociado" id="inst_asociado2" required>
							<label for="inst_asociado2">No</label>
						</div>
	    			</div>
					<div class="form-group">
	    				<label for="inp-type-3" class="col-sm-3 control-label">Instrumento asociado</label>
	    				<div class="col-sm-9">
	    					<input type="text" date="fecha_registro" class="form-control" id="inp-type-3" placeholder="" value="">
	    				</div>
	    			</div>
					<div class="form-group">
	    				<label for="inp-type-3" class="col-sm-3 control-label">Fecha de asociación</label>
	    				<div class="col-sm-9">
	    					<input type="date" date="fecha_registro" class="form-control" id="inp-type-3" placeholder="" value="">
	    				</div>
	    			</div>
					<div class="form-group">
	    				<label for="inp-type-3" class="col-sm-3 control-label">Estaus</label>
	    				<div class="col-sm-9">
							<select name="estatus" required class="form-control" >
							<opcion selected value="">-Seleccionar-</opcion>
							@foreach ($estatus as $key => $value)
								<option value="{{$value->id}}">{{$value->nombre_estatus}}</option>
							@endforeach
							</select>
	    				</div>
	    			</div>
					<div class="form-group">
	    				<label for="inp-type-3" class="col-sm-3 control-label">Fecha estatus</label>
	    				<div class="col-sm-9">
	    					<input type="date" date="fecha_estatus" class="form-control" id="inp-type-3" placeholder="" value="">
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    	<!-- /.card-content -->
	    </div>
				<!-- /.box-content card white -->
</div>
@endsection