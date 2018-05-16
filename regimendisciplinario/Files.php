<?php
require_once("vendor/autoload.php");
require_once("Conexion.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class FileManage{
        //Atributos
        private $con;
        
        public function __construct(){
            $this->con = new Conexion();
        }
        
        public function __destruct(){}
        
        public function ExceltoArray($document){
            $filetype="Xlsx";
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($filetype);
            $reader->setReadDataOnly(true);
            $reader->setLoadSheetsOnly(["Empleados","Planilla"]);
            $spreadsheet = $reader->load($document);
            $spreadsheet->setActiveSheetIndexByName("Empleados");
            $EmpSheet = $spreadsheet->getActiveSheet();
            $spreadsheet->setActiveSheetIndexByName("Planilla");
            $ExpSheet = $spreadsheet->getActiveSheet();
            $jump = false;
            $Emprows = [];
            $Exprows = [];
            //Ciclo para transformar la hoja de Planilla de Excel a Array
            foreach ($EmpSheet->getRowIterator() AS $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                $cont = 0;
                $cells = [];
                foreach ($cellIterator as $cell) {
                    $cont++;
                    if($cont == 6 And $cell->getCalculatedValue()!=null And $jump){
                        $DateCalc = ($cell->getCalculatedValue() - 25569) * 86400;
                        $cells[] = date("Y-m-d",$DateCalc);
                    }else{
                        if($cell->getCalculatedValue()!=null){
                            $cells[] = $cell->getCalculatedValue();   
                        }else{
                            $cells[] = "Null";
                        }   
                    }
                }
                $jump = true;
                $Emprows[] = $cells;
            }
            $jump=false;
            //Ciclo para transformar la hoja de Planilla de Excel a Array
            foreach ($ExpSheet->getRowIterator() AS $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                $cont = 0;
                $cells = [];
                foreach ($cellIterator as $cell) {
                    $cont++;
                    if(($cont == 4 or $cont == 5) And $cell->getCalculatedValue()!=null And $jump){
                        $DateCalc = ($cell->getCalculatedValue() - 25569) * 86400;
                        $cells[] = date("Y-m-d",$DateCalc);
                    }else{
                        if($cell->getCalculatedValue()!=null){
                            $cells[] = $cell->getCalculatedValue();   
                        }elseif($cont==10 or $cont==11){
                            $cells[] = 0;
                        }else{
                            $cells[] = "Null";
                        }
                    }
                }
                $jump = true;
                $Exprows[] = $cells;
            }
            $this->InsertIntoDatabase($Emprows,$Exprows);
        }
        //Funcion que inserta los array de Empleados y Expediente Laboral a la base de datos
        function InsertIntoDatabase($Empleados,$Expedientes){
            $check = false;
            for($i=1; $i < sizeof($Empleados); $i++){
                //Se verfica sí se pudo realizar el insert a Usuarios
                if($this->con->Insert_Usuarios($Empleados[$i][0],$this->generaPass(),3)){
                    //Se verfica sí se pudo realizar el insert a Empleados
                    if($this->con->Insert_Empleados($Empleados[$i][0],$Empleados[$i][1],$Empleados[$i][2],$Empleados[$i][3],$Empleados[$i][4],$Empleados[$i][5],$Empleados[$i][6], $Empleados[$i][7], $Empleados[$i][8], "Null", $Empleados[$i][0])){
                        $check = true;
                        echo "<p>Exito al Ingresar Empleado</p>";
                    }else{
                        echo "<p>Error al insertar Empleados</p>";
                    }    
                }else{
                    echo "<p>Error al insertar Usuarios</p>"; 
                }
            }
            if($check){
                for($i=1;$i<sizeof($Expedientes);$i++){
                    $carpeta_destino= $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$this->SinEspecialChars($Expedientes[$i][2])."/Empleados/".$Expedientes[$i][1]."/";
                    if(!file_exists($carpeta_destino)){
                        mkdir($carpeta_destino,0777,true);
                    }
                    //Se busca el nombre de la empresa y del puesto dentro de la BD
                    $empresa = $this->SearchCompany($Expedientes[$i][2]);
                    $puesto = $this->SearchJob($Expedientes[$i][6]);
                    //Realiza el insert a Expediente Laboral
                    if($this->con->Insert_ExpedienteL($Expedientes[$i][0],$empresa,$Expedientes[$i][3],$Expedientes[$i][4],$Expedientes[$i][5],$puesto,$Expedientes[$i][7],$Expedientes[$i][8], $Expedientes[$i][9], $Expedientes[$i][10], $Expedientes[$i][11], $Expedientes[$i][12])){
                        echo "<p>Success Expediente</p>";
                    }else{
                        echo "<p>Failure Expediente</p>";   
                    }
                }   
            }
        }
        
        private function SearchCompany($Nombre){
            $value="";
            $array = $this->con->Select_G_Empresas($Nombre);
            if(!empty($array)){
                 $value = $array[0]["Cedula Juridica"]; 
            }
            return $value;
        }
        
        private function SearchJob($Nombre){
            $value ="";
            $array = $this->con->Select_G_Puestos($Nombre);
            if(!empty($array)){
                 $value = $array[0]["Id_Puesto"];    
            }
            return $value;
        }
        
        function generaPass(){
            //Se define una cadena de caractares. Te recomiendo que uses esta.
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            //Obtenemos la longitud de la cadena de caracteres
            $longitudCadena=strlen($cadena);

            //Se define la variable que va a contener la contraseña
            $pass = "";
            //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
            $longitudPass=10;

            //Creamos la contraseña
            for($i=1 ; $i<=$longitudPass ; $i++){
                //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
                $pos=rand(0,$longitudCadena-1);

                //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
                $pass .= substr($cadena,$pos,1);
            }
            return $pass;
        }
        
        function SinEspecialChars($s){
            $s= str_replace('"','', $s);
            $s= str_replace(':','', $s); 
            $s= str_replace('.','', $s); 
            $s= str_replace(',','', $s); 
            $s= str_replace(';','', $s); 
            return $s;
        }
    }

?>