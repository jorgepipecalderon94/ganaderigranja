<?php
include("conexion.php");

//  SOLUCIÓN CLAVE (NO CAMBIA NADA DE TU SISTEMA)
$conexion = $conn;

// EVITA ACCESO DIRECTO
if($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "Acceso no permitido";
    exit();
}

// CAPTURA DATOS
$vaca = $_POST['numero_devaca'] ?? "";
$mes = $_POST['mes'] ?? "";

$lunes = $_POST['lunes'] ?? 0;
$martes = $_POST['martes'] ?? 0;
$miercoles = $_POST['miercoles'] ?? 0;
$jueves = $_POST['jueves'] ?? 0;
$viernes = $_POST['viernes'] ?? 0;
$sabado = $_POST['sabado'] ?? 0;
$domingo = $_POST['domingo'] ?? 0;

$total = $_POST['total_semanal'] ?? 0;

// INSERTAR
$sql = "INSERT INTO venta_leche 
(numero_devaca, mes, lunes, martes, miercoles, jueves, viernes, sabado, domingo, total_semanal)
VALUES 
('$vaca','$mes','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo','$total')";

// EJECUTAR
if($conexion->query($sql)){
    echo "<script>
    alert('✅ Guardado correctamente');
    window.location='registro_leche_diaria.html';
    </script>";
} else {
    echo "Error: " . $conexion->error;
}
?>
?>