@extends('principal')
@section('lista_solicitudes_aceptadas')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Asignar Solicitudes de Contrato</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N° Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>N° del Punto de Cuenta</th>
                    <th>Fecha del Punto</th>
                    <th>Estatus</th>
                    <th>Analista</th>
                    <th>Asignar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N° Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>N° del Punto de Cuenta</th>
                    <th>Fecha del Punto</th>
                    <th>Estatus</th>
                    <th>Analista</th>
                    <th>Asignar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista_solicitudes as $key => $value)
                <tr>
                    <form action="{{url('asignar_solicitud_contrato')}}" method="post">
                    @csrf
                    <td>{{$value->numero_solicitud}}
                        <input type="text" hidden name="id_solicitud" value="{{$value->id}}"></td>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->fecha_solicitud}}</td>
                    <td>{{$value->numero_control}}</td>
                    <td>{{$value->fecha_punto}}</td>
                    <td> <label style="color:green;">{{$value->estatus}}</label></td>
                    <td>
                        <select name="analista" class="form-control" id="">
                            <option value="">- Seleccione -</option>
                            @foreach ($analistas as $key => $value)
                                <option value="{{$value->id}}">{{$value->nombre}} {{$value->apellido}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success btn-circle light-effect"><i class="fa fa-check"></i></button>
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