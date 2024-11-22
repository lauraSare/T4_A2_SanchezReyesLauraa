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

        $datos_cambio = json_decode($cadenaJson, true);

        // Validar y asignar los datos, sin incluir el 'nc' en el update
        $nc = mysqli_real_escape_string($conexion, $datos_cambio['nc']); // No cambiar este valor
        $n = mysqli_real_escape_string($conexion, $datos_cambio['n']);
        $primerApellido = mysqli_real_escape_string($conexion, $datos_cambio['primerApellido']);
        $segundoApellido = mysqli_real_escape_string($conexion, $datos_cambio['segundoApellido']);
        $edad = intval($datos_cambio['edad']);
        $semestre = intval($datos_cambio['semestre']);
        $carrera = mysqli_real_escape_string($conexion, $datos_cambio['carrera']);

        // Validar que el 'nc' exista antes de hacer la actualización
        $verificar_nc = "SELECT * FROM alumnos WHERE Num_Control = '$nc'";
        $res_verificar = mysqli_query($conexion, $verificar_nc);

        if (mysqli_num_rows($res_verificar) == 0) {
            // Si no existe el 'nc', no hacer el cambio
            echo json_encode(array('cambio' => 'error', 'mensaje' => 'El número de control no existe.'));
            exit();
        }

        // SQL para actualizar los datos sin cambiar el 'nc'
        $sql = "UPDATE alumnos 
                SET Nombre = '$n', 
                    Primer_Ap = '$primerApellido', 
                    Segundo_Ap = '$segundoApellido', 
                    Edad = $edad, 
                    Semestre = $semestre, 
                    Carrera = '$carrera' 
                WHERE Num_Control = '$nc'";

        // Ejecutar la consulta
        $res = mysqli_query($conexion, $sql);

        // Configurar respuestas JSON (RESPONSE)
        $respuesta = array();

        if ($res && mysqli_affected_rows($conexion) > 0) {
            $respuesta['cambio'] = 'exito';
        } else {
            $respuesta['cambio'] = 'error';
        }

        // Convertir la respuesta a JSON y enviarla
        echo json_encode($respuesta);
    }
}

?>
