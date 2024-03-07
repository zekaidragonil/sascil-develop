@extends('principal')
@section('actualizar_estatus_solicitud')
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
		<h4 class="box-title">Certificacion presupuestaria N° {{$act[0]->nombre_solicitud}}</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <form action="{{url('actualizar_estatus_solicitud')}}" id="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$act[0]->id}}" hidden="true" >
                <input type="text" name="correlativo_unidad" value="{{$act[0]->correlativo_unidad}}" hidden="true" >
                <div class="form-group col-12">
                    <figure>
                    <label for="exampleInputFile">Solicitud de Certificación Presupuestaria </label>
                    <input type="file" name="solicitud" required accept=".pdf" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" />
                    <figcaption>Debe adjuntar la Solicitud de Certificacion presupuestaria con sello humedo y firma por parte del gerente general de la unidad.</figcaption>
                </figure>
                </div>
                <a href="{{url('lista_solicitud')}}" class="btn btn-warning btn-rounded btn-sm waves-effect waves-light"><i class="fa fa-arrow-left"></i> Ir Atras</a>
                <button type="submit" class="btn btn-success btn-rounded btn-sm waves-effect waves-light"> <i class="fa fa-check"></i> Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection