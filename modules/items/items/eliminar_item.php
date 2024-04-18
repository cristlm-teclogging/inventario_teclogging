<?php

require_once('../../config/conexion.php');
$num_serie=$_GET['num_serie'];

//eliminar registro de la tabla
$sql="DELETE FROM `items` WHERE num_serie ='".$num_serie."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('index.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('index.php'); </script>";
}

?>