<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('menu_principal.php'); 
    ?>


<h3>Listado de ALUMNOS</h3>
<?php
  
  include_once('../controllers/controller_alumno.php');
  $alumnoDAO = new AlumnoDAO();
  $datos = $alumnoDAO->mostrarAlumnos('x');
  //var_dump($datos);
  if(mysqli_num_rows($datos)>0){
    echo'<table>';
    echo '<thead> 
            <tr>
               <th>Num_Control</th>
               <th> Nombre </th>
               <th> Primer_Ap </th>
               <th> Segundo_Ap </th>
               <th> Edad </th>
               <th> Semestre </th>
               <th> Carrera </th>
            </tr>
            </thead>';  
            
            // while($fila = mysqli_fetch_array($datos)){}
            while($fila = mysqli_fetch_assoc($datos)){
               printf(
                "<tr> <td>".$fila['Num_Control']." </td>
                <td>".$fila['Nombre']." </td> 
                <td>".$fila['Primer_Ap']." </td> 
                <td>".$fila['Segundo_Ap']." </td> 
                <td>".$fila['Edad']." </td>
                <td>".$fila['Semestre']." </td> 
                <td>".$fila['Carrera']." </td> 
                <td>  
                    <a href=''> Detalle </a>
                    <a href=''> Editar </a>
<a href='../controllers/procesar_bajas.php?nc=%s'> Eliminar </a>
                </td>"
                ,$fila['Num_Control']);
            }

            echo '</table>';
                
  }else
  echo "TABLA VACÍA";

?>


</body>
</html>