<?php
include("conexion.php");

$fecha = $_POST['fecha'];
$produccion = $_POST['produccion'];
$hembras = $_POST['hembras'];
$machos = $_POST['machos'];
$destetos = $_POST['destetos'];
$descanso = $_POST['descanso'];
$horra = $_POST['horra'];
$vientre = $_POST['vientre'];
$levante = $_POST['levante'];
$toros = $_POST['toros'];
$total = $_POST['total'];
$obs = $_POST['observaciones'];

$sql = "INSERT INTO inventario_ganado 
(fecha_registro, produccion, hembras, machos, destetos, descanso, horra, vientre, levante, toros, total_animales, observaciones)
VALUES 
('$fecha','$produccion','$hembras','$machos','$destetos','$descanso','$horra','$vientre','$levante','$toros','$total','$obs')";

if($conn->query($sql)){
    echo "ok";
}else{
    echo "error: ".$conn->error;
}
?>