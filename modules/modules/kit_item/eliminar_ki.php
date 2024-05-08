<?php

require_once('../../config/conexion.php');
$id_kit=$_GET['id_kit'];

//eliminar registro de la tabla
$sql="DELETE FROM `relacion_kit_item` WHERE `id_kit` ='".$id_kit."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('index.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('index.php'); </script>";
}

?>