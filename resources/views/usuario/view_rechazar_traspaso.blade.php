@extends('principal')
@section('view_rechazar_traspaso')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Rechazar Solicitud N°: {{$solicitud[0]->solicitud_traspaso}}</h4>
        <div class="card-content">
            <form action="{{url('rechazar_traspaso')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" hidden name="id_traspaso" value="{{$solicitud[0]->id}}">
                <div class="form-group col-lg-12">
                    <label for="seleccionar partidas">Indique Llos motivos por el cual se procede aa rechazar la solicitud de traspaso</label><br>
                    <textarea required="true" required name="observaciones" id="textarea" max="3000" maxlength="3000" class="form-control"></textarea>
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