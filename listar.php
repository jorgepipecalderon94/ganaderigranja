<?php
include("conexion.php");

if(!$conn){
    die("Error en conexión");
}

$result = $conn->query("SELECT * FROM produccion_leche ORDER BY id DESC");

if(!$result){
    die("Error en consulta: " . $conn->error);
}

while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>".$row['enero']."</td>
        <td>".$row['febrero']."</td>
        <td>".$row['marzo']."</td>
        <td>".$row['abril']."</td>
        <td>".$row['mayo']."</td>
        <td>".$row['junio']."</td>
        <td>".$row['julio']."</td>
        <td>".$row['agosto']."</td>
        <td>".$row['septiembre']."</td>
        <td>".$row['octubre']."</td>
        <td>".$row['noviembre']."</td>
        <td>".$row['diciembre']."</td>
        <td>".$row['total']."</td>
    </tr>";
}
?>