<?php
include("conexion.php");

// RECIBIR DATOS
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$rol = $_POST['rol'];

// ENCRIPTAR CONTRASEÑA
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// ESTADO
$estado = "pendiente";

// INSERTAR DATOS
$sql = "INSERT INTO registro_usuario 
(Nombre, Apellido, Documento, Correo, Contraseña, Rol, estado)

VALUES 
('$nombre', '$apellido', '$documento', '$correo', '$passwordHash', '$rol', '$estado')";

if ($conn->query($sql) === TRUE) {

    echo "
    <script>
    alert('Registro enviado. Espere aprobación del profesor');
    window.location='ingreso_sistema.html';
    </script>
    ";

} else {

    echo "Error: " . $conn->error;
}

$conn->close();
?>