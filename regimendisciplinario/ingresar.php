<?php
$nombre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];
$cedula = $_POST["cedula"];

$insertar = "INSERT INTO datos_trab(nombre, apellido1, apellido2, correo, usuario, clave, telefono, cedula)
VALUE ('$nombre', '$apellido1', '$apellido2', '$correo', '$usuario', '$clave', '$telefono', '$cedula')";

$conexion = mysqli_connect("localhost", "root", "", "proyecto");
$consulta = "SELECT * FROM datos_trab WHERE nombre='$nombre' and apellido1='$apellido1' and apellido2='$apellido2' and correo='$correo' and telefono='$telefono' and cedula='$cedula'";

$resultado = mysqli_query($conexion, $consulta);

$filas =  mysqli_num_rows($resultado);
if ($filas>0) {
    header("location:bienvenido.php");
}
    else {
        echo "Error en la autentificacion";
    }
mysqli_free_result($resultado);
