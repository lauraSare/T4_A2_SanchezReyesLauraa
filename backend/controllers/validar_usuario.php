<?php
$usuario = isset($_POST['name']) ? $_POST['name'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

//echo $usuario;
//echo $password;

// proceso de validación

// proceso de verificación de usuario y contraseña en la base de datos
include_once('../../database/conexion_bd_usuarios.php');

$con = new ConexionBDUsuarios();
$conexion = $con->getConexion();

//var_dump($conexion);

 if($conexion){

    
   // $sql = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$usuario' AND Password = '$password'";
    
   $u_cifrado = sha1($usuario);
   $p_cifrado = sha1($password);

    $sql = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$u_cifrado' AND Password = '$p_cifrado'";
    $res = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($res)==1){
        //echo "Usuario ENCONTRADO";
        session_start();

        //echo session_id();

        $_SESSION['Valida'] = true; 
        $_SESSION['usuario'] = $usuario;

        header('location: ../pages/menu_principal.php');
    }else{
        echo "NO ENCONTRADO";
    }

 }else
 echo "Error en la conexion";
 
?>