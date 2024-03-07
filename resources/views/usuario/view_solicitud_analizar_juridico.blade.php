@extends('principal')
@section('view_solicitud_analizar_juridico')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes de Contratación a Analizar</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° Asignado P/Procura</th>
                    <th>N° Solicitud</th>
                    <th>Fecha de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Estatus</th>
                    <th>Analizar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° Asignado P/Procura</th>
                    <th>N° Solicitud</th>
                    <th>Fecha de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Estatus</th>
                    <th>Analizar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($solicitud as $key => $value)
                    <tr>
                        <form action="{{url('analizar_solicitud_consultor_juridico')}}" method="post" >
                            @csrf
                            <td>
                                <input type="text" name="id_solicitud" hidden value="{{$value->id}}" >
                                {{$key+1}}
                            </td>
                            <td>{{$value->numero_asignado}}</td>
                            <td>{{$value->numero_solicitud}}</td>
                            <td>{{date('d-m-Y H:i:s a',strtotime($value->fecha_solicitud))}}</td>
                            <td>{{$value->unidad}}</td>
                            <td>{{$value->estatus}}</td>
                            <td><button class="btn btn-circle btn-success"><i class="fa fa-search"></i></button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>
@endsection