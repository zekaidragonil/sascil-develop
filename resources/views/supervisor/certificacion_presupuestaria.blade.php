@extends('principal')
@section('certificacion_presupuestaria')
{{--actualizar formato para actualizar la certificacion presupuestaria--}}
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Asignar Certificaciones Presupuestarias</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
        <div  class="box-content table-responsive">
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th style="width: 15%" title="numero de la certifiación">N° Solicitud</th>
					{{-- <th>Código de Proyecto</th> --}}
					{{-- <th>Nombre del Proyecto</th> --}}
					<th>Unidad</th>
                    <th>Estatus</th>
					<th>Observaciones</th>
					<th style="width: 15%">Seleccionar Analista</th>
					<th style="width: 12%"><center>Ver / Asignar</center></th>
                </tr>
			</thead>
			<tfoot>
				<tr>
                    <th title="numero de la certifiación">N° Cert.</th>
					{{-- <th>Código de Proyecto</th> --}}
					{{-- <th>Nombre del Proyecto</th> --}}
					<th>Unidad</th>
                    <th>Estatus</th>
					<th>Observaciones</th>
                    <th>Seleccionar Analista</th>
					<th><center>Ver / Asignar</center></th>
                </tr>
			</tfoot>
			<tbody>
                @if($certificacion!=null)
				@foreach ($certificacion as $key => $value)
				<tr>
				<form action="{{url('editar_estatus_certificado')}}" method="POST">
                    @csrf
					
					<td>{{$value->nombre_solicitud}}<input type="text" hidden name="id_certificacion" value="{{$value->id}}"></td>

					{{-- <td>{{$value->proyecto_presupuestario}}</td> --}}
					{{-- <td>{{$value->nombre_proyecto}}<input type="text" hidden name="id_presupuesto" value="{{$value->id}}"></td> --}}
					<td>{{$value->nombre}}<input type="text" hidden name="id_unidad" value="{{$value->id_unidad}}"></td>
					<td>{{$value->observaciones}}</td>				
					<td>
						@if($value->estatus=='Aprobado')
							<label style="color:green">{{$value->estatus}}</label>
						@endif
						@if($value->estatus=='En Transito')
							<label style="color:yellowgreen">{{$value->estatus}}</label>
						@endif
						@if($value->estatus=='Rechazado')
							<label style="color:red">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='Revisado')
							<label style="color:orange">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='Reversado')
							<label style="color:grey">{{$value->estatus}}</label>
						@endif
					</td>
					<td>
						<select class="form-control" style="width: 100%" required id="analista" name="analista">
							<option value="" selected>- Seleccione -</option>
							@foreach ($analistas as $key => $value1)
								<option value="{{$value1->id}}">{{$value1->nombre}} {{$value1->apellido}}</option>
							@endforeach
						</select>
					</td>
					<td  align="center">
						<a href="{{$value->adjunto}}" target="_blank" class="btn btn-circle btn-info"><i class="ico icon-search"></i></a><img src="assets/images/slash.png" width="20%" alt=""><button type="submit" id="asignar" class="btn btn-circle btn-success"><i class="fa fa-check"></i></button>
					</td>
				</form>
				</tr>
				@endforeach
                @endif
			</tbody>
		</table>
        </div>
	</div>
	<!-- /.box-content -->
</div>
<script>

</script>
@endsection
