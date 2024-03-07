@extends('principal')
@section('consulta_auditoria')

<!-- /.col-xs-12 -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Actividad de los Usuarios en el Sistema</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Actividad</th>
                    <th>Tabla</th>
                    <th style="width: 20%">Campo</th>
                    <th style="width: 20%">Valor Anterior</th>
                    <th style="width: 20%">Valor Actual</th>
                    <th style="width: 10%">Fecha</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Actividad</th>
                    <th>Tabla</th>
                    <th style="width: 20%">Campo</th>
                    <th style="width: 20%">Valor Anterior</th>
                    <th style="width: 20%">Valor Actual</th>
                    <th style="width: 10%" >Fecha</th>
                    <th>Usuario</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($consultar as $key => $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->actividad}}</td>
                    <td>{{$value->tabla}}</td>
                    <td>{{$value->campo}}</td>
                    <td>
                        @if ($value->valor_anterior!=null)
                            {{$value->valor_anterior}}
                        @else
                            -
                        @endif
                        
                    </td>
                    <td>
                        @if($value->valor_actual=null)
                            {{$value->valor_actual}}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{$value->fecha}}</td>
                    <td>{{$value->usuario}}</td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->

@endsection