@extends('principal')
@section('view_solicitud')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Solicitud Inicio de Contratación</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form action="{{url('guardar_solicitud')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
				<div class="form-group col-lg-3">
					<label for="exampleInputEmail1">Número de Punto de Cuenta</label>
					<input type="text" name="numero_punto" required class="form-control" title="ejemplo: 0987-2003">
				</div>
				<div class="form-group col-lg-3">
					<label for="exampleInputEmail1">Número de Control</label>
					<input type="text" name="numero_control" required class="form-control" title="ejemplo: 0987-2003" placeholder="" >
				</div>
				<div class="form-group col-lg-3">
					<label for="exampleInputEmail1">Fecha del Punto</label>
					<input id="" type="date" name="fecha_punto" max="{{date('Y-m-d')}}" required class="form-control">
				</div>
				<div class="form-group col-lg-3">
					<label for="exampleInputEmail1">Código de Certificación</label>
					<select name="id_certificacion" required title="Seleccione el código de la certificación presupuestaria asociada a esta solicitud" class="form-control">
						<option value="" selected>- Seleccione -</option>
						@foreach ($certificacion as $key => $value)
							<option value='{{$value->id}}'>{{$value->nombre_certificado}}</option>
						@endforeach
					</select>
				</div>
                <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Descripción del Objeto de la Contratación</label>
					<textarea class="form-control" required="true" maxlength="3000" name="descripcion" id="textarea" cols="30" rows="10"></textarea>
                </div>
				<div class="form-group col-lg-3">
                    <label for="exampleInputFile">Certificacion Presupuestaria </label>
                    <input type="file" name="c_presupuestaria" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-3">
                    <label for="exampleInputFile">Punto de Cuenta de Inicio</label>
                    <input type="file" name="punto_cuenta" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-3">
                    <label for="exampleInputFile">Estimación de Costo</label>
                    <input type="file" name="e_costo" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-3">
                    <label for="exampleInputFile">Espesificaciones Técnicas</label>
                    <input type="file" name="e_tecnicas" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-4">
                    <label for="exampleInputFile">Forma 018</label>
                    <input type="file" name="forma_018" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-4">
                    <label for="exampleInputFile">Matríz Técnica</label>
                    <input type="file" name="m_tecnica" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-4">
                    <label for="exampleInputFile">Memorandum</label>
                    <input type="file" name="memorandum" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-6">
                    <label for="exampleInputFile">Opinión de Bienes Nacionales</label>
                    <input type="file" name="bienes_nacionales" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				<div class="form-group col-lg-6">
                    <label for="exampleInputFile">Opinión de ASHO</label>
                    <input type="file" name="opinion_asho" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light"><i class="fa fa-check"></i> Guardar</button>
					<a href="{{url('principal')}}" class="btn btn-warning btn-rounded waves-effect waves-light"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                </div>

			</form>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->

@endsection
