<link rel="stylesheet" href="css/estilos.css">

<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] != 2) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['usuario_id'];

$sql = "SELECT n.*, a.nombre AS asignatura
        FROM notas n
        JOIN asignaturas a ON n.asignatura_id = a.id
        WHERE n.usuario_id='$id'";

$resultado = $conexion->query($sql);
?>

<h2>Mis Notas</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Asignatura</th>
        <th>Teoría</th>
        <th>Práctica</th>
        <th>Promedio</th> <!-- NUEVA COLUMNA -->
    </tr>

    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['asignatura']; ?></td>
            <td><?php echo $fila['teoria']; ?></td>
            <td><?php echo $fila['practica']; ?></td>
            <td>
                <?php echo ($fila['teoria'] + $fila['practica']) / 2; ?>
            </td>
        </tr>
    <?php } ?>
</table>

<br><a href="logout.php">Cerrar sesión</a>