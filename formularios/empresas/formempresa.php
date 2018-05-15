<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion == ''){
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
    if(isset($_POST["cedulajuridica"]) And isset($_POST["nombre"]) And isset($_POST["correo"])And isset($_POST["direccion"])And isset($_POST["telefono1"])){
        $cedulajuridica = $_POST["cedulajuridica"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $direccion = $_POST["direccion"];
        $telefono1 = $_POST["telefono1"];
        if(isset($_POST["estado"])){
            $estado = true;
        }else{
            $estado = false;
        }
        if(!isset($_POST["telefono2"])Or $_POST["telefono2"]==""){
            $telefono2 = "Null";
        }else{
            $telefono2 = $_POST["telefono2"];
        }
        $imgChange=false;
        $carpeta_destino = $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($nombre)."/";
        if(!file_exists($carpeta_destino)){
            mkdir($carpeta_destino,0777,true);
        }
        if(isset($_FILES["file"])){
            $nameImg = $_FILES["file"]["name"];
            $typeImg = $_FILES["file"]["type"];
            $sizeImg = $_FILES["file"]["size"];
            if($sizeImg <= 16000000){
                if($typeImg=="image/jpg" or $typeImg=="image/jpeg" or $typeImg=="image/png"){
                    move_uploaded_file($_FILES["file"]["tmp_name"],$carpeta_destino.$nameImg);
                    $imgChange=true;
                }else{
                    $nameImg="Null";
                    $error="Format";
                }
            }else{
                $nameImg="Null";
                $error="Size";
            }
        }
        if(!isset($_POST["actualizar"])){
            if($Con->Insert_Empresas($cedulajuridica,$nombre,$correo,$direccion,$telefono1,$telefono2,$nameImg)){
                $error="Success";
            }else{
                $error="Inserted";
            }
        }elseif($_POST["actualizar"]=="done"){
          if (isset($_POST["foto"])And !$imgChange) {
              $nameImg=$_POST["foto"];
          }
            if($Con->Update_Empresas($cedulajuridica,$nombre,$correo,$direccion,$telefono1,$telefono2,$nameImg,$estado)){
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
        <H3 class="titulo">Empresas</H3>
        <br>
        <br>

        <?php
            $array = $Con->Select_G_Empresas("");
            if(!empty($array)){
                echo "<table><tr><th>C&eacute;dula Jur&iacutedica:</th><th>Nombre:</th><th>Correo:</th><th>Tel&eacute;fono1:</th><th>Tel&eacute;fono2:</th><th>Direcci&oacute;n:</th><th>Logo:</th><th>P</th></tr>";
                for($i=0;$i<sizeof($array);$i++){
                    echo "<tr><td>".$array[$i]["Cedula Juridica"]."</td><td>".$array[$i]["Nombre"]."</td><td>".$array[$i]["Correo"]."</td><td>".$array[$i]["Telefono1"]."</td><td>".$array[$i]["Telefono2"]."</td><td>".$array[$i]["Direccion"]."</td><td><img src='../../archives/uploads/".$Cfile->SinEspecialChars($array[$i]["Nombre"])."/".$array[$i]["Foto"]."' alt='Logo ".$array[$i]["Nombre"]."' width='25%'/></td><td><a href='formempresa.php?update=".$array[$i]["Cedula Juridica"]."'>Actualizar</a></td></tr>";
                }
                echo"</table>";
            }else{
                echo "<p>No hay registros dentro de la base de datos, ingrese cada registro manualmente con el formulario de abajo</p>";
            }
        ?>
        <br>
        <br>
        <?php
        if($update=="" And $update!="update"){
            echo "<form method='post' action='formempresa.php' enctype='multipart/form-data'>";
                //<!--------------------- Cedula Juridica ---------------->
                echo "<input type='text' required name='cedulajuridica' placeholder='Cedula Jur&iacute;dica' class='medium' pattern='[A-Za-Z0-9_-]{1,20}' maxlength='20'>";
                //<!--------------------- Nombre ---------------->
                echo "<input type='text' required name='nombre' placeholder='Nombre' class='medium' pattern='[A-Za-Z0-9_-]{1,150}' maxlength='150'>";
                //<!---------------- correo ----------------------->
                echo "<input type='correo' required name='correo' placeholder='Correo' class='all' pattern='[A-Za-Z0-9_-]{1,150}' maxlength='150'><br><br>";
                //<!----------------Descripcion------------------------>
                echo "<textarea name='direccion' cols='100' rows='3' pattern='[A-Za-Z0-9_-]{1,250}' maxlength='150'>Dirección</textarea><br>";
                //<!-------------- Telefono 1 --------------->
                echo "<input type='number' required name='telefono1' placeholder='Primer teléfono' class='medium' pattern='{1,8}' maxlenght='8'>";
                //<!-------------- Telefono 2 --------------->
                echo "<input type='number' name='telefono2' placeholder='Segundo teléfono' class='medium' pattern='{1,8}' maxlength='8'><br><br>";
                //<!-------------- Subir foto --------------->
                    echo "<h3 style='color:#000;'>Logo</h3>";

                echo "<input type='file' name='file' id='file' class='inputfile inputfile-1'/>
                <label for='file'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>
                    <span class='iborrainputfile'>Seleccionar archivo</span>
                </label>
                    <br>
                    <br>";
                //<!---------------- estados ---------------->
                echo "<p>Estado</p>";
                echo "<p style='color:#000;'><input type='checkbox' name='usuariohave' value='Ya tiene cuenta'>¿Habilitado?</p><br>";
                //<!-------------- boton enviar ----------->
                echo "<input type='submit' value='Enviar' class='enviar'>";
            echo "</form>";
        }else{
            $consulta = $Con->Select_G_Empresas($update);
            if(!empty($consulta)){
                echo "<form method='post' action='formempresa.php' enctype='multipart/form-data'>";
                echo"<input type='hidden' name='actualizar' value='done'/>";
                //<!--------------------- Cedula Juridica ---------------->
                echo "<input type='text' required name='cedulajuridica' placeholder='Cedula Jur&iacute;dica' class='medium' pattern='[A-Za-Z0-9_-]{1,20}' maxlength='20' value='".$consulta[0]["Cedula Juridica"]."'>";
                //<!--------------------- Nombre ---------------->
                echo "<input type='text' required name='nombre' placeholder='Nombre' class='medium' pattern='[A-Za-Z0-9_-]{1,150}' maxlength='150' value='".$consulta[0]["Nombre"]."'>";
                //<!---------------- correo ----------------------->
                echo "<input type='correo' required name='correo' placeholder='Correo' class='medium' pattern='[A-Za-Z0-9_-]{1,150}' maxlength='150' value='".$consulta[0]["Correo"]."'><br><br>";
                //<!----------------Descripcion------------------------>
                echo "<textarea name='direccion' cols='50' rows='3' pattern='[A-Za-Z0-9_-]{1,250}' maxlength='150'>".$consulta[0]["Direccion"]."</textarea><br>";
                //<!-------------- Telefono 1 --------------->
                echo "<input type='number' required name='telefono1' placeholder='Primer teléfono' class='medium' pattern='{1,8}' maxlenght='8' value='".$consulta[0]["Telefono1"]."'>";
                //<!-------------- Telefono 2 --------------->
                echo "<input type='number' name='telefono2' placeholder='Segundo teléfono' class='medium' pattern='{1,8}' maxlength='8' value='".($consulta[0]["Telefono2"]==null?0:$consulta[0]["Telefono2"])."'><br><br>";
                //<!-------------- Subir foto --------------->
                    echo "<h3 style='color:#000;'>Logo</h3>";
                echo"<input type='hidden' name='foto' value='".$consulta[0]["Foto"]."'/>";
                echo "<img src='../../archives/uploads/".$Cfile->SinEspecialChars($consulta[0]["Nombre"])."/".$consulta[0]["Foto"]."' alt='Logo ".$consulta[0]["Nombre"]."' width='25%'/><br>";
                echo "<input type='file' name='file' id='file' class='inputfile inputfile-1'/>
                <label for='file'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>
                    <span class='iborrainputfile'>Seleccionar archivo</span>
                </label>
                    <br>
                    <br>";
                //<!---------------- estados ---------------->
                echo "<p>Estado</p>";
                echo "<p style='color:#000;'><input type='checkbox' name='estado' checked>¿Habilitado?</p><br>";
                //<!-------------- boton enviar ----------->
                echo "<input type='submit' value='Enviar' class='enviar'>";
            echo "</form>";
            }
        }
        ?>
        <br>
        <br>
        <?php
            if(isset($error)){
                switch($error){
                    case "Success":
                        echo "<p>Insertado satisfactoriamente</p>";
                        break;
                    case "Inserted":
                        echo "<p>Error al Insertar</p>";
                        break;
                    case "SuccessUpdated":
                        echo "<p>Actualizaci&oacute;n realizada</p>";
                        break;
                    case "Updated":
                        echo "<p>Error al Actualizar</p>";
                        break;
                    case "Format":
                        echo "<p>Formato de imagen inv&aacute;lido</p>";
                        break;
                    case "Size":
                        echo "<p>La imagen es demasiado grande</p>";
                        break;
                }
            }
        ?>
        <br>
        <br>
        <!----------------- menu ---------------------------->
        <button type="button" id="boton"><a href="../../bienvenido.php">Inicio</a></button>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../../admin/registro/validar.js"></script>

    </body>
</html>
