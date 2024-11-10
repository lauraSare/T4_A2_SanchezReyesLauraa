<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumnos</title>
    <style>
        .form-container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #8C3061;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-agregar {
            background-color: #8C3061;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-agregar:hover {
            background-color: #6d254b;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Estilo para el mensaje de éxito */
        .message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
require_once('menu_principal.php');
$mensaje = '';

// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../controllers/procesar_altas.php'; 

    $mensaje = "¡Registro agregado correctamente!";
}
?>

<div class="form-container">
    <?php if ($mensaje): ?>
        <div class="message"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <form action="" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="caja_num_control" class="form-label">Número de Control</label>
            <input type="text" class="form-control" id="caja_num_control" name="caja_num_control" placeholder="Solo números" maxlength="10" required>
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Solo letras" maxlength="50" required>
        </div>
        <div class="col-md-6">
            <label for="primerApellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Solo letras" maxlength="50" required>
        </div>
        <div class="col-md-6">
            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Solo letras" maxlength="50">
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
            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Solo letras" maxlength="50" required>
        </div>
        <div class="col-12 button-container">
            <button type="submit" class="btn-agregar">AGREGAR</button>
        </div>
    </form>
</div>

</body>
</html>
