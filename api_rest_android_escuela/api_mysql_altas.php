<?php

include_once('../database/conexion_bd_escuela.php');

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

// MÉTODOS HTTP DE PETICIÓN AL SERVIDOR: POST, GET, PUT, PATCH, DELETE
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

   //Recibir la PETICION (REQUEST) con JSON a traves de HTTP
   $cadenaJson = file_get_contents('php://input');

   if($cadenaJson == false){
       echo "No hay cadena JSON";
   }else{
       
       $datos_alumno = json_decode($cadenaJson, true );

        // Validar y asignar los datos
        $nc = mysqli_real_escape_string($conexion, $datos_alumno['nc']);
        $n = mysqli_real_escape_string($conexion, $datos_alumno['n']);
        $primerApellido = mysqli_real_escape_string($conexion, $datos_alumno['primerApellido']);
        $segundoApellido = mysqli_real_escape_string($conexion, $datos_alumno['segundoApellido']);
        $edad = intval($datos_alumno['edad']);
        $semestre = intval($datos_alumno['semestre']);
        $carrera = mysqli_real_escape_string($conexion, $datos_alumno['carrera']);

        // SQL para insertar los datos
        $sql = "INSERT INTO alumnos (Num_Control, Nombre, Primer_Ap, Segundo_Ap, Edad, Semestre, Carrera) 
                VALUES ('$nc', '$n', '$primerApellido', '$segundoApellido', $edad, $semestre, '$carrera')";
        
        $res = mysqli_query($conexion, $sql);

        // Configurar respuestas JSON (response)
        $respuesta = array();

        if ($res) {
            $respuesta['alta'] = 'exito';
        } else {
            $respuesta['alta'] = 'error';
        }

        // Enviar la respuesta en formato JSON
        echo json_encode($respuesta);
    }
}
?>
