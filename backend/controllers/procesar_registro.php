<?php
include_once('../../database/conexion_bd_usuarios.php');

if (isset($_POST['name']) && isset($_POST['password'])) {
    $usuario = $_POST['name'];
    $password = $_POST['password'];

    // Cifrar el usuario y contraseña
    $u_cifrado = sha1($usuario);
    $p_cifrado = sha1($password);

    $con = new ConexionBDUsuarios();
    $conexion = $con->getConexion();

    if ($conexion) {
        $sql = "INSERT INTO usuarios (Nombre_Usuario, Password) VALUES ('$u_cifrado', '$p_cifrado')";
        if (mysqli_query($conexion, $sql)) {
            echo "<script>
                    alert('Registro exitoso. ¡Bienvenido!');
                    window.location.href = '../pages/login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Hubo un error al registrar el usuario. Intenta de nuevo.');
                    window.location.href = '../pages/registro.php';
                  </script>";
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    echo "Datos incompletos.";
}
?>
