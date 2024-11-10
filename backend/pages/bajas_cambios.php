<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>

    <!-- Enlace a los iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        h3 {
            text-align: center;
            color: #8C3061;
        }

        /* Estilo de la tabla */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
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

        /* Estilo del botón de eliminar */
        .action-buttons .eliminar {
            margin: 0 5px;
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #f44336;
            transition: background-color 0.3s;
        }

        .action-buttons .eliminar:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <?php
    require_once('menu_principal.php'); 
    ?>

    <h3>Listado de ALUMNOS</h3>

    <?php
    include_once('../controllers/controller_alumno.php');
    $alumnoDAO = new AlumnoDAO();
    $datos = $alumnoDAO->mostrarAlumnos('x');

    if (mysqli_num_rows($datos) > 0) {
        echo '<table>';
        echo '<thead> 
                <tr>
                   <th>Num_Control</th>
                   <th>Nombre</th>
                   <th>Primer_Ap</th>
                   <th>Segundo_Ap</th>
                   <th>Edad</th>
                   <th>Semestre</th>
                   <th>Carrera</th>
                   <th>Acciones</th>
                </tr>
              </thead>';  

        while ($fila = mysqli_fetch_assoc($datos)) {
            printf(
                "<tr> 
                    <td>".$fila['Num_Control']."</td>
                    <td>".$fila['Nombre']."</td> 
                    <td>".$fila['Primer_Ap']."</td> 
                    <td>".$fila['Segundo_Ap']."</td> 
                    <td>".$fila['Edad']."</td>
                    <td>".$fila['Semestre']."</td> 
                    <td>".$fila['Carrera']."</td> 
                    <td class='action-buttons'>  
                        <a href='../controllers/procesar_bajas.php?nc=%s' class='eliminar'><i class='fas fa-trash-alt'></i> Eliminar</a>
                    </td>
                </tr>",
                $fila['Num_Control']
            );
        }
        echo '</table>';
    } else {
        echo "<p style='text-align: center; color: #8C3061;'>TABLA VACÍA</p>";
    }
    ?>

    <!-- Script para eliminación sin recargar página y manejo de duplicados -->
    <script>
        document.querySelectorAll('.eliminar').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Obtener el número de control del enlace actual
                const numControl = this.getAttribute('href').split('nc=')[1];

                // Realizar la solicitud al servidor
                fetch(this.getAttribute('href'))
                    .then(response => response.text())
                    .then(() => {
                        // Eliminar todas las filas con el mismo número de control en el frontend
                        document.querySelectorAll('tr').forEach(row => {
                            const cell = row.querySelector('td');
                            if (cell && cell.textContent === numControl) {
                                row.remove();
                            }
                        });
                        
                        // Verificar si la tabla está vacía
                        if (document.querySelectorAll('table tr').length <= 1) {
                            document.querySelector('table').remove();
                            document.querySelector('h3').insertAdjacentHTML('afterend', 
                                "<p style='text-align: center; color: #8C3061;'>TABLA VACÍA</p>");
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al eliminar el alumno');
                    });
            });
        });
    </script>
</body>
</html>
