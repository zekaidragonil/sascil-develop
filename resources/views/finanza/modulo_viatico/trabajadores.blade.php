 <style>
  .hidden{
    display: none;
  }
 </style>

<div class="col-lg-12 col-xs-12">
  <div class="box-content card white">
     <h4 class="box-title">Registro de trabajadores <button type="button" class="btn btn-success btn-rounded" id="toggleButton">  
      <i class="fa fa-plus"> </i>
        </button></h4>
		<!-- /.box-title -->
      <div class="card-content hidden" >
        <div class="form-group col-xs-12">
            <br>
        <h4 class="box-title">Agregar trabajador  </h4>
        <form action="{{route('trabajador')}}" method="post" enctype="multipart/form-data" >
             @csrf
           <div class="form-group col-lg-3" style="margin-top: 2rem">
             <label for="exampleInputFile"> Nombre</label>
            <input required class="form-control" name="nombre" type="text">
          </div>
        <div class="form-group col-lg-3" style="margin-top: 2rem">
            <label for="exampleInputFile"> Apellido</label>
            <input required class="form-control" name="apellido" type="text">
        </div>
        <div class="form-group col-lg-3" style="margin-top: 2rem">
            <label for="exampleInputFile"> Cedula</label>
            <input required class="form-control" name="ci" type="text">
        </div>
        <div class="form-group col-lg-3" style="margin-top: 2rem">
            <label for="exampleInputFile"> Cuenta bancaria</label>
            <input required class="form-control" name="cuenta_bancaria" type="text">
        </div>
        <div class="form-group col-lg-4" style="margin-top: 2rem">
            <label for="exampleInputFile"> Referencia bancaria </label>
            <input required class="dropify" name="referencia_bancaria" type="file">
        </div>
        <div class="form-group col-lg-4" style="margin-top: 2rem">
            <label for="exampleInputFile"> Copia del carnet </label>
            <input required class="dropify" name="carnet" type="file">
        </div>
        <div class="form-group col-lg-4" style="margin-top: 2rem">
            <label for="exampleInputFile"> Copia de la cedula </label>
            <input required class="dropify" name="cedula_copias" type="file">
        </div>
        <div class="form-group col-xs-12" style="margin-left:30rem">   
                    <button class="btn btn-success btn-rounded rigth" id="submit-button" type="submit">Registrar<i class="fa fa-check"></i></button>  
		</div>
        </form>
        </div>
      </div>
  </div>
</div>
@if(session('error'))
    <div class="alert alert-danger text-center" id="success-alert">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success text-center"  id="success-alert">
        {{ session('success') }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleButton');
    const hiddenElement = document.querySelector('.hidden');

    toggleButton.addEventListener('click', function () {
        if (hiddenElement) {
            hiddenElement.classList.toggle('hidden');
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