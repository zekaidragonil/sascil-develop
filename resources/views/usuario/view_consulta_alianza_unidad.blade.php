@extends('principal')
@section('revisar_solicitud_alianza')

<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Documentación de la Alianza N° {{$documento_alianza[0]->solicitud_alianza}}</h4>
        <!-- /.dropdown js__dropdown -->
        <div class="activity-list">
            <div class="activity-item">
                <div class="bar bg-primary">
                    <div class="dot bg-primary"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <!-- /.date -->
                    <div class="text">
                       <h4>Punto de Cuenta de Inicio</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$documento_alianza[0]->punto_cuenta}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-success">
                    <div class="dot bg-success"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                        <h4>Especificaciones Técnicas</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$documento_alianza[0]->espesificaciones_tecnicas}}">Ver Documento</a></div>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-warning">
                    <div class="dot bg-warning"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Matriz de Evaluación Técnica</h4>
                    </div>
                    <div class="date"><a target="_blank" href="{{$documento_alianza[0]->matriz_tecnica}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.activity-item -->
            <div class="activity-item">
                <div class="bar bg-orange">
                    <div class="dot bg-orange"></div>
                    <!-- /.dot -->
                </div>
                <!-- /.bar -->
                <div class="content">
                    <div class="text">
                       <h4>Memorandum Solicitud de Inicio</h4>
                    </div>
                    <!-- /.date -->
                    <div class="date"><a target="_blank" href="{{$documento_alianza[0]->memorandum}}">Ver Documento</a></div>
                    <!-- /.text -->
                </div>
                <!-- /.content -->
            </div>
            <div class="col-lg-12">
                <br><br>
                <a href="{{url('consultar_alianza')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir atras</a>
            </div>
            <!-- /.activity-item -->
        </div>
    </div>
</div>

@endsection