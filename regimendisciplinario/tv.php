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
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>

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
        <header>
          <nav class="transparent">
    <div class="nav-wrapper">
      <a href="bienvenido.php" class="brand-logo center"><img src="img/logotv.png" width="430px;" id="logo"></a>
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
        
                <div class="vertical-menu">
  <a href="bienvenido.php"><img src="img/puntito.png" width="15px" height="15px" title="Inicio"></a>
    <a href="planilla.php"><img src="img/puntito.png" width="15px" height="15px" title="Planilla"></a>
  <a href="cll.php"><img src="img/puntito.png" width="15px" height="15px" title="Consultas Laborales"></a>
  <a href="legislacionlaboral.php"><img src="img/puntito.png" width="15px" height="15px" title="Legislación Laboral"></a>
  <a href="solucioneslaboralesradio.php"><img src="img/puntito.png" width="15px" height="15px" title="Radio"></a>
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
        
        <div class="row">
        <div class="videos col s10 push-s1">
        <h3 class="center-align blue-text text-lighten-1">Video 1</h3>
        <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/i9ueZ9VPryA?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div><br><br>
        
        <h3 class="center-align blue-text text-lighten-1 ">Video 2</h3>
        <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/1Dzxsp5YG3s?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div><br><br>
            
            <h3 class="center-align blue-text text-lighten-1 ">Video 3</h3>
        <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/cXtqrBHAoyA?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div><br><br>
            
        <h3 class="center-align blue-text text-lighten-1 ">Video 4</h3>
        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/88GDfphANGo?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div><br><br>
                </div>
            </div>
        
      <br><br>
        
        <br><br><br><br>
        
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