<?php
include("conexion.php");

$nombre = $_POST['nombre'] ?? '';
$fecha = $_POST['fecha_nacimiento'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$madre = $_POST['madre'] ?? '';
$padre = $_POST['padre'] ?? '';
$pesoN = $_POST['peso_nacimiento'] ?? 0;
$fechaD = $_POST['fecha_destete'] ?? '';
$pesoD = $_POST['peso_destete'] ?? 0;
$obs = $_POST['observaciones'] ?? '';

$sql = "INSERT INTO crias_ganado 
(nombre, fecha_nacimiento, sexo, madre, padre, peso_nacimiento, fecha_destete, peso_destete, observaciones)
VALUES 
('$nombre','$fecha','$sexo','$madre','$padre','$pesoN','$fechaD','$pesoD','$obs')";

if($conn->query($sql)){
    echo "ok";
}else{
    echo "error: ".$conn->error;
    
}
?>