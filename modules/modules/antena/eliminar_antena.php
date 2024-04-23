<?php

require_once('../../config/conexion.php');
$num_kit=$_GET['num_kit'];

//eliminar registro de la tabla
$sql="DELETE FROM `antena` WHERE num_kit ='".$num_kit."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('index.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('index.php'); </script>";
}

?>