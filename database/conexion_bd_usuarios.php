<?php

 class ConexionBDUsuarios{
    private $conexion;
    private $host = "localhost:3306";
    private $usuario = "laura";
    private $password = "laura";
    private $bd = "usuario_bd_escuela";

    public function __construct(){
        $this->conexion =  mysqli_connect($this->host, $this->usuario, $this->password, $this->bd);
        
        if(!$this->conexion)
           die("Error a conexión en la BD:" . mysqli_connect_error() );
    }

    public function getConexion(){
        return $this->conexion;
    }
}

?>