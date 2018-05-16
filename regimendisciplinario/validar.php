<?php
    $usuario=$_POST['Usuario'];
    $clave=$_POST['Clave'];
    session_start();
    include('Conexion.php');
    $Con = new Conexion();
    $array = $Con->Login($usuario,$clave);
    if(empty($array)){
        echo '<script>alert("Error a la autenticación");
            window.history.go(-1);
            </script>';
    }else{
        $_SESSION['usuario'] = $usuario;
        $_SESSION['Rol'] = $array['Rol'];
        $_SESSION['empresa'] = $array['Cedula_Juridica'];
        header("location:bienvenido.php");
    }

    /*
    $conexion = mysqli_connect("localhost", "root", "", "proyecto");
    //$conexion = mysqli_connect("localhost", "logosseg_deccr18", "Mario88451079", "logosseg_declobo");
    $consulta = "SELECT * FROM usuarios WHERE Usuario='$usuario' and Contrasena='$clave'";
    $resultado = mysqli_query($conexion, $consulta);
    
    $filas =  mysqli_num_rows($resultado);
    if ($filas>0) {
        header("location:bienvenido.php");
    }
    else {
        echo '<script>alert("Error a la autenticación");
    window.history.go(-1);
    </script>';
    }
    
    mysqli_free_result($resultado);
    mysqli_close($conexion);
*/
?>