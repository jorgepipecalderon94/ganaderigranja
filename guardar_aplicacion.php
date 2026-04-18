<?php
include("conexion.php");

$fecha = $_POST['fecha'] ?? NULL;
$producto = $_POST['producto'] ?? '';
$laboratorio = $_POST['laboratorio'] ?? '';
$lote = $_POST['lote'] ?? '';
$dosis = $_POST['dosis'] ?? '';
$via = $_POST['via'] ?? '';
$leche = $_POST['leche'] ?? 0;
$carne = $_POST['carne'] ?? 0;
$animales = $_POST['animales'] ?? 0;
$responsable = $_POST['responsable'] ?? '';

$sql = "INSERT INTO aplicaciones_ganado
(fecha_aplicacion, producto, laboratorio, lote, dosis, via, retiro_leche, retiro_carne, animales, responsable)
VALUES
('$fecha','$producto','$laboratorio','$lote','$dosis','$via','$leche','$carne','$animales','$responsable')";

if($conn->query($sql)){
    echo "ok";
}else{
    echo "error: ".$conn->error;
}
?>