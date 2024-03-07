@extends('principal')
@section('lista_presupuestaria')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
        <h4 class="box-title">Solitar Nueva Partida Presupuestaria al Proyecto: <b>{{$proyecto[0]->nombre_proyecto}}</b></h4>
					<!-- /.box-title -->
		<div class="card-content">
            <form action="{{url('agregar_partida')}}"  accept-charset="UTF-8" enctype="multipart/form-data" name="form" method="post">
                @csrf
                <div class="form-group col-lg-4">
                    <input type="text" hidden value="{{$proyecto[0]->id}}" name="id_proyecto">
                    <label for="">Fondo Presupuestario</label>
                    <select class="form-control" name="id_fondo" required name="" id="">
                        <option value="" selected>- Seleccione -</option>
                        @foreach ($fondo as $key => $value)
                            <option value="{{$value->id}}">{{$value->fondo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Código de Partida</label>
                        <select class="form-control" name="id_clasificador_presupuestario" required name="" id="">
                            <option value=""  selected>- Seleccione -</option>
                            @foreach ($clasificador_presupuestario as $key => $value)
                                <option value="{{$value->id}}">{{$value->codigo_partida}} {{$value->descripcion}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group col-lg-4">
                    <label for="">Moneda</label>
                    <select class="form-control" id="id_moneda" name="id_moneda">
                        <option value="">- Seleccionar -</option>
                        @foreach ($divisa as $key => $value)
                            <option value="{{$value->id}}">{{$value->tipo_moneda}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Tasa (Bs)</label>
                    <input type="text" name="tasa" id="tasa" maxlength="7" required onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Monto en Divisa</label>
                    <input type="text" name="monto_divisa" id="monto_divisa" onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Monto (Bs)</label>
                    <input type="text" name="monto_bs" readonly id="monto_bs" onkeypress="return SoloNumeros(event)" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                    <label for="">Adjuntar Punto de Cuenta</label>
                    <input type="file" name="justificacion_solicitud" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                </div>
                <div class="form-group col-lg-4">
                    <button class="btn btn-success btn-rounded" id="agregar" onsubmit="return verificar()" style="margin-top: 30px;">Agregar</button>
                </div>
            </form>
		</div>
    </div>
</div>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Llaves Presupuestarias del Proyecto: {{$proyecto[0]->nombre_proyecto}}</h4>
        <!-- /.box-title -->
        <!-- /.dropdown js__dropdown -->
        <div id="accordion" class="js__ui_accordion">
            <h3 class="accordion-title">Establecidas en el POA</h3>
            <div class="accordion-content">
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre de proyecto</th>
                            <th>Código de la Partida</th>
                            <th>Descripción de la Partída</th>
                            <th>Saldo Disponible</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre de proyecto</th>
                            <th>Código de la Partida</th>
                            <th>Descripción de la Partída</th>
                            <th>Saldo Disponible</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($llave_presupuestaria == true)
                        @foreach ($llave_presupuestaria as $key => $value)
                            <tr>
                            <td>{{$value->nombre_proyecto}}</td>
                            <td>{{$value->codigo_partida}}</td>
                            <td>{{$value->descripcion}}</td>
                            <td align="right">{{number_format($value->saldo_disponible,2,',','.')}}</td>
                        </tr>
                        @endforeach
                        @else

                        @endif
                    </tbody>
                </table>
            </div>
            <h3 class="accordion-title">Solicitud Presupuestaria Adicional</h3>
            <div class="accordion-content">
                <table id="example1" class="table table-striped table-bordered display dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre de proyecto</th>
                            <th>Código de la Partida</th>
                            <th>Descripción de la Partída</th>
                            <th>Fondo</th>
                            <th>Monto</th>
                            <th>Punto de Cuenta</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre de proyecto</th>
                            <th>Código de la Partida</th>
                            <th>Descripción de la Partída</th>
                            <th>Fondo</th>
                            <th>Monto</th>
                            <th>Punto de Cuenta</th>
                            <th>Estatus</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($presupuesto_modificado as $key => $value)
                            <tr>
                            <td>{{$value->nombre_proyecto}}</td>
                            <td>{{$value->codigo_partida}}</td>
                            <td>{{$value->descripcion}}</td>
                            <td>{{$value->fondo}}</td>
                            <td align="right">{{number_format($value->monto,2,',','.')}}</td>
                            <td><a href="{{$value->punto_cuenta}}" target="_blank">Ver Punto</a></td>
                            <td>{{$value->estatus}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box-content -->
</div>
<!--colocar el script para activar el modal de forma automatica-->
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
$("#tasa").on({
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
$("#monto_divisa").on({
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
    $('#monto_divisa').blur(function(){
        var valor1 = $('#monto_divisa').val().replace('.','').replace(',','.');
        var valor2 = $('#tasa').val().replace('.','').replace(',','.');
        var monto = parseFloat(valor1).toFixed(2);
        var tasa = parseFloat(valor2).toFixed(2);
        var valor = monto * tasa;
        var total = valor.toFixed(2);

        //console.log('hola',valor);
        var aux = total.toString();
        var monto_bs = aux.replace('.',',');
        $('#monto_bs').val(monto_bs);
        
    });
});

$(document).ready(function(){
    $('#id_moneda').click(function(){
        //console.log($('#id_moneda').val());
        if ($('#id_moneda').val() == '4') {
            //console.log('llegue');
            $('#tasa').val('1,00');
            $('#tasa').prop('readonly', true);
        }
    });
});

</script>
@endsection
