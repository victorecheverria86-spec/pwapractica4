<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] != 1) {
    header("Location: login.php");
    exit();
}
?>

<h2>Bienvenido Docente <?php echo $_SESSION['nombre']; ?></h2>

<form method="POST" action="guardar_nota.php">

    <!-- ESTUDIANTES -->
    <label>Estudiante:</label>
    <select name="usuario_id">
        <?php
        $estudiantes = $conexion->query("SELECT * FROM usuarios WHERE rol=2");
        while ($e = $estudiantes->fetch_assoc()) {
            echo "<option value='{$e['id']}'>{$e['nombre']}</option>";
        }
        ?>
    </select><br><br>

    <!-- ASIGNATURAS -->
    <label>Asignatura:</label>
    <select name="asignatura_id">
        <?php
        $asignaturas = $conexion->query("SELECT * FROM asignaturas");
        while ($a = $asignaturas->fetch_assoc()) {
            echo "<option value='{$a['id']}'>{$a['nombre']}</option>";
        }
        ?>
    </select><br><br>

    Teoría: <input type="number" step="0.01" name="teoria"><br><br>
    Práctica: <input type="number" step="0.01" name="practica"><br><br>

    <button type="submit">Guardar Nota</button>
</form>

<br><a href="logout.php">Cerrar sesión</a>