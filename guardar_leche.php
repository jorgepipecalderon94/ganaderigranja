<?php
session_start();

include("conexion.php");

$conexion = $conn;

/* =========================
   VALIDAR SESIÓN
========================= */
if(!isset($_SESSION['usuario']) || !isset($_SESSION['rol'])){

    echo "<script>
    alert('Sesión no iniciada');
    window.location='ingreso_sistema.html';
    </script>";

    exit();
}

/* =========================
   CAPTURAR SESIÓN
========================= */
$nombre = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

/* =========================
   CAPTURAR DATOS
========================= */

$vaca = $_POST['numero_devaca'];

$mes = $_POST['mes'];

$semana = $_POST['semana'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$anio = $_POST['anio'];

$lunes = $_POST['lunes'];
$martes = $_POST['martes'];
$miercoles = $_POST['miercoles'];
$jueves = $_POST['jueves'];
$viernes = $_POST['viernes'];
$sabado = $_POST['sabado'];
$domingo = $_POST['domingo'];

$total = $_POST['total_semanal'];

/* =========================
   INSERTAR EN BASE DE DATOS
========================= */

$sql = "INSERT INTO venta_leche
(
numero_devaca,
mes,
lunes,
martes,
miercoles,
jueves,
viernes,
sabado,
domingo,
total_semanal,
semana,
fecha_inicio,
fecha_fin,
anio,
nombre_usuario,
rol_usuario
)

VALUES
(
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?
)";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "ssssssssssssssss",

    $vaca,
    $mes,
    $lunes,
    $martes,
    $miercoles,
    $jueves,
    $viernes,
    $sabado,
    $domingo,
    $total,
    $semana,
    $fecha_inicio,
    $fecha_fin,
    $anio,
    $nombre,
    $rol
);

/* =========================
   EJECUTAR
========================= */

if($stmt->execute()){

    echo "
    <script>
    alert('Guardado correctamente');
    window.location='registro_leche_diaria.html';
    </script>
    ";

}else{

    echo "Error al guardar: " . $stmt->error;

}

?>