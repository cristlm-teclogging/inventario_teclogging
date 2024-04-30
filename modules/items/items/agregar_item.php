<?php
require '../../config/conexion.php';

$num_serie = $_POST['num_serie'];
$id_item = $_POST['id_item'];
$id_tipo_item = $_POST['id_tipo_item'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$estado_item = $_POST['estado_item'];
$status = $_POST['status'];

$conexion->begin_transaction();

// Insertar en la tabla 'Items'
$sql_items = $conexion->prepare("INSERT INTO `items`(`num_serie`, `id_item`, `id_tipo_item`, `modelo`, `marca`, `descripcion`, `nombre`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql_items->bind_param("sssssssss", $num_serie, $id_item, $id_tipo_item, $modelo, $marca, $descripcion, $nombre, $estado_item, $status);
$sql_items_executed = $sql_items->execute();

// Insertar en la tabla 'relacion_item_tipo_item'
$sql_rti = $conexion->prepare("INSERT INTO `relacion_item_tipo_item`(`id_item`, `id_tipo_item`) VALUES (?, ?)");
$sql_rti->bind_param("ss", $id_item, $id_tipo_item);
$sql_rti_executed = $sql_rti->execute();

if ($sql_items_executed && $sql_rti_executed) {
    $conexion->commit();
    header('Location: index.php');
} else {
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}

/*
$sql_num_serie ="SELECT * FROM `items` WHERE `num_serie` = '$num_serie'";
$result_num_serie = $conexion->query($sql_num_serie);

if($result_num_serie->num_rows> 0){
    echo "El numero de serie ya esta registre.";
    }else{
        $sql_imsert = "INSERT INTO `items`(`num_serie`, `modelo`, `marca`, `descripcion`, `nombre`, `estado_item`, `status`)VALUES('$num_serie', '$modelo', '$marca', '$descripcion', '$nombre', '$estado', '$status')";
        if($conexion->query($sql_insert) == TRUE){
        header('location: index.php');
    }else{
        echo "No se insertaron los datos";
    }
}
*/
/*
$sql ="INSERT INTO `items`(`num_serie`,`id_item`,`id_tipo_item`, `modelo`, `marca`, `descripcion`, `nombre`, `estado_item`, `status`)VALUES('$num_serie', '$id_item', '$id_tipo_item','$modelo','$marca','$descripcion','$nombre','$estado_item','$status')";


$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>
