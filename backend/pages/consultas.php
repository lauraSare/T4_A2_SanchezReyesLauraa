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
    <title>Consultas de Alumnos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        h3 {
            text-align: center;
            color: #8C3061;
            margin: 20px 0;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            gap: 10px;
        }

        #searchInput {
            padding: 8px 12px;
            border: 1px solid #8C3061;
            border-radius: 4px;
            width: 300px;
            font-size: 14px;
        }

        .search-btn {
            background-color: #8C3061;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th {
            background-color: #8C3061;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php require_once('menu_principal.php'); ?>

    <h3>Consulta de ALUMNOS</h3>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar por número de control, nombre o carrera...">
        <button class="search-btn">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <?php
    include_once('../controllers/controller_alumno.php');
    $alumnoDAO = new AlumnoDAO();
    $datos = $alumnoDAO->mostrarAlumnos();

    if (mysqli_num_rows($datos) > 0) {
        echo '<table id="alumnosTable">
                <thead>
                    <tr>
                        <th>Num_Control</th>
                        <th>Nombre</th>
                        <th>Primer_Ap</th>
                        <th>Segundo_Ap</th>
                        <th>Edad</th>
                        <th>Semestre</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>';
        
        while ($fila = mysqli_fetch_assoc($datos)) {
            echo "<tr>
                    <td><a href='procesar_consultas.php?num_control=".$fila['Num_Control']."'>".$fila['Num_Control']."</a></td>
                    <td>".$fila['Nombre']."</td>
                    <td>".$fila['Primer_Ap']."</td>
                    <td>".$fila['Segundo_Ap']."</td>
                    <td>".$fila['Edad']."</td>
                    <td>".$fila['Semestre']."</td>
                    <td>".$fila['Carrera']."</td>
                  </tr>";
        }
        
        echo '</tbody></table>';
    } else {
        echo "<p style='text-align: center; color: #8C3061;'>No se encontraron registros</p>";
    }
    ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.querySelector('.search-btn');
        const table = document.getElementById('alumnosTable');

        // Función para filtrar la tabla
        function filterTable(searchText) {
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                let row = rows[i];
                let showRow = false;
                let cells = row.getElementsByTagName('td');

                for (let j = 0; j < cells.length; j++) {
                    let cell = cells[j];
                    let text = cell.textContent || cell.innerText;
                    
                    if (text.toLowerCase().indexOf(searchText.toLowerCase()) > -1) {
                        showRow = true;
                        break;
                    }
                }

                row.style.display = showRow ? '' : 'none';
            }
        }

        // Evento para filtrar mientras se escribe
        searchInput.addEventListener('input', function() {
            filterTable(this.value);
        });

        // Evento para el botón de búsqueda
        searchButton.addEventListener('click', function() {
            filterTable(searchInput.value);
        });

        // También mantener la funcionalidad al presionar Enter
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                filterTable(this.value);
            }
        });
    });
    </script>
</body>
</html>