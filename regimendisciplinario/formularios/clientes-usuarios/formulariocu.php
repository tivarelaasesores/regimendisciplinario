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
    if(isset($_POST['idcliente']) And isset($_POST['nombre1']) And isset($_POST['apellido1']) And isset($_POST['apellido2']) And isset($_POST['correo']) And isset($_POST['direccion']) And isset($_POST['telefono1']) And isset($_POST['usuario'])){
        $idcliente = $_POST['idcliente'];
        $nombre = $_POST['nombre1'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $telefono1 = $_POST['telefono1'];
        $usuario = $_POST['usuario'];
        $cedulajuridica = $_POST['cedulajuridica'];
        if(!isset($_POST["telefono2"])Or $_POST["telefono2"]==""){
            $telefono2 = "Null";
        }else{
            $telefono2 = $_POST["telefono2"];
        }
        if(isset($_POST['contra1']) And isset($_POST['contra2'])){
            if($_POST['contra1']!=$_POST['contra2']){
                $error = "Contrasena";
            }else{
                $contra1 = $_POST['contra1'];
                $contra2 = $_POST['contra2'];
                if(!isset($_POST["actualizar"])){
                    if($Con->Insert_Usuarios($usuario,$contra1,2)){
                        if($Con->Insert_Clientes($idcliente,$nombre,$apellido1,$apellido2,$correo,$direccion, $telefono1, $telefono2, $cedulajuridica,$usuario)){
                            $error="Success";
                        }else{
                            $error="F_InsertClient";
                        }
                    }else{
                        $error = "F_InsertUser";
                    }
                }
            }
        }
        if(isset($_POST["actualizar"]) and $_POST["actualizar"]=="done"){
            if($Con->Update_Clientes($idcliente,$nombre,$apellido1,$apellido2,$correo,$direccion, $telefono1, $telefono2, $cedulajuridica,$usuario)){
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
        <H3 class="titulo">Registro de clientes & usuarios</H3>
        <br>
        <?php
            $array = $Con->Select_G_Clientes("");
            if(!empty($array)){
                echo "<table class='tabladesign'><tr><th>Id Cliente:</th><th>Nombre:</th><th>ApellidoP:</th><th>ApellidoM:</th><th>Correo:</th><th>Empresa:</th><th>Usuario:</th><th>Direcci&oacute;n:</th><th>Tel&eacute;fono1:</th><th>Tel&eacute;fono2:</th></tr>";
                for($i=0;$i<sizeof($array);$i++){
                    echo "<tr><td>".$array[$i]["Id_Cliente"]."</td><td>".$array[$i]["Nombre"]."</td><td>".$array[$i]["ApellidoP"]."</td><td>".$array[$i]["ApellidoM"]."</td><td>".$array[$i]["Correo"]."</td><td>".$array[$i]["Empresa"]."</td><td>".$array[$i]["Usuario"]."</td><td>".$array[$i]["Direccion"]."</td><td>".$array[$i]["Telefono1"]."</td><td>".$array[$i]["Telefono2"]."</td><td><a href='formulariocu.php?update=".$array[$i]["Id_Cliente"]."'>Actualizar</a></td></tr>";
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
                    case "F_InsertClient":
                        echo "<p>Error al Insertar cliente</p>";
                        break;
                    case "SuccessUpdated":
                        echo "<p>Actualizaci&oacute;n realizada</p>";
                        break;
                    case "F_Update":
                        echo "<p>Error al Actualizar</p>";
                        break;
                    case "Contrasena":
                        echo "<p>Las contrase&ntilde;as no coinciden</p>";
                        break;
                }
            }
        if($update=="" And $update!="update"){
            echo "<form method='post' action='formulariocu.php' class='formulario' enctype='multipart/form-data'>";
            echo "<input type='text' required name='idcliente' placeholder='C&eacute;dula' class='all' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'>";
            echo "<input type='text' required name='nombre1' placeholder='Nombre' class='all' maxlength='50' pattern='[A-Za-Z0-9_-]{1,50}'>";
            echo "<input type='text' required name='apellido1' placeholder='Primer apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}'>";
            echo "<input type='text' required name='apellido2' placeholder='Segundo apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}'>";
            echo "<input type='email' required name='correo' placeholder='Correo' class='all' maxlength='150' pattern='[A-Za-Z0-9_-]{1,150}'>";
            echo "<textarea class='all' name='direccion'>Colocar aquí por favor su dirección exacta</textarea>";
            echo "<input type='number' required name='telefono1' placeholder='Primer teléfono' class='medium' max='99999999' pattern='[A-Za-Z0-9_-]{1,8}'>";
            echo "<input type='number' name='telefono2' placeholder='Segundo teléfono' class='medium' max='99999999' pattern='[A-Za-Z0-9_-]{1,8}'>";
            echo "<br><br>";
            echo "<label>Empresa</label>";
            $Con->setResultado(null);
            echo "<select name='cedulajuridica' class='browser-default'><option value='' disabled selected>Desplegar</option>";
            $consulta = $Con->Select_G_Empresas("");
            if(!empty($consulta)){
                for($i=0;$i<sizeof($consulta);$i++){
                    echo "<option value='".$consulta[$i]["Cedula Juridica"]."'>".$consulta[$i]["Nombre"]."</option>";
                }
            }
            echo "</select>";
            echo "<br>";
            //  <!-------------- Usuario --------------->
            echo "<input type='text' required name='usuario' placeholder='Usuario' class='all' maxlength='30' pattern='[A-Za-Z0-9_-]{1,30}'><br>";
            //<!-------------- Clave --------------->
            echo "<input type='password' required name='contra1' placeholder='Contraseña' class='medium' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'>";
            //  <!-------------- Repetir clave --------------->
            echo "<input type='password' required name='contra2' placeholder='Repetir contraseña' class='medium' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'><br>";
            echo "<input type='submit' value='Enviar' class='enviar'>";
            echo "</form>";
            echo "<br><br><br><br>";
        }else {
            $consulta = $Con->Select_G_Clientes($update);
            if(!empty($consulta)){
            echo "<form action='formulariocu.php' method='post' class='formulario'>";
                echo"<input type='hidden' name='actualizar' value='done'/>";
                echo"<input type='hidden' name='usuario' value='".$consulta[0]["Usuario"]."'/>";
                echo "<input type='text' required name='idcliente' placeholder='C&eacuate;dula' class='all' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}' value='".$consulta[0]["Id_Cliente"]."'>";
                echo "<input type='text' required name='nombre1' placeholder='Nombre' class='all' maxlength='50' pattern='[A-Za-Z0-9_-]{1,50}' value='".$consulta[0]["Nombre"]."'>";
                echo "<input type='text' required name='apellido1' placeholder='Primer apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}' value='".$consulta[0]["ApellidoP"]."'>";
                echo "<input type='text' required name='apellido2' placeholder='Segundo apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}' value='".$consulta[0]["ApellidoM"]."'>";
                echo "<input type='email' required name='correo' placeholder='Correo' class='all' maxlength='150' pattern='[A-Za-Z0-9_-]{1,150}' value='".$consulta[0]["Correo"]."'>";
                echo "<textarea class='all' name='direccion'>".$consulta[0]["Direccion"]."</textarea>";
                echo "<input type='number' required name='telefono1' placeholder='Primer teléfono' class='medium' max='99999999' pattern='[A-Za-Z0-9_-]{1,8}' value='".$consulta[0]["Telefono1"]."'>";
                echo "<input type='number' name='telefono2' placeholder='Segundo teléfono' class='medium' max='99999999' pattern='[A-Za-Z0-9_-]{1,8}' value='".$consulta[0]["Telefono2"]."'>";
                echo "<br><br>";
                echo "<label>Empresa: </label>";
                $Con->setResultado(null);
                echo "<select name='cedulajuridica' class='browser-default'>";
                if($consulta[0]["Empresa"]==""){
                    echo "<option value='' disabled selected>Desplegar</option>";
                }else{
                    echo "<option value='' disabled>Desplegar</option>";
                }
                $arrayEmpresa = $Con->Select_G_Empresas("");
                if(!empty($arrayEmpresa)){
                    for($i=0;$i<sizeof($arrayEmpresa);$i++){
                        if($arrayEmpresa[$i]["Nombre"] == $consulta[0]["Empresa"]){
                            echo "<option value='".$arrayEmpresa[$i]["Cedula Juridica"]."' selected>".$arrayEmpresa[$i]["Nombre"]."</option>";
                        }else{
                            echo "<option value='".$arrayEmpresa[$i]["Cedula Juridica"]."'>".$arrayEmpresa[$i]["Nombre"]."</option>";
                        }
                    }
                }
                echo "</select>";
                echo "<br>";
                echo "<br>";
                echo "<p style='color:#000;'><input type='checkbox' name='usuariohave' value='Ya tiene cuenta' checked>¿Habilitado?</p><br>";
                echo "<input type='submit' value='Enviar' class='enviar'>";
            echo "</form>";
        }
    }
    ?>
        <!----------------- menu ---------------------------->
        <button type='button' id='boton'><a href='../../bienvenido.php'>Inicio</a></button>
        <br>
        <br>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    </body>
</html>
