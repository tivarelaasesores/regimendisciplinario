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
    if(isset($_POST["empresa"]) And isset($_POST["jornada"])
      And isset($_POST["nombre"]) And isset($_POST["salario"]) And isset($_POST["pagohor"]) And isset($_POST["pagoex"])){
        $empresa = $_POST["empresa"];
        $jornada = $_POST["jornada"];
        $nombre = $_POST["nombre"];
        $salario = $_POST["salario"];
        $pagohora = $_POST["pagohor"];
        $pagoextra = $_POST["pagoex"];
        if(isset($_POST["estado"])){
            $estado = true;
        }else{
            $estado = false;
        }
        if(!isset($_POST["actualizar"])){
            if($Con->Insert_Puestos($empresa, $nombre, $salario, $jornada, $pagohora, $pagoextra)){
                $error = "Success";
            }else{
                $error = "F_Insert";
            }
        }elseif(isset($_POST["actualizar"]) and $_POST["actualizar"]=="done"){
            if($Con->Update_Puestos($_POST["idpuesto"],$empresa, $nombre, $salario, $jornada, $pagohora, $pagoextra)){
                $error="SuccessUpdated";
            }else{
                $error="F_Update";
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
        <H3 class="titulo">Puestos</H3>
        <br>
        <br>
        <?php
            $array = $Con->Select_G_Puestos("");
            if(!empty($array)){
                echo "<table class='tabladesign'><tr><th>Id Puesto:</th><th>Nombre:</th><th>Empresa:</th><th>Salario:</th><th>Tipo Jornada:</th><th>Pago x Hora:</th><th>Pago x Extra:</th></tr>";
                for($i=0;$i<sizeof($array);$i++){
                    echo "<tr><td>".$array[$i]["Id_Puesto"]."</td><td>".$array[$i]["Nombre"]."</td><td>".$array[$i]["Empresa"]."</td><td>".$array[$i]["Salario"]."</td><td>".$array[$i]["Tipo_Jornada"]."</td><td>".$array[$i]["Pago_Hora"]."</td><td>".$array[$i]["Pago_Extra"]."</td><td><a href='forpuesto.php?update=".$array[$i]["Id_Puesto"]."'>Actualizar</a></td></tr>";
                }
                echo"</table>";
            }else{
                echo "<p>No hay registros dentro de la base de datos, ingrese cada registro manualmente con el formulario de abajo</p>";
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
                    case "F_Insert":
                        echo "<p>Error al Insertar Puesto</p>";
                        break;
                    case "SuccessUpdated":
                        echo "<p>Actualizaci&oacute;n realizada</p>";
                        break;
                    case "F_Update":
                        echo "<p>Error al Actualizar</p>";
                        break;
                }
            }
        if($update=="" And $update!="update"){
            echo "<form method='post' action='forpuesto.php' class='formulario' enctype='multipart/form-data'>";
                echo "<div class='desplegar1'>";
                //<!---------------- cedula juridica --------------->
                echo "<label>Empresa</label>";
                echo "<select name='empresa' class='browser-default'>";
                echo "<option value='' disabled selected>Desplegar</option>";
                $empresas = $Con->Select_G_Empresas("");
                if(!empty($empresas)){
                   for($i=0;$i<sizeof($empresas);$i++){
                       echo "<option value='".$empresas[$i]["Cedula Juridica"]."'>".$empresas[$i]["Nombre"]."</option>";
                   }
                }
                echo "</select>";
                //<!---------------- tipo de jornada --------------->
                echo "<label>Jornada</label>";
                echo "<select name='jornada' class='browser-default'>";
                echo "<option value='Null' disabled selected>Desplegar</option>
                            <option value='Diurna'>Diurna</option>
                            <option value='Nocturna'>Nocturna</option>
                            <option value='Mixta'>Mixta</option>";
                echo "</select>";
                echo "<br>";
                //<!--------------------- Nombre ---------------->
                echo "<input type='text' required name='nombre' placeholder='Nombre de Puesto' class='medium' maxlength='200' pattern='[A-Za-Z0-9_-]{1,200}'>";
                //<!--------------------- Salario ---------------->
                echo "<input type='number' required name='salario' placeholder='Salario' class='medium' max='999999999999' min='0' step='0.01'><br><br>";
                //<!--------------------- pago hora ---------------->
                echo "<input type='number' required name='pagohor' placeholder='Pago hora' class='medium' max='999999999999' min='0' step='0.01'>";
                //<!--------------------- pago extras ---------------->
                echo "<input type='text' required name='pagoex' placeholder='Pago extras' class='medium' max='999999999999' min='0' step='0.01'><br><br>";
                //<!-------------- boton enviar ----------->
                echo "<input type='submit' value='Enviar' class='enviar'>";
            echo "</form>";
        }else{
            $consulta = $Con->Select_G_Puestos($update);
            if(!empty($consulta)){
                echo "<form method='post' action='forpuesto.php' class='formulario' enctype='multipart/form-data'>";
                echo "<div class='desplegar1'>";
                echo"<input type='hidden' name='actualizar' value='done'/>";
                echo"<input type='hidden' name='idpuesto' value='".$consulta[0]["Id_Puesto"]."'/>";
                //<!---------------- cedula juridica --------------->
                echo "<label>Empresa</label>";
                echo "<select name='empresa' class='browser-default'>";
                if($consulta[0]["Empresa"]==""){
                    echo "<option value='' disabled selected>Desplegar</option>";
                }else{
                    echo "<option value='' disabled >Desplegar</option>";
                }
                $empresas = $Con->Select_G_Empresas("");
                if(!empty($empresas)){
                    for($i=0;$i<sizeof($empresas);$i++){
                        if($consulta[0]["Empresa"]==$empresas[$i]["Nombre"]){
                            echo "<option value='".$empresas[$i]["Cedula Juridica"]."' selected>".$empresas[$i]["Nombre"]."</option>";
                        }else{
                            echo "<option value='".$empresas[$i]["Cedula Juridica"]."'>".$empresas[$i]["Nombre"]."</option>";
                        }
                    }
                }
                echo "</select>";
                //<!---------------- tipo de jornada --------------->
                echo "<label>Jornada</label>";
                echo "<select name='jornada' class='browser-default'>";
                switch($consulta[0]["Tipo_Jornada"]){
                    case "Diurna":
                        echo "<option value='Null' disabled>Desplegar</option>
                        <option value='Diurna' selected>Diurna</option>
                        <option value='Nocturna'>Nocturna</option>
                        <option value='Mixta'>Mixta</option>";
                        break;
                    case "Nocturna":
                       echo "<option value='Null' disabled>Desplegar</option>
                        <option value='Diurna'>Diurna</option>
                        <option value='Nocturna' selected>Nocturna</option>
                        <option value='Mixta'>Mixta</option>";
                        break;
                    case "Mixta":
                        echo "<option value='Null' disabled>Desplegar</option>
                        <option value='Diurna'>Diurna</option>
                        <option value='Nocturna'>Nocturna</option>
                        <option value='Mixta' selected>Mixta</option>";
                        break;
                    case "":
                        echo "<option value='Null' disabled selected>Desplegar</option>
                        <option value='Diurna'>Diurna</option>
                        <option value='Nocturna'>Nocturna</option>
                        <option value='Mixta'>Mixta</option>";
                        break;
                }
                echo "</select>";
                echo "<br>";
                //<!--------------------- Nombre ---------------->
                echo "<input type='text' required name='nombre' placeholder='Nombre de Puesto' class='medium' maxlength='200' pattern='[A-Za-Z0-9_-]{1,200}' value='".$consulta[0]["Nombre"]."'>";
                //<!--------------------- Salario ---------------->
                echo "<input type='number' required name='salario' placeholder='Salario' class='medium' max='999999999999' min='0' step='0.01' value='".$consulta[0]["Salario"]."'><br><br>";
                //<!--------------------- pago hora ---------------->
                echo "<input type='number' required name='pagohor' placeholder='Pago hora' class='medium' max='999999999999' min='0' step='0.01' value='".$consulta[0]["Pago_Hora"]."'>";
                //<!--------------------- pago extras ---------------->
                echo "<input type='text' required name='pagoex' placeholder='Pago extras' class='medium' max='999999999999' min='0' step='0.01' value='".$consulta[0]["Pago_Extra"]."'><br><br>";
                //<!---------------- estados ---------------->
                echo "<p>Estado</p>";
                echo "<p style='color:#000;'><input type='checkbox' name='estado' value='Ya tiene cuenta' checked>¿Habilitado?</p><br>
                </div>";
                //<!-------------- boton enviar ----------->
                echo "<input type='submit' value='Enviar' class='enviar'>";
                echo "</form>";
            }
        }
        ?>
        <br>
        <br>
        <br>
        <br>
        <!----------------- menu ---------------------------->
        <button type="button" id="boton"><a href="../../bienvenido.php">Inicio</a></button>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    </body>
</html>
