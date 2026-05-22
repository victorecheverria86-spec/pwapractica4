<link rel="stylesheet" href="css/estilos.css">

<?php
session_start();
include("conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

// Consulta segura
$sql = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    $usuario = $resultado->fetch_assoc();

    // Guardar sesión
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    // Redirección según rol
    if ($usuario['rol'] == 1) {
        header("Location: docente.php");
        exit();
    } elseif ($usuario['rol'] == 2) {
        header("Location: estudiante.php");
        exit();
    }

} else {
    echo "<h3>❌ Usuario o contraseña incorrectos</h3>";
}
?>