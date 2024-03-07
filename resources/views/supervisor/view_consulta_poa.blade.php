@extends('principal')
@section('view_consulta_poa')

<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content col-6">
          <h4>Conculta del Plan Opertativo Anual por Unidad Adminsitrativa</h3>
            <hr>
            <div class="col-lg-6">
                <label for="">Seleccione el año del Plan Operativo</label>
                <select required name="anio" id="anio" class="form-control">
                    <option value="" selected>- Seleccione -</option>
                    @foreach ($anio as $key => $value)
                    @if (!empty($value))
                        <option value="{{$value->fecha_poa}}">{{$value->fecha_poa}}</option>
                    @endif
                        
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6">
                <label for="">Selecciona la Unidad Adminsitrativa</label>
                <select required name="unidad" id="unidad" class="form-control">
                    <option value="" selected>- Seleccione -</option>
                    @foreach ($unidad as $key => $value)
                        <option value="{{$value->id}}">{{$value->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-content">
            <h4 class="box-title">Plan Operativo Anual </h4>
            <!-- /.dropdown js__dropdown -->
            <table id="tabla" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Unidad</th>
                        <th>Macro-Proyecto</th>
                        <th>Proyecto</th>
                        <th>Fuente</th>
                        <th>Código Partida</th>
                        <th>Monto</th>
                        <th>Saldo Disponible</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody id="campos">
                   
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
</div>
<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){
    $('#unidad').change(function(){
        //console.log(poa);
        poa = $('#anio').val();
        unidad = $('#unidad').val();
        if (poa === '') {
            var tds=$("#campos tr:first td").length;
            $("#campos tr").remove();
            $("#campos").append(nuevaFila);
            return false;
        }else{
            if (poa != '' && unidad != '') {
                $.get('poa/'+poa+'/'+unidad,function(data){
                var tds=$("#campos tr:first td").length;
                var trs=$("#campos tr").length;
                $("#campos").append(nuevaFila);
                if (data != null) {
                    $("#campos tr").remove();
                    $("#campos").append(nuevaFila);
                    for (let i = 0; i < data.length; i++) {
                        var nuevaFila="<tr class='tod'>";
                        var cont = i+1;
                        nuevaFila+="<td>"+cont+"";
                        nuevaFila+="<td>"+data[i]['nombre']+"";
                        nuevaFila+="<td>"+data[i]['nombre_proyecto']+"";
                        nuevaFila+="<td>"+data[i]['nombre_subproyecto']+"";
                        nuevaFila+="<td>"+data[i]['fondo']+"";
                        nuevaFila+="<td>"+data[i]['codigo_partida']+"";
                        nuevaFila+="<td>"+formatter.format(data[i]['monto'])+"";
                        nuevaFila+="<td>"+formatter.format(data[i]['saldo_disponible'])+"";
                        nuevaFila+="<td>"+data[i]['fecha_presupuesto']+"";
                        nuevaFila+="</tr>";
                        $("#campos").append(nuevaFila);
                    }
                }
                return false;
                });
            }
        }
    });
})
</script>
@endsection