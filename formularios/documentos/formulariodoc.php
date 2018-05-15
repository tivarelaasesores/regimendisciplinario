<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion == ''){
    echo '<script>alert("Usted no tiene autorizacion");
    location.href="../../index.php";
    </script>';
        die();
}
     if(isset($_Post['archivo']) And isset($_Post['descripcion'])){
        $archivo = $_POST['archivo'];
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
        <h1 class="titulo">Documentos adjuntos</h1>
        <br>
        <br>
        <?php
            require_once("../../Conexion.php");
            $Con = new Conexion();
            $array = $Con->Select_G_Documentos("");
            if(!empty($array)){
                echo "<table><tr><th>Id Documento:</th><th>Id Empleado:</th><th>Empleado:</th><th>Nombre:</th><th>Descripci&oacute;n:</th><th>Fecha Subida:</th><th>Categor&iacute;a:</th><th>Ruta:</th></tr>";
                for($i=0;$i<sizeof($array);$i++){
                    echo "<tr><td>".$array[$i]["Id_Documento"]."</td><td>".$array[$i]["Id_Empleado"]."</td><td>".$array[$i]["Empleado"]."</td><td>".$array[$i]["Nombre"]."</td><td>".$array[$i]["Descripcion"]."</td><td>".$array[$i]["Fecha Subida"]."</td><td>".$array[$i]["Categoria"]."</td><td>".$array[$i]["Ruta"]."</td></tr>";
                }
                echo"</table>";
            }else{
                echo "<p>No hay registros dentro de la base de datos, ingrese cada registro manualmente con el formulario de abajo</p>";
            }
        ?>
        <br>
        <br>
        <div class="empleado">
           <label><h2>Empleado</h2></label><br>
            <form action="#" method="post" >
                <!------------------ documento ------------------->
               <input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} archivos seleccionados" multiple />
                <label for="file-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <span class="iborrainputfile">Seleccionar archivo</span>
                </label>
                <br><br>
                <!------------------- nombre archivo --------------->
            <h4>Nombre de archivo</h4><br>
            <input type="text" pattern="[A-Za-Z0-9_-]{1,50}" name="archivo"><br><br>
                <!------------------- Fecha de subida --------------->
            <label>Fecha de subida:</label><br><br>
            <!----------------- categoria--------------------->
                <label>Tipo contrato</label>
                    <select class="browser-default">
                        <option value="" disabled selected>Desplegar</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select><br><br>
                
                <!----------------Descripcion------------------------>
                <textarea name="descripcion" cols="50" rows="3" pattern="[A-Za-Z0-9_-]{1,150}">Por favor colocar una descripción breve del documento a subir</textarea><br><br>
                <input class="enviar" type="submit" value="Enviar">
            </form>
            </div>
        
         <br>
        <br>
        <br>
        <br>
        <!----------------- menu ---------------------------->
        <button type="button" id="boton"><a href="../../bienvenido.php">Inicio</a></button>
        
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
         <script src="js/custom-file-input.js"></script>
        <script>$(document).ready(function(){
    $('select').formSelect();
  });</script>
        
    </body>
</html>