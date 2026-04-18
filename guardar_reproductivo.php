<?php
include("conexion.php");

$id_animal = $_POST['id_animal'] ?? '';
$tipo = $_POST['tipo_servicio'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$toro = $_POST['toro'] ?? '';
$inseminador = $_POST['inseminador'] ?? '';
$resultado = $_POST['resultados'] ?? '';

$sql = "INSERT INTO evento_reproductivo 
(id_animal, tipo_servicio, fecha, toro, inseminador, resultados)
VALUES 
('$id_animal','$tipo','$fecha','$toro','$inseminador','$resultado')";

if($conn->query($sql)){
    echo "ok";
}else{
    echo "error: ".$conn->error;
}
?>