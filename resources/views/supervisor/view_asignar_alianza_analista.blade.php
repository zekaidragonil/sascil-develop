@extends('principal')
@section('asignar_alianza_analista')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Asignar Alianzas</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N° de Alianza</th>
                    <th>N° de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>Analista</th>
                    <th style="width: 15%">Ver <img src="assets/images/slash.png" width="10%" alt=""> Asignar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N° de Alianza</th>
                    <th>N° de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>Analista</th>
                    <th style="width: 15%">Ver  <img src="assets/images/slash.png" width="10%" alt=""> Asignars</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($alianza as $key => $value)
                <tr>
                    <form action="{{url('asignar_alianza_analista')}}" method="post">
                        @csrf
                    <td>{{$value->numero_alianza}}
                        <input type="text" hidden name="id_alianza" value="{{$value->id}}"></td>
                    <td>{{$value->solicitud_alianza}}</td>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->fecha_solicitud}}</td>
                    <td style="width: 10%">
                        <select name="analista" class="form-control" id="">
                            <option value="">- Seleccione -</option>
                            @foreach ($analistas as $key => $value)
                                <option value="{{$value->id}}">{{$value->nombre}} {{$value->apellido}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="consulta" value ="1" class="btn btn-info btn-circle btn-sm "><i class="fa fa-search"></i></button>
                        <img src="assets/images/slash.png" width="10%" alt="">
                        <button type="submit" class="btn btn-success btn-circle  btn-sm"><i class="fa fa-check"></i></button>
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