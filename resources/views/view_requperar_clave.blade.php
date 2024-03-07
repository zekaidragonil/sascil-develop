<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Corpoelec</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
</head>

<body>

<div id="single-wrapper">
	<form action="{{url('recupeara_clave')}}" method="post" class="frm-single">
	@csrf
        <div class="inside">
            <div class="title"><strong>SASCIL</strong></div>
            <!-- /.title -->
            <div class="frm-title">Recuperar Clave</div>
            <!-- /.frm-title -->
            <div class="frm-input"><input type="email" placeholder="Correo" name="correo" title="ingrese su correo eléctronico para recuperar su clave" class="frm-inp"><i class="fa fa-envelope frm-ico"></i></div>
            <!-- /.frm-input -->
            <button type="submit" class=" col-sm-12 btn waves-effect waves-light btn-rounded btn-success ">Enviar<i class="fa fa-arrow-circle-right"></i></button>
            <br><br><br>
            <a href="{{url('/')}}" class="a-link"><i class="fa fa-sign-in"></i>¿Ya tienes una cuenta? Inicie sesión.</a>
            <div class="frm-footer">Crystal Software Corporation © 2022.</div>
            <!-- /.footer -->
        </div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/scripts/sweetalert.init.min.js"></script>


	<script src="assets/scripts/main.min.js"></script>
</body>
</html>
