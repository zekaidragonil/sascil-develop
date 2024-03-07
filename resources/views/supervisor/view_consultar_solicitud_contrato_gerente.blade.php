@extends('principal')
@section('view_consultar_solicitud_contrato_gerente')

<div class="col-lg-12 col-xs-12">
    <div class="box-content">
    <h4 class="box-title">Documentación a verificar de la Solicitud: <b>{{$archivos[0]->numero_asignado}}</b></h4>
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
        @foreach ($fianza as $key => $value )
        <div class="activity-item">
            <div class="bar bg-success">
                <div class="dot bg-success"></div>
                <div class="last-dot bg-success"></div>
                <!-- /.dot -->
            </div>
            <!-- /.bar -->
            <div class="content">
                <div class="text">
                   <h4>{{$value->tipo_fianza}}</h4>
                </div>
                <!-- /.date -->
                <div class="date"><a target="_blank" href="{{$value->fianza}}">Ver Documento</a></div>
                <!-- /.text -->
            </div>
            <!-- /.content -->
        </div>
        @endforeach
        {{-- @if ($fianza!=[])    
        <div class="activity-item">
            <div class="bar bg-success">
                <div class="dot bg-success"></div>
                <div class="last-dot bg-success"></div>
                <!-- /.dot -->
            </div>
            <!-- /.bar -->
            <div class="content">
                <div class="text">
                   <h4>Fianza de Fiél Cumplimiento</h4>
                </div>
                <!-- /.date -->
                <div class="date"><a target="_blank" href="{{$fianza[1]->fianza}}">Ver Documento</a></div>
                <!-- /.text -->
            </div>
            <!-- /.content -->
        </div>
        <div class="activity-item">
            <div class="bar bg-warning">
                <div class="dot bg-warning"></div>
                <div class="last-dot bg-warning"></div>
                <!-- /.dot -->
            </div>
            <!-- /.bar -->
            <div class="content">
                <div class="text">
                   <h4>Fianza Anticipo</h4>
                </div>
                <!-- /.date -->
                <div class="date"><a target="_blank" href="{{$fianza[2]->fianza}}">Ver Documento</a></div>
                <!-- /.text -->
            </div>
            <!-- /.content -->
        </div>
        <div class="activity-item">
            <div class="bar bg-warning">
                <div class="dot bg-warning"></div>
                <div class="last-dot bg-warning"></div>
                <!-- /.dot -->
            </div>
            <!-- /.bar -->
            <div class="content">
                <div class="text">
                   <h4>Fianza de Buena Calidad</h4>
                </div>
                <!-- /.date -->
                <div class="date"><a target="_blank" href="{{$fianza[3]->fianza}}">Ver Documento</a></div>
                <!-- /.text -->
            </div>
            <!-- /.content -->
        </div>
        @endif
        
        @if ($value->id_estatus != null )
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <div class="last-dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <div class="content">
                    <div class="text">
                        <h4>Estatus de la Solicitud</h4>
                    </div>
                    <div class="date">
                {{$value->estatus}}
                    </div>
                </div>
            </div>
        @endif --}}
        <br>
        <div class="col-lg-12">
            <br><br>
            <a href="{{url('lista_solicitudes_asignadas_juridico')}}" class="btn btn-warning btn-rounded" style="color: white"><i class="fa fa-arrow-left" style="color: white"></i> Ir atras</a>
        </div>
    </div>
    @endforeach
    </ul>
</div>
@endsection