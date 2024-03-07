@extends('principal')


@section('content')

<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Actulizacion de de la solicitud</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
                <br>
                <h4 class="box-title">Campos a actualizar </h4>
                <form action="{{ route('solicitud.update', $actualizacion->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-lg-6" style="margin-top: 2rem" >
                        <label for="exampleInputFile"> Lista de viaticos</label>
                        <input  class="dropify" value="{{ $actualizacion->viaticos }}"  name="viaticos"  type="file">
                    </div>
                    <div class="form-group col-lg-6" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Memorándum</label>
                        <input  class="dropify"  name="memorandum"  type="file">
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                    <label>Estatus</label>
					<select name="estatus" id="estatus"  class="form-control">
              <option value="" disabled>- Seleccione -</option>
             <option value="causado" @if($actualizacion->estatus === 'causado') selected @endif>causado</option>
             <option value="rechazado" @if($actualizacion->estatus === 'rechazado') selected @endif>rechazado</option>
         </select>
             </div>
                   
                </div>
                <div class="form-group col-xs-12" style="margin-left:43rem">            
                   <button class="btn btn-success btn-rounded rigth" type="submit">Actualizar<i class="fa fa-check"></i></button>
                </form>
                
            </div>
         
		</div>
		<!-- /.card-content -->
	</div>

</div>

     
  
@endsection



