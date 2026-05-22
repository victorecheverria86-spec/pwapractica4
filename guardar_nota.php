<?php
include("conexion.php");

$usuario = $_POST['usuario_id'];
$asignatura = $_POST['asignatura_id'];
$teoria = $_POST['teoria'];
$practica = $_POST['practica'];

$sql = "INSERT INTO notas (usuario_id, asignatura_id, teoria, practica)
VALUES ('$usuario','$asignatura','$teoria','$practica')";

if ($conexion->query($sql)) {
    echo "✅ Nota guardada";
} else {
    echo "❌ Error: " . $conexion->error;
}
?>