@extends('principal')
@section('alianzas_solicitadas')

<div class="col-lg-12">
	<div class="box-content">
		<h4 class="box-title">Listado de Solicitudes de Alianzas</h4>
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>N°</th>
					<th style="width: 12%">N° Solicitud</th>
					<th>Fecha de Solicitud</th>
					<th>N°Punto de Cuenta</th>
					<th>Fecha Punto de Cuenta</th>
                    <th>Estatus</th>
					<th style="width: 15%">Ver Solicitud</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>N°</th>
					<th style="width: 12%">N° Solicitud</th>
					<th>Fecha de solicitud</th>
					<th>N° Punto de Cuenta</th>
					<th>Fecha Punto de Cuenta</th>
                    <th>Estatus</th>
					<th style="width: 15%">Ver Solicitud</th>
				</tr>
			</tfoot>
			<tbody>
                @foreach ($lista_alianza as $key => $value)
                    <tr>
						@if (session('id_perfil')==5)
							<form action="{{url('view_revision_solicitud_alianza')}}" method="post">	
						@endif
						{{-- @if (session('id_perfil')==5)
							<form action="{{url('view_revision_solicitud_alianza_recepcion')}}" method="post">
						@endif --}}
                       
                            @csrf
                            <td>{{$value->id}}</td>
							<td>{{$value->solicitud_alianza}}</td>
							<td>{{$value->fecha_solicitud}}</td>
							<td>{{$value->numero_punto}}</td>
							<td>{{date('d-m-Y h:i:s',strtotime($value->fecha_punto))}}</td>
                            <td>{{$value->estatus}}</td>
                            <td>
                                <input type="text" name="id" hidden="true" value="{{$value->id}}">
                                <button input="submit" class="btn btn-success btn-circle"><i class="fa fa-search"></i></button>
                            </td>
                        </form>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>

@endsection