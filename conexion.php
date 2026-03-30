<?php
$conexion = new mysqli("localhost", "root", "", "granja_ganadera");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
