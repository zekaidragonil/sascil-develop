@extends('principal')
@section('view_solicitud_contrato_alianza')
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Solicitud de Contratación a través de Alianza</h4>
        <!-- /.box-title -->
        <form action="{{url('#')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="card-content">
            <div class="form-group col-lg-6">
                <label for="exampleInputEmail1">Numero de Alianza</label>
                <select class="form-control" name="numero_alianza" required id="">
                    <option value="" seleted>- Seleccione -</option>
                    @foreach ($alianza as $key => $value)
                        <option value="{{$value->id}}">{{$value->numero_alianza}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="exampleInputEmail1">Certificación Presupuestaria</label>
                <select class="form-control" name="numero_alianza" required id="">
                    <option value="" seleted>- Seleccione -</option>
                    @foreach ($certificacion as $key => $value)
                        <option value="{{$value->id}}">{{$value->nombre_certificado}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-group col-lg-4">
                <label for="exampleInputFile">Forma 018</label>
                <input type="file" name="forma_018" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div> --}}
            <div class="form-group col-lg-4">
                <label for="exampleInputFile">Certificacion Presupuestaria</label>
                <input type="file" name="certificacion_presupuestaria" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-4">
                <label for="exampleInputFile">Presupuesto Base</label>
                <input type="file" name="presupuesto_base" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-4">
                <label for="exampleInputFile">Memorando Solicitud de Contratación</label>
                <input type="file" name="memorando_solicitud" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-6">
                <label for="exampleInputFile">Matriz de Evaluación Técnica</label>
                <input type="file" name="matriz_evaluacion" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-6">
                <label for="exampleInputFile">Espesificaciones Técnicas</label>
                <input type="file" name="esp_tecnicas" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-6">
                <button class="btn btn-success btn-rounded">Enviar <i class="fa fa-check"></i></button>
                <a href="{{url('principal')}}" class="btn btn-warning btn-rounded"><i class="fa fa-arrow-left"></i> Ir Atras</a>
            </div>
        </div>
        </form>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>

<script>
    function soloNumero(evt){
        if(window.event){//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
        }
        else{
        keynum = evt.which; //FF
        }
        //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
            return true;
        }
        else{
        return false;
        }
    }
</script>
@endsection