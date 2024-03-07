@extends('principal')
@section('view_disponibilidad_presupuestaria')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Disponibilidad Presupuestaria</h4>
        <!-- /.box-title -->
        <div class="card-content">
            <form action="consultar_disponibilidad" method="POST">
                @csrf
                <div class="form-group col-lg-4">
                    <label for="exampleInputEmail1">Año de Ejercicio</label>
                    <select name="anio" class="form-control" id="anio" >
                        <option value="" selected>- Seleccione -</option>
                        @foreach ($anio as $key => $value)
                            <option value="{{$value->fecha_presupuesto}}">{{$value->fecha_presupuesto}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="exampleInputEmail1">Fondo</label>
                    <select name="fondo" class="form-control" id="fondo" >
                        <option value="" selected>- Seleccione -</option>
                        @foreach ($fondo as $key => $value)
                            <option value="{{$value->id}}">{{$value->fondo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="exampleInputEmail1">Area Funcional</label>
                    <select name="id_proyecto" class="form-control" id="id_proyecto" >
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-success btn-sm ">Consultar</button>
                </div>
            </form>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>
<!--data table para exportar datos-->


@endsection