@extends('principal')
@section('view_solicitar_alianza')

<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Solicitar Inicio de Proceso de Alianza</h4>
        <!-- /.box-title -->
        <form action="{{url('solicitar_alianza')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="card-content">
            <div class="form-group col-lg-4">
                <label for="exampleInputEmail1">Número de Punto de Cuenta</label>
                <input type="text" name="numero_punto" required class="form-control" title="ejemplo: 0987-2003">
            </div>
            <div class="form-group col-lg-4">
                <label for="exampleInputEmail1">Número de Control</label>
                <input type="text" name="numero_control" required class="form-control" title="ejemplo: 0987-2003" placeholder="" >
            </div>
            <div class="form-group col-lg-4">
                <label for="exampleInputEmail1">Fecha del Punto</label>
                <input id="" type="date" name="fecha_punto" required class="form-control">
            </div>
            <div class="form-group col-lg-12">
            <label for="exampleInputEmail1">Descripción del Objeto de la Alianza Estratégica</label>
                <textarea class="form-control" id="textarea" name="descripcion" maxlength="3000" required="true" cols="30" rows="10"></textarea>
            </div>
            <div name="enviar" class="form-group col-lg-3">
                <label for="exampleInputFile">Punto de Cuenta de Inicio de Proceso</label>
                <input type="file" name="punto_cuenta" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            {{-- <div class="form-group col-lg-4">
                <label for="exampleInputFile">Estimación de Costo</label>
                <input type="file" name="e_costo" accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div> --}}
            <div class="form-group col-lg-3">
                <label for="exampleInputFile">Especificaciones Técnicas</label>
                <input type="file" name="e_tecnicas" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            {{-- <div class="form-group col-lg-4">
                <label for="exampleInputFile">Forma 018</label>
                <input type="file" name="forma_018" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div> --}}
            <div class="form-group col-lg-3">
                <label for="exampleInputFile">Matríz Técnica</label>
                <input type="file" name="m_tecnica" accept=".pdf"  required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
            </div>
            <div class="form-group col-lg-3">
                <label for="exampleInputFile">Memorandum de Solicitud</label>
                <input type="file" name="memorandum" accept=".pdf" required class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
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
