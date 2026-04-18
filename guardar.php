<?php
include(__DIR__ . "/conexion.php"); // 👈 ESTO ES CLAVE

// verificar conexión
if (!isset($conn)) {
    die("Error: no conecta a la base de datos");
}

// recibir datos seguros
$enero = intval($_POST['enero'] ?? 0);
$febrero = intval($_POST['febrero'] ?? 0);
$marzo = intval($_POST['marzo'] ?? 0);
$abril = intval($_POST['abril'] ?? 0);
$mayo = intval($_POST['mayo'] ?? 0);
$junio = intval($_POST['junio'] ?? 0);
$julio = intval($_POST['julio'] ?? 0);
$agosto = intval($_POST['agosto'] ?? 0);
$septiembre = intval($_POST['septiembre'] ?? 0);
$octubre = intval($_POST['octubre'] ?? 0);
$noviembre = intval($_POST['noviembre'] ?? 0);
$diciembre = intval($_POST['diciembre'] ?? 0);
$total = intval($_POST['total'] ?? 0);

// insertar
$sql = "INSERT INTO produccion_leche 
(enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total)
VALUES
($enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre,$total)";

if($conn->query($sql)){
    echo "ok";
}else{
    echo "error: " . $conn->error;
}
?>