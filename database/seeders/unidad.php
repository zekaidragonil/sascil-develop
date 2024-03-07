<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class unidad extends Seeder
{
    public function run()
    {
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE AMBIENTE, SEGURIDAD E HIGIENE OCUPACIONAL','id_ente'=>1,'siglas'=>'ASHO','siglas_cert'=>'GGASHO']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE ATENCIÓN CIUDADANA','id_ente'=>1,'siglas'=>'ATC','siglas_cert'=>'GGAC']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE AUTOMATIZACIÓN, TECNOLOGÍA DE INFORMACIÓN Y TELECOMUNICACIONES','id_ente'=>1,'siglas'=>'ATIT','siglas_cert'=>'GGATIT']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE AUDITORIA INTERNA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGAI']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE BIENES Y SERVICIOS','id_ente'=>1,'siglas'=>'BISE','siglas_cert'=>'GGBS']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE COMUNICACIONES Y RELACIONES PÚBLICAS','id_ente'=>1,'siglas'=>'CO','siglas_cert'=>'GGCRP']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE CONSULTORÍA JURÍDICA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGCJ']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE DESARROLLO SOCIAL','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGDS']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE COMERCIALIZACIÓN','id_ente'=>1,'siglas'=>'COM','siglas_cert'=>'GGC']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE FINANZAS','id_ente'=>1,'siglas'=>'FINZ','siglas_cert'=>'GGF']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE FORMACIÓN','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGFOR']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE FUENTES ALTERNAS Y USO RACIONAL Y EFICIENTE DE LA ENERGIA ELÉCTRICA','id_ente'=>1,'siglas'=>'FAURE','siglas_cert'=>'GGFAUREEE']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE GENERACIÓN','id_ente'=>1,'siglas'=>'GEN','siglas_cert'=>'GGG']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE PLANIFICACIÓN, PRESUPUESTO Y SEGUIMIENTO Y CONTROL','id_ente'=>1,'siglas'=>'GGPPSC','siglas_cert'=>'GGPPSC']);
        DB::table('unidad')->insert(['nombre'=>'OFICINA DE LA PRESIDENCIA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'OP']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE PREVENCIÓN Y PROTECCIÓN','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGPP']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE PROCURA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGP']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE PROGRAMACIÓN Y CONTROL DE VEGETACIÓN','id_ente'=>1,'siglas'=>'PCV','siglas_cert'=>'GGPCV']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE PROYECTOS MAYORES','id_ente'=>1,'siglas'=>'PM','siglas_cert'=>'GGPM']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE SERVICIOS AERONAÚTICOS','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGSA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE TALENTO HUMANO','id_ente'=>1,'siglas'=>'TH','siglas_cert'=>'GGTH']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE TRANSMISIÓN','id_ente'=>1,'siglas'=>'TRAN','siglas_cert'=>'GGT']);
        DB::table('unidad')->insert(['nombre'=>'VICEPRESIDENCIA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'VP']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE DISTRIBUCIÓN','id_ente'=>1,'siglas'=>'DIS','siglas_cert'=>'DIS']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO AMAZONAS','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEAM']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO ANZOATEGUI','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEAN']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO APURE','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEAP']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO ARAGUA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEAR']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO BARINAS','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEBA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO BOLIVAR','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEBO']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO CARABOBO','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTECA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO COJEDES','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTECO']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO DELTA AMACURO','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEDEL']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO DISTRITO CAPITAL','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEDC']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO FALCON','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEFA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO GUARICO','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEGUA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO LA GUAIRA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTELG']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO LARA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEL']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO MERIDA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEME']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO MIRANDA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEMI']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO MONAGAS','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEMO']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO NVA ESPARTA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTENVA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO PORTUGUESA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEPOR']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO SUCRE','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTESU']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO TACHIRA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTETA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO TRUJILLO','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTETR']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO YARACUY','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEYA']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA TERRITORIAL ESTADO ZULIA','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GTEZU']);
        DB::table('unidad')->insert(['nombre'=>'CENTRO NACIONAL DE DESPACHO','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'CND']);
        DB::table('unidad')->insert(['nombre'=>'GERENCIA GENERAL DE FILIALES NO ELÉCTRICAS','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'GGFE']);
        DB::table('unidad')->insert(['nombre'=>'UNIDAD ADMINSITRATIVA DE GESTIÓN','id_ente'=>1,'siglas'=>'NULL','siglas_cert'=>'UAG']);
    }
}
