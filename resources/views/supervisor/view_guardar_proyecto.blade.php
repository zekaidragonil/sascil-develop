@extends('principal')
@section('view_guardar_proyecto')
		<div class="row small-spacing">
			<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Cargar Plan Operativo Anual (Proyecto)</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" action="{{url('guardar_proyecto')}}">
                        @csrf
                            <div class="form-group col-lg-6">
								<label for="exampleInputEmail1">Unidad Administrativa</label>
                                    <input type="texts" name="numero" maxlength="3" value="{{$numero}}" hidden="true" id="numero" placeholder="Numero del proyecto">
                                <select name="unidad_administrativa" class="form-control">
                                    <option value=''>-Seleccione una unidad-</option>
                                    @foreach ($unidades as $keu=>$value)
                                    <option value='{{$value->id}}'>{{$value->nombre}}</option>
                                    @endforeach
                                </select>
							</div>
                            <div class="form-group col-lg-6">
								<label for="exampleInputEmail1">Proyecto Presupuestario</label>
                                <select name=proyecto_p id="proyecto_p" required class="form-control" >
                                    <option value="" selected>- Seleccione -</option>
                                    @foreach ($denominacion as $key=>$value )
                                        <option value="{{$value->proyecto_presupuestario}}">{{$value->proyecto_presupuestario}}</option>    
                                    @endforeach
                                </select>
								{{-- <input type="text"  name="proyecto_p" class="form-control" maxlength="5" placeholder="Codigo Presupuestario"> --}}
							</div>
							<div class="form-group col-lg-6">
								<label for="exampleInputEmail1">Nombre del Proyecto</label>
								<input type="text" readonly onkeyup="javascript:this.value=this.value.toUpperCase();" name="nombre_proyecto" class="form-control" id="nombre_p" placeholder="Nombre del proyecto">
							</div>

                            <div class="form-group col-lg-6">
                            <label for="exampleInputEmail1">Categoría</label>
                                <select name=categoria required class="form-control" >
                                    <option value="" selected>- Seleccione -</option>
                                    <option value="A">Anual</option>
                                    <option value="PA">Pluri Anual</option>
                                </select>
                            </div>
							<div class="form-group col-lg-6">
							    <label for="exampleInputEmail1">Fuente de Financiemiento</label>
                                {{--<input type="text" name="fuente_finan_poa" onkeyup="javascript:this.value=this.value.toUpperCase();" require class="form-control" placeholder="Ingrese la fuente de Financiamiento del POA">--}}
                                <select name="fuente_finan_poa" required class="form-control" >
                                    <option value="" selected>- Seleccione -</option>
                                    @foreach($fondo as $key=>$value)
                                        <option value="{{$fondo[$key]->id}}">{{$fondo[$key]->fondo}}</option>
                                    @endforeach
                                </select>
                            </div>
							</div>
                            <div class="form-group col-lg-6">
							    <label for="exampleInputEmail1">Monto del Proyecto</label>
                                <input type="text" onkeypress="return SoloNumeros(event)" name="monto" id="monto" maxlength="18" require class="form-control" placeholder="Ingrese monto total del proyecto">
							</div>
                            <div class="form-group col-lg-12">
                            </div>
                            <div class="form-group col-lg-6">
                                <button type="submit" class="btn btn-success btn-rounded btn-sm waves-effect waves-light">Enviar</button>
                            </div>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
			<!-- /.col-lg-6 col-xs-12 -->
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
<script src="assets/scripts/query-git.js"></script>
<script>
    function SoloNumeros(evt){
        if(window.event){//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
        }
        else{
        keynum = evt.which; //FF
        }
        //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
        return true;
        }
        else{
        return false;
        }
    }
    $("#monto").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});
</script>
	<!-- /.main-content -->
@endsection
