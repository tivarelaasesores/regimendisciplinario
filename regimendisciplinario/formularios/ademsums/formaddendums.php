<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion == ''){
        echo '<script>alert("Usted no tiene autorizacion");
        location.href="../../index.php";
        </script>';
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
    if(isset($_GET["empresa"]) and isset($_GET["empleado"]) and isset($_GET["contrato"])){
        $empresa = $_GET["empresa"];
        $Con->setResultado(null);
        $array = $Con->Select_G_Empresas($empresa);
        $idempresa = $array[0]["Cedula Juridica"];
        $empleado = $_GET["empleado"];
        $Con->setResultado(null);
        $array = $Con->Select_G_Empleados($empleado);
        $idempleado = $array[0]["Id_Empleado"];
        $contrato = $_GET["contrato"];
        $Con->setResultado(null);
        $array = $Con->Select_G_RegistroEC($contrato);
        $cnombre = $array[0]["Ruta"];
    }else{
        $empresa = null;
        $idempresa = null;
        $empleado = null;
        $idempleado= null;
        $contrato = null;
        $cnombre = null;
    }
    $Con->setResultado(null);
    $emp = $Con->Select_G_Empresas($empresa);
    $Con->setResultado(null);
    $emp1 = $Con->Select_G_Empleados($empleado);
    if(!empty($emp) and !empty($emp1)){
        $empName = $emp1[0]["Nombre"]." ".$emp1[0]["ApellidoP"]." ".$emp1[0]["ApellidoM"];
        $carpeta_destino = $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($emp[0]["Nombre"])."/Empleados/".$empName."/Addendums/";
    }
    if(!file_exists($carpeta_destino)){
        mkdir($carpeta_destino,0777,true);
    }
    if(isset($_POST["idcontrato"]) And isset($_POST["cedulajuridica"]) And isset($_POST["idempleado"])And isset($_POST["nombre"]) and isset($_POST["fecha"])){
        $idcontrato = $_POST["idcontrato"];
        $cedulajuridica = $_POST["cedulajuridica"];
        $idempleado = $_POST["idempleado"];
        $nombre = $_POST["nombre"];
        $fecha_subida = $_POST["fecha"];
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
                        if($Con->Insert_Addendum($idcontrato,$cedulajuridica, $idempleado,$nombre,$fecha_subida,$fname)){
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
        if($_POST["actualizar"]=="done"){
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
        <h1 class="titulo">Addendums</h1>
        <br>
        <?php
            require_once("../../Conexion.php");
            $Con = new Conexion();
            $array = $Con->Select_G_Addendum("");
                if(!empty($array)){
                    echo "<table><tr><th>Id Addendum:</th><th>Nombre:</th><th>Id Contrato:</th><th>Empresa:</th><th>Empleado:</th><th>Fecha Subida:</th><th>Ruta:</th></tr>";
                    for($i=0;$i<sizeof($array);$i++){
                        echo "<tr><td>".$array[$i]["Id_Addendum"]."</td><td>".$array[$i]["Nombre"]."</td><td>".$array[$i]["Empresa"]."</td><td>".$array[$i]["Empleado"]."</td><td>".$array[$i]["Fecha Subida"]."</td><td>".$array[$i]["Ruta"]."</td>./archives/uploads/pictures/".$array[$i]["Foto"]."' alt='Logo ".$array[$i]["Nombre"]."'<td><a href='formempresa.php?update=".$array[$i]["Id_Addendum"]."'>Actualizar</a></td></tr>";
                    }
                    echo"</table>";
                }else{
                    echo "<p>No hay registros dentro de la base de datos, ingrese cada regitro manualmente con el formulario de abajo</p>";
                }
        ?>
        <br>
        <?php
        echo "<div class='empleado'>";
        if($update=="" And $update!="update"){
            echo "<form action='formaddendums.php' method='post' enctype='multipart/form-data>";
            echo "<div class='desplegar'>";
              //  <!------------------- Contrato Empleado --------------->
            $rutaContrato = $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($empresa)."/Empleados/".$empleado."/RegimenContratos/".$cnombre;
            echo "<label>Contrato: </label><a href='".$rutaContrato."'>".$cnombre."</a>";
            echo"<input type='hidden' name='idcontrato' value='".$contrato."'/>";
            echo "<br><br>";
              //  <!-------------- Empresa --------------->
            echo "<label>Empresa: ".$empresa."</label>";
            echo"<input type='hidden' name='cedulajuridica' value='".$idempresa."'/>";
            echo "<br><br>";
                //<!------------------- nombre empleado --------------->
            echo "<label>Empleado: ".$empleado."</label>";
            echo"<input type='hidden' name='idempleado' value='".$idempleado."'/>";
            echo "<br><br>";
             //<!-------------- Nombre --------------->
            echo "<input type='text' required id='nombrefile' name='nombre' placeholder='Nombre' class='all' maxlength='150' pattern='[A-Za-Z0-9_-]{1,150}'>";
            echo "<br><br>";
              //  <!----------------Ruta------------------------>
            echo "<input type='file' name='file' id='file' class='inputfile inputfile-2' data-multiple-caption='{count} archivos seleccionados' multiple />
                <label for='file'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>
                    <span class='iborrainputfile'>Seleccionar archivo</span>
                </label><br><br>";
             //  <!------------------- Fecha de subida --------------->
            echo "<label id='lbldate'>Fecha de subida:</label><br><br>";
            echo "<input id='date' name='fecha' type='hidden'>";
            echo "<input class='enviar' type='submit' value='Enviar'>";
            echo "</form>";
            echo "<br><br><br>";
        }else{
            $consulta = $Con->Select_G_Addendum($update);
            if(!empty($consulta)){
                echo "<form action='formaddendums.php' method='post' enctype='multipart/form-data>";
                echo "<div class='desplegar'>";
                echo"<input type='hidden' name='actualizar' value='done'/>";
                //  <!------------------- Contrato --------------->
                $Con->setResultado(null);
                $contratos = $Con->Select_G_RegistroEC($consulta[0]["Id_Contrato"]);
                if(!empty($contratos)){
                    $rutaContrato = $_SERVER["DOCUMENT_ROOT"]."/Proyecto/archives/uploads/".$Cfile->SinEspecialChars($consulta[0]["Empresa"])."/Empleados/".$consulta[0]["Empleado"]."/RegimenContratos/".$contratos[0]["Ruta"];
                    echo "<label>Contrato: </label><a href='".$rutaContrato."'>".$contratos[0]["Ruta"]."</a>";
                    echo"<input type='hidden' name='idcontrato' value='".$consulta[0]["Ruta"]."'/>";
                    echo "<br><br>";
                }
                //  <!-------------- Empresa --------------->
                $Con->setResultado(null);
                $empresas = $Con->Select_G_Empresas($consulta[0]["Empresa"]);
                if(!empty($empresas)){
                    echo "<label>Empresa: ".$consulta[0]["Empresa"]."</label>";
                    echo"<input type='hidden' name='cedulajuridica' value='".$empresas[0]["Cedula Juridica"]."'/>";
                    echo "<br><br>";
                }
                //<!------------------- nombre empleado --------------->
                 $Con->setResultado(null);
                $empleados = $Con->Select_G_Empresas($consulta[0]["Empleado"]);
                if(!empty($empleados)){
                    echo "<label>Empleado: ".$consulta[0]["Empleado"]."</label>";
                    echo"<input type='hidden' name='idempleado' value='".$empleados[0]["Id_Empleado"]."'/>";
                    echo "<br><br>";
                }
                //<!-------------- Nombre --------------->
                echo "<input type='text' required id='nombrefile' name='nombre' placeholder='Nombre' class='all' maxlength='150' pattern='[A-Za-Z0-9_-]{1,150}' value='".$consulta[0]["Nombre"]."'>";
                echo "<br><br>";
                //  <!----------------Ruta------------------------>
                echo "<input type='file' name='file' id='file' class='inputfile inputfile-2' data-multiple-caption='{count} archivos seleccionados' multiple />
                      <label for='file'>
                          <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>
                          <span class='iborrainputfile'>Seleccionar archivo</span>
                      </label><br><br>";
                      //<!------------------- Fecha de subida --------------->
                echo "<label id='lbldate'>Fecha de subida: ".$consulta[0]["Fecha Subida"]."</label><br><br>";
                echo "<input id='date' name='fecha' type='hidden' value='".$consulta[0]["Fecha Subida"]."'>";
                echo "<input class='enviar' type='submit' value='Enviar'>";
                echo "</form>";
                echo "<br><br><br>";
            }
        }
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
                    var txtname = document.getElementById("nombrefile")
                    var d = new Date()
                    var filname =$("#file")[0].files[0].name
                    var ds = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
                    lbl.textContent = "Fecha de Subida: "+ds
                    txtname.value = filname
                    $("#date").val(ds)
                });
            });
        </script>
    </body>
</html>
