@extends('principal')
@section('view_alianza')
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Alianzas Estrategicas Solicitadas</h4>
        <hr>
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Codigo de la Aliaza</th>
                    <th>Estatus</th>
                    <th>Fecha de Solicitud</th>
                    <th style="width: 10%">Analista</th>
                    <th>Asignar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultar as $value)
                    <tr>
                        <form action="{{url('asignar_alianza')}}" method="POST">
                            @csrf
                            <td>
                                <input type="text" hidden name="id_alianza" value="{{$value->id}}">
                                {{$value->id}}
                            </td>
                            <td>
                                {{$value->numero_alianza}}</td>
                            <td>{{$value->estatus}}</td>
                            <td>{{date('d/m/Y - h:m:s a',strtotime($value->created_at))}}</td>
                            {{-- <td>
                                <input type="text" hidden name="id" value="{{$value->id}}">
                                <button input="submit" class="btn btn-info btn-circle btn"><i class="fa fa-search"></i></button>
                            </td> --}}
                            <td>
                                <select class="form-control" name="analista" id="">
                                    <option value="">- Seleccionar -</option>
                                    @foreach ($usuario as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nombre}} {{$value->apellido}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-circle btn-success">
                                    <i class="ico zmdi zmdi-file-plus zmdi-hc-fw"></i>
                                </button>
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