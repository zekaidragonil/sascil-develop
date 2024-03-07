@extends('principal')
@section('verificar_solicitud_alianza')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Revisión de solicitud de Alianza</h4>
        <!-- /.dropdown js__dropdown -->
        <div id="accordion" class="js__ui_accordion">
            <h3 class="accordion-title">Alianza Estrategica</h3>
            <div class="accordion-content">
                <h2>Documentos de solicitud de alianza estratégica</h2>
                <br>
                <ul>
                    <li><a href="{{$alianza[0]->punto_cuenta}}" target="_blank">Punto de Cuenta</a></li>
                    <li><a href="{{$alianza[0]->estimacion_costo}}" target="_blank">Estimacion de Costo</a></li>
                    <li><a href="{{$alianza[0]->espesificaciones_tecnicas}}" target="_blank">Espesificaciones técnicas</a></li>
                    <li><a href="{{$alianza[0]->forma_018}}" target="_blank">Forma 018</a></li>
                    <li><a href="{{$alianza[0]->matriz_tecnica}}" target="_blank">Matriz Técnica</a></li>
                    <li><a href="{{$alianza[0]->memorandum}}" target="_blank">Memorandum</a></li>
                    <li><a href="{{$alianza[0]->solpe}}" target="_blank">Solpe</a></li>
                </ul>
                <form action="">
                    <input type="text" hidden value="{{$alianza[0]->id}}" name= "id_solicitud">
                    <div class="form-group">
                        <br>
                        <div>
                            <label for=""><b><h2>Indique el estatus de la solicitud</h2></b></label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="estatus" id="revisado" value="reviado" required>
                            <label for="revisado">Revisado</label>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="estatus" id="rechazado" value="rechazado" required>
                            <label for="rechazado">Rechazado</label>
                        </div>
                        <div class="form-group" id="observaciones" style="display:none">
                            <label for="">Observaciones</label>
                            <textarea required class="form-control" name="observaciones" id="obs" cols="30" rows="10"></textarea>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <button class="btn btn-rounded btn-success" type="submit" onclick="">Enviar</button>
                            <a href="{{url('lista_alianzas_solicitadas')}}" class="btn btn-warning btn-rounded waves-effect waves-light" style="color:white"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.box-content -->
</div>
<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
<script>
 $(document).ready(function() {
    $("#rechazado").click(function() {
      $("obs").prop('required',true);
      $("#observaciones").show();
    });

    $("#revisado").click(function() {
        $("#observaciones").hide();
    });
  });
</script>
@endsection