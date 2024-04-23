<?php

require_once('../../config/conexion.php');
$id_ip=$_GET['id_ip'];

//eliminar registro de la tabla
$sql="DELETE FROM `ip` WHERE `id_ip` ='".$id_ip."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('index.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('index.php'); </script>";
}

?>