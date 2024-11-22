<?php
include_once('../../database/conexion_bd_escuela.php');

class AlumnoDAO {
    private $conexion;

    public function __construct(){
        $this->conexion = new ConexionBDEscuela();
    }

                            // ======================== MÉTODOS ABCC (CRUD) ========================

    // ------------------ MÉTODO DE ALTAS ------------------
    public function agregarAlumno($num_control, $nombre, $primerApellido, $segundoApellido, $edad, $semestre, $carrera) {
        $num_control = mysqli_real_escape_string($this->conexion->getConexion(), $num_control);
        $nombre = mysqli_real_escape_string($this->conexion->getConexion(), $nombre);
        $primerApellido = mysqli_real_escape_string($this->conexion->getConexion(), $primerApellido);
        $segundoApellido = mysqli_real_escape_string($this->conexion->getConexion(), $segundoApellido);
        $edad = (int)$edad; 
        $semestre = (int)$semestre;
        $carrera = mysqli_real_escape_string($this->conexion->getConexion(), $carrera);

        $sql = "INSERT INTO alumnos (Num_Control, Nombre, Primer_Ap, Segundo_Ap, Edad, Semestre, Carrera) 
                VALUES ('$num_control', '$nombre', '$primerApellido', '$segundoApellido', $edad, $semestre, '$carrera')";
        
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
    // ------------------ MÉTODO EXISTE ALUMNO ------------------
    
    public function existeAlumno($num_control) {
        $num_control = mysqli_real_escape_string($this->conexion->getConexion(), $num_control);
        $sql = "SELECT * FROM alumnos WHERE Num_Control = '$num_control'";
        $resultado = mysqli_query($this->conexion->getConexion(), $sql);
        
        if (!$resultado) {
            echo "Error al ejecutar la consulta: " . mysqli_error($this->conexion->getConexion());
            return false;
        }
        
        return mysqli_num_rows($resultado) > 0; // Si ya existe, retorna true
    }
    
}
?>