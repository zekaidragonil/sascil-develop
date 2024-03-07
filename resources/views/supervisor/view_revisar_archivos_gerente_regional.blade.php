@extends('principal')
@section('view_archivos_gerente_regional')
	<div class="col-lg-12 col-xs-12">
		<div class="box-content">
		<h4 class="box-title">Documentación a verificar de la Solicitud: <b>{{$archivos[0]->numero_solicitud}}</b></h4>
		@foreach($archivos as $key => $value )
		<div class="activity-list">
			<div class="activity-item">
				<div class="bar bg-primary">
					<div class="dot bg-primary"></div>
					<div class="last-dot bg-primary"></div>
					<!-- /.dot -->
				</div>
				<!-- /.bar -->
				<div class="content">
					<!-- /.date -->
					<div class="text">
					   <h4>Punto de Cuenta Inicio de Proceso</h4>
					</div>
					<div class="date"><a target="_blank" href="{{$value->punto_cuenta}}">Ver Documento</a></div>
					<!-- /.text -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.activity-item -->
			<div class="activity-item">
				<div class="bar bg-primary">
					<div class="dot bg-primary"></div>
					<div class="last-dot bg-primary
					"></div>
				</div>
				<!-- /.bar -->
				<div class="content">
					<!-- /.date -->
					<div class="text">
						<h4>Estimación de Costos</h4>
					</div>
					<div class="date"><a target="_blank" href="{{$value->estimacion_costo}}">Ver Documento</a></div>
					<!-- /.text -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.activity-item -->
			<div class="activity-item">
				<div class="bar bg-success">
					<div class="dot bg-success"></div>
					<div class="last-dot bg-success"></div>
				</div>
				<!-- /.bar -->
				<div class="content">
					<div class="text">
						<h4>Especificaciones Técnicas</h4>
					</div>
					<div class="date"><a target="_blank" href="{{$value->espesificaciones_tecnicas}}">Ver Documento</a></div>
				</div>
				<!-- /.content -->
			</div>
			<!-- /.activity-item -->
			<div class="activity-item">
				<div class="bar bg-success">
					<div class="dot bg-success"></div>
					<div class="last-dot bg-success"></div>
				</div>
				<!-- /.bar -->
				<div class="content">
					<div class="texts">
					   <h4>Forma 018</h4>
					</div>
					<!-- /.date -->
					<div class="date"><a target="_blank" href="{{$value->forma_018}}">Ver Documento</a></div>
					<!-- /.text -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.activity-item -->
			<div class="activity-item">
				<div class="bar bg-warning">
					<div class="dot bg-warning"></div>
					<div class="last-dot bg-warning"></div>
				</div>
				<!-- /.bar -->
				<div class="content">
					<div class="text">
					   <h4>Matriz de Evaluación Técnica</h4>
					</div>
					<div class="date"><a target="_blank" href="{{$value->matriz_tecnica}}">Ver Documento</a></div>
					<!-- /.text -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.activity-item -->
			<div class="activity-item">
				<div class="bar bg-orange">
					<div class="dot bg-orange"></div>
					<div class="last-dot bg-orange"></div>
					<!-- /.dot -->
				</div>
				<!-- /.bar -->
				<div class="content">
					<div class="text">
					   <h4>Memorandum de Solicitud de Inicio de Contratación</h4>
					</div>
					<!-- /.date -->
					<div class="date"><a target="_blank" href="{{$value->memorandum}}">Ver Documento</a></div>
					<!-- /.text -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.activity-item -->
			<div class="activity-item">
				<div class="bar bg-orange">
					<div class="dot bg-orange"></div>
					<div class="last-dot bg-orange"></div>
					<!-- /.dot -->
				</div>
				<!-- /.bar -->
				<div class="content">
					<div class="text">
					   <h4>Certificación Presupuestaria</h4>
					</div>
					<!-- /.date -->
					<div class="date"><a target="_blank" href="{{$value->certificacion_presupuestaria}}">Ver Documento</a></div>
					<!-- /.text -->
				</div>
				<!-- /.content -->
			</div>
			<div class="col-lg-12">
				<br><br>
				<a href="{{url('lista_contrataciones_regional')}}" class="btn btn-warning btn-rounded" style="color: white"><i class="fa fa-arrow-left" style="color: white"></i> Ir atras</a>
			</div>
		</div>
		@endforeach
		</ul>
	</div>
<!-- Placed at the end of the document so the pages load faster -->

@endsection
