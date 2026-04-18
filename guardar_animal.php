<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$sexo = $_POST['sexo'];
$raza = $_POST['raza'];
$fecha = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$salud = $_POST['estado_salud'];

$sql = "INSERT INTO animal 
(nombre, numero, sexo, raza, fecha_nacimiento, peso, estado_salud)
VALUES 
('$nombre','$numero','$sexo','$raza','$fecha','$peso','$salud')";

if($conn->query($sql)){
    echo "ok";
}else{
    echo "error: ".$conn->error;
}
?>