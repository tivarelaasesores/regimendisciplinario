<?php
 session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
    echo '<script>alert("Usted no tiene autorizacion");
    location.href="index.php";
    </script>';
        die();
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Login manager</title>
    <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="registro/css/style.css"/>
  </head>
  <body>
      <header>
          <nav class="transparent">
    <div class="nav-wrapper">
      <a href="../index.php" class="brand-logo center"><img src="../img/logo1.png" width="380px;"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../planilla.php">Planilla</a></li>
        <li><a href="registro/index.html">Registros</a></li>
        <!--<li><a href="soporte.html">Soporte</a></li> -->
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo" style="background-color:#1D5072;">
   <li><a href="../planilla.php" style="color:#fff; text-align:center;">Planilla</a></li>
        <li><a href="registro/index.html" style="color:#fff; text-align:center;">Registros</a></li>
        <!--<li><a href="soporte.html">Soporte</a></li> -->
  </ul>
      </header>

      <div class="center-align">
      <h2>BIENVENIDO</h2>
      <h4>Hola, <?php echo $_SESSION['usuario'] ?></h4>
          <div class="registro">
            <h3> Página administrativa</h3>
              <br>
          </div>
      </div>


      <!----------- boton flotante ---------------->
        <div class="fixed-action-btn">
  <a class="btn-floating btn-large light-blue darken-3">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red" href="cerrar.php"><i class="material-icons">exit_to_app</i></a></li>
<!----------- subir archivo ------->
      <form action="../planilla.php" method="post" enctype='multipart/form-data'>
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

      <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>var elem = document.querySelector('.fixed-action-btn');
var instance = M.FloatingActionButton.init(elem, {
direction: 'top',
hoverEnabled: false
});</script>
  </body>
  </html>
