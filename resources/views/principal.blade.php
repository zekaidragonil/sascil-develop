<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>SASCIL - CORPOELEC</title>
	<link rel="icon" href="assets/images/logo.png">
	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

    <!-- Fontello Icon -->
	<link rel="stylesheet" href="assets/fonts/fontello/fontello.css">

	<!-- Themify Icon -->
	<link rel="stylesheet" href="assets/fonts/themify-icons/themify-icons.css">

	<!-- Jquery UI -->
	<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.theme.min.css">

	<!-- FlexDatalist -->
	<link rel="stylesheet" href="assets/plugin/flexdatalist/jquery.flexdatalist.min.css">

	<!-- Popover -->
	<link rel="stylesheet" href="assets/plugin/popover/jquery.popSelect.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="assets/plugin/select2/css/select2.min.css">
	

	<!-- Color Picker -->
	<link rel="stylesheet" href="assets/color-switcher/color-switcher.min.css">

	<!-- Remodal -->
	<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css">
	<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal-default-theme.css">

	<!-- Google Design Iconic -->
	<link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

	<!-- Dropify -->
	<link rel="stylesheet" href="assets/plugin/dropify/css/dropify.min.css">

	<!-- Datepicker -->
	<link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">


	<!-- Touch Spin -->
	<link rel="stylesheet" href="assets/plugin/touchspin/jquery.bootstrap-touchspin.min.css">

	<!-- DateRangepicker -->
	<link rel="stylesheet" href="assets/plugin/daterangepicker/daterangepicker.css">
	
	<!-- Toastr -->
	<link rel="stylesheet" href="assets/plugin/toastr/toastr.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="assets/plugin/select2/css/select2.min.css">

	<!--Data tabla con botons para exportar-->
	<link rel="stylesheet" type="text/css" href="assets/plugin/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="assets/plugin/datatables/extensions/Buttons/css/buttons.dataTables.css">
	<link rel="stylesheet" type="text/css" href="assets/plugin/datatables/extensions/Buttons/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="assets/plugin/datatables/extensions/Buttons/examples/resources/demo.css">
</head>

<body>
<div class="main-menu">
	<header class="header">
		<!--hacer referencia a la apagina principal--><a href="#" class="logo"><img src="assets/images/min.png" width="120" height="300" alt=""></a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="assets/images/usuarios.png" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="#" title="{{session('nombre')}} {{session('apellido')}}"><!--colocar el nombre y apellido del usuario-->{{session('nombre')}} {{session('apellido')}}</a></h5>

			<h5 class="position"><!--colocar el tipo de usuario-->
			@if(session('id_perfil')==1)
				Administrador
			@endif
			@if(session('id_perfil')==2)
				Gerente
			@endif
            @if(session('id_perfil')==3)
            Usuario
            @endif
			@if(session('id_perfil')==4 && session('id_unidad')!=22)
				Analista
			@endif
			@if (session('id_perfil')==4 && session('id_unidad')==22)
				Asignación
			@endif
			@if (session('id_perfil')==5)
				Recepción
			@endif
			@if (session('id_perfil')==6)
				Supervisor
			@endif
			</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					@if(session('id_perfil')==1)
					<div class="control-item"><a href="{{url('view_perfil')}}"><i class="fa fa-user"></i> Perfil</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> Configuración</a></div>
					@endif
					<div class="control-item"><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Cerrar Seción</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content mCS_no_scrollbar">
		<div class="navigation">
			<h5 class="title">Menú</h5>
			<!-- /.title -->
			@if(session('id_perfil') == 1) <!--Menu del administrador-->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-user"></i>   <span>Usuarios</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{url('agregar_usuarios')}}">&nbsp;&nbsp;&nbsp;<i class="ico icon-user-plus"></i>  Agregar Usuario</a></li>
						<li><a href="{{url('consultar_usuario')}}">&nbsp;&nbsp;&nbsp;<i class="ico icon-edit-1"></i>   Actualizar Usuarios</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-cog"></i><span>Configuración</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{url('view_entes')}}"><i class="ico icon-building-filled">  </i>Ente</a></li>
						<li><a href="{{url('view_perfil')}}"><i class="ico icon-cog">  </i>Perfil</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				{{-- <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-money-2"></i><span>Financiamiento</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#"><i class="ico icon-money"></i>   Agregar Fuente</a></li><!--fuente de financiamiento del instrumento legal-->
						<li><a href="#"><i class="ico icon-search-3"></i>    Consultar</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li> --}}
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-doc-text"></i><span>Reportes</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#"><i class="ico icon-search"></i>   Buscar</a></li><!--fuente de financiamiento del instrumento legal-->

					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					{{--<a href="{{url('view_registro')}}"><i class="menu-icon fa fa-seting"></i><span>Actividad del Sistema</span></a>--}}
					<a class="waves-effect" href="{{url('actividad_sistema')}}"><i class="menu-icon icon-eye-3"></i><span>Actividad del Sistema</span></a>
				</li>
			</ul>
			@endif
			{{--@if(session('id_perfil')==2 && session('id_unidad')!=5)--}}
			@if(session('id_perfil')==2 && session('id_unidad') != 16)
			<ul class="menu js__accordion">
				<li class="">
					<a class="waves-effect" href="{{url('cert_reversar')}}"><i class="menu-icon icon-back"></i><span>Reversar Cert.</span></a>
				</li>
			</ul>
			@endif
			@if (session('id_perfil')==4 && session('id_unidad')==16)
			<ul class="menu js__accordion">
				<li class="">
					<a class="" href="{{url('revisar_certificaciones')}}"><i class="menu-icon ico zmdi zmdi-search-in-file zmdi-hc-fw"></i><span title="Revisar Certificaciones">Revisar Cert.</span></a>
				</li>
			</ul>
			<ul class="menu js__accordion">
				<li>
					<!--convertir en lista de traspaso-->
					<a class="waves-effect" href="{{url('transferencia_presupuestaria')}}"><i class="menu-icon icon-loop-outline"></i><span>Traspaso</span></a>
				</li>
			</ul>
			<ul class="menu js__accordion">
				<li>
					<!-- convertir en lista de modificación-->
					<a class="waves-effect" href="{{url('lista_modificacion_presupuestaria')}}"><i class="menu-icon icon-edit-2"></i><span title="modificaciones presupuestarias solicitadas">Modificación</span></a>
				</li>
			</ul>
			@endif
			@if(session('id_perfil')==3){{--menu para usurios de todas las unidades administrativas--}}
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-certificate">
					</i><span>Certificación</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a href="{{url('consulta_presupuestaria')}}"><i class="icon-search"></i>&nbsp;&nbsp;	<span title="Consultar Presupuesto Disponible">Consultar Presupuesto</span></a>
						</li>
						<li>
							<a href="{{url('certificado_presupuestario')}}"><i class="icon-doc-new"></i>&nbsp;&nbsp;<span title="Nueva Solicitud Presupuestaria">Nueva Solicitud</span></a>
						</li>
						<li>
							<a href="{{url('view_disponibilidad_presupuestaria')}}"><i class="icon-doc-new"></i>&nbsp;&nbsp;<span title="Nueva Solicitud Presupuestaria">Disponibilidad Presupuestaria</span></a>
						</li>
						{{-- <li>
							<a class="waves-effect parent-item js__control" href="#"><i class="sub-menu-icon icon-list">
							</i><span>Lista de Crtf.</span><span class="menu-arrow fa fa-angle-down"></span></a>
							<ul class="sub-menu js__content">
								<li>
									<a href="{{url('lista_guardado')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Guardado</span></a>
								</li>
							</ul>
						</li> --}}
						<li>
							<a href="{{url('lista_solicitud')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Lista de Solicitudes</span></a>
						</li>
						{{-- <li>
							<a href="{{url('lista_espera')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Enviados</span></a>
						</li>
						<li>
							<a href="{{url('lista_revisado')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Revisado</span></a>
						</li>
						<li>
							<a href="{{url('lista_aprobado')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Aprobado</span></a>
						</li>
						<li>
							<a href="{{url('lista_rechazado')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Rechazado</span></a>
						</li>
						<li>
							<a href="{{url('lista_reversado')}}"><i class="icon-list"></i>&nbsp;&nbsp;<span title="Certificaciones Solicitadas">Reversado</span></a>
						</li> --}}
					</ul>
				</li>				
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-cogs">
					</i><span>Mdf. Presupuestaria </span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('añadir_llave_presupuestaria')}}"><i class="ico icon-plus"></i>&nbsp;&nbsp;Solicitar Modificación<span title="Aladir una nueva llave presupuestaria "></span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_presupuestaria')}}"><i class="ico icon-edit-alt"></i><span title="Listado de modificaciones Presupuestarias">&nbsp;&nbsp;Lista de Modificaciones</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('solicitud_transferencia')}}"><i class="icon-loop-outline"></i><span title="solicitar transferencias presupuestarias">&nbsp;&nbsp;Solicitar Traspaso</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_traspaso_unidad')}}"><i class="icon-list-alt"></i><span title="solicitar transferencias presupuestarias">&nbsp;&nbsp;Lista de Traspasos</span></a>
						</li>
					</ul>
				</li>
				
				<li>
					<a class="waves-effect" href="{{url('solicitud')}}"><i class="menu-icon icon-edit-1"></i><span>Solicitud Inicio de Contratación</span></a>
				</li>
				<li>
					<a class="waves-effect" href="{{url('lista_solicitudes_unidad')}}"><i class="menu-icon icon-list-alt"></i><span>Lista de Solicitudes de Inicio de Contratación</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon icon-users">
					</i><span>Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<!--"{{url('view_solicitar_alianza')}}"-->
						<li>
							<a href="{{url('view_solicitar_alianza')}}"><i class=" ico icon-money">&nbsp;&nbsp;</i>Solicitar Alianza</a>
						</li><!--fuente de financiamiento del instrumento legal-->
						<li>
							<a href="{{url('consultar_alianza')}}"><i class=" ico icon-search-3">&nbsp;&nbsp;</i>Consultar Alianzas</a>
						</li>
						<li>
							<a href="{{url('solicitud_contratacion_alianza')}}"><i class="ico icon-search-3">&nbsp;&nbsp;</i>Solicitar Contratación por una Alianza</a>
						</li>
						@if (session('id_unidad')==22)
						<li>
							<a class="wave-effect" href="{{url('analisis_alianza')}}">
								<i class="fa fa-list">&nbsp;&nbsp;&nbsp;</i>Lista de Alianzas
							</a>
						</li>
						<!--registrar empresas para realizar las alianzas-->
						<li>
							<a class="waves-effect" href="{{url('view_registro_empresa')}}"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i><span>Registro Empresas</span></a>
						</li>
						@endif
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				{{--instrumento legales--}}
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-edit">
					</i><span>Instrumentos Legales</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a href="{{url('estatus_instrumento_legal')}}"><i class="fa fa-search">&nbsp;&nbsp;</i>Estatus</a>
						</li><!--estatus de Instrumentos legales-->
						<li>
							<a href="{{url('adendum_intrumento')}}"><i class="fa fa-file">&nbsp;&nbsp;</i>Instrumentos con Adendum</a>
						</li><!-- instrumentos legales que tienen adendum de modificacion de contreto-->
						<li>
							<a href="{{url('cargar_factura')}}"><i class="fa fa-upload">&nbsp;&nbsp;</i>Cargar Factura</a>
						</li><!--carga de facturas por instrumento legal-->
					</ul>
				</li>
			</ul>
			@endif
			{{--
			@if(session('id_perfil')==3 && session('id_unidad')==5) <!-- menu para usuarios de presupuesto-->
			<ul class="menu js__accordion">
				<li>
					<a href="{{url('lista_solicitudes_completas')}}"><i class="menu-icon fa fa-seting"></i><span>Lista de Solicitudes</span></a><!--listado de solicitudes de certificacion presupuestaria-->
				</li>
			</ul>
			@endif
			--}}
			{{--lista de solicitudes del gerente nacional de procura--}}
			@if(session('id_unidad')==22 && session('id_perfil')==2)
			
			<ul class="menu js__accordion">
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Solicitudes de Contratos</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('lista_solicitudes_completas')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;Lista de Solicitudes</a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_contrataciones_aceptadas')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Asignar Solicitud de Contratación</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Solicitudes de Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('lista_alianzas_asignadas_analista')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;Alianzas Asignada</a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_asignar_alianza')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp; Asignar Alianzas</a>
						</li>
					</ul>
				<!--revision por parte del supervisor de las solicitudes de alianzas revisadas por los analistas-->
				
			</ul>
			
			@endif
			
			{{--Menu para el gerente regional de procura--}}
			@if(session('id_unidad')==22 && session('id_perfil')==6)
			<ul class="menu js__accordion">
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Solicitudes de Contratos</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('lista_solicitudes_completas_regional')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;Lista de Solicitudes</a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_contrataciones_regional')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Asignar Solicitud de Contratación</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Solicitudes de Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('lista_alianzas_asignadas_analista')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;Alianzas Asignadas</a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_asignar_alianza_analista')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp; Asignar Alianzas</a>
						</li>
					</ul>
				<!--revision por parte del supervisor de las solicitudes de alianzas revisadas por los analistas-->
			</ul>
			@endif

			@if(session('id_perfil')==2 && session('id_unidad')==16){{--menu para supervisores de presupuesto--}}
			<ul class="menu js__accordion">
				{{-- <li class="">
					<a class="waves-effect" href="{{url('lista_cert_reversar')}}"><i class="menu-icon icon-back"></i><span>Reversar Cert.</span></a>
				</li> --}}
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>POA</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a href="{{url('view_carga_masiva')}}"><i class="ico icon-upload-outline"></i><span>Carga Masiva</span></a>
						</li>
						<li>
							<a href="{{url('lista_poa')}}"><i class="ico icon-search"></i><span>Carga Presupuestaria</span></a>
						</li>
						<li>
							<a href="{{url('view_lista_poa')}}"><i class="ico icon-list"></i><span>Listas POA</span></a>
						</li>
						<li>
							<a href="{{url('poa')}}"><i class="ico icon-plus"></i><span>Cargar POA</span></a>
						</li>
					</ul>
				</li>
				@if(session('id_perfil')==4 && session('id_unidad')==16)
				<li>
					<!--convertir en lista de traspaso-->
					<a class="waves-effect" href="{{url('transferencia_presupuestaria')}}"><i class="menu-icon icon-loop-outline"></i>&nbsp;&nbsp;<span>Traspaso</span></a>
				</li>
				<li>
					<!-- convertir en lista de modificación-->
					<a class="waves-effect" href="{{url('lista_modificacion_presupuestaria')}}"><i class="menu-icon icon-edit-2"></i>&nbsp;&nbsp;<span title="modificaciones presupuestarias solicitadas">Modificación</span></a>
				</li>
				@endif
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Mdf Presupuestaria</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('asignar_traspaso')}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;<span>Asignar Traspaso</span></a>
						</li>
						<li>
							<!-- Lista de traspasos-->
							<a class="waves-effect" href="{{url('lista_traspasasos_asignados')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Listas Traspaso</span></a>
						</li>
						
						
						<li>
							<a class="waves-effect" href="{{url('asignar_modificacion')}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;<span>Asignar Modificación</span></a>
						</li>
						<li>
							<!-- Lista de Modificaciones de presupuesto asignadas-->
							<a class="waves-effect" href="{{url('lista_modificaciones')}}"><i class="icon-edit-2"></i>&nbsp;&nbsp;<span title="modificaciones presupuestarias solicitadas">Lista de Modificaciones</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a class="waves-effect" href="{{url('lista_certificacion')}}"><i class="menu-icon icon-certificate-outline"></i><span>Asignar Certificaciones</span></a>
				</li>
				<li>
					<a class="waves-effect" href="{{url('lista_certificacion_asignadas')}}"><i class="menu-icon fa fa-list"></i><span>Lista de Cert. Asignadas</span></a>
				</li>
				<li>
					<a class="waves-effect" href="{{url('view_traspaso_entre_unidades')}}"><i class="menu-icon fa fa-exchange"></i><span>Traspaso entre Unidades</span></a>
				</li>
				<li>
					<a class="waves-effect" href="{{url('view_reporte_presupuesto')}}"><i class="menu-icon fa fa-exchange"></i><span>Reportes de Presupuesto</span></a>
				</li>
			</ul>
			@endif
			{{-----------------------------------------------------------------}}
			{{-- menu para el analista de la gerencia general de contrataciones --}}
			@if (session('id_perfil')==4 && session('id_unidad')==22)
			<ul class="menu js__accordion">		
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('lista_alianzas_recibidas_analizar')}}"><i class="fa fa-search"></i>&nbsp;<span>Analizar Alianzas</span></a>
						</li>
					
						<li>
							<a class="waves-effect" href="{{url('lista_alianzas_recibidas')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Alianzas</span></a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="menu js__accordion">		
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Revisar Contrataciones</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('analizar_solicitudes_recibidas')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Revisar Documentos</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_solicitudes_procesadas')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Solicitudes</span></a>
						</li>
					</ul>
				</li>
			</ul>
			@endif
			{{----------------------------------------------------------------}}
			
			@if (session('id_perfil')==5 ){{--menu para recepcion de procura--}}
			{{----------------------------------------------------------------}}
			<ul class="menu js__accordion">		
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon icon-newspaper"></i> <span>Revisar Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							
							<a class="waves-effect" href="{{url('lista_alianzas_aceptadas')}}"><i class="fa fa-edit"></i>&nbsp;<span>Revisión de Alianza</span></a>
						</li>
					
						<li>
							<!--href="{{url('lista_alianzas_recepcion')}}"-->
							<a class="waves-effect" href="{{url('lista_alianzas_recepcion')}}" ><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Consultar Alianzas</span></a>
						</li>
					</ul>
				</li>
			</ul>

			<ul class="menu js__accordion">		
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Revisar Contrataciones</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('analizar_solicitudes')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Revisar Documentos</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_solicitudes_taquilla')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Solicitudes</span></a>
						</li>
					</ul>
				</li>
			</ul>
			@endif
			<!-- Analista Consultor de Procura-->
			@if (session('id_perfil')==7 && session('id_unidad')==22)
			<ul class="menu js__accordion">		
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Solicitudes de Contrato</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('analizar_solicitudes_consultor')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Analizar Solicitudes</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_solicitudes_consultor')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Solicitudes</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Solicitudes de Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('lista_alianza_consultor_analizar')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Analizar Alianzas</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('lista_alianzas_asignadas_analista')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Alianzas</span></a>
						</li>
					</ul>
				</li>
			</ul>
						
			<ul class="menu js__accordion">		
				<li>
					<a href="{{url('view_registro_empresa')}}" class="waves-effect"><i class="menu-icon fa fa-building"></i> <span>Agregar Empresa</span></a>
				</li>
			</ul>
			@endif
			@if (session('id_perfil')==2 && session('id_unidad')==8)
				<ul class="menu js__accordion">		
					<li>
						<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Solicitudes de Contrato</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li>
								<a class="waves-effect" href="{{url('view_asignar_solicitud_contrato')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Asignar Solicitudes de Contrato</span></a>
							</li>
							<li>
								<a class="waves-effect" href="{{url('lista_solicitudes_asignadas_juridico')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Solicitudes Asignadas</span></a>
							</li>
						</ul>
					</li>

					{{-- <li>
						<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Solicitudes de Contrato</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li>
								<a class="waves-effect" href="{{url('#')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Elaborar Contrataciones</span></a>
							</li>
							<li>
								<a class="waves-effect" href="{{url('#')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Contratos</span></a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Solicitudes de Alianzas</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li>
								<a class="waves-effect" href="{{url('lista_alianza_consultor_analizar')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Analizar Alianzas</span></a>
							</li>
							<li>
								<a class="waves-effect" href="{{url('lista_alianzas_asignadas_analista')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de Alianzas</span></a>
							</li>
						</ul>
					</li> --}}
				</ul>
			@endif
			@if (session('id_perfil')==4 && session('id_unidad')==8)
				<ul class="menu js__accordion">
					<li>
						<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Solicitudes de Contrato</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li>
								<a class="waves-effect" href="{{url('analizar_solicitud_contrato_juridico')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Analizar Solicitud de Contrato</span></a>
							</li>
							<li>
								<a class="waves-effect" href="{{url('lista_contratos_suscritos')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Lista de contratos Suscritos</span></a>
							</li>
						</ul>
					</li>
				</ul>
			@endif
			@if(session('id_perfil')==2 && session('id_unidad')==11)
			<ul class="menu js__accordion">
				<li>
					<a href="#" class="waves-effect parent-item js__control"><i class="menu-icon fa fa-file-text-o"></i> <span>Facturas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li>
							<a class="waves-effect" href="{{url('#')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;<span>Cargar Factura</span></a>
						</li>
						<li>
							<a class="waves-effect" href="{{url('#')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;<span>Consulta de Facturas</span></a>
						</li>
					</ul>
				</li>
			</ul>
			@endif
			@if(session('id_perfil')==4 && session('id_unidad')==11)
			@endif
		</div>
		<!-- /.navigation -->
    </div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Principal</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->

<!---->
<!--revisar si se pueden hacer notificacion y busquedas en el sistema-->
<!---->
{{--
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
		<!-- /.ico-item fa fa-fa-arrows-alt -->

        <div class="ico-item toggle-hover js__drop_down ">
			<span class="fa fa-th js__drop_down_button"></span>
			<div class="toggle-content">
				<ul>
					<li><a href="#"><i class="fa fa-github"></i><span class="txt">Github</span></a></li>
					<li><a href="#"><i class="fa fa-bitbucket"></i><span class="txt">Bitbucket</span></a></li>
					<li><a href="#"><i class="fa fa-slack"></i><span class="txt">Slack</span></a></li>
					<li><a href="#"><i class="fa fa-dribbble"></i><span class="txt">Dribbble</span></a></li>
					<li><a href="#"><i class="fa fa-amazon"></i><span class="txt">Amazon</span></a></li>
					<li><a href="#"><i class="fa fa-dropbox"></i><span class="txt">Dropbox</span></a></li>
				</ul>
				<a href="#" class="read-more">More</a>
			</div>
			<!-- /.toggle-content -->
		</div>
        <!-- /.ico-item -->
		<a href="#" class="ico-item fa fa-envelope notice-alarm js__toggle_open" data-target="#message-popup"></a>
        Github
		<a href="#" class="ico-item pulse"><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
		<a href="#" class="ico-item fa fa-power-off js__logout"></a>
	</div>
--}}
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

{{-- <div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Anna William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
					<span class="name">Update Status</span>
					<span class="desc">Failed to get available update data. To ensure the please contact us.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Michael Zenaty</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">50 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Simon</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">1 hour</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
					<span class="name">Account Contact Change</span>
					<span class="desc">A contact detail associated with your account has been changed.</span>
					<span class="time">2 hours</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Helen 987</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Yesterday</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Denise Jenny</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">Oct, 28</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Thomas William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Oct, 27</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div> --}}
<!-- /#notification-popup -->

{{-- <div id="message-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Harry Halen</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Thomas Taylor</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/usuarios.png" alt=""></span>
					<span class="name">Helen Candy</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Anna Cavan</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 hour ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-success"><i class="fa fa-user"></i></span>
					<span class="name">Jenny Betty</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 day ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Denise Peterson</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 year ago</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div> --}}
<!-- /#message-popup -->
<div class="main-content">
	<div class="row small-spacing">
		<!--Vistas del administrador-->
		@yield('agregar_usuarios')
		@yield('view_registro')
		@yield('view_consulta')
		@yield('view_editar_usuario')
		@yield('view_entes')
		@yield('agregar_ente')
		@yield('view_unidad')
		@yield('agregar_unidad')
		@yield('actualizar_unidad')
		@yield('view_perfil')
		@yield('view_fiente_financiamiento')
        
		<!--Vistas del Supervisor de Presupuesto-->
		<!--guardar nuevo proyecto poa-->
		@yield('view_solicitud')
		@yield('view_solicitudes_procesadas')
		@yield('lista_solicitud')
		@yield('lista_archivos')
        @yield('lista_proyectos')
        @yield('carga_partida_presupuesto')
        @yield('ver_partida_proyecto')
        @yield('actualizar_certificado')
        @yield('view_carga_masiva')
		@yield('view_consulta_poa')

        @yield('content')

		<!--vista de traspaso presupuestario-->
		@yield('asignar_traspaso')
		@yield('lista_traspaso_asignado')
		@yield('adjuntar_traspaso')
		@yield('view_solicitudes_procesadas_gerente')
		@yield('view_solicitudes_procesadas_presupuesto')
		@yield('view_actualizar_traspaso')
		@yield('view_rechazar_traspaso')
		<!--asignar modificacion presupuestaria-->
		@yield('asignar_modificacion')
		@yield('view_aignar_modificacion')
		@yield('lista_modificaciones')

		<!--vista del supervisor de procura-->
		@yield('lista_solicitud_procura')
		@yield('lista_archivos_procura')
		@yield('lista_alianzas_asignadas')
		@yield('lista_solicitudes_aceptadas')
		@yield('lista_solicitudes_numeradas')
		@yield('reporte_presupuesto')

		<!--vista de analista de presupuesto-->
		@yield('revision')
		@yield('subir_certificado')
		<!--vista para el analista de presupuesto-->
		@yield('view_guardar_proyecto')

        <!--Vista para supervisor de la unidad administrativa-->
        @yield('lista_rev_certificacion')
		@yield('certificacion_presupuestaria_asignadas')
        <!--vista para el usuario de las unidades adminsitrativas-->
        @yield('certificacion_presupuestaria')
        @yield('solicitar_certificacion')
		@yield('consulta_presupuestaria')
        @yield('lista_certificaciones_unidad')
		@yield('actualizar_estatus_solicitud')
		@yield('lista_traspaso_unidad')
		@yield('traspaso')
		@yield('traspaso_entre_unidades')
		@yield('view_disponibilidad_presupuestaria')

		@yield('lista_presupuestaria')
		@yield('modificacion_presupuestaria')
		@yield('lista_presupuestaria_unidad')
		@yield('lista_presupuestaria_global')
		@yield('añadir_llave_presupuestaria')
		@yield('view_solicitar_alianza')
		@yield('consultar_alianza')
		@yield('view_solicitud_contrato_alianza')
		@yield('view_cargar_factura')

		<!--Vista del analista de taquilla en procura-->
		@yield('revisar_solicitud_alianza_recepcion')

		<!--vistas de analista de recepcion-->

		@yield('alianzas_solicitadas')
		@yield('revisar_solicitud_alianza')
		@yield('lista_alianzas')
		@yield('analisis_solicitudes')
		
		@yield('lista_solicitudes')

		<!--vistas de  gerencia general de contrataciones-->
		@yield('alianzas_recibidas')
		@yield('asignar_numero_alianza')
		@yield('lista_alianzas_procesadas')
		@yield('view_ver_alianza_gerente')
		@yield('view_ver_alianza_gerente_regional')
		<!--vistas de procupra para consultar las alianzas-->
		@yield('view_alianza')
		@yield('verificar_solicitud_alianza')
		@yield('view_actualizar_solicitud_lianza')
		@yield('view_analisis_alianza')
		@yield('view_registro_empresa')
		@yield('alianzas_asignadas')
		@yield('asignar_alianza')
		@yield('asignar_alianza_analista')
		@yield('asignar_solicitud_analista')
		@yield('consultar_alianza_consultor')
		<!--vistas de alianzas para ser asignadas a los gerentes regionales-->
		@yield('asignar_solicitud_gerente')

		<!--Lista de solicitudes por consultor de procura-->
		@yield('view_lista_solicitudes_consultor')
		@yield('view_analizar_solicitud_consultor')
		@yield('view_lista_solicitudes_consultor_procesadas')
		@yield('view_verificar_solicitud_consultor')
		@yield('view_archivos_gerente_general')
		@yield('view_archivos_gerente_regional')
		<!---->
		<!--Lista de alianzas consultadas por el consultor de procura-->
		@yield('consulta_alianza_consultor')
		@yield('analizar_alianza_consultor')

		<!--Lista de Solicitudes adjudicadas para ser asignadas pro el gerente de consultoria juridica-->
		@yield('view_lista_solicitudes_adjudicadas')
		@yield('lista_solicitudes_asignadas_juridico')
		@yield('view_consultar_solicitud_contrato_gerente')

		<!--Lista de Solicitudes asignadas a los analistas de consultaria juridica para para generar y suscribir el contrato-->
		@yield('view_solicitud_analizar_juridico')
		@yield('view_actualizar_estatus_solicitud_juridico')
		@yield('lista_instrumentos_legales')
		@yield('view_lista_instrumentos_legales_unidad')


		<!--consulta de informacion de actividades en el sistema-->
		@yield('consulta_auditoria')
		@yield('view_expediente_consultor_juridico')
    </div>
</div>

{{--modal de carga masiva, estructura de archivos--}}
<div class="modal fade" id="boostrapModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1">Estructura del archivo de carga masiva de proyectos</h4>
			</div>
			<div class="modal-body">
				<p>En este ejemplo podemos ver la estructura del archivo de proyectos, en dicha estructura, se define el orden de cada campo para ser cargado en el sistema, al momento de subir el archivo, se deben obviar los encabezados ya que estos no son parte de la información.</p>
                <div class="col-lg-12 col-xs-12">
                    <br><br>
                    <div class="box-content">
                        <h4 class="box-title">Ejemplo del Archivo de Proyectos</h4>
                        <!-- /.dropdown js__dropdown -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre de la Unidad</th> 
                                    <th>Nombre del Macroproyecto</th> 
                                    <th>Categoría</th>
                                    <th>Fuente</th>
                                    <th>Nombre del Proyecto</th>
                                    <th>Proyecto Presupuestario</th>
                                    <th>Monto</th> 
                                    <th>Año</th>
                                </tr> 
                            </thead>
                            
                                <tr> 
                                    <th scope="row">1</th> 
                                    <td>CENTRO NACIONAL DE DESPACHO</td> 
                                    <td>DIRECCIÓN Y COORDINACIÓN DE LOS GASTOS DE LOS TRABAJADORES</td>
                                    <td>A</td>
                                    <td>MPPEE</td>
                                    <td>DIRECCIÓN Y COORDINACIÓN DE LOS GASTOS DE LOS TRABAJADORES</td>
                                    <td>AC001AE001</td>
                                    <td>35.024.412,00</td>
                                    <td>2023</td>
                                </tr> 
                                <tr> 
                                    <th scope="row">2</th> 
                                    <td>GERENCIA GENERAL DE AMBIENTE, SEGURIDAD E HIGIENE OCUPACIONAL</td> 
                                    <td>GESTIÓN ADMINISTRATIVA</td>
                                    <td>A</td>
                                    <td>FONDPROPIO</td>
                                    <td>GESTIÓN ADMINISTRATIVA</td>
                                    <td>AC001AE001</td>
                                    <td>10.000.000,00</td>
                                    <td>2023</td>  
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                    <!-- /.box-content -->
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="boostrapModal-3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1">Estructura del archivo de carga masiva de partidas</h4>
			</div>
			<div class="modal-body">
				<p>En este ejemplo podemos ver la estructura del archivo de partidas, en esta, se define el orden de cada campo para ser cargado en el sistema, al momento de cargar el archivo se deben obviar los encabezados ya que estos no son parte de la información a cargar.</p>
                <div class="col-lg-12 col-xs-12">
                    <br><br>
                    <div class="box-content">
                        <h4 class="box-title">Ejemplo del Archivo de Partidas</h4>
                        <!-- /.dropdown js__dropdown -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Monto</th>
                                    <th>Nombre de la Unidad</th> 
                                    <th>Nombre del Proyecto</th>
                                    <th>Fuente</th>
                                    <th>Codigo de la Partida</th>
									<th>Proyecto Presupuestario</th>
                                    <th>Año</th> 
                                </tr> 
                            </thead>
                            
                                <tr> 
                                    <th>12.300,30</th> 
                                    <td>CENTRO NACIONAL DE DESPACHO</td> 
                                    <td>GESTIÓN ADMINISTRATIVA</td>
                                    <td>FONDPROPIO</td>
                                    <td>4.02.10.99.00</td>
                                    <td>AC001AE001</td>
                                    <td>2023</td>  
                                </tr> 
                                <tr> 
                                    <th>2.500,30</th> 
                                    <td>CENTRO NACIONAL DE DESPACHO</td> 
                                    <td>GESTIÓN ADMINISTRATIVA</td>
                                    <td>FONDPROPIO</td>
                                    <td>4.02.03.01.00</td>
                                    <td>AC001AE001</td>
                                    <td>2023</td>   
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                    <!-- /.box-content -->
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

{{--modal de modificacion presupuestaria--}}
<div class="modal fade" id="boostrapModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-1">Descripción de modificación presupuestaria </h4>
            </div>
            <div class="modal-body">
                <table id="tabla2" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código Presupuestario</th>
                            <th>Monto (divisa)</th>
                            <th>Monto Bs</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{--modal de solicitud de modificacion presupuestaria--}}
<div class="modal fade" id="boostrapModal-modificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-1">Descripción de modificación presupuestaria </h4>
            </div>
            <div class="modal-body">
                <table id="tabla1" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código Presupuestario</th>
							<th>Moneda</th>
							<th>Tasa</th>
                            <th>Monto (divisa)</th>
                            <th>Monto Bs</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--
<div id="color-switcher">
	<div id="color-switcher-button" class="btn-switcher">
		<div class="inside waves-effect waves-circle waves-light">
			<i class="ico fa fa-gear"></i>
		</div>
		<!-- .inside waves-effect waves-circle -->
	</div>
	<!-- .btn-switcher -->
	<!-- #color-switcher -->
	<div id="color-switcher-content" class="content">
		<a href="#" data-color="red" class="item js__change_color"><span class="color" style="background-color: #f44336;"></span><span class="text">Red</span></a>
		<a href="#" data-color="violet" class="item js__change_color"><span class="color" style="background-color: #673ab7;"></span><span class="text">Violet</span></a>
		<a href="#" data-color="dark-blue" class="item js__change_color"><span class="color" style="background-color: #3f51b5;"></span><span class="text">Dark Blue</span></a>
		<a href="#" data-color="blue" class="item js__change_color active"><span class="color" style="background-color: #304ffe;"></span><span class="text">Blue</span></a>
		<a href="#" data-color="light-blue" class="item js__change_color"><span class="color" style="background-color: #2196f3;"></span><span class="text">Light Blue</span></a>
		<a href="#" data-color="green" class="item js__change_color"><span class="color" style="background-color: #4caf50;"></span><span class="text">Green</span></a>
		<a href="#" data-color="yellow" class="item js__change_color"><span class="color" style="background-color: #ffc107;"></span><span class="text">Yellow</span></a>
		<a href="#" data-color="orange" class="item js__change_color"><span class="color" style="background-color: #ff5722;"></span><span class="text">Orange</span></a>
		<a href="#" data-color="chocolate" class="item js__change_color"><span class="color" style="background-color: #795548;"></span><span class="text">Chocolate</span></a>
		<a href="#" data-color="dark-green" class="item js__change_color"><span class="color" style="background-color: #263238;"></span><span class="text">Dark Green</span></a>
		<span id="color-reset" class="btn-restore-default js__restore_default">Reset</span>
	</div>
	<!-- /.content -->
</div>
--}}
<div class="main-content">
	<footer class="footer">
		<ul class="list-inline">
			<li>2023 © Crystal Software Corporation.</li>
		</ul>
	</footer>
</div>
	<!-- /.main-content -->

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
	<!-- Touch Spin -->
	<script src="assets/plugin/touchspin/jquery.bootstrap-touchspin.min.js"></script>

	<!-- Timepicker -->
	<script src="assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>

	<!-- Colorpicker -->
	<script src="assets/plugin/colorpicker/js/bootstrap-colorpicker.min.js"></script>

	<!-- Datepicker -->
	<script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

	<!-- Moment -->
	<script src="assets/plugin/moment/moment.js"></script>

	<!-- DateRangepicker -->
	<script src="assets/plugin/daterangepicker/daterangepicker.js"></script>

	<!-- Maxlength -->
	<script src="assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

	<!-- Demo Scripts -->
	<script src="assets/scripts/form.demo.min.js"></script>	

	<!-- Toastr -->
	<script src="assets/plugin/toastr/toastr.min.js"></script>
	<script src="assets/scripts/toastr.demo.min.js"></script>
		
	<!-- Select2 -->
	<script src="assets/plugin/select2/js/select2.min.js"></script>
	
</body>
</html>

