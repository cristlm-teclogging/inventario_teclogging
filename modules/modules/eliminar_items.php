<?php

require_once('../config/conexion.php');
$id_item=$_GET['id_item'];
$num_kit=$_GET['num_kit'];

//eliminar registro de la tabla
$sql_item1 = "SELECT * FROM `kit` WHERE num_kit = '$num_kit'";
$resultado_kit1 = $conexion->query($sql_item1);

$sql="DELETE FROM `relacion_kit_item` WHERE `id_item`='".$id_item."'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "<script> alert('Los datos se eliminaron correctamente'); 
    window.location.href = 'registrar_items.php?num_kit=$num_kit'; </script>";
}else{
    echo "<script> alert('Los datos NO se eliminaron'); 
    window.location.href = 'registrar_items.php?num_kit=$num_kit'; </script>";
}

?>