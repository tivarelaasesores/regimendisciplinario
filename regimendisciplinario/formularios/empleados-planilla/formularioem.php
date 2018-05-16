<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion == ''){
    echo '<script>alert("Usted no tiene autorizacion");
    location.href="../../index.php";
    </script>';
        die();
}

if(isset($_Post['nombre1']) And isset($_Post['apellido1']) And isset($_Post['apellido2'])And isset($_Post['correo'])And isset($_Post['telefono1'])And isset($_Post['cedulajuridica'])And isset($_Post['usuario'])And isset($_Post['contra1'])And isset($_Post['contra2'])And isset($_Post['descripcion'])And isset($_Post['puesto'])And isset($_Post['tipocontrato'])And isset($_Post['diastrbajados'])And isset($_Post['jefeinmediato'])And isset($_Post['bruto'])And isset($_Post['horasextra'])And isset($_Post['totalextras'])And isset($_Post['descuentos'])And isset($_Post['salarioneto'])){
        
   $nombre = $_POST['nombre1'];
     $apellido1 = $_POST['apellido1'];
     $apellido2 = $_POST['apellido2'];
     $correo = $_POST['correo'];
     $telefono1 = $_POST['telefono1'];
     $telefono2 = $_POST['telefono2'];
    $cedulajuridica = $_POST['cedulajuridica'];
    $puesto = $_POST['puesto'];
    $tipocontrato = $_POST['tipocontrato'];
     $usuario = $_POST['usuario'];
     $contra1 = $_POST['contra1'];
     $contra2 = $_POST['contra2'];
     $diastrabajados = $_POST['diastrabajados'];
     $jefeinmediato = $_POST['jefeinmediato'];
     $bruto = $_POST['bruto'];
     $horasextra = $_POST['horasextra'];
     $totalextras = $_POST['totalextras'];
     $descuentos = $_POST['descuentos'];
     $salarioneto = $_POST['salarioneto'];
     $descripcion = $_POST['descripcion'];
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
        <H3 class="titulo">Empleados - Planilla</H3>
        <br>
        <br>
        <?php
            require_once("../../Conexion.php");
            $Con = new Conexion();
            $array = $Con->Select_G_Empresas("");
        ?>
        <br>
        <br>
            <form action="#" method="post" class="formulario">
                <!-------------- Nombre --------------->
                <input type="text" required name="nombre1" placeholder="Nombre" class="all" pattern="[A-Za-Z0-9_-]{1,50}">
                <!-------------- Primer Apellido --------------->
                <input type="text" required name="apellido1" placeholder="Primer apellido" class="medium" pattern="[A-Za-Z0-9_-]{1,100}">
                <!-------------- Segundo Apellido --------------->
                <input type="text" required name="apellido2" placeholder="Segundo apellido" class="medium" pattern="[A-Za-Z0-9_-]{1,100}">
                <!-------------- Correo --------------->
                <input type="email" required name="correo" placeholder="Correo" class="all" pattern="[A-Za-Z0-9_-]{1,150}">
                <!-------------- Fecha de nacimiento --------------->
                <input type="date" required name="dty" class="all">
                <!-------------- Texto ------------------------------>
                <textarea name="descripcion" required class="all" pattern="[A-Za-Z0-9_-]{1,250}">Colocar aquí por favor su dirección exacta</textarea>
                <!-------------- Telefono 1 --------------->
                <input type="number" required name="telefono1" placeholder="Primer teléfono" class="medium" pattern="[A-Za-Z0-9_-]{1,8}">
                <!-------------- Telefono 2 --------------->
                <input type="number" required name="telefono2" placeholder="Segundo teléfono" class="medium" pattern="[A-Za-Z0-9_-]{1,8}"><br>
                <!-------------- Cedula Juridica --------------->
                <div class="desplegar">
                <label>Cedula jurídica</label>
                    <select name="cedulajuridica">
                        <option value="" disabled selected>Desplegar</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    </div>
                <!-------------- Fecha Ingreso --------------->
                 <input type="date" required name="dty" class="all" fecha de ingreso>
                <!-------------- Fecha salida --------------->
                 <input type="date" required name="dty" class="all" fecha de salida>
                <!-------------- Dias trabajados --------------->
                <input type="number" required name="diastrabajados" placeholder="Dias trabajados" class="all">
                <!--------------- Jefe inmediato --------------->
                <input type="text" required name="jefeinmediato" placeholder="Jefe inmediato" class="all" pattern="[A-Za-Z0-9_-]{1,200}"><br>
                <!-------------- Puesto --------------->
                <div class="desplegar1">
                <label>Puesto</label>
                    <select name="puesto" class="browser-default">
                        <option value="" disabled selected>Desplegar</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>

                <!-------------- Tipo contrato --------------->
                <label>Tipo contrato</label>
                    <select name="tipocontrato" class="browser-default">
                        <option value="" disabled selected>Desplegar</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    </div>
                <!-------------- Salario Bruto --------------->
                <input type="number" required name="brutp" placeholder="Salario bruto" class="medium" pattern="[A-Za-Z0-9_-]{1,13}">
                <!-------------- Horas extra --------------->
                <input type="number" required name="horasextra" placeholder="Horas extra" class="medium">
                <!-------------- Total extras --------------->
                <input type="number" required name="totalextras" placeholder="Total extras" class="medium">
                <!-------------- Descuentos --------------->
                <input type="number" required name="descuentos" placeholder="Descuentos" class="medium">
                <!-------------- Salario Neto --------------->
                <input type="number" required name="salarioneto" placeholder="Salario neto" class="medium">
                
                <!-------------- Subir foto --------------->
                
                <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
<label for="file-1">
<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
<span class="iborrainputfile">Seleccionar archivo</span>
</label>
                <!-------------- Usuario --------------->
                
                <input type="text" required name="usuario" placeholder="Usuario" class="medium" pattern="[A-Za-Z0-9_-]{1,30}"><br>
                <p style="color:#000;"><input type="checkbox" name="usuariohave" value="Ya tiene cuenta">¿Habilitado?</p><br>
                <!-------------- Clave --------------->
                <input type="password" required name="contra1" placeholder="Contraseña" class="medium" pattern="[A-Za-Z0-9_-]{1,20}">
                <input type="password" required name="contra2" placeholder="Repetir contraseña" class="medium" pattern="[A-Za-Z0-9_-]{1,20}"><br>
                <!-------------- Repetir clave --------------->
                <input type="submit" value="Enviar" class="enviar">
            </form>
        
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/custom-file-input.js"></script>
        <script>$(document).ready(function(){
    $('select').formSelect();
  });</script>

    </body>
</html>