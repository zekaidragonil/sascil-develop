<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Corpoelec</title>
	<link rel="icon" href="assets/images/logo.png">
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
</head>

<body>

<div id="single-wrapper">
	<form action="{{url('login')}}" method="post" class="frm-single">
	@csrf
		<div class="inside">
			<div class="title"><strong>SASCIL</strong></div>
			<!-- /.title -->
			<div class="frm-title">Iniciar Sesión</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="email" title="ingrese su correo institucional" required name="correo" placeholder="Usuario" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" title="ingresar clave" minlength="8" maxlength="8" required name="clave" placeholder="Clave" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<!--
				<div class="pull-left">
					<div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label></div>
				</div>
				-->
				<!-- /.pull-left -->
				<div class="pull-right"><a href="{{url('recuperar_clave')}}" class="a-link"><i class="fa fa-unlock-alt"></i>Recuperar clave</a></div>
				<!-- /.pull-right -->
				<button type="submit" class=" btn btn-rounded btn-success waves-effect waves-light">Enviar <i class="fa fa-arrow-circle-right"></i></button>
			</div>
			<div class="frm-footer">Crystal Software Corporation © 2023.</div>
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
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Jquery UI -->
	<script src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
	<script src="assets/color-switcher/color-switcher.min.js"></script>

	<!-- Remodal -->
	<script src="assets/plugin/modal/remodal/remodal.min.js"></script>
	<!-- validacion de formulario -->
	<script type="text/javascript" src="assets/scripts/jquery-1.11.2.min.js"></script>
    <script src="assets/scripts/filtro.js"></script>

	<!-- Validator -->
	<script src="assets/plugin/validator/validator.min.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<!-- Dropify -->
	<script src="assets/plugin/dropify/js/dropify.min.js"></script>
	<script src="assets/scripts/fileUpload.demo.min.js"></script>

	<!-- Datepicker -->
	<script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

	<!-- Popover -->
	<script src="assets/plugin/popover/jquery.popSelect.min.js"></script>

		<!-- Select2 -->
		<script src="assets/plugin/select2/js/select2.min.js"></script>

	<!-- Multi Select -->
	<script src="assets/plugin/multiselect/multiselect.min.js"></script>
</body>
</html>
