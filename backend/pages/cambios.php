<?php
session_start();
if (!$_SESSION['Valida'])
    header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambios de ALUMNOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Estilos del menú */
        :root {
            --primary-color: #8C3061;
            --hover-color: #6d254b;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .navbar {
            background-color: var(--primary-color) !important;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-link {
            color: white !important;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 4px;
        }

        .nav-link:hover {
            background-color: var(--hover-color);
            transform: translateY(-2px);
        }

        .btn-login {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid white;
            border-radius: 20px;
            padding: 0.375rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: var(--hover-color);
            color: white;
            border-color: var(--hover-color);
        }

        /* Estilos del formulario */
        .form-container {
            width: 70%;
            margin: 20px auto;
            padding: 25px;
            background-color: white;
            border: none;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            color: #8C3061;
            margin: 20px 0;
        }

        .form-label {
            color: #666;
            font-weight: 500;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 8px 12px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #8C3061;
            box-shadow: 0 0 0 0.2rem rgba(140, 48, 97, 0.25);
        }

        .btn-cambiar {
            background-color: #8C3061;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 500;
        }

        .btn-cambiar:hover {
            background-color: #6d254b;
        }

        /* Estilos de la tabla */
        .table-responsive {
            width: 60%;
            margin: 20px auto;
        }

        .table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            font-size: 0.9em;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #8C3061;
            color: white;
            padding: 10px;
            font-weight: 500;
            text-align: center;
            border: none;
        }

        .table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #f0f0f0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .alert {
            display: none;
        }
    </style>
</head>
<body>
    <?php require_once('menu_principal.php'); ?>

    <!-- Alerta de éxito -->
    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exito'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Éxito!</strong> Los datos fueron modificados correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <h3>Modificar Datos de Alumnos</h3>
        <form id="formCambios" action="../controllers/procesar_cambios.php" method="post" class="row g-3">
        <input type="hidden" id="caja_num_control" name="Num_Control">

            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label for="primerApellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="primerApellido" name="primerApellido" required>
            </div>
            <div class="col-md-6">
                <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="segundoApellido" name="segundoApellido">
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
                <input type="text" class="form-control" id="carrera" name="carrera" required>
            </div>
            <div class="col-12 button-container">
                <button type="submit" class="btn-cambiar">MODIFICAR</button>
            </div>
        </form>
    </div>

    <h3>Listado de Alumnos</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Num_Control</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Edad</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody id="tablaAlumnos">
                <?php
                include_once('../controllers/controller_alumno.php');
                $alumnoDAO = new AlumnoDAO();
                $datos = $alumnoDAO->mostrarAlumnos();
                while ($fila = mysqli_fetch_assoc($datos)) {
                    echo "<tr onclick='cargarDatos(" . json_encode($fila) . ")'>
                        <td>{$fila['Num_Control']}</td>
                        <td>{$fila['Nombre']}</td>
                        <td>{$fila['Primer_Ap']}</td>
                        <td>{$fila['Segundo_Ap']}</td>
                        <td>{$fila['Edad']}</td>
                        <td>{$fila['Semestre']}</td>
                        <td>{$fila['Carrera']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function cargarDatos(alumno) {
        document.getElementById('caja_num_control').value = alumno.Num_Control;
        document.getElementById('nombre').value = alumno.Nombre;
        document.getElementById('primerApellido').value = alumno.Primer_Ap;
        document.getElementById('segundoApellido').value = alumno.Segundo_Ap;
        document.getElementById('edad').value = alumno.Edad;
        document.getElementById('semestre').value = alumno.Semestre;
        document.getElementById('carrera').value = alumno.Carrera;
    }
</script>
</html>
