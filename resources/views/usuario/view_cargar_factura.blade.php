@extends('principal')
@section('view_cargar_factura')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Carga de Factura o Recino de Anticipo</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<form action="{{url('cargar')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
				<div class="form-group col-lg-4">
					<label for="exampleInputEmail1">Número del Instrumento Legal</label>
					<select name="id_contrato"  id="id_contrato" required title="Seleccione el código de la certificación presupuestaria asociada a esta solicitud" class="form-control">
						<option value="" selected>- Seleccione -</option>
						@foreach ($instrumento as $key => $value)
							<option value='{{$value->id_inst}}'>{{$value->numero}}</option>
						@endforeach
					</select>
				</div>
                <div class="form-group col-lg-4">
					<label for="exampleInputEmail1">Tipo de Documento de Pago</label>
					<select name="tipo_factura" id="tipo_factura" required title="Seleccione el código de la certificación presupuestaria asociada a esta solicitud" class="form-control">
						<option value="" selected>- Seleccione -</option>
						{{-- <option value="1">Anticipo</option>
                        <option value="2">Factura</option> --}}
					</select>
				</div>
                <div class="form-group col-lg-4">
                    <label for="">Monto</label>
                    <input class="form-control" type="text" id="monto_factura" name="monto_factura" onkeypress="return SoloNumeros(event)"> 
                </div>
				<div style="display: none" id="factura" class="form-group col-lg-12">
                    <label for="exampleInputFile">Adjuntar Factura</label>
                    <input type="file" name="adj_factura" accept=".pdf"  class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
                <div style="display: none" id="anticipo" class="form-group col-lg-12">
                    <label for="exampleInputFile">Adjuntar Documento de Anticipo</label>
                    <input type="file" name="adj_anticipo" accept=".pdf"  class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
				</div>
				
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light"><i class="fa fa-check"></i> Guardar</button>
					<a href="{{url('principal')}}" class="btn btn-warning btn-rounded waves-effect waves-light"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                </div>
			</form>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
</div>
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/jquery-3.2.1.js"></script>
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
    $("#monto_factura").on({
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
    $(document).ready(function(){
        $('#tipo_factura').change(function(){
            if ($('#tipo_factura').val()==1){
                
                $('#anticipo').show();
                $('#adj_anticipo').prop('required',true);
                
                $('#factura').hide();
                $('#adj_factura').prop('required',false);


            } else {
                $('#anticipo').hide();
                $('#adj_anticipo').prop('required',false);
                
                $('#factura').show();
                $('#adj_factura').prop('required',true);
            }
        });
    });

</script>
@endsection