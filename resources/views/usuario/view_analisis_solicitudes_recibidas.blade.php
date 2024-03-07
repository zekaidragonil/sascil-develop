@extends('principal')
@section('analisis_solicitudes')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes de Inicio de Contratación Recibidas</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Contratación</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha Solicitud</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Contratación</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha Solicitud</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($consultar as $key => $value)
                    <tr>
                    <form action="{{url('view_solicitud_procesada')}}" method="POST">
                        @csrf
                        <td><input type="text" hidden name="id_solicitud" value="{{$value->id}}"> {{$value->id}}</td>
                        <td>
                            {{$value->numero_solicitud}}
                        </td>
                        <td>
                            {{$value->nombre}}
                        </td>
                        <td>
                            {{date('d-m-Y - H:m:s', strtotime($value->fecha_solicitud))}}
                        </td>
                        <td>
                            <span style="color: green">{{$value->estatus}}</span>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-circle btn-success"><i class="fa fa-search"></i></button>
                        </td>
                    </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.box-content -->
</div>

    
@endsection