<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\model_unidad;
use App\Models\model_proyecto;
use App\Models\model_fondo;
use App\Models\model_presupuesto;
use App\Models\model_clasificador_presupuestario;

class ImportData2 implements ToCollection
{

    public function collection(Collection $collection)
    {
        //dd($collection);
        $data=[];
        for ($i=0; $i <count($collection) ; $i++) { 
            $data[$i]=$collection[$i];
        }

        //dd($data);
        $id_unidad=[];
        for ($i=0; $i <count($data) ; $i++) {
            $id_unidad[$i]=model_unidad::id_unidad($data[$i][1]);
            if (count($id_unidad[$i])==0) {
                $linea = $i+1;
                echo '<!DOCTYPE html>
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
                <script src="assets/scripts/jquery.min.js"></script>
                <script src="assets/scripts/modernizr.min.js"></script>
                <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/plugin/nprogress/nprogress.js"></script>
                <script src="assets/plugin/waves/waves.min.js"></script>
            
                <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
                <script src="assets/scripts/sweetalert.init.min.js"></script>
                <script src="assets/scripts/main.min.js"></script>
                <script>
                $(document).ready(function(){
                  swal({
                          title:"¡Error en lectura de Archivo!",
                          text: "El nombre de la unidad no corresponde a la almacenada en la Base de Datos por favor verifique la linea n° '.$linea.' del archivo de Partidas.",
                          type: "error",
                          timer: 5000,
                          showConfirmButton: false,
                      },
                      function(){
                          window.location.href = "view_carga_masiva";
                      })
                    });
                </script>
                </body>';
                dd();
                break;
                return false;
            }
        }
        //dd($id_unidad[7281]);
        for ($i=0; $i <count($data) ; $i++) { 
            $id_fondo[$i]=model_fondo::id_fondo($data[$i][4]);
            if (count($id_fondo[$i]) == 0) {
                $linea = $i+1;
                echo '<!DOCTYPE html>
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
                <script src="assets/scripts/jquery.min.js"></script>
                <script src="assets/scripts/modernizr.min.js"></script>
                <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/plugin/nprogress/nprogress.js"></script>
                <script src="assets/plugin/waves/waves.min.js"></script>
            
                <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
                <script src="assets/scripts/sweetalert.init.min.js"></script>
                <script src="assets/scripts/main.min.js"></script>
                <script>
                $(document).ready(function(){
                  swal({
                          title:"¡Error en lectura de Archivo!",
                          text: "La fuante de financiamiento ingresada en el archivo no corresponde a la almacenada en la base de datos por favor verifique la linea N°: '.$linea.' del archivo de proyectos.",
                          type: "error",
                          timer: 5000,
                          showConfirmButton: false,
                      },
                      function(){
                          window.location.href = "view_carga_masiva";
                      })
                    });
                </script>
                </body>';
                dd();
                break;
                return false;
            }
        }
        //dd($data[1][4],$id_fondo[0]);
        for ($i=0; $i <count($data) ; $i++) { 
            $id_clasificador[$i]=model_clasificador_presupuestario::id_clasificador($data[$i][5]);
            if (count($id_clasificador[$i]) == 0) {
                $linea = $i+1;
                echo '<!DOCTYPE html>
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
                <script src="assets/scripts/jquery.min.js"></script>
                <script src="assets/scripts/modernizr.min.js"></script>
                <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/plugin/nprogress/nprogress.js"></script>
                <script src="assets/plugin/waves/waves.min.js"></script>
            
                <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
                <script src="assets/scripts/sweetalert.init.min.js"></script>
                <script src="assets/scripts/main.min.js"></script>
                <script>
                $(document).ready(function(){
                  swal({
                          title:"¡Error en lectura de Archivo!",
                          text: "El codigo del clasificador presupuestario ingresado en el archivo no corresponde al almacenado en la base de datos por favor verifique la linea N°: '.$linea.' del archivo de partidas.",
                          type: "error",
                          timer: 5000,
                          showConfirmButton: false,
                      },
                      function(){
                          window.location.href = "view_carga_masiva";
                      })
                    });
                </script>
                </body>';
                dd();
                break;
                return false;
            }
        }
        //dd($id_unidad);
        for ($i=0; $i <count($data) ; $i++) { 

            $id_proyecto[$i]=model_proyecto::id_proyecto($data[$i][2],$id_unidad[$i][0]->id,$id_fondo[$i][0]->id);
            if (count($id_proyecto[$i]) == 0) {
                $linea = $i+1;
                echo '<!DOCTYPE html>
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
                <script src="assets/scripts/jquery.min.js"></script>
                <script src="assets/scripts/modernizr.min.js"></script>
                <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/plugin/nprogress/nprogress.js"></script>
                <script src="assets/plugin/waves/waves.min.js"></script>
            
                <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
                <script src="assets/scripts/sweetalert.init.min.js"></script>
                <script src="assets/scripts/main.min.js"></script>
                <script>
                $(document).ready(function(){
                  swal({
                          title:"¡Error en lectura de Archivo!",
                          text: "La siguente convinacion de variables no existe o no esta registrada en la base dates: Nombre del proyecto, Fuente de Financiamiento, Nombre de la Unidad o Gerencia. Por favor veerifique la linea n°: '.$linea.' del archivo de partidas", 
                          type: "error",
                          timer: 5000,
                          showConfirmButton: false,
                      },
                      function(){
                          window.location.href = "view_carga_masiva";
                      })
                    });
                </script>
                </body>';
                dd();
                break;
                return false;
            }
        }


        //dd($id_proyecto);
        $presupuesto = new importData2();

        for ($i=0; $i < count($data) ; $i++) {
            $presupuesto->id_fondo = $id_fondo[$i][0]->id;
            $presupuesto->monto = $data[$i][0];
            $presupuesto->saldo = $data[$i][0];
            //dd($id_proyecto);
            //echo $i,') ',$id_proyecto[$i][0]->id,' - ';
            $presupuesto->id_proyecto = $id_proyecto[$i][0]->id;
            $presupuesto->id_unidad = $id_unidad[$i][0]->id;
            $presupuesto->id_clasificador_presupuestario =$id_clasificador[$i][0]->id;
            $presupuesto->anio = $data[$i][6];
            //dd($presupuesto);
            if(!model_presupuesto::guardar_prespuesto($presupuesto))
            {  
                //dd('llegue');
                $val=false;
                break;
            }
            else 
                $val=true;
        //$presupuesto->save();
        //$presupuesto->
        }
        return $val;
    }
}
