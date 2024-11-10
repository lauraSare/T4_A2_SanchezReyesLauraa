<?php
// Solo inicia la sesión si no hay una activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['Valida']) {
    header('Location: login.php');
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Alumnos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8C3061;
            --hover-color: #6d254b;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
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

        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.7)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-mortarboard-fill me-2"></i>
                ALUMNOS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="formulario_altas.php">
                            <i class="bi bi-person-plus-fill me-1"></i>
                            Agregar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bajas_cambios.php">
                            <i class="bi bi-person-dash-fill me-1"></i>
                            Eliminar/Modificar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cambios.php">
                            <i class="bi bi-pencil-square me-1"></i>
                            Cambios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consultas.php">
                            <i class="bi bi-search me-1"></i>
                            Consultas
                        </a>
                    </li>
                </ul>
                <span class="navbar-text ms-2 text-white">
                    <?php 
                        if (isset($_SESSION['usuario'])) {
                            echo $_SESSION['usuario'] . " - Bienvenido";
                        } else {
                            echo "Bienvenido, Usuario";
                        }
                    ?>
                </span>

                <form action="../controllers/cerrar_sesion.php" method="POST" class="ms-3">
                    <button class="btn btn-login" type="submit">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
