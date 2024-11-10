<?php
include_once('../../database/conexion_bd_escuela.php');
include_once('../controllers/controller_alumno.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_control = $_POST['Num_Control'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $edad = $_POST['edad'];
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];

    $alumnoDAO = new AlumnoDAO();
    $exito = $alumnoDAO->modificarAlumno($num_control, $nombre, $primerApellido, $segundoApellido, $edad, $semestre, $carrera);

    if ($exito) {
        header('Location: ../pages/cambios.php?mensaje=exito');
    } else {
        header('Location: ../pages/cambios.php?mensaje=error');
    }
    exit;
}
?>
