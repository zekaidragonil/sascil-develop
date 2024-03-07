@extends('principal')
@section('lista_alianzas_asignadas')
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Solicitudes de Alianzas Asignadas</h4>
        <hr>
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>Codigo de la Aliaza</th>
                    <th>Estatus</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha Respuesta</th>
                    <th style="width: 10%">Analista</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_asignada as $key => $value)
                    <tr>
                        <form action="{{url('asignar_alianza')}}" method="POST">
                            @csrf
                            
                            <td><input type="text" hidden name="id_alianza" value="{{$value->id}}">
                                {{$value->numero_alianza}}</td>
                            <td>{{$value->estatus}}</td>
                            <td>{{date('d/m/Y - h:i:s a',strtotime($value->fecha_solicitud))}}</td>
                            {{-- <td>
                                <input type="text" hidden name="id" value="{{$value->id}}">
                                <button input="submit" class="btn btn-info btn-circle btn"><i class="fa fa-search"></i></button>
                            </td> --}}
                            <td>
                                {{$value->fecha_respuesta}}
                            </td>
                            <td>
                               {{$value->nombre}} {{$value->apellido}}
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