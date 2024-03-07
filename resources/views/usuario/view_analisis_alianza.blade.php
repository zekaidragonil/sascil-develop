@extends('principal')
@section('añadir_llave_presupuestaria')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Lista de Alianzas Estrategicas Asignadas </h4>
		<!-- /.box-title -->
		<div class="card-content" >
            </div>
                <div class="col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">Alianzas</h4>
                        <!-- /.dropdown js__dropdown -->
                        <br>
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>Número de Alianza</th>
                                    <th>Fecha Asignada</th>
                                    <th>Fecha Respuesta</th>
                                    <th>Estatus</th>
                                    <th>Analizar</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Número de Alianza</th>
                                    <th>Fecha Asignada</th>
                                    <th>Fecha Respuesta</th>
                                    <th>Estatus</th>
                                    <th>Analizar</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($analisar as $key=>$value)
                                    <tr>
                                        <form action="{{url('revisar_solicitud_alianza')}}" method="post">
                                        @csrf
                                        <td>
                                            <label style="margin-top: 12px;">
                                                <input type="text" hidden value="{{$value->id}}" name="id_alianza">
                                                {{$value->numero_alianza}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;">
                                                {{$value->fecha_asignado}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;">
                                                {{$value->fecha_respuesta}}
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-top: 12px;" >
                                                {{$value->estatus}}
                                            </label>
                                        </td>
                                       
                                        <td>
                                            @if ($value->estatus == 'En Transito')
                                            <button type="submit" value="" class="btn btn-info btn-circle"><i class="fa fa-search"></i></button>
                                            @else
                                            <button type="submit" value="" disabled class="btn btn-default btn-circle"><i class="fa fa-search"></i></button>
                                                
                                            @endif
                                           
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
