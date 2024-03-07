@extends('principal')


@section('content')

 <style>
    
    .ajustar{
       float: right;
       margin-top: -150px;
    
    }

 </style>


<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Actulizacion de de la solicitud</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
                <br>
                <h4 class="box-title">Campos a actualizar </h4>
                <form action="{{ route('finanza.update', $actualizacion->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-lg-3" style="margin-top: 2rem" >
                        <label for="exampleInputFile"> Lista de viaticos</label>
                        <input  class="form-control" value="{{ basename($actualizacion->viaticos) }}"  name="viaticos"  type="file">
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Memorándum</label>
                        <input  class="form-control"  name="memorandum"  type="file">
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                    <label>Estatus</label>
					<select name="estatus" id="estatus"  class="form-control">
            <option value="" disabled>- Seleccione -</option>
          <option value="TERMINADO" @if($actualizacion->estatus === 'TERMINADO') selected @endif>TERMINADO</option>
          <option value="CONTRATO FIRMADO" @if($actualizacion->estatus === 'CONTRATO FIRMADO') selected @endif>CONTRATO FIRMADO</option>
        <option value="DEVUELTO" @if($actualizacion->estatus === 'DEVUELTO') selected @endif>DEVUELTO</option>
      <option value="DESIERTO" @if($actualizacion->estatus === 'DESIERTO') selected @endif>DESIERTO</option>
       <option value="REVISION" @if($actualizacion->estatus === 'REVISION') selected @endif>REVISION</option>
      <option value="ADJUDICADO" @if($actualizacion->estatus === 'ADJUDICADO') selected @endif>ADJUDICADO</option>
                </select>
                    </div>
                   
                </div>
                <div class="form-group col-xs-12" style="margin-left:30rem">            
                   <button class="btn btn-success btn-rounded rigth" type="submit">Actualizar<i class="fa fa-check"></i></button>
                </form>
                
            </div>
         
		</div>
		<!-- /.card-content -->
	</div>

</div>

     

@endsection



