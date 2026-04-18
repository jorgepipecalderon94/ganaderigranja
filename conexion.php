<?php
$conn = new mysqli("localhost", "root", "", "granja_ganadera");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
