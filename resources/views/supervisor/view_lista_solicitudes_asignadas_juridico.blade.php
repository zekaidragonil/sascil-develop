@extends('principal')
@section('lista_solicitudes_asignadas_juridico')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Solicitudes de Contratación Asignadas </h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Estatus</th>
                    <th>Analista Asignado</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Estatus</th>
                    <th>Analista Asignado</th>
                    <th>Ver</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista_asignado_juridico as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->numero_asignado}}</td>
                        <td>{{$value->unidad}}</td>
                        <td>{{$value->estatus}}</td>
                        <td>{{$value->nombre}} {{$value->apellido}}</td>
                        <td>
                            <form action="{{url('consultar_contrato_asignado')}}" method="post">
                                @csrf
                                <input type="text" name="id_solicitud" hidden="true" value="{{$value->id}}">
                                <button class="btn btn-circle btn-info"><i class="fa fa-search"></i></button>
                            </form>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>
@endsection