@extends('principal')
@section('view_fuente_financiamiento')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Agrega Fuentes de Financiamiento</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form class="form-horizontal" id="form" action="#" method="POST">
			@csrf
				<div class="form-group col-lg-6 ">
					<label for="inp-type-2" class="col-sm-4 control-label">Fuente Financiamiento del POA (Plán Operativo Anual)</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required name="fuente_financiamiento" id="fuante_financiamiento" placeholder="Engrese la fuente de finanaciamiento del POA">
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
@endsection