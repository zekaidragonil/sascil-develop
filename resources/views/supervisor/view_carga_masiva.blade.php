@extends('principal')
@section('view_carga_masiva')
<div class="col-md-12 col-xs-12">
    <div class="box-content col-lg-12">
        <h1 class="box-title">Proceso de carga masiva del Plan Operativo Anual del año {{date('Y')}}</h1>
    </div>
</div>
<div class="col-md-12 col-xs-12">
    <form action="{{url('carga_masiva')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-content col-lg-12">
        <h3 class="box-title">Cargar archivo de proyectos <button type="button" title="Ejemplo de la estructura del archivo de proyecto" class="btn btn-info btn-circle btn-xs waves-effect waves-light" data-toggle="modal" data-target="#boostrapModal-2"><i class="fa fa-question"></i></button></h3>
        <!-- /.box-title -->
        <!-- /.dropdown js__dropdown -->
        @if (count($proyecto) == 1)
            <input type="file" disabled="true" name="proyectos" accept=".xls, .xlsx, .ods" id="input-file-now-custom-1" class="dropify" data-default-file="" />
        @else
            <input type="file" required name="proyectos" accept=".xls, .xlsx, .ods" id="input-file-now-custom-1" class="dropify" data-default-file="" />
        @endif
        
    </div>

    <div class="box-content col-lg-12">
        <h3 class="box-title">Cargar archivo de partidas <button type="button" title="Ejemplo de la estructura del archivo de partidas" class="btn btn-info btn-circle btn-xs waves-effect waves-light" data-toggle="modal" data-target="#boostrapModal-3"><i class="fa fa-question"></i></button></h3>
        <!-- /.box-title -->
        <!-- /.dropdown js__dropdown -->
        @if (count($partida) == 1)
            <input type="file" disabled required name="partidas" accept=".xls, .xlsx, .ods" id="input-file-now-custom-1" class="dropify" data-default-file="" />
        @else
            <input type="file" required name="partidas" accept=".xls, .xlsx, .ods" id="input-file-now-custom-1" class="dropify" data-default-file="" />
        @endif
        
    </div>

    <div class="box-content col-lg-12">
        @if (count($partida)==1 and count($proyecto) == 1)
            <button type="submit" disabled class="btn btn-success btn-rounded">Enviar</button>
        @else
            <button type="submit" class="btn btn-success btn-rounded">Enviar</button>
        @endif
        
    </div>
</form>
    <!-- /.box-content -->
</div>

@endsection
