@extends('principal')



@section('content')



<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Solicitudes  de viaticos Aprobados</h4>
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
						@if($soli->estatus=='causado')
							<label for="Estatus" style="color:green">{{$soli->estatus}}</label>
						@endif
						
                    </td>

                    <td>{{ $soli->created_at->format('d/m/Y') }}</td>
					 <td><input type="checkbox"></td>
				</tr>

            @endforeach   
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>



@include('finanza.modulo_viatico.trabajadores')



<div class="col-lg-12 col-xs-12">
  <div class="box-content card white">
     <h4 class="box-title">Asignación de viaticos</h4>
		<!-- /.box-title -->
      <div class="card-content" >
        <div class="form-group col-xs-12">
            <br>
        <h4 class="box-title"> </h4>
        <form action="{{route('viaticos')}}" method="post" enctype="multipart/form-data" >
             @csrf
             <input type="hidden" name="trabajador_id" id="trabajador_id" value="">
             <input type="hidden" name="identificadorSeleccionado" id="identificadorSeleccionado" value="">

             <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label>Número de Cédula</label>
        <input class="form-control" type="text" id="cedula" required>
    </div>
             <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label>Nombre </label>
        <input class="form-control" type="text" id="nombre" disabled >
    </div>
             <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label>Apellido</label>
        <input class="form-control"  type="text" id="apellido"  disabled>
    </div>
     <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label>Estatus de viatico</label>
		 <select name="estatus" id="estatus" required class="form-control">
			<option values=""  selected="true">- Seleccione -</option>
			<option values="Conpernota">Conpernota</option>
			<option values="Sinpernota">Sinpernota</option>						
		</select>
         </div>
		 <div class="conpernota" style="display:none">
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="traslado"> Traslado </label>
        <input  class="form-control" name="trasladoConpernota" type="number">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="Alojamiento"> Alojamiento </label>
        <input  class="form-control" name="alojamientoConpernota" type="number">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="Alimentacion"> Alimentacion </label>
        <input  class="form-control" name="alimentacionConpernota" type="number">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="dias"> Desde </label>
        <input  class="form-control" name="Cdesde" type="date">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="dias"> hasta </label>
        <input  class="form-control" name="Chasta" type="date">
    </div>
</div>

<div class="sinpernota" style="display:none">
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="traslado"> Traslado </label>
        <input  class="form-control" name="trasladoSinpernota" type="number">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="Alimentacion"> Alimentacion </label>
        <input  class="form-control" name="alimentacionSinpernota" type="number">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="dias"> Desde </label>
        <input  class="form-control" name="Sdesde" type="date">
    </div>
    <div class="form-group col-lg-3" style="margin-top: 2rem">
        <label for="dias"> hasta </label>
        <input  class="form-control" name="Shasta" type="date">
    </div>
  </div>			
      
        <div class="form-group col-xs-12" style="margin-left:30rem">   
       <button class="btn btn-success btn-rounded rigth" id="submit-button" >Registrar<i class="fa fa-check"></i></button>  
		</div>
        </form>
        </div>
      </div>
  </div>
</div>
@if(session('viatico'))
    <div class="alert alert-success text-center"  id="success-alert">
        {{ session('viatico') }}
    </div>
@endif


<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Trabajadores</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>identificador de viaticos</th>
					<th>Nombre</th>
                    <th>Cedula</th>
					<th>Desde</th>
                    <th>Hasta</th>
                    <th>Opcion</th>
                    
                   
				</tr>
			</thead>
			<tfoot>
				<tr>
                <th>identificador de viaticos</th>
					<th>Nombre</th>
                    <th>Cedula</th>
					<th>Desde</th>
                    <th>Hasta</th>
                    <th>Opcion</th>
              
				</tr>
			</tfoot>
			<tbody>
            @foreach ($asignaciones as $asignacion)
    <tr>
        <td>{{ $asignacion->identificador }}</td>
        <td>{{ $asignacion->trabajador->nombre }}</td>
        <td>{{ $asignacion->trabajador->ci }}</td>
        
        @if ($asignacion->Chasta === '' || $asignacion->Cdesde === '')
            <td>{{ $asignacion->Shasta ? $asignacion->Shasta->format('d/m/Y') : '' }}</td>
            <td>{{ $asignacion->Sdesde ? $asignacion->Sdesde->format('d/m/Y') : '' }}</td>
        @else
            <td>{{ $asignacion->Chasta ? \Carbon\Carbon::parse($asignacion->Chasta)->format('d/m/Y') : '' }}</td>
            <td>{{ $asignacion->Cdesde ? \Carbon\Carbon::parse($asignacion->Cdesde)->format('d/m/Y') : '' }}</td>
        @endif
        <td><a href="{{route('show', $asignacion->trabajador->id)}}" class="btn btn-info btn-circle waves-effect waves-light edit-btn"><i class="fa fa-user"></i></a></td>
    </tr>
    
@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>



@endsection


<script>
document.addEventListener('DOMContentLoaded', function() {
   const checkboxes = document.querySelectorAll('input[type="checkbox"]');
   const identificadorSeleccionado = document.getElementById('identificadorSeleccionado');
   const usuariosContainer = document.getElementById('usuariosContainer');
   const Estatus = document.querySelector('#estatus');
   const conpernota = document.querySelector('.conpernota');
   const sinpernota = document.querySelector('.sinpernota');
   const cedulaInput = document.getElementById("cedula");
   const nombreInput = document.getElementById("nombre");
   const apellidoInput = document.getElementById("apellido");
   const id = document.getElementById("trabajador_id");
   const submitButton = document.getElementById("submit-button");

Estatus.addEventListener('change', function() {
    const cambio  =  Estatus.value;
	
	 if( cambio === 'Conpernota'){
		conpernota.style.display = 'block';
		sinpernota.style.display = 'none';

	 }else if (cambio === 'Sinpernota'){
		conpernota.style.display = 'none';
        sinpernota.style.display = 'block';
	 }else {
            conpernota.style.display = 'none';
            sinpernota.style.display = 'none';
        }
  })


 // funcion de checkbox 
   checkboxes.forEach(function(checkbox) {
       checkbox.addEventListener('change', function() {
           if (this.checked) {
               checkboxes.forEach(function(otherCheckbox) {
                   if (otherCheckbox !== checkbox) {
                       otherCheckbox.checked = false; 
                   }
               });

               const identificador = this.closest('tr').querySelector('td:first-child').textContent;
               identificadorSeleccionado.value = identificador;
			  
           } else {
               
               identificadorSeleccionado.value = '';
           }
       });
   });
   

 // agregar la cedula  
      cedulaInput.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Evita el envío predeterminado del formulario

                const cedula = cedulaInput.value;
                $.ajax({
                    url: `/buscar-trabajador/${cedula}`,
                    type: "GET",
                    headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
                   },
                    success: function (data) {
                        if (data.length > 0) {
                 const trabajador = data[0]; 
               if (trabajador.nombre && trabajador.apellido && trabajador.id) {
                 nombreInput.value = trabajador.nombre;
                 apellidoInput.value = trabajador.apellido;
                 trabajador_id.value = trabajador.id;
           } else {
             alert("El trabajador encontrado no tiene nombre o apellido.");
            }
          } else {
          alert("No se encontró ningún trabajador con esa cédula.");
           }
         },
        });
    }
      

});

setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 8000); 
});
</script>
