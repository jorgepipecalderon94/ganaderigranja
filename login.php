<?php
session_start();

include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

// BUSCAR USUARIO
$sql = "SELECT * FROM registro_usuario WHERE Correo='$correo'";

$resultado = $conn->query($sql);

if($resultado->num_rows > 0){

    $usuario = $resultado->fetch_assoc();

    // VALIDAR PENDIENTE
    if($usuario['estado'] == 'pendiente'){

        echo "
        <script>
        alert('Su cuenta aún no ha sido aprobada por el profesor');
        window.location='ingreso_sistema.html';
        </script>
        ";

        exit();
    }

    // VALIDAR BLOQUEADO
    if($usuario['estado'] == 'bloqueado'){

        echo "
        <script>
        alert('Usuario bloqueado');
        window.location='ingreso_sistema.html';
        </script>
        ";

        exit();
    }

    // VALIDAR CONTRASEÑA
    if(password_verify($password, $usuario['Contraseña'])){

        // GUARDAR ÚLTIMO INGRESO
        $conn->query("
        UPDATE registro_usuario 
        SET ultimo_ingreso = NOW()
        WHERE Correo='$correo'
        ");

        $_SESSION['usuario'] = $usuario['Nombre'];
        $_SESSION['rol'] = $usuario['Rol'];

        // REDIRECCIÓN
        if($usuario['Rol'] == "profesor"){

            header("Location: panel_profesor.php");

        } else if($usuario['Rol'] == "estudiante"){

            header("Location: menu_estudiante.html");

        } else if($usuario['Rol'] == "operario"){

            header("Location: menu_operario.html");
        }

    } else {

        echo "
        <script>
        alert('Contraseña incorrecta');
        window.location='ingreso_sistema.html';
        </script>
        ";
    }

} else {

    echo "
    <script>
    alert('Usuario no encontrado');
    window.location='ingreso_sistema.html';
    </script>
    ";
}
?>