<?php
include_once('../../database/conexion_bd_escuela.php');

class AlumnoDAO {
    private $conexion;

    public function __construct(){
        $this->conexion = new ConexionBDEscuela();
    }

    // ======================== MÉTODOS ABCC (CRUD) ========================

    // ------------------ MÉTODO DE ALTAS ------------------
    public function agregarAlumno($nc){
        $sql = "INSERT INTO alumnos VALUES('$nc', '1', '1', '1', '1', '1', '1')";
        $res = mysqli_query($this->conexion->getConexion(), $sql);
        return $res;
    }

    // ------------------ MÉTODO DE BAJAS ------------------
    public function eliminarAlumno($nc){
        $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";
        $res = mysqli_query($this->conexion->getConexion(), $sql);
        return $res;
    }

    // ------------------ MÉTODO DE CAMBIOS ------------------
    public function modificarAlumno($num_control, $nombre, $primerApellido, $segundoApellido, $edad, $semestre, $carrera) {
        $sql = "UPDATE alumnos SET 
                    Nombre = '$nombre', 
                    Primer_Ap = '$primerApellido', 
                    Segundo_Ap = '$segundoApellido', 
                    Edad = $edad, 
                    Semestre = $semestre, 
                    Carrera = '$carrera' 
                WHERE Num_Control = '$num_control'";

        $conexion = $this->conexion->getConexion();
        if (!$conexion) {
            die("Error en la conexión: " . mysqli_connect_error());
        }

        $res = mysqli_query($conexion, $sql);

        if (!$res) {
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }

        return $res;
    }

    // ------------------ MÉTODOS DE CONSULTAS ------------------
    public function mostrarAlumnos(){
        try {
            $sql = "SELECT * FROM alumnos ORDER BY Num_Control";
            $resultado = mysqli_query($this->conexion->getConexion(), $sql);
            
            if (!$resultado) {
                throw new Exception("Error al ejecutar la consulta: " . mysqli_error($this->conexion->getConexion()));
            }
            
            return $resultado;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function consultarAlumno($numControl) {
        try {
            $sql = "SELECT * FROM alumnos WHERE Num_Control = '$numControl'";
            $resultado = mysqli_query($this->conexion->getConexion(), $sql);
            
            if (!$resultado) {
                throw new Exception("Error al ejecutar la consulta: " . mysqli_error($this->conexion->getConexion()));
            }
            
            if (mysqli_num_rows($resultado) > 0) {
                return mysqli_fetch_assoc($resultado);
            }
            
            return null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>