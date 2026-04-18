<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fecha = $_POST['fecha'] ?? '';
    $evento = $_POST['evento'] ?? '';
    $producto = $_POST['producto'] ?? '';
    $dosis = $_POST['dosis'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $observaciones = $_POST['observaciones'] ?? '';

    $sql = "INSERT INTO registro_sanitario 
    (fecha, evento_sanitario, producto_utilizado, dosis, numero_animales, observaciones)
    VALUES 
    ('$fecha', '$evento', '$producto', '$dosis', '$cantidad', '$observaciones')";

    //  AQUÍ EL ARREGLO
    if ($conn->query($sql) === TRUE) {
        echo "ok";
    } else {
        echo "error: " . $conn->error;
    }

}
?>