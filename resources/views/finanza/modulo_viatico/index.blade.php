@extends('principal')


@section('content')

 <style>
    .hidden{
        display: none
    }
    .ajustar{
       float: right;
       margin-top: -150px;
    
    }

 </style>


<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Solicitud de viáticos</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
                <br>
                <h4 class="box-title">Información para la solicitud de viáticos</h4>
                <form action="{{route('finanza.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group col-lg-3" style="margin-top: 2rem" >
                        <label for="exampleInputFile"> Lista de viaticos</label>
                        <input required class="form-control"  name="viaticos"  type="file">
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Memorándum</label>
                        <input required class="form-control"  name="memorandum"  type="file">
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                    <label>Estatus</label>
					<select name="estatus" id="estatus" required class="form-control">
						<option values=""  selected="true">- Seleccione -</option>
						<option values="TERMINADO">TERMINADO</option>
						<option values="CONTRATO FIRMADO">CONTRATO FIRMADO</option>
						<option values="DEVUELTO">DEVUELTO</option>
						<option values="DESIERTO">DESIERTO</option>
						<option values="REVISION">REVISION</option>
						<option values="ADJUDICADO">ADJUDICADO</option>
					</select>
                    </div>
                   
                </div>
                <div class="form-group col-xs-12" style="margin-left:30rem">            
                   <button class="btn btn-success btn-rounded rigth" type="submit">Enviar <i class="fa fa-check"></i></button>
                </form>
                
            </div>
         
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
    <div class="form-group col-lg-3 ajustar" >
        <button type="button" class="btn btn-success btn-rounded" id="toggleButton">
           Consulta de solicitudes
        </button>
    </div>
</div>
<div class="col-xs-12 hidden">
	<div class="box-content">
		<h4 class="box-title">Lista de Solicitudes de viaticos</h4>
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
                    <th>Opcion</th>
                    
                   
				</tr>
			</thead>
			<tfoot>
				<tr>
                   <th>Identificador</th>
				   <th>Lista de Viaticos</th>
					<th>memorandum</th>
					<th>Estatus</th>
                    <th>Fecha</th>
                    <th>Opcion</th>
              
				</tr>
			</tfoot>
			<tbody>
		  @foreach($solicitud as $soli)

				<tr>  
                    <td>{{$soli->identificador}}</td>
					<td><a href="{{ Storage::url($soli->viaticos) }}">{{ basename($soli->viaticos) }}</a></td>
                <td><a href="{{ Storage::url($soli->memorandum) }}">{{ basename($soli->memorandum) }}</a></td>
                 
                   <td>
						@if($soli->estatus=='TERMINADO')
							<label for="Estatus" style="color:green">{{$soli->estatus}}</label>
						@endif
						@if($soli->estatus=='CONTRATO FIRMADO')
                            <label for="Estatus" style="color:steelblue"></label>Revisado
                        @endif
                        @if($soli->estatus=='DEVUELTO')
                        	<label for="Estatus" style="color:rgb(128, 0, 0)">{{$soli->estatus}}</label>
						@endif
						@if($soli->estatus=='REVISION')
                        	<label for="Estatus" style="color:rgb(202, 195, 0)">{{$soli->estatus}}</label>
						@endif
						@if($soli->estatus=='ADJUDICADO')
                        	<label for="Estatus" style="color:rgb(84, 218, 144)">{{$soli->estatus}}</label>
						@endif
                    </td>

                    <td>{{ $soli->created_at->format('d/m/Y') }}</td>
					<td><a href="{{ route('finanza.show', ['id' => $soli->id]) }}" class="btn btn-info btn-circle waves-effect waves-light edit-btn">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                    </a></td>
				</tr>

            @endforeach   
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>
 

     

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleButton');
    const hiddenElement = document.querySelector('.hidden');

    toggleButton.addEventListener('click', function () {
        if (hiddenElement) {
            hiddenElement.classList.toggle('hidden');
        }
    });

});
</script>