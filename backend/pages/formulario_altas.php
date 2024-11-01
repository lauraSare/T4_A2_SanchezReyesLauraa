<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
    <style>
        /* Añade estilos básicos para centrar y aplicar bordes al formulario */
        .form-container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php
    require_once('menu_principal.php'); 
    ?>

<div class="form-container">
    <form action="../controllers/procesar_altas.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="caja_num_control" class="form-label">Número de Control</label>
            <input type="text" class="form-control" id="caja_num_control" name="caja_num_control" placeholder ="Solo números" maxlength="10" required>
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder ="Solo números" maxlength="50" required>
        </div>
        <div class="col-md-6">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder ="Solo letras" maxlength="50" required>
        </div>
        <div class="col-md-6">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder ="Solo letras" maxlength="50">
        </div>
        <div class="col-md-4">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" min="1" max="120" required>
        </div>
        <div class="col-md-4">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" class="form-control" id="semestre" name="semestre" min="1" max="12" required>
        </div>
        <div class="col-md-4">
            <label for="carrera" class="form-label">Carrera</label>
            <input type="text" class="form-control" id="carrera" name="carrera" placeholder ="Solo letras" maxlength="50" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">AGREGAR</button>
        </div>
    </form>
</div>

</body>
</html>
