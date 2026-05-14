<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM registro_usuario WHERE id='$id'";

if($conn->query($sql) === TRUE){

    header("Location: panel_profesor.php");

}else{

    echo "Error al eliminar";
}

?>