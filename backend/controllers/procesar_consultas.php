<?php
include_once('../../database/conexion_bd_escuela.php');
include_once('../../models/model_alumno.php');

if (isset($_GET['num_control'])) {
    $num_control = $_GET['num_control'];

    $alumnoDAO = new AlumnoDAO();
    $alumno = $alumnoDAO->consultarAlumno($num_control);

    if ($alumno) {
        echo "Número de Control: " . $alumno['Num_Control'] . "<br>";
        echo "Nombre: " . $alumno['Nombre'] . "<br>";
        echo "Primer Apellido: " . $alumno['Primer_Ap'] . "<br>";
        echo "Segundo Apellido: " . $alumno['Segundo_Ap'] . "<br>";
        echo "Edad: " . $alumno['Edad'] . "<br>";
        echo "Semestre: " . $alumno['Semestre'] . "<br>";
        echo "Carrera: " . $alumno['Carrera'] . "<br>";
    } else {
        echo "No se encontró un alumno con el número de control especificado.";
    }
} else {
    echo "No se proporcionó el número de control.";
}
?>
