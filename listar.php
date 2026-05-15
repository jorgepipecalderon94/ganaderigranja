<?php
// 2. Guardar automáticamente el nombre y rol del usuario al insertar
session_start();
include("conexion.php");

$nombre_usuario = $_SESSION['usuario'];
$rol_usuario = $_SESSION['rol'];

// Ejemplo de inserción
$sql = "INSERT INTO produccion_leche
(
    enero, febrero, marzo, abril, mayo, junio,
    julio, agosto, septiembre, octubre, noviembre, diciembre,
    total, fecha_registro, nombre_usuario, rol_usuario
)
VALUES
(
    '$enero', '$febrero', '$marzo', '$abril', '$mayo', '$junio',
    '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre', '$diciembre',
    '$total', NOW(), '$nombre_usuario', '$rol_usuario'
)";

$conn->query($sql);
?>