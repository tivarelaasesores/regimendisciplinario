<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion == ''){
        echo '<script>alert("Usted no tiene autorizacion");
        location.href="../../index.php";</script>';
        die();
    }
    include("../../Conexion.php");
    include("../../Files.php");
    $Con = new Conexion();
    $Cfile = new FileManage();
    if(isset($_GET["update"])){
        $update = $_GET["update"];
    }else{
        $update = null;
    }
    if(isset($_POST['cedulajuridica']) and isset($_POST['idempleado']) and isset($_POST['plantilla']) and isset($_POST["fecha"])){
        $empresa = $_POST['cedulajuridica'];
        $empleado = $_POST['idempleado'];
        $contrato = $_POST['plantilla'];
        $fecha_subida = $_POST["fecha"];
        $Con->setResultado(null);
        $emp = $Con->Select_G_Empresas($empresa);
        $Con->setResultado(null);
        $emp1 = $Con->Select_G_Empleados($empleado);
        if(!empty($emp) and !empty($emp1)){
            $empName = $emp1[0]["Nombre"]." ".$emp1[0]["ApellidoP"]." ".$emp1[0]["ApellidoM"];
            $carpeta_destino= $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($emp[0]["Nombre"])."/Empleados/".$empName."/RegimenContratos/";      
        }
        if(!file_exists($carpeta_destino)){
            mkdir($carpeta_destino,0777,true);
        }
        $filechange=false;
        if(isset($_FILES["file"])){
            $finfo = new finfo();
            $typefile = $finfo->file($_FILES["file"]["tmp_name"],FILEINFO_MIME_TYPE);
            $fname = $_FILES["file"]["name"];
            $sizefile = $_FILES["file"]["size"];
            if($sizefile <= 16000000){
                if($typefile=="application/pdf" or $typefile=="application/msword" or $typefile=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                    move_uploaded_file($_FILES["file"]["tmp_name"],$carpeta_destino.$fname);
                    $filechange =true;
                    if(!isset($_POST["actualizar"])){
                        if($Con->Insert_RegitroEC($contrato,$empresa,$empleado, $fecha_subida, $fname)){
                            $error="Success";
                        }else{
                            $error="Inserted";
                        }
                    }
                }else{
                    $error="Format";
                }
            }else{
                $error="Size";
            }   
        }else{
            $filename=$_POST["ruta"];
        }
        if(isset($_POST["actualizar"]) and $_POST["actualizar"]=="done" and $filechange){
            if($Con->Update_RegitroEC($contrato,$empresa,$empleado,$fecha_subida, $fname)){
                $error="SuccessUpdated";
            }else{
                $error="Updated";
            }
        }
    }
?>
<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../estilo.css">
        <link rel="stylesheet" href="../file-input.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <img src="../../img/logoregistro.png" width="380px;">
        <h1 class="titulo">Registo Empleado Contrato</h1>
        <br>
        <?php
            $array = $Con->Select_G_RegistroEC("");
            if(!empty($array)){
                echo "<table><tr><th>Id Contrato:</th><th>Empresa:</th><th>Empleado:</th><th>Fecha Subida:</th><th>Ruta:</th></tr>";
                for($i=0;$i<sizeof($array);$i++){
                    echo "<tr><td>".$array[$i]["Id_Contrato"]."</td><td>".$array[$i]["Empresa"]."</td><td>".$array[$i]["Empleado"]."</td><td>".$array[$i]["Fecha Subida"]."</td><td><a href='../../archives/uploads/".$Cfile->SinEspecialChars($array[$i]["Empresa"])."/Empleados/".$array[$i]["Empleado"]."/RegimenContratos/".$array[$i]["Ruta"]."'>".$array[$i]["Ruta"]."</a></td><td><a href='formcontratosempleados.php?update=".$array[$i]["Id_Contrato"]."'>Actualizar</a></td><td><a href='formaddendums.php?contrato=".$array[$i]["Id_Contrato"]."&empleado=".$array[$i]["Empleado"]."&empresa=".$array[$i]["Empresa"]."'>Agregar Addendum</a></td></tr>";
                }
                echo"</table>";
            }else{
                echo "<p>No hay registros dentro de la base de datos, ingrese cada registro manualmente con el formulario de abajo</p>";
            }
        ?>
        <br>
        <?php
            if(isset($error)){
                switch($error){
                    case "Success":
                        echo "<p>Insertado satisfactoriamente</p>";
                        break;
                    case "F_Insert":
                        echo "<p>Error al Insertar Puesto</p>";
                        break;
                    case "SuccessUpdated":
                        echo "<p>Actualizaci&oacute;n realizada</p>";
                        break;
                    case "F_Update":
                        echo "<p>Error al Actualizar</p>";
                        break;
                    case "Format":
                        echo "<p>Formato de archivo es inv&aacute;lido</p>";
                        break;
                    case "Size":
                        echo "<p>El archivo es demasiado grande</p>";
                        break;
                }
            }
         echo "<div class='empleado'>";
           echo "<label><h2 style='color:#000;'>Empleado</h2></label><br>";
        if($update=="" And $update!="update"){
             echo "<form action='formcontratosempleados.php' method='post' enctype='multipart/form-data'>";
              //  <!-------------- Cedula Juridica --------------->
                echo "<div class='desplegar'>";
                echo "<label>Empresa</label>";
                $Con->setResultado(null);
                $empresas = $Con->Select_G_Empresas("");
                echo "<select name='cedulajuridica'>
                <option value='Null' disabled selected>Desplegar</option>";
                if(!empty($empresas)){
                    for($i=0;$i<sizeof($empresas);$i++){
                        echo "<option value='".$empresas[$i]["Cedula Juridica"]."'>".$empresas[$i]["Nombre"]."</option>";
                    }
                }
                echo "</select><br><br>";
                //  <!------------------- nombre empleado --------------->
                echo "<label>Empleado</label>";
                echo "<select name='idempleado' class='browser-default'>
                <option value='' disabled selected>Desplegar</option>";
                $Con->setResultado(null);
                $empleados= $Con->Select_G_Empleados("");
                if(!empty($empleados)){
                    for($j=0;$j<sizeof($empleados);$j++){
                        echo "<option value='".$empleados[$j]["Id_Empleado"]."'>".$empleados[$j]["Nombre"]." ".$empleados[$j]["ApellidoP"]." ".$empleados[$j]["ApellidoM"]."</option>";
                    }
                }
                echo "</select><br><br>";
                //  <!----------------- Contrato Plantilla--------------------->
                echo "<label>Plantilla de contrato</label>
                    <select name='plantilla' class='browser-default'>
                        <option value='' disabled selected>Desplegar</option>";
                $Con->setResultado(null);
                $contratos = $Con->Select_G_Contratos("");
                if(!empty($contratos)){
                    for($k=0;$k<sizeof($contratos);$k++){
                        $emp = $Con->Select_G_Empresas($contratos[$k]["Empresa"]);
                        echo "<option value='".$contratos[$k]["Id_Contrato"]."'>".$contratos[$k]["Nombre"]."</option>";
                    }
                }
                echo "</select>";
                echo "</div>";
                    echo "<br><br>";
              //  <!----------------Ruta------------------------>
                echo "<input type='file' name='file' id='file' class='inputfile inputfile-2' data-multiple-caption='{count} archivos seleccionados' multiple />";
                echo "<label for='file'>";
                    echo "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
                    echo "<span class='iborrainputfile'>Seleccionar archivo</span>";
                echo "</label> <br>";
                echo "<br>";
              //  <!------------------- Fecha de subida --------------->
            echo "<label id='lbldate'>Fecha de subida:</label><br><br>";
            echo "<input id='date' name='fecha' type='hidden'>";
            echo "<input class='enviar' type='submit' value='Enviar'>";
            echo "</div>";
            echo "</form>";
      }else {
        $Con->setResultado(null);
        $consulta = $Con->Select_G_RegistroEC($update);
        if(!empty($consulta)){
            echo "<form action='formcontratosempleados.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='desplegar'>";
            echo"<input type='hidden' name='actualizar' value='done'/>";
            //  <!-------------- Cedula Juridica --------------->
            echo "<label>Empresa: ".$consulta[0]["Empresa"]."</label>";
            if($consulta[0]["Empresa"]!=""){
                $Con->setResultado(null);
                $empresas = $Con->Select_G_Empresas($consulta[0]["Empresa"]);
                if(!empty($empresas)){
                    echo "<input name='cedulajuridica' type='hidden' value='".$empresas[0]["Cedula Juridica"]."'>";
                }
            }else{
                echo "<input name='cedulajuridica' type='hidden'>";   
            }
            echo "<br><br>";
            //  <!------------------- nombre empleado --------------->
            echo "<label>Empleado: ".$consulta[0]["Empleado"]."</label>";
            if($consulta[0]["Empleado"]!=""){
                $Con->setResultado(null);
                $empleados= $Con->Select_G_Empleados("");
                if(!empty($empleados)){
                    echo "<input name='idempleado' type='hidden' value='".$empleados[0]["Id_Empleado"]."'>";
                }
            }else{
                echo "<input name='idempleado' type='hidden'>";
            }
            echo "<br><br>";
            //  <!----------------- Contrato Plantilla--------------------->
            if($consulta[0]["Id_Contrato"]!=""){
                $Con->setResultado(null);
                $contratos = $Con->Select_G_Contratos($consulta[0]["Id_Contrato"]);
                $rutaPlantilla = $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($consulta[0]["Empresa"])."/PlantillasContratos/".$contratos[0]["Ruta"];  
                echo "<label>Plantilla de contrato: </label><a href='".$rutaPlantilla."'>".$contratos[0]["Nombre"]."</a>";
                echo "<input name='plantilla' type='hidden' value='".$consulta[0]["Id_Contrato"]."'>";
            }else{
                echo "<label>Plantilla de contrato:</label>";
                echo "<input name='plantilla' type='hidden'>";
            }
            echo "</div>";
            echo "<br><br>";
             //  <!----------------Ruta------------------------>
            echo "<input type='file' name='file' id='file' class='inputfile inputfile-2' data-multiple-caption='{count} archivos seleccionados' multiple />";
            echo "<label for='file'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
            echo "<span class='iborrainputfile'>Seleccionar archivo</span>";
            echo "</label> <br>";
            echo"<input type='hidden' name='ruta' value='".$consulta[0]["Ruta"]."'/>";
            echo "<br>";
          //  <!------------------- Fecha de subida --------------->
            echo "<label id='lbldate'>Fecha de subida: ".$consulta[0]["Fecha Subida"]."</label><br><br>";
            echo "<input id='date' name='fecha' type='hidden' value='".$consulta[0]["Fecha Subida"]."'>";
            echo "<input class='enviar' type='submit' value='Enviar'>";
            echo "</form>";
        }
      }
        echo "</div>";
         echo "<br><br><br><br>";
        //  <!----------------- menu ---------------------------->
        echo "<button type='button' id='boton'><a href='../../bienvenido.php'>Inicio</a></button>";
    ?>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
         <script src="../js/custom-file-input.js"></script>
        <script src="..//js/jquery-v1.min.js"></script>
        <script src="..//js/jquery.custom-file-input.js"></script>
        <script>
            $(document).ready(function(){
                $("#file").change(function(){
                    var lbl = document.getElementById("lbldate")
                    var d = new Date()
                    var ds = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
                    lbl.textContent = "Fecha de Subida: "+ds
                    $("#date").val(ds)
                });
            });
        </script>
    </body>
</html>
