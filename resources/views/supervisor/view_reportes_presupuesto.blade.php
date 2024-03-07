@extends('principal')
@section('reporte_presupuesto')
<div class="row small-spacing">
    <form action="{{url('reporte_presupuesto')}}" method="POST">
        @csrf
    <div class="col-xs-12">
        <div class="box-content">
            <h4>Reportes de Presupuesto</h4>
            <br>
            <br>
                <div class="form-group col-lg-6">
                    <label for="fecha_desde" class="control-label">Fecha Desde</label>
                    <input type="date" class="form-control" max="{{date('Y-m-d')}}" id="fecha_desde"  required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="fecha_hasta" class="control-label">Fecha Hasta</label>
                    <input type="date" class="form-control" max="{{date('Y-m-d')}}" id="fecha_hasta" required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputEmail" class="control-label">Por Gerencia</label>
                    <select name="gerencia" id="gerencia" multiple class="form-control select2_1" >
                        <option value=""> -Seleccione- </option>
                        @foreach ($gerencia as $key => $value)
                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                        @endforeach
                        <option value="todos">TODAS</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputEmail" class="control-label">Por Proyecto</label>
                    <select class="form-control"  name="proyecto[]" {{--id="proyecto"--}}>

                    </select>
                </div>
                {{-- <div class="form-group col-lg-6">
                    <label for="inputEmail" class="control-label">Acción Específica</label>
                    <select class="form-control" name="fuente" id="fuente">
                        <option value=""> -Seleccione- </option>
                        
                    </select>
                </div> --}}
                <div class="form-group col-lg-6">
                    <label for="inputEmail" class="control-label">Partida Desde</label>
                    <select class="form-control" name="partida_desde" id="partida_desde">
                        <option value=""> -Seleccione- </option>
                        @foreach ($clasificador_presupuestario as $key=>$value)
                            <option value="{{$value->id}}">{{$value->codigo_partida}} {{$value->descripcion}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputEmail" class="control-label">Partida Hasta</label>
                    <select class="form-control" name="partida_hasta" id="partida_hasta">

                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputEmail" class="control-label">Fuente</label>
                    <select class="form-control" name="fuente">
                       @foreach ($fuente as $key => $value)
                            <option value=""></option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="fecha_hasta" class="control-label">Seleccionar columnas del reporte</label>
                    <select class="form-control select2_1" name="columnas[]" multiple="multiple">
							<option value="un.nombre">Nombre Unidad</option>
							<option value="pro.proyecto_presupuestario">Área Funcional</option>
							<option value="pro.nombre_proyecto">Denominación del Proyecto</option>
							<option value="pro.nombre_subproyecto">Denominacion del Area Funcional</option>
							<option value="c_l.codigo_partida">Posición Presupuestaría</option>
							<option value="pres.saldo_disponible">Saldo Disponible</option>
							<option value="pres.pre_comprometido">Pre-Comprometido</option>
							<option value="pres.comprometido">Comprometido</option>
							<option value="pres.causado">Causado</option>
							<option value="pres.fecha_presupuesto">Fecha Presupuesto</option>
					</select>
                </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success btn-rounded"><i class="fa fa-check"></i> Consultar</button>
        </div>
        <!-- /.box-content -->
    </div>
    <!-- /.col-xs-12 -->
</form>
</div>
@endsection