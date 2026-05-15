<?php
session_start();
include("conexion.php");

// RECIBIR DATOS LOGIN
$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM registro_usuario 
WHERE Correo='$correo' 
AND estado='activo'";

$resultado = $conn->query($sql);

// VALIDAR USUARIO
if($resultado->num_rows > 0){

    $fila = $resultado->fetch_assoc();

    // VALIDAR CONTRASEÑA
    if(password_verify($password, $fila['Contraseña'])){

        // CREAR SESIONES
        $_SESSION['usuario'] = $fila['Nombre'];
        $_SESSION['rol'] = $fila['Rol'];

        // REDIRECCIONAR SEGÚN ROL
        if($fila['Rol'] == "profesor"){

            header("Location: menu_profesor.html");

        }elseif($fila['Rol'] == "operario"){

            header("Location: menu_operario.html");

        }else{

            header("Location: menu_estudiante.html");

        }

    }else{

        echo "
        <script>
        alert('Contraseña incorrecta');
        window.location='ingreso_sistema.html';
        </script>
        ";

    }

}else{

    echo "
    <script>
    alert('Usuario no encontrado o pendiente de aprobación');
    window.location='ingreso_sistema.html';
    </script>
    ";

}

$conn->close();
?>