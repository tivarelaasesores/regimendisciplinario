<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

    if($varsesion == null || $varsesion = ''){
        echo '<script>alert("Usted no tiene autorizacion");
        location.href="../../index.php";
        </script>';
            die();
    }
    if(isset($_GET["update"])){
        $update = $_GET["update"];
    }else{
        $update = null;
    }
    require_once("../../Conexion.php");
    require_once("../../Files.php");
    $Con = new Conexion();
    $Cfile = new FileManage();
    if(isset($_POST['puesto']) and isset($_POST['empresa']) and isset($_POST['fecha']) and isset($_POST['nombre'])){
        $puesto = $_POST['puesto'];
        $empresa = $_POST['empresa'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $emp = $Con->Select_G_Empresas($empresa);
        if(!empty($emp)){
            $carpeta_destino= $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($emp[0]["Nombre"])."/PlantillasContratos/";
        }
        if(!file_exists($carpeta_destino)){
            mkdir($carpeta_destino,0777,true);
        }
        $filechange=false;
        if(isset($_FILES["file"])){
            $finfo = new finfo();
            $typefile = $finfo->file($_FILES["file"]["tmp_name"],FILEINFO_MIME_TYPE);
            $sizefile = $_FILES["file"]["size"];
            if($sizefile <= 16000000){
                if($typefile=="application/pdf" or $typefile=="application/msword" or $typefile=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                    move_uploaded_file($_FILES["file"]["tmp_name"],$carpeta_destino.$nombre);
                    $filechange =true;
                    if(!isset($_POST["actualizar"])){
                        if($Con->Insert_Contratos($empresa,$puesto,$nombre,$fecha,$nombre)){
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
        }
        if(isset($_POST["actualizar"]) and $_POST["actualizar"]=="done" and isset($_POST["idcontrato"]) and $filechange){
            if($Con->Update_Contratos($_POST["idcontrato"],$empresa,$puesto,$nombre,$fecha,$nombre)){
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <img src="../../img/logoregistro.png" width="380px;">
        <H3 class="titulo">Contrato</H3>
        <br>
        <?php
            $array = $Con->Select_G_Contratos("");
            if(!empty($array)){
                echo "<table><tr><th>Id Contrato:</th><th>Nombre:</th><th>Empresa:</th><th>Puesto:</th><th>Fecha Publicaci&oacute;n:</th><th>Ruta:</th></tr>";
                for($i=0;$i<sizeof($array);$i++){
                    echo "<tr><td>".$array[$i]["Id_Contrato"]."</td><td>".$array[$i]["Nombre"]."</td><td>".$array[$i]["Empresa"]."</td><td>".$array[$i]["Puesto"]."</td><td>".$array[$i]["Fecha Publicacion"]."</td><td><a href='../../archives/uploads/".$Cfile->SinEspecialChars($array[$i]["Empresa"])."/PlantillasContratos/".$array[$i]["Ruta"]."'>".$array[$i]["Ruta"]."</a></td><td><a href='formcontrato.php?update=".$array[$i]["Id_Contrato"]."'>Actualizar</a></td></tr>";
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
        if($update=="" And $update!="update"){
        echo "<form action='formcontrato.php' method='post' enctype='multipart/form-data'>";
              //  <!--------------------- puesto ---------------->
            echo "<div class='desplegar1'>";
                echo "<label>Puesto</label>";
                $Con->setResultado(null);
                echo "<select name='puesto' class='browser-default'>
                    <option value='Null' disabled selected>Desplegar</option>";
                $puestos=$Con->Select_G_Puestos("");
                if(!empty($puestos)){
                    for($i=0;$i<sizeof($puestos);$i++){
                        echo "<option value='".$puestos[$i]["Id_Puesto"]."'>".$puestos[$i]["Nombre"]."</option>";
                    }
                }
                echo "</select>";
              //  <!---------------- cedula juridica --------------->
                echo "<label>Empresa</label>
                    <select name='empresa' class='browser-default'>
                    <option value='Null' disabled selected>Desplegar</option>";
                $empresas = $Con->Select_G_Empresas("");
                if(!empty($empresas)){
                    for($i=0;$i<sizeof($empresas);$i++){
                        echo "<option value='".$empresas[$i]["Cedula Juridica"]."'>".$empresas[$i]["Nombre"]."</option>";
                    }
                }
                echo "</select>";
                echo "<br><br>";
                 //  <!---------------- Fecha --------------->
                echo "<label id='lbldate'>Fecha de Subida: </label>";
                echo "<input id='date' name='fecha' type='hidden'>";
                echo "<br><br><br>";
                //  <!---------------- Nombre --------------->
                echo "<label id='nombrefile'>Nombre del Archivo:</label>";
                echo "<input id='inpname' name='nombre' type='hidden'><br><br>";
            echo "</div>";
            // <!-------------- Adjuntar ----------------->
                echo "<h3 style='color:#000;'>Documento</h3><br>";
                echo "<input type='file' name='file' id='file' class='inputfile inputfile-1'/>";
                echo "<br>";
                //<!-------------- boton enviar ----------->
              echo "<input type='submit' value='Enviar' class='enviar'>";
            echo "</form>";
            echo "<br>
            <br>
            <br>
            <br>";
            //<!----------------- menu ---------------------------->
            echo "<button type='button' id='boton'><a href='../../bienvenido.php'>Inicio</a></button>";
          }else{
            $consulta = $Con->Select_G_Contratos($update);
            if(!empty($consulta)){
              echo "<form action='formcontrato.php' method='post' enctype='multipart/form-data'>";
                echo"<input type='hidden' name='actualizar' value='done'/>";
                echo"<input type='hidden' name='idcontrato' value='".$consulta[0]["Id_Contrato"]."'/>";
                //  <!--------------------- puesto ---------------->
                echo "<div class='desplegar1'>";
                    echo "<label>Puesto</label>";
                    $Con->setResultado(null);
                    echo "<select name='puesto' class='browser-default'>";
                    if($consulta[0]["Puesto"]!=""){
                        echo "<option value='Null' disabled>Desplegar</option>";
                    }else{
                        echo "<option value='Null' disabled selected>Desplegar</option>";
                    }
                    $puestos=$Con->Select_G_Puestos("");
                    if(!empty($puestos)){
                        for($i=0;$i<sizeof($puestos);$i++){
                            if($consulta[0]["Puesto"]==$puestos[$i]["Nombre"]){
                                echo "<option value='".$puestos[$i]["Id_Puesto"]."' selected>".$puestos[$i]["Nombre"]."</option>";
                            }else{
                                echo "<option value='".$puestos[$i]["Id_Puesto"]."'>".$puestos[$i]["Nombre"]."</option>";
                            }
                        }
                    }
                    echo "</select>";
                  //  <!---------------- cedula juridica --------------->
                  echo "<label>Empresa</label>";
                    $Con->setResultado(null);
                    echo "<select name='empresa' class='browser-default'>";
                    if($consulta[0]["Empresa"]!=""){
                        echo "<option value='Null' disabled>Desplegar</option>";
                    }else{
                        echo "<option value='Null' disabled selected>Desplegar</option>";
                    }    
                  $empresas = $Con->Select_G_Empresas("");
                  if(!empty($empresas)){
                      for($i=0;$i<sizeof($empresas);$i++){
                          echo "<option value='".$empresas[$i]["Cedula Juridica"]."'>".$empresas[$i]["Nombre"]."</option>";
                      }
                  }
                  echo "</select>";
                  echo "<br><br>";
                    //  <!---------------- Fecha --------------->
                    echo "<label id='lbldate'>Fecha de Subida: ".$consulta[0]["Fecha Publicacion"]."</label>";
                    echo "<input id='date' name='fecha' type='hidden' value='".$consulta[0]["Fecha Publicacion"]."'>";
                    echo "<br><br><br>";
                    //  <!---------------- Nombre --------------->
                    echo "<label id='nombrefile'>Nombre del Archivo: ".$consulta[0]["Nombre"]."</label>";
                    echo "<input id='inpname' name='nombre' type='hidden' value='".$consulta[0]["Nombre"]."'><br><br>";
                echo "</div>";
                // <!-------------- Adjuntar ----------------->
                echo "<h3 style='color:#000;'>Documento</h3><br>";
                echo "<input type='file' name='file' id='file' class='inputfile inputfile-1'/>";
                echo "<br>";
                //<!-------------- boton enviar ----------->
                echo "<input type='submit' value='Enviar' class='enviar'>";
                echo "</form>";
              echo "<br>
              <br>
              <br>
              <br>";
              //<!----------------- menu ---------------------------->
              echo "<button type='button' id='boton'><a href='../../bienvenido.php'>Inicio</a></button>";
            }
        }
        ?>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#file").change(function(){
                    var lbl = document.getElementById("lbldate")
                    var txtname = document.getElementById("nombrefile")
                    var d = new Date()
                    var filname =$("#file")[0].files[0].name
                    var ds = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
                    lbl.textContent = "Fecha de Subida: "+ds
                    txtname.textContent = "Nombre del Archivo: "+filname
                    $("#date").val(ds)
                    $("#inpname").val(filname)
                });
            });
        </script>
    </body>
</html>
