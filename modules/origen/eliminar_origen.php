<?php

require_once('../../config/conexion.php');
$id_origen=$_GET['id_origen'];

//eliminar registro de la tabla
$sql="DELETE FROM `origen` WHERE id_origen ='".$id_origen."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('registro_origen.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('registro.php'); </script>";
}

?>