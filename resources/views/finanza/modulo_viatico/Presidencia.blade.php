@extends('principal')

@section('content')


<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Solicitudes  de viaticos comprometidos</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>Identificador</th>
                    <th>Lista de Viaticos</th>
					<th>memorandum</th>
					<th>Estatus</th>
                    <th>Fecha</th>
                    
                    
                   
				</tr>
			</thead>
			<tfoot>
				<tr>
                   <th>Identificador</th>
					<th>Lista de Viaticos</th>
					<th>memorandum</th>
					<th>Estatus</th>
                    <th>Fecha</th>
                   
              
				</tr>
			</tfoot>
			<tbody>
		  @foreach($solicitud as $soli)
           
				<tr>  
                    <td>{{$soli->identificador}}</td>
					<td><a href="{{ Storage::url($soli->viaticos) }}">{{ basename($soli->viaticos) }}</a></td>
                <td><a href="{{ Storage::url($soli->memorandum) }}">{{ basename($soli->memorandum) }}</a></td>
                 
                   <td>@if($soli->estatus=='comprometido')
							<label for="Estatus" style="color:green">{{$soli->estatus}}</label>
						@endif</td>

                    <td>{{ $soli->created_at->format('d/m/Y') }}</td>
				</tr>

            @endforeach   
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>


@endsection

