<?php

include_once('../database/conexion_bd_escuela.php');

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

// MÉTODOS HTTP DE PETICIÓN AL SERVIDOR: POST, GET, PUT, PATCH, DELETE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir la PETICIÓN (REQUEST) con JSON a través de HTTP
    $cadenaJson = file_get_contents('php://input');

    if ($cadenaJson == false) {
        echo "No hay cadena JSON";
    } else {

        $consulta_filtros = json_decode($cadenaJson, true);

        // Validar y asignar los filtros recibidos
        $filtro_nc = mysqli_real_escape_string($conexion, $consulta_filtros['nc']);
        $filtro_n = mysqli_real_escape_string($conexion, $consulta_filtros['n']);

        // Consulta SQL con filtros opcionales
        $sql = "SELECT * FROM alumnos WHERE 1=1";
        if (!empty($filtro_nc)) {
            $sql .= " AND Num_Control = '$filtro_nc'";
        }
        if (!empty($filtro_n)) {
            $sql .= " AND Nombre LIKE '%$filtro_n%'";
        }

        $res = mysqli_query($conexion, $sql);

        // Configurar respuestas JSON (RESPONSE)
        $respuesta = array();
        $respuesta['alumnos'] = array(); // Inicializar el array

        if ($res && mysqli_num_rows($res) > 0) {
            while ($fila = mysqli_fetch_assoc($res)) {
                $alumno = array();
                $alumno['nc'] = $fila['Num_Control'];
                $alumno['n'] = $fila['Nombre'];
                $alumno['primerApellido'] = $fila['Primer_Ap'];
                $alumno['segundoApellido'] = $fila['Segundo_Ap'];
                $alumno['edad'] = $fila['Edad'];
                $alumno['semestre'] = $fila['Semestre'];
                $alumno['carrera'] = $fila['Carrera'];

                array_push($respuesta['alumnos'], $alumno);
            }
            $respuesta['consulta'] = 'exito';
        } else {
            $respuesta['consulta'] = 'no hay registros';
        }

        // Convertir la respuesta a JSON y enviarla
        echo json_encode($respuesta);
    }
}

?>
