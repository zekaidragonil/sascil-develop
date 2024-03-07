@extends('principal')


@section('content')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Solicitud de viáticos</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h1>{{ $comprometidos }}</h1>
                <p>Comprometidos</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h1>{{ $causados }}</h1>
                <p>Causados</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h1>{{ $pagados }}</h1>
                <p>Pagados</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h1>{{ $rechazados }}</h1>
                <p>Rechazados</p>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Trabajador reporte </h4>
		<!-- /.box-title -->
		<div class="card-content" >
            <div class="form-group col-xs-12">
            <div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h1>{{ $trabajador }}</h1>
                <p>Trabajadadores</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h1>{{ $rendicion }}</h1>
                <p>Cuanto reportaron </p>
            </div>
        </div>
    </div>
   
 
            </div>
        </div>
    </div>
</div>




@endsection