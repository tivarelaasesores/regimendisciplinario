 <?php
include 'cn.php';
$nombre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];

$insertar = "INSERT INTO Usuarios(nombre, apellido1, apellido2, correo, usuario, clave, telefono)
VALUE ('$nombre', '$apellido1', '$apellido2', '$correo', '$usuario', '$clave', '$telefono')";

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0){
    echo '<script>alert("El usuario ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0){
    echo '<script>alert("El correo ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else{
        echo '<script>alert("Usuario registrado exitosamente");
    window.history.go(-1);
    </script>';
    }
mysqli_close($conexion);
