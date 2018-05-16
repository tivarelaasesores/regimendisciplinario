<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion = ''){
        echo '<script>alert("Usted no tiene autorizacion");
        location.href="../index.php";
        </script>';
            die();
    }
    require_once("../Conexion.php");
    $Con = new Conexion();
    if(isset($_GET["empleado"])){
        $empleado = $_GET["empleado"];
        $array = $Con->Select_G_Empleados($empleado);
        if(!empty($array)){
            $nempleado=$array[0]["Nombre"];
            $napellidop=$array[0]["ApellidoP"];
            $napellidom=$array[0]["ApellidoM"];
            $ncorreo=$array[0]["Correo"];
            $nfechanac=$array[0]["Fecha Nacimiento"];
            $ndireccion=$array[0]["Direccion"];
            $ntel=$array[0]["Telefono1"];
            $ntel2=$array[0]["Telefono2"];
            $nfoto=$array[0]["Foto"];
            $nusuario=$array[0]["Usuario"];
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Documentos Adjuntos</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="../bienvenido.php"><img src="../img/logo1.png" width="380px" id="logo"/></a>
            </nav>
        </header>
            <h1 style="color:#fff; text-align:center;">Documentación de <?php echo isset($nempleado)? $nempleado:"Nombre" ?></h1>

        <!--------------------------- INFORMACION -------------------->
        <div class="informacion">
            <h2 style="color:#fff; text-align:center;">Información del empleado</h2>
            <?php ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
            <!--------- tabla --------->
        <table class="usuario">
            <tr>
                <th>Nombre Completo</th>
                    <?php 
                        if(isset($nempleado) and isset($napellidop) and isset($napellidom)){
                            echo "<td>".$nempleado." ".$napellidop." ".$napellidom."</td>";
                        }else{
                            echo "<td>*</td>";
                        }
                    ?>
                <th>Usuario</th>
                    <td><?php echo isset($nusuario)? $nusuario:"*" ?></td>
            </tr>
            <tr>
                <th>C&eacute;dula</th>
                    <td><?php echo isset($empleado)? $empleado:"*" ?></td>
                <th>Correo</th>                                     
                <td><?php echo isset($ncorreo)? $ncorreo:"*" ?></td>
            </tr>
            <tr>
                <th>Primer Teléfono</th>
                    <td><?php echo isset($ntel)? $ntel:"*" ?></td>
                <th>Segundo Teléfono</th>
                    <td><?php echo isset($ntel2)? $ntel2:"*" ?></td>
            </tr>
            <tr>
                <th>Dirección</th>
                    <td><?php echo isset($ndireccion)? $ndireccion:"*" ?></td>
                    <th>Fecha de nacimiento</th>
                    <td><?php echo isset($nfechanac)? $nfechanac:"*" ?></td>
            </tr>
        </table>
        
    <!------------ informacion importante ---->
        <br>
        <br>
        <!------------------------- Documentos restantes ------------------->
        <div class="documentoizquierda">
            <a href="#popup" class="popup-link">Oferta de empleo</a>
            <a href="#popup1" class="popup-link" id="cont">Curriculum</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup2" class="popup-link">Estudios realizados</a>
            <a href="#popup3" class="popup-link" id="cvaca">Referencias personales</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup4" class="popup-link">Verificación de referencias</a>
            <a href="#popup5" class="popup-link" id="frel">Pruebas Psicométricas</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup6" class="popup-link">Pruebas técnicas</a>
            <a href="#popup7" class="popup-link" id="cvaca">Resultado de entrevista</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup8" class="popup-link">Contrato de trabajo</a>
            <!---------
            <form method="post">
            <h3>Pruebas Psicométricas</h3>
            <input type="file" name="ppsico"><br><br>
            <input type="submit" value="Subir">
                </form>

            <form method="post">
                <h3>Verificación de referencias</h3>
            <input type="file" name="vrefe"><br><br>
            <input type="submit" value="Subir">
                </form>
                <!------------- CURRICULUM ---------------->
            <!----------
                <h3 id="cv">Subir hoja de vida</h3>
                <form method="post">
                <input type="file" name="btnarchivo"><br><br>
                <button type="submit" id="adjuntar">Adjuntar</button>
                    </form>
            ---------------->
        </div>
        <div class="documentoderecha">
            <a href="#popup9" class="popup-link">Capacitación de inducción</a>
            <a href="#popup10" class="popup-link" id="cont">Acción de personal de ingreso</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup11" class="popup-link">Comprobantes de vacaciones</a>
            <a href="#popup12" class="popup-link" id="cvaca">Comprobantes de aguinaldo</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup13" class="popup-link">Comprobantes de incapacidades</a>
            <a href="#popup14" class="popup-link" id="frel">Otros documentos</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="#popup15" class="popup-link" id="frel">Comprobante de inducción</a>
            <a href="regimen/index.php">Régimen disciplinario</a>
        </div>

        <!---------- LINEA DECORATIVA EN EL CENTRO -------------->
        <div class="linea"></div>
        <!--------------- crear botón volver --------------------->
        <a class="salir" href="../planilla.php"><p>Salir</p></a>
        
        <!--------------- POPUP --------------------->
        <div class="modal-wrapper" id="popup">
   <div class="popup-contenedor">
       <h2>Adjunte la(s) ofertas de empleo</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
       
       <h3>Puedes también darle clic al boton de abajo para descargar el documento entero.</h3>
        <br>
       <a class="boton" href="documentos/EL%20NACIMIENTO%20DEL%20CRISTIANISMO.pdf" download="ElNacimientodelCristianismo">Descargar información en PDF</a>

      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP1 ------------------->
        <div class="modal-wrapper" id="popup1">
   <div class="popup-contenedor">
      <h2>Adjunte el/los Curriculum</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"></br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP2 ------------------->
        <div class="modal-wrapper" id="popup2">
   <div class="popup-contenedor">
      <h2>Estudios realizados</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP3 ------------------->
        <div class="modal-wrapper" id="popup3">
   <div class="popup-contenedor">
       <h2>Adjunte la/s Referencias personales</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP4 ------------------->
        <div class="modal-wrapper" id="popup4">
   <div class="popup-contenedor">
      <h2>Adjunte la/s Verificación de referencias</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP5 ------------------->
        <div class="modal-wrapper" id="popup5">
   <div class="popup-contenedor">
      <h2>Adjunte la/s Pruebas psicométricas</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP6 ------------------->
        <div class="modal-wrapper" id="popup6">
   <div class="popup-contenedor">
      <h2>Adjunte la/s pruebas técnicas</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP7 ------------------->
        <div class="modal-wrapper" id="popup7">
   <div class="popup-contenedor">
      <h2>Adjunte el/los Resultado/s de entrevista</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP8 ------------------->
        <div class="modal-wrapper" id="popup8">
   <div class="popup-contenedor">
      <h2>Adjunte el/los Contrato(s) de trabajo</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP9 ------------------->
        <div class="modal-wrapper" id="popup9">
   <div class="popup-contenedor">
      <h2>Adjunte la/las Capacitación de inducción</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP10 ------------------->
        <div class="modal-wrapper" id="popup10">
   <div class="popup-contenedor">
      <h2>Adjunte Acción de personal de ingreso</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP11 ------------------->
        <div class="modal-wrapper" id="popup11">
   <div class="popup-contenedor">
      <h2>Adjunte Comprobante de vacaciones</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP12 ------------------->
        <div class="modal-wrapper" id="popup12">
   <div class="popup-contenedor">
      <h2>Adjunte los Comprobantes de aguinaldo</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP13 ------------------->
        <div class="modal-wrapper" id="popup13">
   <div class="popup-contenedor">
      <h2>Adjunte Comprobantes de incapacidades</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP14 ------------------->
        <div class="modal-wrapper" id="popup14">
   <div class="popup-contenedor">
      <h2>Adjunte Otros documentos</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>
        <!---------------- POPUP15 ------------------->
        <div class="modal-wrapper" id="popup15">
   <div class="popup-contenedor">
      <h2>Adjunte Comprobantes de induccion</h2>
       <form action="index.php" method="post" enctype="multipart/form-data" >
           <input type="file" name="file"><br>
            <input type="submit" value="enviar">
       </form>
      <a class="popup-cerrar" href="#">X</a>
   </div>
</div>

    </body>
</html>
