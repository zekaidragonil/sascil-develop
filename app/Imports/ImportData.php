<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\model_unidad;
use App\Models\model_proyecto;
use App\Models\model_fondo;
use Illuminate\Http\Request;

class ImportData implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd($collection);
        for ($i=0; $i <count($collection) ; $i++) { 
            $data[$i]=$collection[$i];
        }
        //dd($data);
        $id_unidad=[];
        for ($i=0; $i <count($data) ; $i++) {
            //dd('llegue');
            $id_unidad[$i]=model_unidad::id_unidad($data[$i][1]);
            if(count($id_unidad[$i]) == 0)
            {
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
                          text: "El nombre de la unidad no corresponde a la almacenada en la base de datos por favor verifique la linea n° '.$linea.' del archivo de proyectos.",
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
                          text: "La fuante de financiamiento ingresada en el archivo no corresponde al almacenado en la Base de Datos por favor verifique la linea N°: '.$linea.' del archivo de proyectos.",
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
        //dd('detener');
        //dd($id_fondo);

        //dd($data[0]);
        $proyecto = new ImportData();
        for ($i=0; $i < count($data) ; $i++) {
            $proyecto->unidad_administrativa = $id_unidad[$i][0]->id;
            $proyecto->presupuestario = $data[$i][6];
            $proyecto->numero = $data[$i][0];
            $proyecto->proyecto_p = $data[$i][4];
            $proyecto->nombre_proyecto = $data[$i][2];
            $proyecto->nombre_subproyecto = $data[$i][5];
            $proyecto->categoria = $data[$i][3];
            $proyecto->fuente_finan_poa = $id_fondo[$i][0]->id;
            $proyecto->monto = doubleval($data[$i][7]);
            $proyecto->anio = intval($data[$i][8]);

            if(!model_proyecto::guardar_proyecto($proyecto))
                {
                    $val=false;
                    break;
                }
            else 
                $val=true;
        }
        return $val;
    }
}
