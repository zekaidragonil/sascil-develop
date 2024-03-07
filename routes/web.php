<?php

use App\Http\Controllers\certificacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\proyectoController;
use App\Http\Controllers\registroController;
use App\Http\Controllers\solicitudController;
use App\Http\Controllers\clasificador_presupuestarioController;
use App\Http\Controllers\traspasoController;
use App\Http\Controllers\presupuestoController;
use App\Http\Controllers\alianzaController;
use App\Http\Controllers\auditoriaController;
use App\Http\Controllers\empresaController;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\FinanzaRecibo;
use App\Http\Controllers\FinanzaUpdateControllers;
use App\Http\Controllers\pdfController;
use App\Models\model_auditoria;
use App\Http\Controllers\instrumento_legalController;
use App\Http\Controllers\PresidenciaControllers;
use App\Http\Controllers\Reportes;
use App\Http\Controllers\trabajadorController;
use App\Http\Controllers\unidad_solicitante;
use App\Models\model_clasificador_presupuestario;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// unidad solicitante 
Route::get('unidad_solicitante', [unidad_solicitante::class, 'index'])->name('unidad');
Route::post('/store', [unidad_solicitante::class, 'store'])->name('unidad.store');
// presidencia 
Route::get('presidencia', [PresidenciaControllers::class, 'index'])->name('presidencia');
// actualizacion de viaticos a causado
Route::get('actualizar_solicitud{id}', [unidad_solicitante::class, 'actualizar'])->name('actualizar');
Route::post('/solicitud{id}/update', [unidad_solicitante::class, 'update'])->name('solicitud.update');

// finanza 
Route::get('finanzas', [FinanzaRecibo::class, 'index'])->name('finanza');
// trabajadores
Route::post('/trabajadores', [trabajadorController::class, 'store'])->name('trabajador');
Route::get('/buscar-trabajador/{cedula}',[trabajadorController::class, 'buscar'])->name('buscar');
// envio del monton totales
Route::post('/viaticos',[trabajadorController::class, 'viatico'])->name('viaticos');

// perfiles 
Route::get('/perfil{id}',[trabajadorController::class, 'show'])->name('show');
Route::post('/rendicion{id}',[trabajadorController::class, 'rendicion'])->name('rendicion.store');

// reporte 
Route::get('/reporte',[Reportes::class, 'index'])->name('reporte');

//Route::post('/trabajadores', [FinanzaRecibo::class, 'store'])->name('trabajador.store');
/*Route::get('/', function () {
    return view('welcome');
});*/

//rutas del login
Route::get('/',[loginController::class,'view_login']);
Route::post('login',[loginController::class,'login']);
Route::get ('principal',[loginController::class,'inicio']);
Route::get('logout',[loginController::class,'logout']);
Route::get('recuperar_clave',[loginController::class,'recuperar_clave']);
Route::post('recupeara_clave',[loginController::class,'recup_clave']);

//rutas para cargar contrato
Route::get('view_registro',[registroController::class,'view_registro']);


//rutas para el modulo de administracion de usuarios
Route::get('agregar_usuarios',[loginController::class,'agregar_usuarios']);
Route::post('agregar_usuarios',[loginController::class,'nuevo_usuario']);
Route::get('unidad/{id}',[loginController::class,'select_unidad']);
Route::get('consultar_usuario',[loginController::class,'consultar_usuario']);

//rutas para editar usuarios
Route::post('view_editar_usuario',[loginController::class,'view_editar_usuario']);
Route::post('editar_usuario',[loginController::class,'editar_usuarios']);


//rutas para el ente
Route::get('view_entes',[loginController::class,'view_ente']);
Route::get('agregar_ente',[loginController::class,'agregar_ente']);
Route::post('guardar_ente',[loginController::class,'guardar_ente']);
Route::get('municipio/{id}',[loginController::class,'select_estado']);
Route::get('parroquia/{id}',[loginController::class,'select_municipio']);

//rutas la unidad
Route::post('view_unidad',[loginController::class,'view_unidad']);
Route::post('editar_unidad',[loginController::class,'editar_unidad']);
Route::post('actualizar_unidad',[loginController::class,'actualizar_unidad']);
Route::post('agregar_unidad',[loginController::class,'agregar_unidad']);
Route::post('guardar_unidad',[loginController::class,'guardar_unidad']);

//rutas para editar el perfil del los usuarios
Route::get('view_perfil',[loginController::class,'perfil']);
Route::post('editar_perfil',[loginController::class,'editar_perfil']);

//rutas del proyecto POA
Route::get('solicitud',[proyectoController::class,'proyecto']);
Route::get('poa',[proyectoController::class,'view_guardar_proyecto']);
Route::get('proyecto_p/{id}',[proyectoController::class,'nombre_proyecto']);
Route::post('guardar_proyecto',[proyectoController::class,'guardar_proyecto']);
Route::get('lista_poa',[proyectoController::class,'lista_poa']);
Route::get('proyecto/{id}',[proyectoController::class,'select_lista_partida']);//lista de partidas segun el proyecto seleccionado
Route::get('view_carga_masiva',[proyectoController::class,'view_carga_masiva']);
Route::post('carga_masiva',[proyectoController::class,'carga_masiva']);
Route::get('partida/{id}/{proyecto}',[proyectoController::class,'monto_disponible']);//mostrar el monto del proyecto al seleccionar la partida
Route::post('partida',[clasificador_presupuestarioController::class ,'partida_presupuestaria']);
Route::post('presupuesto',[clasificador_presupuestarioController::class,'show']);//guardar presupuesto asignado a las unidades por partida
Route::get('lista_certificacion',[certificacionController::class,'index']);
Route::get('lista_certificacion_asignadas',[certificacionController::class,'lista_certificacion_asignadas']);
Route::get('cert_reversar',[certificacionController::class,'cert_reversar']);
Route::get('view_lista_poa',[certificacionController::class,'lista_poa']);
Route::get('poa/{id}/{unidad}',[certificacionController::class,'poa']);

Route::post('reversar_certificacion',[certificacionController::class,'reversar_certificacion']);
Route::get('lista_certificacion_revision',[certificacionController::class,'index_revision']);//esta ruta es para los analistas de presupuesto
Route::post('editar_estatus_certificado',[certificacionController::class,'editar_estatus_certificado']);
Route::post('actualizar_solicitud_certificado',[certificacionController::class,'actualizar_solicitud_certificado']);
Route::post('aprobar_certificacion',[certificacionController::class,'aprobar_certificacion']);
Route::get('revisar_certificaciones',[certificacionController::class,'revisar_certificaciones']);

//rutas para asignar el traspaso a los analistas de presupuesto
Route::get('asignar_traspaso',[traspasoController::class,'asignar_traspaso']);
Route::get('transferencia_presupuestaria',[certificacionController::class,'transferencia_presupuestaria']);//ruta para aprobar transferencias presupuestarias
Route::get('lista_traspasasos_asignados',[traspasoController::class,'lista_traspasasos_asignados']);//lista de traspassos asignados a analistas
Route::post('solicitud_traspaso',[certificacionController::class,'solicitar_traspaso']);
Route::post('asignar_traspaso_analista',[certificacionController::class,'asignar_traspaso_analista']);
Route::post('proceso_traspaso',[certificacionController::class,'proceso_traspaso']);
Route::get('solicitud_transferencia',[certificacionController::class,'solicitud_transferencia']);
Route::get('lista_traspaso_unidad',[traspasoController::class,'lista_traspaso_unidad']);
Route::post('solicitud_proceso',[traspasoController::class,'solicitud_proceso']);
Route::post('adjuntar_solicitud_traspaso',[traspasoController::class,'adjuntar_solicitud_traspaso']);
//uta de cambio de estatus de traspaso (aprobar o rechazar)
Route::post('aprobar_traspaso',[traspasoController::class,'aprobar_traspaso']);
Route::post('rechazar_traspaso',[traspasoController::class,'rechazar_traspaso']);


//rutas de traspaso entre unidades
//reutas cedentes
Route::get('view_traspaso_entre_unidades',[traspasoController::class,'view_traspaso_entre_unidades']);
Route::post('traspaso_entre_unidades',[traspasoController::class,'traspaso_entre_unidades']);
Route::get('fondo_traspaso/{id}',[presupuestoController::class,'unidad_traspaso']);
Route::get('unidad_cedente/{id}',[proyectoController::class,'area_funcional']);
Route::get('area_funcional_cedente/{id}',[presupuestoController::class,'partida_cedente']);
Route::get('posicion_cedente/{id}',[presupuestoController::class,'monto_disponible']);
//rutas receptoras
//rutas de reporte de presupuesto
Route::get('view_reporte_presupuesto',[presupuestoController::class,'view_reporte_presupuesto']);
Route::get('partida_hasta/{id}/{clasf}',[clasificador_presupuestarioController::class,'consulta_clasificador_hasta']);
Route::get('gerencia/{id}',[presupuestoController::class,'proyecto']);
Route::get('proyecto/{id}',[clasificador_presupuestarioController::class,'consulta_clasificador_desde']);
Route::post('reporte_presupuesto',[presupuestoController::class,'reporte_presupuesto']);

Route::get('añadir_llave_presupuestaria',[proyectoController::class,'view_añadir_llave_presupuestaria']);
Route::post('lista_llave_presupuestaria',[presupuestoController::class,'lista_llave_presupuestaria']);
Route::get('modificacion_presupuestaria/{id}',[presupuestoController::class,'consulta_modificacion_presupuestaria']);
Route::post('agregar_partida',[presupuestoController::class,'agregar_partida']);
Route::post('actualizacion_presupuestaria',[solicitudController::class,'actualizacion_presupuestaria']);
Route::post('actualizar_presupuesto',[solicitudController::class,'actualizar_presupuesto']);
Route::get('lista_presupuestaria',[solicitudController::class,'lista_presupuestaria']);
Route::post('solicitud_modificacion_presupuestaria',[solicitudController::class,'solicitud_modificacion_presupuestaria']);

Route::get('fondo/{id}',[traspasoController::class,'proyectos']);
Route::get('proyecto_traspaso/{id}',[traspasoController::class,'partida']);
Route::get('partida_traspaso/{id}/{id2}',[traspasoController::class,'monto_traspaso']);

Route::get('proyecto_destino/{id}',[traspasoController::class,'partida_destino']);//lista de partidas con fondos disponibles para realizar transferencias
Route::get('partida_destino/{id}/{id2}',[traspasoController::class,'monto_destino']);


//ruta de solicitudes (para los usuarios de todas las unidades)
Route::get('lista_solicitudes',[solicitudController::class,'mostrar_solicitud']);
Route::post('guardar_solicitud',[solicitudController::class,'guardar_solicitud']);
Route::post('verificar_solicitud',[solicitudController::class,'verificar_solicitud']);
Route::get('certificado_presupuestario',[solicitudController::class,'certificado_presupuestario']);
Route::post('solicitud_certificado_presupuesto',[solicitudController::class,'solicitud_certificado_presupuesto']);
Route::get('consulta_presupuestaria',[solicitudController::class,'consulta_presupuestaria']);
Route::post('generar_certificado',[solicitudController::class,'generar_certificado']);
// Route::get('lista_espera',[solicitudController::class,'solicitudes_espera']);
// Route::get('lista_revisado',[solicitudController::class,'solicitudes_revisado']);
// Route::get('lista_aprobado',[solicitudController::class,'solicitudes_aprobado']);
// Route::get('lista_rechazado',[solicitudController::class,'solicitudes_rechazado']);
// Route::get('lista_reversado',[solicitudController::class,'solicitudes_reversado']);
Route::get('lista_solicitud',[solicitudController::class,'lista_solicitud']);
Route::post('verificar_certificacion',[solicitudController::class,'verificar_certificacion']);
Route::get('view_disponibilidad_presupuestaria',[solicitudController::class,'view_disponibilidad_presupuestaria']);
Route::get('area_funcional/{id}',[solicitudController::class,'area_funcional']);
Route::post('consultar_disponibilidad',[presupuestoController::class,'consultar_disponibilidad']);

//ruta de solicitudes (para los supervisores de procura) asignar a gerentes regionales
Route::get('lista_contrataciones_aceptadas',[solicitudController::class,'lista_contrataciones_aceptadas']);
Route::post('asignar_solicitud_contrato',[solicitudController::class,'asignar_solicitud_contrato']);
Route::post('asignar_gerente',[solicitudController::class,'asignar_gerente']);

//rutas de modificacion presupuestaria
Route::post('modificar_certificacion',[solicitudController::class,'modificar_certificacion']);
Route::post('actualizar_estatus_solicitud',[solicitudController::class,'actualizar_estatus_solicitud']);
Route::get('solicitud_presupuestaria',[solicitudController::class,'solicitud_presupuestaria']);
Route::get('lista_solicitudes_unidad',[solicitudController::class,'verificar_solicitud_unidad']);
Route::get('lista_solicitudes_completas',[solicitudController::class,'verificar_solicitud_completas']);


//rutas para los gerentes reionales de procura
Route::get('lista_solicitudes_completas_regional',[solicitudController::class,'lista_solicitudes_completas_regional']);
Route::get('lista_contrataciones_regional',[solicitudController::class,'lista_contrataciones_regional']);
Route::post('asignar_solicitud_contrato_analista',[solicitudController::class,'asignar_solicitud_contrato_analista']);

// consulta de alianzas para asignar (gerente regional a analistas)
Route::post('asignar_alianza_gerente',[alianzaController::class,'asignar_alianza_gerente']);

// Consultar alianzas asignadas
Route::get('lista_alianzas_asignadas_analista',[alianzaController::class,'lista_alianzas_asignadas_analista']);
Route::get('lista_alianza_consultor_analizar',[alianzaController::class,'lista_alianza_consultor_analizar']);
Route::post('analizar_alianza_consultor',[alianzaController::class,'analizar_alianza_consultor']);
Route::post('actualizar_estatus_alianza',[alianzaController::class,'actualizar_estatus_alianza']);
// Consultar alianza de la lista del consultor
Route::post('consultar_alianza_asignada_consultor',[alianzaController::class,'consultar_alianza_asignada_consultor']);

Route::post('revision_solicitud',[solicitudController::class,'revision_solicitud']);
//rutas para alianzas unidad solicitante
Route::get('view_solicitar_alianza',[alianzaController::class,'solicitar_alianza']);
Route::post('solicitar_alianza',[alianzaController::class,'solicitud_alianza2']);
Route::get('consultar_alianza',[alianzaController::class,'consultar_alianza']);
Route::post('consulta_dcumentacion_aliaza_unidad',[alianzaController::class,'consulta_dcumentacion_aliaza_unidad']);
Route::get('solicitud_contratacion_alianza',[alianzaController::class,'solicitud_contratacion_alianza']);

//rutas para consultar las alianzas existentes por procura
Route::get('lista_asignar_alianza',[alianzaController::class,'lista_asignar_alianza']);
Route::get('lista_asignar_alianza_analista',[alianzaController::class,'lista_asignar_alianza_analista']);
Route::post('asignar_alianza_analista',[alianzaController::class,'asignar_alianza_analista']);
//Route::get('lista_alianzas_asignadas',[alianzaController::class,'lista_alianzas_asignadas']);
Route::post('alianza',[alianzaController::class,'alianza']);
Route::post('asignar_alianza',[alianzaController::class,'asignar_alianza']);


//rutas para los analistas de procura en "recepcion" "aliazas"
// --------------------------------
Route::get('lista_alianzas_solicitadas',[alianzaController::class,'lista_alianzas_solicitadas']);
Route::post('view_revision_solicitud_alianza',[alianzaController::class,'revision_solicitud_alianza']);//recepcion
Route::get('lista_alianzas_aceptadas',[alianzaController::class,'lista_alianzas_aceptadas']);//lista de alianzas
Route::get('lista_alianzas_recepcion',[alianzaController::class,'lista_alianzas_recepcion']);//consulta alianzas recepcion
Route::get('lista_alianzas_recibidas',[alianzaController::class,'lista_alianzas_recibidas']);//consulta alianzas recepcion
Route::post('view_revision_solicitudanalizar_solicitudes_alianza_recepcion',[alianzaController::class,'revision_solicitud_alianza_recepcion']);//Analista de Contrataciones
Route::post('revisar_solicitud_alianza_recepcion',[alianzaController::class,'revisar_solicitud_alianza_recepcion']);
Route::post('revisar_solicitud_alianza',[alianzaController::class,'actualizar_solicitud_alianza']);
//--------------------------------
//rutas para los analistas de procura  "recepcion" solicitudes
Route::get('analizar_solicitudes',[solicitudController::class,'analizar_solicitudes']);
Route::post('view_solicitud',[solicitudController::class,'view_solicitud']);
Route::post('analizar_solicitud',[solicitudController::class,'analizar_solicitud']);
Route::get('lista_solicitudes_taquilla',[solicitudController::class,'lista_solicitudes_taquilla']);
Route::get('analizar_solicitudes_recibidas',[solicitudController::class,'analizar_solicitudes_recibidas']);

//rutas para los analistas de procura "gerencia general de contrataciones"
//--------------------------------
Route::get('lista_alianzas_recibidas_analizar',[alianzaController::class,'lista_alianzas_recibidas_analizar']);
Route::post('asignar_numero_alianza',[alianzaController::class,'asignar_numero_alianza']);
Route::post('ver_alianza_asignada',[alianzaController::class,'ver_alianza_asignada']);
Route::post('numero_alianza',[alianzaController::class,'numero_alianza']);
Route::get('lista_solicitudes_procesadas',[solicitudController::class,'lista_solicitudes_procesadas']);
Route::post('view_solicitud_procesada',[solicitudController::class,'view_solicitud_procesada']);
Route::post('asignar_numero_solicitud',[solicitudController::class,'asignar_numero_solicitud']);
Route::post('view_solicitud_verificada',[solicitudController::class,'view_solicitud_verificada']);

//rutas para analizar alianzas existentes para los analistas de procura
Route::get('analisis_alianza',[alianzaController::class,'analisis_alianza']);
Route::get('lista_alianzas',[alianzaController::class,'lista_alianzas']);
//Route::post('revisar_solicitud_alianza',[alianzaController::class,'revisar_solicitud_alianza']);
Route::post('actualizar_solicitud_alianza',[alianzaController::class,'actualizar_solicitud_alianza']);
Route::get('view_registro_empresa',[empresaController::class,'view_registro_empresa']);
Route::post('registro_empresa',[empresaController::class,'registro_empresa']);


//rutas para asignar alianzas a os gerentes regionales de procura
Route::get('view_asignar_alianza',[alianzaController::class,'lista_asignar_alainza']);

//-----------------------------------------------------------------



//rutas para listar y modificar las solicitudes de modificacion presupuestaria
Route::get('lista_modificacion_presupuestaria',[solicitudController::class,'lista_modificacion_presupuestaria']);
Route::get('asignar_modificacion',[solicitudController::class,'asignar_modificacion']);
Route::post('asignar_modificacion_analista',[solicitudController::class,'asignar_modificacion_analista']);
Route::get('lista_modificaciones',[solicitudController::class,'lista_modificaciones']);

//ruta para hacer el proceso de la modificacion presupuestaria ('analista')
Route::post('actualizacion_presupuestaria_global',[solicitudController::class,'actualizacion_presupuestaria_global']);


//rutas para analistas de procura

Route::get('analizar_solicitudes_consultor',[solicitudController::class,'analizar_solicitudes_consultor']);
Route::post('view_analizar_solicitud_consultor',[solicitudController::class,'view_analizar_solicitud_consultor']);
Route::post('actualizar_estatus_consultor',[solicitudController::class,'actualizar_estatus_consultor']);
Route::get('objeto/{id}',[solicitudController::class,'objeto_empresa']);
Route::get('lista_solicitudes_consultor',[solicitudController::class,'lista_solicitudes_consultor']);
Route::post('view_verificar_solicitud_consultor',[solicitudController::class,'verificar_solicitud_consultor']);


//rutas de gerencia de Consultoria jurídica
Route::get('view_asignar_solicitud_contrato',[instrumento_legalController::class,'asignar_solicitud_contrato']);
Route::post('asignar_solicitud_adjuntada_analista_juridico',[instrumento_legalController::class,'asignar_solicitud_adjuntada_analista_juridico']);
Route::get('lista_solicitudes_asignadas_juridico',[instrumento_legalController::class,'lista_solicitudes_asignadas_juridico']);
Route::post('consultar_contrato_asignado',[instrumento_legalController::class,'consultar_contrato_asignado']);

//rutas de los analistas de Consultoria Juridica
Route::get('analizar_solicitud_contrato_juridico',[instrumento_legalController::class,'analizar_solicitud_contrato_juridico']);
Route::post('analizar_solicitud_consultor_juridico',[instrumento_legalController::class,'analizar_solicitud_consultor_juridico']);
Route::post('actualizacion_estatus_solicitud_juridico',[instrumento_legalController::class,'actualizacion_estatus_solicitud_juridico']);
Route::get('lista_contratos_suscritos',[instrumento_legalController::class,'lista_contratos_suscritos']);

//cambiar estatus de solicitud de contratacion
Route::post('estatus_solicitud',[solicitudController::class,'estatus_solicitud']);


//rutas para crear el pdf
Route::name('print')->get('/imprimir',[pdfController::class,'imprimir']);

Route::name('imprimir')->get('/imprimir1',[pdfController::class,'certificacion']);
//ruta de prueba
Route::get('certificacion',function(){
    return view('certificacion_pdf');
});

//consulta de informacion de actividad del sistema

Route::get('actividad_sistema',[auditoriaController::class,'consultar_auditoria']);

//informacion de contrataciones

Route::get('estatus_instrumento_legal',[instrumento_legalController::class,'estatus_instrumento_legal']);
Route::get('cargar_factura',[facturaController::class,'view_cargar_factura']);
Route::post('cargar',[facturaController::class,'cargar_factura']);

//informacion de anticipo

Route::get('contrato/{id}',[instrumento_legalController::class,'anticipo']);