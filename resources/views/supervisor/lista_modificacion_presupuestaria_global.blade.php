@extends('principal')
@section('lista_presupuestaria_global')

<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Solicitud para Modificar Presupuesto</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            </div>
                <div class="col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">Lista de Solicitudes</h4>
                        <!-- /.dropdown js__dropdown -->
                        <br>
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Unidad Solicitante</th>
                                    <th style="width: 15%">Nombre del Proyecto</th>
                                    <th style="width: 10%">Area Funcional</th>
                                    <th>Fondo</th>

                                    <th style="width: 10%">Punto de Cuenta</th>
                                    <th>Monto en Divisa</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th style="width: 15%">Aprobar / Rechazar</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 10%">Unidad Solicitante</th>
                                    <th style="width: 15%">Nombre del Proyecto</th>
                                    <th style="width: 10%">Area Funcional</th>
                                    <th>Fondo</th>

                                    <th style="width: 10%">Punto de Cuenta</th>
                                    <th>Monto en Divisa</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th style="width: 15%">Aprobar / Rechazar</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($lista as $key=>$value)
                                <tr>
                                    <form action="{{url('actualizacion_presupuestaria_global')}}" method="post">
                                        @csrf
                                        <td>
                                            <input type="text" hidden name='id_presupuesto_temporal{{$key}}' value="{{$value->id}}">
                                            <label>{{$value->nombre}}
                                            </label>
                                        </td>
                                        <td>
                                            <label>{{$value->nombre_proyecto}}</label>
                                            <input type="text" hidden name="proyecto{{$key}}" value="{{$value->nombre_proyecto}}">
                                            <input type="text" hidden value="{{$value->id}}" name="id_presupuesto{{$key}}">
                                        </td>
                                        <td>
                                            <input type="text" name="proyecto_presupuestario{{$key}}" hidden value="{{$value->proyecto_presupuestario}}">
                                            <label>{{$value->proyecto_presupuestario}}</label>
                                        </td>
                                        <td>
                                            <label>{{$value->fondo}}</label>
                                        </td>
                                        <td>
                                            <label>
                                                <a href="{{$value->punto_cuenta_adjudicacion}}" target="_blank">Punto de Cuenta</a>
                                            </label> 
                                        </td>
                                        <td align="right">
                                            <label>{{number_format($value->monto_asignar_divisa,2,',','.')}}</label>
                                        </td>
                                        <td>
                                            @if($value->estatus=='Rechazado')
                                                <label for="Estatus" style="color: red">{{$value->estatus}}</label>
                                            @else
                                                <label for="Estatus" style="color: green">{{$value->estatus}}</label>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($value->estatus =='Asignado')
                                                <input type="text" name="key" hidden value="{{$key}}">
                                                <button name='aceptar' value="1" class="btn btn-circle btn-success"><i class="icon icon-check"></i></button>
                                                <img src="assets/images/slash.png" style="width: 30px" alt="">
                                                <button name="rechazar" value="1" class="btn btn-circle btn-danger"><i class="icon icon-error-alt"></i></button>
                                            @else
                                                <button name='aceptar' value="1" disabled class="btn btn-circle btn"><i class="icon icon-check"></i></button>
                                                <img src="assets/images/slash.png" style="width: 30px" alt="">
                                                <button name="rechazar" value="1" disabled class="btn btn-circle"><i class="icon icon-error-alt"></i></button>    
                                            @endif
                                        </td>
                                    </form>
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
    function consultar()
  {
      aux=document.getElementById('aux').value;
      //console.log(aux);
      for (let index = 0; index < aux; index++) {
        var monto=document.getElementById("monto"+index).value;
        monto = parseFloat(monto.replace(/\./g,""));
        var monto_certificar=document.getElementById("monto_certificar"+index).value;
        monto_certificar = parseFloat(monto_certificar.replace(/\./g,""));
        //console.log(monto,monto_certificar);
        if(monto < monto_certificar)
        {
            swal({
            title: "Monto incorrecto",
            text:  "EL monto a certificar no puede ser mayor al saldo disponible",
            type:  "warning",
            showConfirmButton: false,
            timer: 3000
            });
            document.getElementById("monto_certificar"+index).value='';
        }else{
            //console.log(monto,monto_certificar);
        }
      }
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
