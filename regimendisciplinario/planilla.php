<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion == ''){
    echo '<script>alert("Usted no tiene autorizacion");
    location.href="../../index.php";
    </script>';
        die();
}
    require_once("Conexion.php");
    require_once("Files.php");
    $Con = new Conexion();
    $File = new FileManage();
    if(isset($_FILES["file"])){
        $finfo = new finfo();
        $typefile = $finfo->file($_FILES["file"]["tmp_name"],FILEINFO_MIME_TYPE);
        $filesize = $_FILES["file"]["size"];
        if($typefile == "application/vnd.ms-excel" or $typefile == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
            if($filesize<104857600){
                $File->ExceltoArray($_FILES["file"]["tmp_name"]);
            }
        }
    }
if(isset($_GET["update"])){
    $update = $_GET["update"];
}else{
    $update = null;
}

if(isset($_POST['idempleado']) And isset($_POST['nombre1']) And isset($_POST['apellido1']) And isset($_POST['apellido2'])And isset($_POST['correo'])And isset($_POST['telefono1'])And isset($_POST['cedulajuridica'])And isset($_POST['idempleado'])And isset($_POST['contra1'])And isset($_POST['contra2'])And isset($_POST['descripcion'])And isset($_POST['puesto'])And isset($_POST['tipo_contrato'])And isset($_POST['diastrabajados'])And isset($_POST['jefeinmediato'])And isset($_POST['brutp'])And isset($_POST['horasextra'])And isset($_POST['totalextras'])And isset($_POST['descuentos'])And isset($_POST['salarioneto'])){
  $idempleado = $_POST['idempleado'];
   $nombre = $_POST['nombre1'];
     $apellido1 = $_POST['apellido1'];
     $apellido2 = $_POST['apellido2'];
     $correo = $_POST['correo'];
     $telefono1 = $_POST['telefono1'];
     $telefono2 = $_POST['telefono2'];
    $cedulajuridica = $_POST['cedulajuridica'];
    $puesto = $_POST['puesto'];
    $fecha_de_salida = $_POST['fecha_de_salida'];
    $fecha_de_ingreso = $_POST['fecha_de_ingreso'];
    $tipo_contrato = $_POST['tipo_contrato'];
     $contra1 = $_POST['contra1'];
     $contra2 = $_POST['contra2'];
     $diastrabajados = $_POST['diastrabajados'];
     $jefeinmediato = $_POST['jefeinmediato'];
     $brutp = $_POST['brutp'];
     $horasextra = $_POST['horasextra'];
     $totalextras = $_POST['totalextras'];
     $descuentos = $_POST['descuentos'];
     $salarioneto = $_POST['salarioneto'];
     $direccion = $_POST['descripcion'];
     $fechadenacimiento = $_POST['dty'];
     $foto = $_POST['file-1'];
     if($_POST["estado"]){
         $estado = true;
     }else{
         $estado = false;
     }
     if(!isset($_POST["telefono2"])Or $_POST["telefono2"]==""){
         $telefono2 = "Null";
     }else{
         $telefono2 = $_POST["telefono2"];
     }
     if(isset($_FILES["file"])){
         $nameImg = $_FILES["file"]["name"];
         $typeImg = $_FILES["file"]["type"];
         $sizeImg = $_FILES["file"]["size"];
         if($sizeImg <= 16000000){
             if($typeImg=="image/jpg" or $typeImg=="image/jpeg" or $typeImg=="image/png"){
                 $carpeta_destino = $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/pictures/";
                 move_uploaded_file($_FILES["file"]["tmp_name"],$carpeta_destino.$nameImg);

             }else{
                 $nameImg="Null";
                 $error="Format";
             }
         }else{
             $nameImg="Null";
             $error="Size";
         }
     }else{
         $nameImg=$_POST["foto"];
     }
     if(!isset($_POST["actualizar"])){
       if ($Con->Insert_Usuarios($idempleado,$contra1,3)) {
         if ($Con->Insert_Empleados($idempleado,$nombre,$apellido1,$apellido2,$correo,$fechadenacimiento,$direccion, $telefono1, $telefono2, $foto, $idempleado)) {
           if($Con->Insert_ExpedienteL($idempleado,$cedulajuridica,$fecha_de_ingreso,$fecha_de_salida,$jefeinmediato,$puesto,$tipo_contrato,$brutp, $horasextra, $totalextras, $descuentos, $salarioneto)){
               $error="Success";
           }else{
               $error="Inserted";
           }
         }
       }
     }elseif($_POST["actualizar"]=="done"){
         if($Con->Update_ExpedienteL($idempleado,$cedulajuridica,$fecha_ingreso,$fecha_salida,$jefe,$idpuesto,$tipo_contrato,$salario_bruto, $horas_extras, $total_extras, $descuento, $salario_neto)){
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
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="formularios/file-input.css">

      <!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="apple-touch-icon" sizes="57x57" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="60x60" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="72x72" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="76x76" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="114x114" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="120x120" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="144x144" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="152x152" href="img/rg.jpg">
        <link rel="apple-touch-icon" sizes="180x180" href="img/rg.jpg">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/rg.jpg">
        <link rel="icon" type="image/png" sizes="32x32" href="img/rg.jpg">
        <link rel="icon" type="image/png" sizes="96x96" href="img/rg.jpg">
        <link rel="icon" type="image/png" sizes="16x16" href="img/rg.jpg">
        <link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/rg.jpg">
<meta name="theme-color" content="#ffffff">
    </head>

    <body>
        <!---------------- INICIO MENU -------------------->
        <header>
          <nav class="transparent">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center"><img src="img/logoexpedientelaboral.png" width="430px;" id="logo"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo" style="background-color:#1D5072;">
    <li><a href="bienvenido.php"><p style="color:#FFF;">Inicio</p></a></li>
        <li><a href="cll.php"><p style="color:#FFF;">Consultas legales laborales</p></a></li>
        <li><a href="legislacionlaboral.php"><p style="color:#FFF;">Legislación laboral</p></a></li>
        <li><a href="solucioneslaboralesradio.php"><p style="color:#FFF;">Soluciones Laborales Radio</p></a></li>
        <li><a href="tv.php"><p style="color:#FFF;">Soluciones Laborales T.V.</p></a></li>
    <!--<li><a href="soporte.html"><p style="color:#FFF;">Soporte</p></a></li>--->
  </ul>
      </header>
        <br>
        <br>
        <br>
        <!-------------------------- INICIO MENU VERTICAL -------------------------------->

        <div class="vertical-menu">
  <a href="bienvenido.php"><img src="img/puntito.png" width="15px" height="15px" title="Inicio"></a>
  <a href="cll.php"><img src="img/puntito.png" width="15px" height="15px" title="Consultas Laborales"></a>
  <a href="legislacionlaboral.php"><img src="img/puntito.png" width="15px" height="15px" title="Legislación Laboral"></a>
  <a href="solucioneslaboralesradio.php"><img src="img/puntito.png" width="15px" height="15px" title="Radio"></a>
  <a href="tv.php"><img src="img/puntito.png" width="15px" height="15px" title="Televisión"></a>
  <!--<a href="https://regimendisciplinario.tk/soporte"><img src="img/puntito.png" width="10px" height="10px"></a>-->
</div>

<!------------- buscar --------------->
        <div class="row">
            <div class="col s1 push-s11">
         <nav style="height:30px;">
      <form >
        <div class="blue input-field">
          <input style="height:30px;" id="search" type="search" required>
          <label style="margin-top:-15px;" class="label-icon" for="search"><i class="material-icons ">search</i></label>
          <i style="margin-top:-15px;" class="material-icons">close</i>
        </div>
      </form>
  </nav>
            </div>
            </div>


        <!--------------- DIV EXCELL PHP -------------------->

        <div class="row">
            <div id="c-consulta" class="col s10 push-s1">

                <!------------------ inclusion php excell---------------------------------->
                <?php
                    //Imprimir tabla de Expediente Laboral
                    $array = $Con->Select_G_ExpedienteL("");
                    if(!empty($array)){
                        echo "<table class='tabla responsive-table'><tr><th>Id Empleado:</th><th>Empleado:</th><th>Empresa:</th><th>Fecha de Ingreso:</th><th>Fecha de Salida:</th><th>Jefe Inmediato:</th><th>Puesto:</th><th>Tipo Contrato:</th><th>Salario Bruto:</th><th>Horas Extra:</th><th>Total Extras:</th><th>Descuento:</th><th>Salario Neto:</th></tr>";
                        for($i=0;$i<sizeof($array);$i++){
                            echo "<tr><td>".$array[$i]["Id_Empleado"]."</td><td>".$array[$i]["Empleado"]."</td><td>".$array[$i]["Empresa"]."</td><td>".$array[$i]["Fecha Ingreso"]."</td><td>".$array[$i]["Fecha Salida"]."</td><td>".$array[$i]["Jefe Inmediato"]."</td><td>".$array[$i]["Puesto"]."</td><td>".$array[$i]["Tipo Contrato"]."</td><td>".$array[$i]["Salario Bruto"]."</td><td>".$array[$i]["Horas Extra"]."</td><td>".$array[$i]["Total Extras"]."</td><td>".$array[$i]["Descuento"]."</td><td>".$array[$i]["Salario Neto"]."</td><td><a href='adjuntos?empleado=".$array[$i]["Id_Empleado"]."'>Ver informaci&oacute;n</a></td></tr>";
                        }
                            echo"</table>";
                    }else{
                        echo "<p>No hay registros dentro de la base de datos, adjunte un documento excel como este o ingrese cada registro manualmente con el formulario de abajo</p>";
                    }

                ?>
                <!----------------------FIN ------------------------->
                </div>
            </div>
                                <?php
            if (isset($_POST["contra1"]) and isset($_POST["contra2"])){
                if(!($_POST["contra1"] === $_POST["contra2"])){
                    echo "<p>las claves deben ser identicas</p>";
                }
            }
        ?>
        <br><br>
        <!----------- boton flotante ---------------->
        <div class="fixed-action-btn">
  <a class="btn-floating btn-large light-blue darken-3">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red" href="cerrar.php"><i class="material-icons">exit_to_app</i></a></li>
<!----------- subir archivo -------> 
      <form action="planilla.php" method="post" enctype='multipart/form-data'>
    <li><input type="submit" class="btn-floating green" value="&#8593;"></li>

          <!----------- seleccionar archivo ------->
      <li><a><i class="material-icons">
    <div class="file-field input-field">
      <div class="btn-floating blue">
        <span>&#8362;</span>
        <input type="file" name="file">
      </div>

    </div>

          </i></a></li>
          </form>
  </ul>
</div>
        <!------------------------- INCLUIR BOTON --------------------------->
              <a class="incluirboton" href="#" onclick="mostrar(this); return false">Ingresar nuevo registro</a>

        <!---------- inicio formulario ------------------->
                <div id="oculto" style="visibility:hidden">

            <!------------------ Registro --------------------->

        <H3 class="titulo" style="color:#000;">Empleados - Planilla</H3>
        <?php
            $array = $Con->Select_G_ExpedienteL("");
        ?>
        <br>
        <br>
          <?php
          if($update=="" And $update!="update"){
            echo "<form action='#' method='post' class='formulario' id='formCheckPassword'>";
            // Id Empleado------------------->
            echo "<input type='text' required name='idempleado' placeholder='Identificación' class='all' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'>";
                //<!-------------- Nombre --------------->
                echo "<input type='text' required name='nombre1' placeholder='Nombre' class='all' maxlength='50' pattern='[A-Za-Z0-9_-]{1,50}'>";
                //<!-------------- Primer Apellido --------------->
                echo "<input type='text' required name='apellido1' placeholder='Primer apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}'>";
                //<!-------------- Segundo Apellido --------------->
                echo "<input type='text' required name='apellido2' placeholder='Segundo apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}'>";
                //<!-------------- Correo --------------->
                echo "<input type='email' required name='correo' placeholder='Correo' class='all' maxlength='150' pattern='[A-Za-Z0-9_-]{1,150}'>";
                //<!-------------- Fecha de nacimiento --------------->
                echo "<h3 style='color:#000;'>Fecha de nacimiento</h3>";
                echo "<input type='date' required name='dty' class='all'>";
                //<!-------------- Texto ------------------------------>
                echo "<textarea name='descripcion' required class='all' maxlength='250' pattern='[A-Za-Z0-9_-]{1,250}'>Colocar aquí por favor su dirección exacta</textarea>";
                //<!-------------- Telefono 1 --------------->
                echo "<input type='number' required name='telefono1' placeholder='Primer teléfono' class='medium' max='99999999'>";
                //<!-------------- Telefono 2 --------------->
                echo "<input type='number' name='telefono2' placeholder='Segundo teléfono' class='medium' max='99999999'><br>";
                //<!-------------- Cedula Juridica --------------->
                echo "<div class='desplegar'>";
                echo "<label>Cedula jurídica</label>";
                    echo "<select name='cedulajuridica'>
                        <option value='1'>Option 1</option>
                        <option value='2'>Option 2</option>
                        <option value='3'>Option 3</option>
                    </select>";
                    echo "</div>";
                echo "<br>";
                //<!-------------- Fecha Ingreso --------------->
                echo "<h3 style='color:#000;'>Fecha Ingreso</h3>";
                 echo "<input type='date' required name='fecha_de_ingreso' class='all' required>";
                echo "<br>";
                echo "<br>";
                //<!-------------- Fecha salida --------------->
                echo "<h3 style='color:#000;'>Fecha salida</h3>";
                 echo "<input type='date' required name='fecha_de_salida' class='all' required>";
                //<!--------------- Jefe inmediato --------------->
                echo "<input type='text' required name='jefeinmediato' placeholder='Jefe inmediato' maxlength='200' class='all' pattern='[A-Za-Z0-9_-]{1,200}'><br>";
                //<!-------------- Puesto --------------->
                echo "<div class='desplegar1'>";
                echo "<label>Puesto</label>";
                    echo "<select name='puesto' class='browser-default'>
                        <option value='1'>Option 1</option>
                        <option value='2'>Option 2</option>
                        <option value='3'>Option 3</option>
                    </select>";
                //<!-------------- Tipo contrato --------------->
                echo "<label>Tipo contrato</label>";
                    echo "<select name='tipo_contrato' class='browser-default'>
                        <option value='1'>Option 1</option>
                        <option value='2'>Option 2</option>
                        <option value='3'>Option 3</option>
                    </select>";
                    echo "</div>";
                //<!-------------- Salario Bruto --------------->
                echo "<input type='number' required name='brutp' placeholder='Salario bruto' step='any' class='medium' max='9999999999999' pattern='[A-Za-Z0-9_-]{1,13}'>";
                //<!-------------- Horas extra --------------->
                echo "<input type='number' required name='horasextra' placeholder='Horas extra' step='any' class='medium' max='999999999999'>";
                //<!-------------- Total extras --------------->
                echo "<input type='number' required name='totalextras' placeholder='Total extras' step='any' class='medium' max='999999999999'>";
                //<!-------------- Descuentos --------------->
                echo "<input type='number' required name='descuentos' placeholder='Descuentos' step='any' class='medium' max='999999999999'>";
                //<!-------------- Salario Neto --------------->
                echo "<input type='number' required name='salarioneto' placeholder='Salario neto' step='any' class='medium' max'999999999999'>";

                //<!-------------- Subir foto --------------->

                echo "<input type='file' name='file-1' id='file-1' class='inputfile inputfile-1' data-multiple-caption='{count} archivos seleccionados' multiple />
                  <label for='file-1'>
                  <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>
                  <span class='iborrainputfile'>Seleccionar archivo</span>
                  </label>";
                echo "<br>";
              //<!-------------- Usuario --------------->
                echo "<input type='text'' required name='usuario' placeholder='Usuario' class='medium' maxlength='30' pattern='[A-Za-Z0-9_-]{1,30}'><br>";

            //<!-------------- Clave --------------->
                echo "<input type='password' required name='contra1' placeholder='Contraseña' class='medium' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'>";
            //<!-------------- Repetir clave --------------->
                echo "<input type='password' required name='contra2' placeholder='Repetir contraseña' class='medium' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'><br>";
                   echo "<p>";
                    echo "<label>
                        <input type='checkbox' />
                        <span>¿Habilitado?</span>
                        </label>";
                echo "</p>";
                echo "<input type='submit' value='Enviar' class='enviar'>";
                echo "<br>
                <br>";
                echo "</form>";
       }else {
         $consulta = $Con->Select_G_ExpedienteL($update);
         if(!empty($consulta)){
           echo "<form action='#' method='post' class='formulario' id='formCheckPassword'>";
           // Id Empleado------------------->
           echo "<input type='text' required name='idempleado' placeholder='Identificación' class='all' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'>";
               //<!-------------- Nombre --------------->
               echo "<input type='text' required name='nombre1' placeholder='Nombre' class='all' maxlength='50' pattern='[A-Za-Z0-9_-]{1,50}'>";
               //<!-------------- Primer Apellido --------------->
               echo "<input type='text' required name='apellido1' placeholder='Primer apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}'>";
               //<!-------------- Segundo Apellido --------------->
               echo "<input type='text' required name='apellido2' placeholder='Segundo apellido' class='medium' maxlength='100' pattern='[A-Za-Z0-9_-]{1,100}'>";
               //<!-------------- Correo --------------->
               echo "<input type='email' required name='correo' placeholder='Correo' class='all' maxlength='150' pattern='[A-Za-Z0-9_-]{1,150}'>";
               //<!-------------- Fecha de nacimiento --------------->
               echo "<h3 style='color:#000;'>Fecha de nacimiento</h3>";
               echo "<input type='date' required name='dty' class='all'>";
               //<!-------------- Texto ------------------------------>
               echo "<textarea name='descripcion' required class='all' maxlength='250' pattern='[A-Za-Z0-9_-]{1,250}'>Colocar aquí por favor su dirección exacta</textarea>";
               //<!-------------- Telefono 1 --------------->
               echo "<input type='number' required name='telefono1' placeholder='Primer teléfono' class='medium' max='99999999'>";
               //<!-------------- Telefono 2 --------------->
               echo "<input type='number' name='telefono2' placeholder='Segundo teléfono' class='medium' max='99999999'><br>";
               //<!-------------- Cedula Juridica --------------->
               echo "<div class='desplegar'>";
               echo "<label>Cedula jurídica</label>";
                   echo "<select name='cedulajuridica'>
                       <option value='1'>Option 1</option>
                       <option value='2'>Option 2</option>
                       <option value='3'>Option 3</option>
                   </select>";
                   echo "</div>";
               echo "<br>";
               //<!-------------- Fecha Ingreso --------------->
               echo "<h3 style='color:#000;'>Fecha Ingreso</h3>";
                echo "<input type='date' required name='fecha_de_ingreso' class='all' required>";
               echo "<br>";
               echo "<br>";
               //<!-------------- Fecha salida --------------->
               echo "<h3 style='color:#000;'>Fecha salida</h3>";
                echo "<input type='date' required name='fecha_de_salida' class='all' required>";
               //<!--------------- Jefe inmediato --------------->
               echo "<input type='text' required name='jefeinmediato' placeholder='Jefe inmediato' maxlength='200' class='all' pattern='[A-Za-Z0-9_-]{1,200}'><br>";
               //<!-------------- Puesto --------------->
               echo "<div class='desplegar1'>";
               echo "<label>Puesto</label>";
                   echo "<select name='puesto' class='browser-default'>
                       <option value='1'>Option 1</option>
                       <option value='2'>Option 2</option>
                       <option value='3'>Option 3</option>
                   </select>";
               //<!-------------- Tipo contrato --------------->
               echo "<label>Tipo contrato</label>";
                   echo "<select name='tipo_contrato' class='browser-default'>
                       <option value='1'>Option 1</option>
                       <option value='2'>Option 2</option>
                       <option value='3'>Option 3</option>
                   </select>";
                   echo "</div>";
               //<!-------------- Salario Bruto --------------->
               echo "<input type='number' required name='brutp' placeholder='Salario bruto' step='any' class='medium' max='9999999999999' pattern='[A-Za-Z0-9_-]{1,13}'>";
               //<!-------------- Horas extra --------------->
               echo "<input type='number' required name='horasextra' placeholder='Horas extra' step='any' class='medium' max='999999999999'>";
               //<!-------------- Total extras --------------->
               echo "<input type='number' required name='totalextras' placeholder='Total extras' step='any' class='medium' max='999999999999'>";
               //<!-------------- Descuentos --------------->
               echo "<input type='number' required name='descuentos' placeholder='Descuentos' step='any' class='medium' max='999999999999'>";
               //<!-------------- Salario Neto --------------->
               echo "<input type='number' required name='salarioneto' placeholder='Salario neto' step='any' class='medium' max'999999999999'>";

               //<!-------------- Subir foto --------------->

               echo "<input type='file' name='file-1' id='file-1' class='inputfile inputfile-1' data-multiple-caption='{count} archivos seleccionados' multiple />
                 <label for='file-1'>
                 <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>
                 <span class='iborrainputfile'>Seleccionar archivo</span>
                 </label>";
               echo "<br>";
             //<!-------------- Usuario --------------->
                echo "<input type='text'' required name='usuario' placeholder='Usuario' class='medium' maxlength='30' pattern='[A-Za-Z0-9_-]{1,30}'><br>";
            //<!-------------- Clave --------------->
                echo "<input type='password' required name='contra1' placeholder='Contraseña' class='medium' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'>";
            //<!-------------- Repetir clave --------------->
                echo "<input type='password' required name='contra2' placeholder='Repetir contraseña' class='medium' maxlength='20' pattern='[A-Za-Z0-9_-]{1,20}'><br>";
                  echo "<p>";
                   echo "<label>
                       <input type='checkbox' />
                       <span>¿Habilitado?</span>
                       </label>";
               echo "</p>";
               echo "<input type='submit' value='Enviar' class='enviar'>";
               echo "<br>
                    <br>";
               echo "</form>";
         }
       }
       ?>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
              <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ac52b894b401e45400e5923/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
      <!--JavaScript at end of body for optimized loading-->

    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
        <script>var elem = document.querySelector('.fixed-action-btn');
  var instance = M.FloatingActionButton.init(elem, {
    direction: 'top',
      hoverEnabled: false
  });</script>

        <script src="js/custom-file-input.js"></script>
        <script>$(document).ready(function(){
    $('select').formSelect();
  });</script>

        <script> $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });</script>
    <script>
        function mostrar(enla) {
          obj = document.getElementById('oculto');
          obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
          enla.innerHTML = (enla.innerHTML == 'Ocultar') ? 'Ingresar nuevo registro' : 'Ocultar';
        }
    </script>

   <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    </body>
  </html>
