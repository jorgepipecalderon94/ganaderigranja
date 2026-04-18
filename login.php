<?php
include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

// BUSCAR USUARIO
$sql = "SELECT * FROM registro_usuario WHERE Correo='$correo'";
$resultado = $conn->query($sql);

if($resultado->num_rows > 0){

    $usuario = $resultado->fetch_assoc();

    // VERIFICAR CONTRASEÑA
    if(password_verify($password, $usuario['Contraseña'])){

        // REDIRECCION SEGUN ROL
        if($usuario['Rol'] == "profesor"){
            header("Location: menu_profesor.html");
        }
        else if($usuario['Rol'] == "estudiante"){
            header("Location: menu_estudiante.html");
        }
        else if($usuario['Rol'] == "operario"){
            header("Location: menu_operario.html");
        }

    } else {
        echo "<script>alert('❌ Contraseña incorrecta'); window.location='ingreso_sistema.html';</script>";
    }

} else {
    echo "<script>alert('❌ Usuario no encontrado'); window.location='ingreso_sistema.html';</script>";
}
?>