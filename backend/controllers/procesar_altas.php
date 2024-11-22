<?php
include_once('controller_alumno.php');

 // 1. Obtener información de las cajas 

    $num_control = $_POST['caja_num_control'];

 //2. Validar 
    $datos_correctos = false;

if(isset($num_control) && !empty($num_control) && is_numeric($num_control)){
        $datos_correctos = true;

    }

 //3. (PENDIENTE) validar que no exista previamente

 //4. Enviarlo al controlador
 session_start();
    if($datos_correctos){
        $alumnoDAO = new AlumnoDAO();
        $res = $alumnoDAO->agregarAlumno($num_control);    
        if($res){
       // echo "REGISTRO AGREGADO CORRECTAMENTE!";

      $_SESSION['insercion_correcta'] = true
   }
    else{
    //  echo "MEJOR ME DEDICO A LAS REDES =(";
      $_SESSION['insercion_correcta']=true;
      header('Location:..pages/formulario_altas.php');
   }
   else{
      $_SESSION['error_validacion'] = true;

      $_SESSION['nc'] = $_POST['caja_num_control'];
      $_SESSION['nombre'] = $_POST['caja_nombre'];
      
      header('Location:../pages/formulario_altas.php');
   }

    }


 //5. Insertar en BD un OBJECTO DEL MODELO ALUMNO

?>