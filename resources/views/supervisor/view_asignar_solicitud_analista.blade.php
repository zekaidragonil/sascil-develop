@extends('principal')
@section('asignar_solicitud_analista')

<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h4 class="box-title">Solicitudes de Contrataciones por Asignar</h4>
            <!-- /.dropdown js__dropdown -->
            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>N° Solicitud</th>
                        <th>N° Inicio de Proceso Asignado P/Procura</th>
                        <th>Unidad Solicitante</th>
                        {{-- <th>Estatus</th> --}}
                        <th>Analista</th>
                        <th style="width: 15%">Ver <img src="assets/images/slash.png" width="10%" alt=""> Asignar</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>N° Solicitud</th>
                        <th>N° Inicio de Proceso Asignado P/Procura</th>
                        <th>Unidad Solicitante</th>
                        {{-- <th>Estatus</th> --}}
                        <th>Analista</th>
                        <th style="width: 15%">Ver <img src="assets/images/slash.png" width="10%" alt=""> Asignar</th>
                    </tr>
                </tfoot>
                @foreach ($lista as $key => $value)
                    <tr>
                        <form action="{{url('asignar_solicitud_contrato_analista')}}" method="POST" >
                            @csrf
                            <td>{{$value->id}}</td>
                            <td>{{$value->numero_solicitud}}</td>
                            <td>{{$value->numero_asignado}}</td>
                            <td>{{$value->nombre}}</td>
                            {{-- <td>
                                @if ($value->estatus == 'Asignado')
                                    <label for="" style="color: blue; margin-top: 12px;">Asignado</label>
                                @endif
                            </td> --}}
                            <td>
                                <input type="text" name="id_solicitud" value="{{$value->id}}" hidden="true">
                                <select name="analista" required class="form-control">
                                <option value="" selected>- Seleccione -</option>
                                @foreach ($analista as $key => $value1)
                                    <option value="{{$value1->id}}">{{$value1->nombre}} {{$value1->apellido}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="sumit" name="ver" value="1" class="btn btn-info btn-circle "><i class="fa fa-search"></i></button>
                                <img src="assets/images/slash.png" width="10%" alt="">
                                <button type="submit" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button>

                            </td>
                        </form>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
</div>

@endsection