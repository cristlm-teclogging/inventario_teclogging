<?php

require_once('../../config/conexion.php');
$id_entrada=$_GET['id_entrada'];

//eliminar registro de la tabla
$sql="DELETE FROM `entrada` WHERE id_entrada ='".$id_entrada."'";
$resultado=mysqli_query($conexion,$sql);


if($resultado){
    echo "<script lenguaje='JavaScript'> alert('los datos se eliminaron correctamente'); 
    location.assign('index.php'); </script>";
}else{
  echo "<script lenguaje='JavaScript'> alert('los datos NO se eliminaron'); 
  location.assign('index.php'); </script>";
}

?>