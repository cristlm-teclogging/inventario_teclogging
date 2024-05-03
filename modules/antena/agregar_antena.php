<?php 
require('../../config/conexion.php');
//vaiables para la tabla antenas

//$id_item = $_POST['id_item'];
$id_tipo_item = $_POST['id_tipo_item'];
$descripcion = $_POST['descripcion'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$estado_item = $_POST['estado_item'];
$status = $_POST['status'];

// Insertar en la tabla 'Items'
$sql_antena = $conexion->prepare("INSERT INTO `item`(`id_tipo_item`, `descripcion`, `marca`, `modelo`, `num_plato`, `ns_modem`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$sql_antena->bind_param("ssssssss", $id_tipo_item, $descripcion, $marca, $modelo, $num_plato, $ns_modem, $estado_item, $status);
$sql_antena_executed = $sql_antena->execute();

// Insertar en la tabla 'relacion_item_tipo_item'
$sql_rti = $conexion->prepare("INSERT INTO `relacion_item_tipo_item`(`id_tipo_item`) VALUES (?)");
$sql_rti->bind_param("s", $id_tipo_item);
$sql_rti_executed = $sql_rti->execute();

if ($sql_antena_executed && $sql_rti_executed) {
    $conexion->commit();
    header('Location: index.php');
} else {
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}

/*
$sql = "INSERT INTO `antena`(`id_item`,`id_tipo_item`,`num_antena`, `num_plato`, `ns_modem`, `estado_item`, `status`)VALUES('$id_item','$id_tipo_item', '$num_antena', '$num_plato', '$ns_modem', '$estado_item', '$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>