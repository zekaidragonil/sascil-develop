@extends('principal')
@section('modificacion_presupuestaria')
<form action="{{url('actualizar_presupuesto')}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
    @csrf
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Solicitud para Modificar el Presupuesto</h4>
        <!-- /.box-title -->
        
            <div class="card-content col-12">
                <div class="form-group col-lg-6 col-xs-12 col-md-6">
                    <label for="proyecto">Proyecto</label>
                    <input type="text" name="proyecto" readonly value="{{$data['proyecto']}}" id="proyecto" class="form-control">
                    <input type="text" hidden name="presupuesto" value="{{$data['id_presupuesto']}}" id="id_presupuesto">
                </div>
                <div class="form-group col-lg-6 col-xs-12 col-md-6">
                    <label for="area funcional">Area Funcional</label>
                    <input type="text" name="proyecto_presupuestario" readonly value="{{$data['proyecto_presupuestario']}}" id="proyecto_presupuestario" class="form-control">
                </div>
                <div class="form-group col-lg-6 col-xs-12 col-md-6">
                    <label for="monto de la partida">Fondo</label>
                    <select class="select2_2 form-control" id="fondo" name="fondo" required>
                        @foreach ($fondo as $key => $value)
                            @if ($data['id_fondo']==$fondo[$key]->id)
                                <option selected value="{{$value->id}}">{{$value->fondo}}</option>      
                            @else
                                <option value="{{$value->id}}">{{$value->fondo}}</option> 
                            @endif
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group col-lg-6 col-xs-12 col-md-6">
                    <label for="area funcional">Codigo de la Partida</label>
                    <input type="text" name="codigo_partida" readonly value="{{$data['codigo_partida']}}" id="id_codigo_partida" class="form-control">
                    <input type="text" name="id_codigo_partida" hidden="true" value="{{$data['id_codigo_partida']}}">
                </div>
                <div class="form-group col-lg-6 col-xs-12 col-md-6">
                    <label for="seleccionar partidas">Monto</label>
                    <input type="text" id="monto_partida" name="monto_partida" value="{{number_format($data['monto_partida'],2,',','.')}}" class="form-control">
                </div>
                <div class="form-group col-lg-12 col-xs-12 col-md-12">
                    <label for="punto_cuenta">Adjuntar punto de cuenta de Aprobación Financiera</label>
                    <input type="file" name="punto_cuenta" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                </div>
            </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>


<div class="col-lg-6 col-xs-12">
    <a href="{{url('presupuestaria')}}" class="btn btn-default btn-rounded btn-sm waves-effect waves-light"> <i class="fa fa-arrow-left"></i> Regresar</a>
    <button type="submit" class="btn btn-success btn-rounded btn-sm waves-effect waves-light"> Solicitar <i class="fa fa-check"></i></button>
</div>

</form>
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/jquery-3.2.1.js"></script>
<script src="assets/scripts/min.js"></script>
<script>
    $("#monto_partida").on({
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
@endsection