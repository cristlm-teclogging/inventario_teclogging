<?php

require_once('../../config/conexion.php');
$id_salida=$_GET['id_salida'];

//eliminar registro de la tabla
$sql="DELETE FROM `salida` WHERE id_salida ='".$id_salida."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('index.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('index.php'); </script>";
}

?>