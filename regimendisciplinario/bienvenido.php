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
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"/>
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
      <header>
          <nav class="transparent">
      <a href="bienvenido.php" class="brand-logo center"><img src="img/logo1.png" width="430px;" id="logo"></a>
  </nav>
      </header>
      <br>
      <br>
      <br>

      <div class="center-align">
      <h2 style="color:#fff;">BIENVENIDO</h2>
      <h4 style="color:#fff;">Hola, <?php echo $_SESSION['usuario'] ?></h4>
          <img class="responsive-img center-align" src="img/iconousuario.png" width="150px;" height="150px;">
          <h3 class="center-align black-text"> Información de la empresa</h3>
      </div>

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

    <!-----MENUUUUUUUUUUUUUUUUUUUUUUUUUU-->

    <div class="row">
        <div class="menu1 col s10 push-s1 m8 push-m1 l10 pull-l1" >
            <a href="tv.php"><img src="img/icono-soluciones-laborales%20tv.png" width="100px" height="100px" title="Televisión"></a>
            <a href="solucioneslaboralesradio.php"><img src="img/icono-soluciones-laborales-radio.png" width="100px" height="100px" title="Radio"></a>
            <a href="legislacionlaboral.php"><img src="img/icono-legislacion-laboral.png" width="100px" height="100px" title="Legislación Laboral"></a>
            <a href="cll.php"><img src="img/icono-preguntas-legales.png" width="100px" height="100px" title="Consultas Laborales"></a>
            <?php
                //// Solamente Visible por Administrador ////
                if($_SESSION["Rol"]==="Administrador"){
                    echo "<a href='admin/index.php'><img src='img/icono-registro.png' width='100px' height='100px' title='Registro'></a>";   
                }    
            ?>
            <a href="planilla.php"><img src="img/icono-planilla.png" width="100px" height="100px" title="Planilla"></a>
        </div>
    </div>
      <!--FIN MENU-->



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

  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

      <script>var elem = document.querySelector('.fixed-action-btn');
  var instance = M.FloatingActionButton.init(elem, {
    direction: 'top',
      hoverEnabled: false
  });</script>
  </body>
  </html>
