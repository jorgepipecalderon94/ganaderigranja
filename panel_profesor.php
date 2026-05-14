<?php
include("conexion.php");

// MOSTRAR USUARIOS
$sql = "SELECT * FROM registro_usuario";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Panel Profesor</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card{
    border-radius:15px;
}

h2{
    font-weight:bold;
}

.table th{
    background:#212529;
    color:white;
}

.btn{
    margin:2px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center mb-4">
Panel del Profesor
</h2>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Documento</th>
<th>Correo</th>
<th>Rol</th>
<th>Estado</th>
<th>Fecha registro</th>
<th>Último ingreso</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td>
<?php echo $fila['id']; ?>
</td>

<td>
<?php echo $fila['Nombre']; ?>
</td>

<td>
<?php echo $fila['Apellido']; ?>
</td>

<td>
<?php echo $fila['Documento']; ?>
</td>

<td>
<?php echo $fila['Correo']; ?>
</td>

<td>
<?php echo $fila['Rol']; ?>
</td>

<td>

<?php

if($fila['estado'] == 'activo'){

    echo "<span class='badge bg-success'>Activo</span>";

}else if($fila['estado'] == 'pendiente'){

    echo "<span class='badge bg-warning text-dark'>Pendiente</span>";

}else{

    echo "<span class='badge bg-danger'>Bloqueado</span>";
}

?>

</td>

<td>
<?php echo $fila['fecha_registro']; ?>
</td>

<td>
<?php echo $fila['ultimo_ingreso']; ?>
</td>

<td>

<!-- APROBAR -->
<a href="aprobar_usuario.php?id=<?php echo $fila['id']; ?>" 
class="btn btn-success btn-sm">

Aprobar

</a>

<!-- BLOQUEAR -->
<a href="bloquear_usuario.php?id=<?php echo $fila['id']; ?>" 
class="btn btn-warning btn-sm">

Bloquear

</a>

<!-- ELIMINAR -->
<a href="eliminar_usuario.php?id=<?php echo $fila['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar usuario?')">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<div class="text-center mt-4">

<a href="menu_profesor.html" class="btn btn-primary">

Volver al menú

</a>

</div>

</div>

</div>

</body>
</html>