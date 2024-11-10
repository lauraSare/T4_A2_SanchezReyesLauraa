<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Alumnos</title>
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

        .register-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            width: 100%;
            border-radius: 20px;
            padding: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2><i class="bi bi-person-plus me-2"></i>Registro de Usuario</h2>
    
    <form action="../controllers/procesar_registro.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre de usuario" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <div class="form-text mt-3">
            ¿Ya tienes cuenta? <a href="login.php" style="color: var(--hover-color); text-decoration: none;">Inicia sesión aquí</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
