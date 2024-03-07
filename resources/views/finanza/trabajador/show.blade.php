@extends('principal')


@section('content')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Rendicion del trabajador</h4>
        <div class="card-content">
            <div class="form-group col-xs-12">
                <br>
                <h4 class="box-title">Reporte de viaticos </h4>

                 
                <form action="{{route('rendicion.store', ['id' => $trabajador->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="trabajador_id" value="{{ $trabajador->id }}">
                    <div class="form-group col-lg-12" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Facturas</label>
                        <input required class="dropify" name="facturas" type="file" multiple>
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Monto total Asignado </label>
                        <input class="form-control" name="monto_asignado" disabled type="number" value="{{ $suma }}">
                        <input type="hidden" name="monto_asignado" value="{{$suma}}">
                    </div>
                    <div class="form-group col-lg-3" style="margin-top: 2rem">
                        <label for="exampleInputFile"> Monto total de la facturas </label>
                        <input require class="form-control" name="monto_factura" type="number">
                        
                    </div>
                    <h1>  </h1>
                        <!-- Mostrar campos de cuenta bancaria y cantidad a pagar -->
                        <div class="form-group col-lg-3" style="margin-top: 2rem">
                            <label for="exampleInputFile"> Cuenta Bancaria </label>
                            <input class="form-control" disabled name="cuenta_bancaria" type="number"  value="2535525652112515">
                            <input type="hidden" name="cuenta_bancaria" value="256352524121512152">
                        </div>
                        <div class="form-group col-lg-3" style="margin-top: 2rem">
                            <label for="exampleInputFile"> Monto Faltante </label>
                            <input class="form-control" name="Cantidad_faltante" type="number">
                        </div>
                        <!-- Campo de observación -->
                        <div class="form-group col-lg-12" style="margin-top: 2rem">
                            <label for="exampleInputFile"> Observación </label>
                            <textarea class="form-control" name="observacion"></textarea>
                        </div>
                  
                    <div class="form-group col-xs-12 " style="margin-left: 43rem;">
                        <button class="btn btn-success btn-rounded right" type="submit">Enviar <i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(session('factura'))
    <div class="alert alert-success text-center"  id="success-alert">
        {{ session('factura') }}
    </div>
@endif


<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Registro de facturas </h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
				
					<th>Nombre</th>
                    <th>Cedula</th>
					<th>factura</th>
                    <th>monto total</th>
                    <th>Observacion</th>
                    
                   
				</tr>
			</thead>
			<tfoot>
				<tr>
               
				    <th>Nombre</th>
                    <th>Cedula</th>
					<th>factura</th>
                    <th>monto total</th>
                    <th>Observacion</th>
              
				</tr>
			</tfoot>
			<tbody>
            @foreach ($rendicion as $rendi)
    <tr>
        <td>{{ $rendi->trabajador->nombre }}</td>
        <td>{{ $rendi->trabajador->ci }}</td>
          <td><a href="{{ Storage::url($rendi->facturas) }}">{{basename($rendi->facturas)}}</a></td>
          <td>{{$rendi->monto_factura}}</td>
          <td>{{$rendi->observacion}}</td>
    </tr>
    
@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>







@endsection


<script>
    
setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 8000); 

</script>