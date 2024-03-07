@extends('principal')
@section('view_lista_solicitudes_adjudicadas')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes Adjudicadas a Asignar</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Numero de la Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Estatus</th>
                    <th>Lista de Analistas</th>
                    <th style="width: 15%">Ver <img src="assets/images/slash.png" width="15%" alt=""> Asignar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Numero de la Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Estatus</th>
                    <th>Lista de Analistas</th>
                    <th style="width: 15%">Ver <img src="assets/images/slash.png" width="15%" alt="">Asignar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($solicitud_adjudicada as $key => $value)
                    
                    <tr>
                        <form action="{{url('asignar_solicitud_adjuntada_analista_juridico')}}" method="post">
                        @csrf
                        <td>
                            <input type="text" hidden name="id_solicitud" value="{{$value->id}}">
                            {{$key+1}}
                        </td>
                        <td>{{$value->numero_asignado}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->estatus}}</td>
                        <td>
                            <select name="usuario" required class="form-control">
                                <option value="">- Seleccione -</option>
                                @foreach ($analista_juridico as $key1 => $value1)
                                    <option value="{{$value1->id}}">{{$value1->nombre}} {{$value1->apellido}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="ver" value="1" class="btn btn-sm btn-info btn-circle"><i class="fa fa-search"></i></button>
                            <img src="assets/images/slash.png" width="15%" alt="">
                            <button type="submit" class="btn btn-sm btn-success btn-circle"><i class="fa fa-check"></i></button>

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