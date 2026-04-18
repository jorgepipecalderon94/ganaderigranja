<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Animales</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{ background:#eef2f7; }
.card{ border-radius:15px; }
</style>
</head>

<body class="p-4">

<div class="container">

<h2 class="text-center mb-4">🐄 Registro de Animales</h2>

<div class="card p-4 shadow">

<form id="formAnimal">

<div class="row mb-3">
    <div class="col-md-3">
        <label>Nombre</label>
        <input type="text" id="nombre" class="form-control" required>
    </div>

    <div class="col-md-2">
        <label>Número</label>
        <input type="text" id="numero" class="form-control" required>
    </div>

    <div class="col-md-2">
        <label>Sexo</label>
        <select id="sexo" class="form-control">
            <option value="H">Hembra</option>
            <option value="M">Macho</option>
        </select>
    </div>

    <div class="col-md-2">
        <label>Raza</label>
        <input type="text" id="raza" class="form-control">
    </div>

    <div class="col-md-3">
        <label>Fecha Nacimiento</label>
        <input type="date" id="fecha" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        <label>Peso</label>
        <input type="number" id="peso" class="form-control">
    </div>

    <div class="col-md-3">
        <label>Estado de Salud</label>
        <input type="text" id="salud" class="form-control" value="Bueno">
    </div>
</div>

<button type="button" onclick="guardarAnimal()" class="btn btn-success">
Guardar Animal
</button>

</form>

</div>

<!-- TABLA -->
<div class="card mt-4 p-4 shadow">
<h4>Animales registrados</h4>

<table class="table" id="tabla">
<thead>
<tr>
<th>Nombre</th>
<th>Número</th>
<th>Sexo</th>
<th>Raza</th>
<th>Fecha</th>
<th>Peso</th>
<th>Salud</th>
</tr>
</thead>
<tbody></tbody>
</table>

</div>

</div>

<script>
function guardarAnimal(){

let datos = new FormData();

datos.append("nombre", nombre.value);
datos.append("numero", numero.value);
datos.append("sexo", sexo.value);
datos.append("raza", raza.value);
datos.append("fecha", fecha.value);
datos.append("peso", peso.value);
datos.append("salud", salud.value);

fetch("guardar_animal.php",{
method:"POST",
body:datos
})
.then(r=>r.text())
.then(r=>{

if(r.trim()=="ok"){

alert("✅ Animal guardado");

let fila = `
<tr>
<td>${nombre.value}</td>
<td>${numero.value}</td>
<td>${sexo.value}</td>
<td>${raza.value}</td>
<td>${fecha.value}</td>
<td>${peso.value}</td>
<td>${salud.value}</td>
</tr>
`;

document.querySelector("#tabla tbody").innerHTML += fila;

document.getElementById("formAnimal").reset();

}else{
alert("❌ Error: "+r);
}

});

}
</script>

</body>
</html>