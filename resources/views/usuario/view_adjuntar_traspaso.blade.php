@extends('principal')
@section('adjuntar_traspaso')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Adjuntar Archivos de la Solicitud N° {{$solicitud}}</h4>
        <div class="card-content">
            <form action="{{url('adjuntar_solicitud_traspaso')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" hidden name="id_traspaso" value="{{$id_traspaso}}"><input type="text" hidden name="numero_solicitud" value="{{$solicitud}}">
                <div class="form-group col-lg-6">
                    <label for="seleccionar partidas">Memorandum de aprobación</label><br>
                    <input type="file" name="memorandum_traspaso" id="memorandum_traspaso" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="seleccionar partidas">Solicitud de Traspaso de Credito Presupuestario</label><br>
                    <input type="file" name="solicitud_credito_presupuestario" id="solicitud_credito_presupuestario" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-rounded btn-success">Enviar <i class="fa fa-check"></i></button>
                    <a href="{{url('lista_traspaso_unidad')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection