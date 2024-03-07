@extends('principal')
@section('asignar_traspaso')
{{--actualizar formato para actualizar la certificacion presupuestaria--}}
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Asignar Solicitud de Traspaso</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
        <div  class="box-content table-responsive">
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>N°</th>
					<th>Solicitud</th>
                    <th>Concepto</th>
					<th>Unidad</th>
					<th>Siglas</th>
					<th>Estatus</th>
                    <th style="width: 30%">Analista</th>
                    <th style="width: 10%"><center>Asignar <img src="assets/images/slash.png" width="10%" alt=""> Ver</center></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
                    <th>N°</th>
					<th>Solicitud</th>
                    <th>Concepto</th>
					<th>Unidad</th>
					<th>Siglas</th>
					<th>Estatus</th>
                    <th style="width: 30%">Analista</th>
                    <th><center>Asignar <img src="assets/images/slash.png" width="10%" alt=""> Ver</center></th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($lista as $key => $value)
				<tr>
                    <form action="{{url('asignar_traspaso_analista')}}" method="post">
					@csrf
					<td><input name="id" value="{{$value->id}}" hidden type="text">{{$key+1}}</td>
					<td>{{$value->solicitud_traspaso}}</td>
					<td>{{$value->concepto}}</td>
					<td>{{$value->nombre}}</td>
					<td>{{$value->siglas_cert}}</td>
					<td>{{$value->estatus}}</td>
                    <td style="width: 10%">
                        <select class="col-lg-3 form-control" required style="width: 100%" name="analista" id="">
                            <option value="" selecte>- Seleccionar -</option>
                            @foreach ($usuario as $key => $value1)
                                <option value="{{$value1->id}}">{{$value1->nombre}} {{$value1->apellido}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td align="center"><button type="submit" name="but1" value='0' class="btn btn-circle btn-success"><i class="fa fa-check"></i></button>
					<img src="assets/images/slash.png" width="10%" alt="">
					<a class="btn btn-circle btn-info" href="javascript:void(0);" onclick="javascript:window.open('{{$value->memorandum_traspaso}}', '_blank'); window.open('{{$value->solicitud_credito_presupuestario}}', '_blank'); "><i class="fa fa-search"></i></a>
					{{-- <button type="submit" name="but1" value='1' class="btn btn-circle btn-info"><i class="fa fa-search"></i></button> --}}
					</td>
                    </form>
				</tr>
				@endforeach
			</tbody>
		</table>
        </div>
	</div>
	<!-- /.box-content -->
</div>
			<!-- /.col-xs-12 -->
@endsection
