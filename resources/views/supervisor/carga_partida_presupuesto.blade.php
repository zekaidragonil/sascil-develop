@extends('principal')
@section('carga_partida_presupuesto')
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Agregar Partida Presupuestaria al <u>{{$monto_proyecto->nombre_proyecto}}</u></h4>
        <div class=" col-xs-12">
            <div class="box-content card white">
                <!-- /.box-title ordenar los campos de seleccion, guardar las partidas de acuerdo al monto total del proyecto -->
                <div class="card-content">
                    <form action="{{url('presupuesto')}}" method="POST">
                    @csrf
                    <ul class="list-inline margin-bottom-0">
                        <li class="form-group col-md-6 col-sm-12 col-lg-3">
                            <label>Posición Presupuestaria</label>
                            <div class="form-group ">
                                <select name="id_clasificador_presupuestario" class="form-control">
                                    <option select value="">-Seleccione-</option>
                                    @foreach ($clasificador_presupuestario as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->codigo_partida}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="form-group col-md-6 col-sm-12 col-lg-3">
                            <div class="form-group ">
                                <label>Fuente de Financiamiento</label>
                                <select readonly="true" name="fondo" class="form-control">
                                    <option selected value="{{$monto_proyecto->id_fondo}}">{{$monto_proyecto->fondo}}</option>
                                </select>
                            </div>
                        </li>
                        <li class="form-group col-md-6 col-sm-12 col-lg-3">
                            <label>Monto a Asignar</label>
                            <input type="text" onkeypress="return SoloNumeros(event)" maxlength="10" id="monto" class="form-control" name="monto" >
                            <input type="text" hidden="true" name="id_unidad" value="{{$id_unidad}}">
                            <input type="text" hidden="true" name="id_proyecto" value="{{$monto_proyecto->id}}">
                        </li>
                        <li class="form-group col-md-6 col-sm-12 col-lg-3">
                            <button type="submit" class="btn btn-success waves-effect waves-light" style="margin-top: 32px;">Agregar</button>
                        </li>
                    </ul>
                    </form>
                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>
    </div>
    <!-- /.box-content -->
</div>
@if($consulta_partida != [])
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Partidas Presupuestarias Asignadas</h4>

        <p><strong class="text-info"></strong> Total del monto del proyecto: <b>{{number_format($monto_proyecto->monto_proyecto,2,',','.')}} Bs</b>, total por asignar: <b>{{number_format($monto_proyecto->monto_proyecto-$asignado,2,',','.')}} Bs</b></p>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Codigo de la Partida</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consulta_partida as $value)
                    <tr>
                        <td>{{$value->codigo_partida}}</td>
                        <td>{{$value->descripcion}}</td>
                        <td>{{number_format($value->monto,2,',','.')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <p><strong class="text-info">Note:</strong> Todas las partidas estan asociadas a este proyecto </p>
    </div>
    <!-- /.box-content -->
</div>
@endif
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
@endsection
