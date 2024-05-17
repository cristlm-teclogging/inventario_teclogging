<?php

require_once('../../config/conexion.php');
$id_item=$_GET['id_item'];

//eliminar registro de la tabla
$sql="DELETE FROM `salida_item` WHERE `id_item`='".$id_item."'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('salidas_ki.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('salidas_ki.php'); </script>";
}

?>