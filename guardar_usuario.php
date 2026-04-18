<?php
include("conexion.php");

// Recibir datos
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$rol = $_POST['rol'];

// Encriptar contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar datos
$sql = "INSERT INTO registro_usuario (Nombre, Apellido, Documento, Correo, Contraseña, Rol)
VALUES ('$nombre', '$apellido', '$documento', '$correo', '$passwordHash', '$rol')";

if ($conn->query($sql) === TRUE) {
    header("Location: ingreso_sistema.html");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>