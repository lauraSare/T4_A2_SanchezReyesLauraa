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

        $datos_baja = json_decode($cadenaJson, true);

        // Validar y asignar los datos
        $nc = mysqli_real_escape_string($conexion, $datos_baja['nc']);

        // SQL para eliminar el registro
        $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";
        $res = mysqli_query($conexion, $sql);

        // Configurar respuestas JSON (RESPONSE)
        $respuesta = array();

        if ($res && mysqli_affected_rows($conexion) > 0) {
            $respuesta['baja'] = 'exito';
        } else {
            $respuesta['baja'] = 'error';
        }

        // Convertir la respuesta a JSON y enviarla
        echo json_encode($respuesta);
    }
}

?>
