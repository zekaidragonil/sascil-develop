@extends('principal')
@section('añadir_llave_presupuestaria')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Lista de Proyectos</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            </div>
                <div class="col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">Proyecto a Modificar</h4>
                        <!-- /.dropdown js__dropdown -->
                        <br>
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>Area Funcional</th>
                                    <th>Nombre de Proyecto</th>
                                    <th>Categoría</th>
                                    <th>Fondo</th>
                                    <th>Monto del Proyecto</th>
                                    <th>Fecha</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Area Funcional</th>
                                    <th>Nombre de Proyecto</th>
                                    <th>Categoría</th>
                                    <th>Fondo</th>
                                    <th>Monto del Proyecto</th>
                                    <th>Fecha</th>
                                    <th>Agregar</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($consulta as $key=>$value)
                                    <tr>
                                        <form action="{{url('lista_llave_presupuestaria')}}" method="post">
                                        @csrf
                                        <td>
                                            <label style="margin-top: 12px;">
                                                <input type="text" hidden value="{{$value->id}}" name="id_proyecto">
                                                {{$value->proyecto_presupuestario}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;">
                                                {{$value->nombre_proyecto}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;">
                                                @if ($value->categoria=='A')
                                                    Anual
                                                @else
                                                    Plurianual
                                                @endif
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;" >
                                                {{$value->fondo}}
                                            </label>
                                        </td>
                                        <td align="right">
                                            <label style="margin-top: 12px;">
                                                {{number_format($value->monto_proyecto,2,',','.')}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;">
                                            {{date('d-m-Y',strtotime($value->fecha))}}
                                            </label>
                                        </td>
                                        <td align="center">
                                            <button type="submit" value="" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></button>
                                        </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/jquery-3.2.1.js"></script>
<script src="assets/scripts/min.js"></script>

@endsection
