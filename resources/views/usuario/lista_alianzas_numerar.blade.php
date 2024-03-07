@extends('principal')
@section('alianzas_recibidas')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Alianzas a Asignar</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Alianza</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th style="width: 28%">N° de Inicio de Proceso Asignado</th>
                    <th>Estatus</th>
                    <th>Asignar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Alianza</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>N° de Inicio de Proceso Asignado</th>
                    <th>Estatus</th>
                    <th>Asignar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($alianza as $key => $value)
                <tr>
                    <form action="{{url('asignar_numero_alianza')}}" method="post">
                        @csrf
                    <td>{{$value->id}}
                        <input type="text" hidden name="id_alianza" value="{{$value->id}}"></td>
                    <td>{{$value->solicitud_alianza}}</td>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->fecha_solicitud}}</td>
                    <td>
                        @if ($value->numero_alianza!=null)
                            {{$value->numero_alianza}}
                        @else
                            -
                        @endif
                    </td>
                    <td> <label style="color:green;margin-bottom: 0px;">{{$value->estatus}}</label></td>
                    <td>
                        <button type="submit" name="buton" value=1 class="btn btn-success btn-circle light-effect"><i class="fa fa-search"></i></button>
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