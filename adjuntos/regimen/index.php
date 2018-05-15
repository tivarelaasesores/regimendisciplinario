<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion = ''){
        echo '<script>alert("Usted no tiene autorizacion");
        location.href="../../index.php";
        </script>';
            die();
    }
    require_once("../../Conexion.php");
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
<doctype html>
    <html>
        <head>
            <meta name="author" content="regimen disciplinario" />
            <meta name="description" content="Pagina de regimen disciplinario, donde esta la solucion perfecta para el control de trabajadores, con todo el seguimiento del registro disciplinario."/>
            <link rel="stylesheet" href="style.css"/>
            <title>Régimen Disciplinario</title>
        </head>
        <body>
            <div class="panel_arriba">
                <img src="../../img/logo1.png" alt="Regimen Disciplinario" height="90%">
            </div>
            <section class="parte_arriba">
                <h1>Régimen Disciplinario</h1>
                    <p>Sector oficial de Régimen Disciplinario, aquí podrá subir todos los documentos de sus trabajadores.</p>
                <h2>Procedimientos</h2>
                    <p>Régimen Disciplinario es un sistema que los va ayudar a subir, crear, editar, descargar y desarrollar todo enfocado al código de trabajo, a la ves estamos con un extraordinario equipo de trabajo desarrollando todo un trabajo de inteligencia artifical.</p>
            </section>
            <div id="segmento_Izquierda">
                <a href="demanda.php"><h1>Crear Demanda</h1></a>
                <p>(si el proceso ya esta realizado y hablando junto con el abogado don Mario Varela, entonces de click aqui o si desea empezar hablar y contactar al abogado.)</p>
            </div>
            <section class="salir">
                <a href="../index.php"><label>Salir</label></a>
            </section>
        </body>
    </html>
</doctype>