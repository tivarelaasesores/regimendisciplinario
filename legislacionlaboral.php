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
        <link type="text/css" rel="stylesheet" href="css/style.css">

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
      <a href="bienvenido.php" class="brand-logo center"><img src="img/logoregdisc.png" width="430px;" id="logo"></a>
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

        <table class="responsive-table" style="margin-top:80px;">
            <tbody>
    <tr>
        <td>
            <a href="articulos/1.pdf" >
                <button type="button" class="boton">
                    <p>Adiciona a la Directriz sobre especificación<br> de las planillas de la CCSS No. 019-MTSS</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/2.pdf" >
               <button type="button" class="boton"><p>Aumento General al Salario Base de todos <br>los Servidores Públicos, Primer Semestre<br> del 2014 No. 38174</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/3.pdf" >
               <button type="button" class="boton">
                   <p>Adecuación en los criterios de<br> revalorización y los reajustes de pensión y<br> jubilación... No. 002-201</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/4.pdf" >
                <button type="button" class="boton"><p>Aprobación de revalorización de los montos<br> de pensiones en curso de pago de seguro<br> de invalidez, vejez y muerte</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/5.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No. 69 de los<br> montos de pensiones en curso<br> de pago del seguro No. 8801</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/6.pdf" >
                <button type="button" class="boton"><p>Código de trabajo No. 2</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/7.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No.64 de los montos<br> de pensiones en curso de pago del seguro No. 8620</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/8.pdf" >
               <button type="button" class="boton">
                   <p>Aprobación de revalorización No. 70<br> de los montos de pensiones en curso de pago<br> de seguro No. 8867</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/9.pdf" >
                <button type="button" class="boton">
                    <p>Aprobacion de la revalorización No. 71<br> de los montos de pensiones en curso de pago<br> del seguro No. 8890</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/10.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/11.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de Revalorización No. 72 de<br> los montos de Pensiones en curso de pago del Seguro No. 8931</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/12.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de Revalorización No. 73 de los montos de Pensiones en curso de pago del Seguro No. 8962</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/13.pdf" >
                <button type="button" class="boton">
                    <p>Código de Trabajo No. 2 Versión anterior<br> a Reforma Procesal Laboral No. 9343 Ver Transitorios I y II</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/14.pdf" >
                <button type="button" class="boton">
                    <p>Creación del Portal de Empleo y Fromación no. 37544-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/15.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de Horarios en el Sector Público,<br> cuyas dependencias en el Área Metropolitana<br> No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/16.pdf" >
                <button type="button" class="boton">
                    <p>Convenio OIT 148: Protección de los <br> trabajadores contra los Riesgos<br> Profesionales ... No. 6550</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/17.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre el Descanso Semanal<br> (Comercio y Oficinas) 1957</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/18.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre el Medio Ambiente de Trabajo<br> (Contaminación de aire, ruido y<br> vibraciones) 1977</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/19.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre el Trabajo Decente para<br> las Trabajadoras y los Trabajadores <br>Domésticos (189) No. 9169</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/20.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre el Trabajo Forzoso 1930</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/21.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/22.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre la Abolición del Trabajo Forzoso, 1957</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/23.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre la Discriminación (Empleo y Ocupación) 1958</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/24.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre la Edad Mínima 1973</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/25.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre la Fijación de Salarios Mínimos 1970</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/26.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre la Higiene (Comercio y Oficinas) 1964</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/27.pdf" >
                <button type="button" class="boton">
                    <p> Convenio sobre la Protección del Salario 1949</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/28.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre la Seguridad Social (Norma Mínima) 1952</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/29.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre las Peores Formas de Trabajo Infantil 1999</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/30.pdf" >
                <button type="button" class="boton">
                    <p>Convenio sobre los <br>Métodos para la Fijación <br>de Salarios Mínimos 1928</p>
                </button>
            </a>
        </td>
                
    </tr>
     <tr>
        <td>
            <a href="articulos/31.pdf" >
                <button type="button" class="boton">
                    <p>Contabilización del Aporte del Trabajo Doméstico<br> no remunerado en Costa Rica. No. 9325</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/32.pdf" >
               <button type="button" class="boton"><p>Creación de la Comisión Técnica <br>Interinstitucional para la Empleabilidad No. 014-MTSS</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/33.pdf" >
               <button type="button" class="boton">
                   <p>Conformación del Consejo Nacional de Salarios<br> para el periodo 2018-2021. No. 40854-MTSS</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/34.pdf" >
                <button type="button" class="boton"><p>Creación del Sistema Nacional<br> de Intermediación, Orientación e Información del<br> Empleo No. 34936-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/35.pdf" >
                <button type="button" class="boton">
                    <p>Se adiciona a la Partida de Servicios Personales<br> el Rubro Salario Escolar No. 23907-H</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/36.pdf" >
                <button type="button" class="boton"><p>Diligencias de Implementación del<br> Tope contenido en la Ley 7858... No. 012</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/37.pdf" >
                <button type="button" class="boton">
                    <p>Disposiciones en cuanto al<br> internado universitario. No. 8904</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/38.pdf" >
               <button type="button" class="boton">
                   <p>Disposiciones en relación con el internado<br> rotatorio universitario en instalaciones<br> de CCSS No. 8852</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/39.pdf" >
                <button type="button" class="boton">
                    <p>Declara la última semana del mes de Abril<br> como Semana de la Seguridad Social No. 9270</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/40.pdf" >
                <button type="button" class="boton">
                    <p>Declara de interés público las actividades<br> e iniciativas de la estrategia zona<br> económica... No.38630</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/41.pdf" >
                <button type="button" class="boton">
                    <p>Definición de Títulos y Categorías Ocupacionales<br> No. 3-2000</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/42.pdf" >
                <button type="button" class="boton">
                    <p>Disposiciones relativas a Certificado médico<br> de aptitud física para trabajo marítimo No. 17</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/43.pdf" >
                <button type="button" class="boton">
                    <p> Directriz sobre especificación<br> de las planillas de la CCSS del salario escolar.<br> No. 2-2006</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/44.pdf" >
                <button type="button" class="boton">
                    <p>Directriz No. 2001-06. Disposiciones <br>sobre aplicación del inciso a)<br> del Transitorio IX de la No. 6</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/45.pdf" >
                <button type="button" class="boton">
                    <p>Directriz sobre compendio de criterios<br> jurídicos-laborales de acatamiento obligatorio<br> No. 001-2011</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/46.pdf" >
                <button type="button" class="boton">
                    <p>Disposiciones relativas a Certificado médico<br> de aptitud física para trabajo marítimo No. 17</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/47.pdf" >
                <button type="button" class="boton">
                    <p>Extintores Portátiles contra el Fuego<br> No. 25986-MEIC-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/48.pdf" >
                <button type="button" class="boton">
                    <p>Estatuto de Personal del ICE No. 5817</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/49.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de salarios mínimos para el<br> sector privado, a partir del 1 de Enero de 2018 No.<br> 40743-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/50.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de Salarios Mínimos para el<br> Sector Público, a partir de Primer Semestre 2016<br> No 40241-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/51.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de Salarios Mínimos para el<br> Sector Público, a partir de Primer Semestre 2018<br> No 40861-MTSS</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/52.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de Salarios Mínimos para el<br> Sector Público, a partir de Segundo Semestre 2017<br> No 40634-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/53.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de Salarios Mínimos para el<br> Sector Público, a partir de Segundo Semestre 2016<br> No 39874-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/54.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de Salarios Mínimos para el<br> Sector Publico, a partir de Segundo Semestre 2014<br> No 38572-MTSS</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/55.pdf" >
                <button type="button" class="boton">
                    <p>Fijación de Salarios Mínimos para el<br> Sector Público, a partir de Primer Semestre 2015<br> No 38905-MTSS</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/56.pdf" >
                <button type="button" class="boton">
                    <p>Guía para aplicación de excepción contemplada<br> en artículo 94 de Normativa de Relaciones Lab.<br> No.8709</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/57.pdf" >
                <button type="button" class="boton">
                    <p>Implementación de los horarios escalonados<br> y jornada acumulativa voluntaria.<br> No. 39793-MTSS</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/58.pdf" >
                <button type="button" class="boton">
                    <p>Inspección de Trabajo deberá actuar<br> discrecionalmente en aplicación de<br> artículos 85 a 100 No. 7</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/59.pdf" >
                <button type="button" class="boton">
                    <p>Instructivo del programa de régimen no<br> contributivo para el trámite y control de<br> las pensiones por v</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/60.pdf" >
                <button type="button" class="boton">
                    <p>Instructivo para la adquisición de<br> medicamentos, implementos médicos e<br> instrumental médico...</p>
                </button>
            </a>
        </td>
                
    </tr>
     <tr>
        <td>
            <a href="articulos/61.pdf" >
                <button type="button" class="boton">
                    <p>Instructivo Pago de Prestaciones en Dinero<br> de la Caja Costarricense de Seguro Social</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/62.pdf" >
               <button type="button" class="boton"><p>Implementación del teletrabajo en mujeres<br> que se encuentren en estado de embarazo<br> No. 35434-S-MTSS</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/63.pdf" >
               <button type="button" class="boton">
                   <p>Adecuación en los criterios de<br> revalorización y los reajustes de pensión y<br> jubilación... No. 002-201</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/64.pdf" >
                <button type="button" class="boton"><p>Aprobación de revalorización de los montos<br> de pensiones en curso de pago de seguro<br> de invalidez, vejez y muerte</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/65.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No. 69 de los<br> montos de pensiones en curso<br> de pago del seguro No. 8801</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/66.pdf" >
                <button type="button" class="boton"><p>Código de trabajo No. 2</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/67.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No.64 de los montos<br> de pensiones en curso de pago del seguro No. 8620</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/68.pdf" >
               <button type="button" class="boton">
                   <p>Aprobación de revalorización No. 70<br> de los montos de pensiones en curso de pago<br> de seguro No. 8867</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/69.pdf" >
                <button type="button" class="boton">
                    <p>Aprobacion de la revalorización No. 71<br> de los montos de pensiones en curso de pago<br> del seguro No. 8890</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/70.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/71.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/72.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/73.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/74.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/75.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/76.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/77.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/78.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/79.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/80.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/81.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/82.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/83.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/84.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/85.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/86.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/87.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/88.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/89.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/90.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
     <tr>
        <td>
            <a href="articulos/91.pdf" >
                <button type="button" class="boton">
                    <p>Adiciona a la Directriz sobre especificación<br> de las planillas de la CCSS No. 019-MTSS</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/92.pdf" >
               <button type="button" class="boton"><p>Aumento General al Salario Base de todos <br>los Servidores Públicos, Primer Semestre<br> del 2014 No. 38174</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/93.pdf" >
               <button type="button" class="boton">
                   <p>Adecuación en los criterios de<br> revalorización y los reajustes de pensión y<br> jubilación... No. 002-201</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/94.pdf" >
                <button type="button" class="boton"><p>Aprobación de revalorización de los montos<br> de pensiones en curso de pago de seguro<br> de invalidez, vejez y muerte</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/95.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No. 69 de los<br> montos de pensiones en curso<br> de pago del seguro No. 8801</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/96.pdf" >
                <button type="button" class="boton"><p>Código de trabajo No. 2</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/97.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No.64 de los montos<br> de pensiones en curso de pago del seguro No. 8620</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/98.pdf" >
               <button type="button" class="boton">
                   <p>Aprobación de revalorización No. 70<br> de los montos de pensiones en curso de pago<br> de seguro No. 8867</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/99.pdf" >
                <button type="button" class="boton">
                    <p>Aprobacion de la revalorización No. 71<br> de los montos de pensiones en curso de pago<br> del seguro No. 8890</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/100.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/101.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/102.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/103.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/14.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/105.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/106.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/107.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/108.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/109.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/110.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/111.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/112.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/113.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/114.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/115.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/116.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/117.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/118.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/119.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/120.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
     <tr>
        <td>
            <a href="articulos/121.pdf" >
                <button type="button" class="boton">
                    <p>Adiciona a la Directriz sobre especificación<br> de las planillas de la CCSS No. 019-MTSS</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/122.pdf" >
               <button type="button" class="boton"><p>Aumento General al Salario Base de todos <br>los Servidores Públicos, Primer Semestre<br> del 2014 No. 38174</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/123.pdf" >
               <button type="button" class="boton">
                   <p>Adecuación en los criterios de<br> revalorización y los reajustes de pensión y<br> jubilación... No. 002-201</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/124.pdf" >
                <button type="button" class="boton"><p>Aprobación de revalorización de los montos<br> de pensiones en curso de pago de seguro<br> de invalidez, vejez y muerte</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/125.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No. 69 de los<br> montos de pensiones en curso<br> de pago del seguro No. 8801</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/126.pdf" >
                <button type="button" class="boton"><p>Código de trabajo No. 2</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/127.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No.64 de los montos<br> de pensiones en curso de pago del seguro No. 8620</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/128.pdf" >
               <button type="button" class="boton">
                   <p>Aprobación de revalorización No. 70<br> de los montos de pensiones en curso de pago<br> de seguro No. 8867</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/129.pdf" >
                <button type="button" class="boton">
                    <p>Aprobacion de la revalorización No. 71<br> de los montos de pensiones en curso de pago<br> del seguro No. 8890</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/130.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/131.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/132.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/133.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/134.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/135.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/136.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/137.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/138.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/139.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/140.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/141.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/142.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/143.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/144.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/145.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/146.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/147.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/148.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/149.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/150.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
     <tr>
        <td>
            <a href="articulos/151.pdf" >
                <button type="button" class="boton">
                    <p>Adiciona a la Directriz sobre especificación<br> de las planillas de la CCSS No. 019-MTSS</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/152.pdf" >
               <button type="button" class="boton"><p>Aumento General al Salario Base de todos <br>los Servidores Públicos, Primer Semestre<br> del 2014 No. 38174</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/153.pdf" >
               <button type="button" class="boton">
                   <p>Adecuación en los criterios de<br> revalorización y los reajustes de pensión y<br> jubilación... No. 002-201</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/154.pdf" >
                <button type="button" class="boton"><p>Aprobación de revalorización de los montos<br> de pensiones en curso de pago de seguro<br> de invalidez, vejez y muerte</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/155.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No. 69 de los<br> montos de pensiones en curso<br> de pago del seguro No. 8801</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/156.pdf" >
                <button type="button" class="boton"><p>Código de trabajo No. 2</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/157.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No.64 de los montos<br> de pensiones en curso de pago del seguro No. 8620</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/158.pdf" >
               <button type="button" class="boton">
                   <p>Aprobación de revalorización No. 70<br> de los montos de pensiones en curso de pago<br> de seguro No. 8867</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/159.pdf" >
                <button type="button" class="boton">
                    <p>Aprobacion de la revalorización No. 71<br> de los montos de pensiones en curso de pago<br> del seguro No. 8890</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/160.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/161.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/162.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/163.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/164.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/165.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/166.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/167.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/168.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/169.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/170.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/171.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/172.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/173.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/174.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/175.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/176.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/177.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/178.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/179.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/180.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
     <tr>
        <td>
            <a href="articulos/181.pdf" >
                <button type="button" class="boton">
                    <p>Adiciona a la Directriz sobre especificación<br> de las planillas de la CCSS No. 019-MTSS</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/182.pdf" >
               <button type="button" class="boton"><p>Aumento General al Salario Base de todos <br>los Servidores Públicos, Primer Semestre<br> del 2014 No. 38174</p></button>
           </a>
        </td>
       <td>
           <a href="articulos/183.pdf" >
               <button type="button" class="boton">
                   <p>Adecuación en los criterios de<br> revalorización y los reajustes de pensión y<br> jubilación... No. 002-201</p>
               </button>
           </a>
        </td>
    </tr>
        <tr>
        <td>
            <a href="articulos/184.pdf" >
                <button type="button" class="boton"><p>Aprobación de revalorización de los montos<br> de pensiones en curso de pago de seguro<br> de invalidez, vejez y muerte</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/185.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No. 69 de los<br> montos de pensiones en curso<br> de pago del seguro No. 8801</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/186.pdf" >
                <button type="button" class="boton"><p>Código de trabajo No. 2</p></button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/187.pdf" >
                <button type="button" class="boton">
                    <p>Aprobación de revalorización No.64 de los montos<br> de pensiones en curso de pago del seguro No. 8620</p>
                </button>
            </a>
        </td>
       <td>
           <a href="articulos/188.pdf" >
               <button type="button" class="boton">
                   <p>Aprobación de revalorización No. 70<br> de los montos de pensiones en curso de pago<br> de seguro No. 8867</p>
               </button>
           </a>
        </td>
        <td>
            <a href="articulos/189.pdf" >
                <button type="button" class="boton">
                    <p>Aprobacion de la revalorización No. 71<br> de los montos de pensiones en curso de pago<br> del seguro No. 8890</p>
                </button>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="articulos/190.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/191.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/192.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/193.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/194.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/195.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/196.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/197.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/198.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/199.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/200.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/201.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/202.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/203.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/204.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/205.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/206.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/207.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
    <tr>
        <td>
            <a href="articulos/208.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/209.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
        <td>
            <a href="articulos/210.pdf" >
                <button type="button" class="boton">
                    <p>Cambio de horarios en el sector público cuyas<br> dependencias en el área metropolitana No. 042-2005</p>
                </button>
            </a>
        </td>
                
    </tr>
            </tbody>
        </table>
        
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