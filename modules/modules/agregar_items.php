<?php
error_reporting(1);

require('../config/conexion.php');

// Variables de la tabla relacion_kit_item
$id_kit = $_POST['id_kit'];
$id_item = $_POST['id_item'];
$tipo_item = $_POST['tipo_item'];

$sql = "INSERT INTO `relacion_kit_item`(`id_kit`, `id_item`,`tipo_item`)VALUES('$id_kit', '$id_item', '$tipo_item')";

$resultado = $conexion -> query($sql);

if($resultado){
    header('Location: registrar_items.php');
}else{
    echo "No se insertaron los datos";
}
//consultas para verificar si los datos exiten y no
/*$sql_id_kit ="SELECT * FROM `relacion_kit_item` WHERE `id_kit` = '$id_kit'";
$result_id_kit = $conexion->query($sql_id_kit);

if($result_id_kit->num_rows> 0){
    echo "El id_kit ya esta registrado";
}else{
    $sql_insert = "INSERT INTO `relacion_kit_sensor`(`id_kit`, `id_item`,`tipo_item`)VALUES('$id_kit', '$id_item', '$tipo_item')";
    if($conexion->query($sql_insert) == TRUE){
        header('Location: ../../index.php');
    }else{
    echo "No se insertaron los datos";
    }
}*/

?>