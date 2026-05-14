<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "UPDATE registro_usuario 
SET estado='activo'
WHERE id='$id'";

if($conn->query($sql) === TRUE){

    header("Location: panel_profesor.php");

}else{

    echo "Error al aprobar";
}

?>