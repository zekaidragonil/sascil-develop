@extends('principal')
@section('view_actualizar_traspaso')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Adjuntar Archivos de la Solicitud N°: {{$solicitud[0]->solicitud_traspaso}}</h4>
        <div class="card-content">
            <form action="{{url('aprobar_traspaso')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" hidden name="id_traspaso" value="{{$solicitud[0]->id}}">
                <input hidden type="text" name="original_solicitud_credito_presupuestario" value="{{$solicitud[0]->solicitud_credito_presupuestario}}">
                <input type="text" hidden name="id_unidad" value="{{$solicitud[0]->id_unidad}}">
                <input type="text" hidden name="solicitud_traspaso" value="{{$solicitud[0]->solicitud_traspaso}}">
                <div class="form-group col-lg-12">
                    <label for="seleccionar partidas">Solicitud de Traspaso de Credito Presupuestario Aprobada</label><br>
                    <input type="file" name="solicitud_credito_presupuestario" id="solicitud_credito_presupuestario" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-rounded btn-success">Enviar <i class="fa fa-check"></i></button>
                    <a href="{{url('transferencia_presupuestaria')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection