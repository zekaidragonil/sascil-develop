@extends('principal')
@section('lista_presupuestaria_unidad')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Modificaciones Presupuestarias</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            </div>
                <div class="col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">Lista de Modificaciones Presupuestarias</h4>
                        <!-- /.dropdown js__dropdown -->
                        <br>
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre del Proyecto</th>
                                    <th style="width: 10%">Area Funcional</th>
                                    <th style="width: 10%">Fondo</th>
                                    <th style="width: 12%">Punto de Cuenta</th>
                                    <th style="width: 10%">Moneda</th>
                                    <th style="width: 12%">Monto Divisa</th>
                                    <th style="width: 12%">Monto Bs</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre del Proyecto</th>
                                    <th style="width: 10%">Area Funcional</th>
                                    <th style="width: 10%">Fondo</th>
                                    <th style="width: 12%">Punto de Cuenta</th>
                                    <th style="width: 10%">Moneda</th>
                                    <th style="width: 12%">Monto Divisa</th>
                                    <th style="width: 12%">Monto Bs</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th>Ver</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($lista as $key=>$value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <label style="margin-top: 12px;">
                                            {{$value->nombre_proyecto}}<input hidden name="id" value="{{$value->id}}">
                                        </label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">
                                            {{$value->proyecto_presupuestario}}
                                        </label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;" >
                                            {{$value->fondo}}
                                        </label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">
                                            <a href="{{$value->punto_cuenta_adjudicacion}}" target="_blanck">{{$value->punto_cuenta}}</a>
                                        </label>
                                    </td>
                                    <td align="left">
                                        <label style="margin-top: 12px;">
                                            {{$value->tipo_moneda}}
                                        </label>
                                    </td>
                                    <td align="right">
                                        <label style="margin-top: 12px;">
                                            {{number_format($value->monto_asignar_divisa,2,',','.')}}
                                        </label>
                                    </td>
                                    <td align="right">
                                        <label style="margin-top: 12px;">
                                            {{number_format($value->monto_asignar_bs,2,',','.')}}
                                        </label>
                                    </td>
                                    <td>
                                        @switch($value->estatus)
                                            @case('Aprobado')
                                                <label style="margin-top: 12px; color:green">{{$value->estatus}}</label>
                                                @break
                                            @case('Rechazado')
                                                <label style="margin-top: 12px; color:red">{{$value->estatus}}</label>
                                                @break
                                            @case('En Transito')
                                                <label style="margin-top: 12px; color:blue">{{$value->estatus}}</label>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <button id="mostrar" onclick="return mostrar({{$value->id}})" class="btn btn-circle btn-primary" data-toggle="modal" data-target="#boostrapModal-2"><i class="fa fa-search"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/jquery-3.2.1.js"></script>
<script src="assets/scripts/min.js"></script>


<script>

function mostrar(event){
        $(document).ready(function(){
            //console.log(event);
            var nuevaFila ='';
            $(".fila").remove();
            $.ajax({
                url:"{{url('modificacion_presupuestaria')}}"+"/"+event,
                method:"get",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var cont = 0;
                    for (let index = 0; index < data.length; index++) {
                        cont++;
                        var tds=$("#tabla2 tr:first td").length;
                        // Obtenemos el total de columnas (tr) del id "tabla"
                        var trs=$("#tabla2 tr").length;
                        // console.log(trs);
                        nuevaFila="<tr class='fila'>";
                        nuevaFila+="<td>"+cont;
                        nuevaFila+="<td>"+data[index]['codigo_partida'];
                        nuevaFila+="<td>"+formatter.format(data[index]['monto_asignar_divisa']);
                        nuevaFila+="<td>"+formatter.format(data[index]['monto_asignar_bs']);
                        nuevaFila+="</tr>";
                        $("#tabla1").append(nuevaFila);
                    
                    }
                }
            });
         });
    }

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
    function mostrar(event){
        $(document).ready(function(){
            //console.log(event);
            var nuevaFila ='';
            $(".fila").remove();
            $.ajax({
                url:"{{url('modificacion_presupuestaria')}}"+"/"+event,
                method:"get",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var cont = 0;
                    for (let index = 0; index < data.length; index++) {
                        cont++;
                        var tds=$("#tabla2 tr:first td").length;
                        // Obtenemos el total de columnas (tr) del id "tabla"
                        var trs=$("#tabla2 tr").length;
                        // console.log(trs);
                        nuevaFila="<tr class='fila'>";
                        nuevaFila+="<td>"+cont;
                        nuevaFila+="<td>"+data[index]['codigo_partida'];
                        nuevaFila+="<td>"+formatter.format(data[index]['monto_asignar_divisa']);
                        nuevaFila+="<td>"+formatter.format(data[index]['monto_asignar_bs']);
                        nuevaFila+="</tr>";
                        $("#tabla2").append(nuevaFila);
                    }
                }
            });
         });
    }
  aux=$("#aux").val();
  //console.log(aux);
  for (let index = 0; index < aux; index++) {
    $("#monto_certificar"+index).on({
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

    $("#boton").on({
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
    $("#monto"+index).on({
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
  }
 

  </script>
@endsection

