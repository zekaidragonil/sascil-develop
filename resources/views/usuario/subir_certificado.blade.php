@extends('principal')
@section('subir_certificado')
<style>
    figcaption {
  display:none; 
  transition: all .5s;
}
/* Visible texto */figure:hover > figcaption {
  display:block;
  transition: all .5s;
}
</style>
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Cargar Certificación Presupuestaria</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <form action="{{url('aprobar_certificacion')}}" id="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$id_certificado}}" hidden="true" >
                <div class="form-group col-12">
                    <figure>
                    <label for="exampleInputFile">Solicitud de Certificación Presupuestaria </label>
                    <input type="file" name="certificado" required accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                    <figcaption>Debe adjuntar la Certificacion presupuestaria con sello humedo.</figcaption>
                </figure>
                </div>
                <div class="form-group col-lg-6">
                    <a href="{{url('revisar_certificaciones')}}" class="btn btn-warning btn-rounded btn-sm waves-effect waves-light"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                    <button type="submit" class="btn btn-success btn-rounded btn-sm waves-effect waves-light">Enviar <i class ="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection