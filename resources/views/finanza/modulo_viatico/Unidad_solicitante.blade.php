@extends('principal')


@section('content')

<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Solicitud de viáticos</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
                <br>
                <h4 class="box-title">Información para la solicitud de viáticos</h4>
                <form action="{{route('unidad.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group col-lg-6" style="margin-top: 2rem" >
                        <label for="exampleInputFile"> Lista de viaticos</label>
                        <input required  class="dropify" id="input-file-now" name="viaticos"  type="file">
                         </div>

                    <div class="form-group col-lg-6" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Memorándum</label>
                        <input required  class="dropify" id="input-file-now"  name="memorandum"  type="file">
                    </div>
                  
					<input  class="form-control"  name="estatus"  type="hidden" value="comprometido">
                   
                </div>
                <div class="form-group col-xs-12" style="margin-left:43rem">            
                   <button class="btn btn-success btn-rounded rigth" type="submit">Enviar <i class="fa fa-check"></i></button>
                </form>
                
            </div>
         
		</div>
		<!-- /.card-content -->
      </div>  
</div>
@if(session('success'))
    <div class="alert alert-success text-center"  id="success-alert">
        {{ session('success') }}
    </div>
@endif

<div class="col-xs-12">		
  <h4>Consulta de solitudes </h4>
	<div class="box-content">
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
						@if($soli->estatus=='comprometido')
							<label for="Estatus" style="color:green">{{$soli->estatus}}</label>
						@endif
						@if($soli->estatus=='causado')
                            <label for="Estatus" style="color:steelblue">{{$soli->estatus}}</label>
                        @endif
                        @if($soli->estatus=='pagado')
                        	<label for="Estatus" style="color:rgb(128, 0, 0)">{{$soli->estatus}}</label>
						@endif
                        @if($soli->estatus=='rechazado')
                        	<label for="Estatus" style="color:rgb(128, 5, 6)">{{$soli->estatus}}</label>
						@endif
                    </td>

                    <td>{{ $soli->created_at->format('d/m/Y') }}</td>
					<td><a href="{{ route('actualizar', ['id' => $soli->id]) }}" class="btn btn-info btn-circle waves-effect waves-light edit-btn">
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
 
	setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 8000); // Desaparecerá después de 5 segundos (5000 milisegundos)
});


</script>