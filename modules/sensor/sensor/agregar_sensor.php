<?php
require_once('../../config/conexion.php');
//Variables para validar los datos de la tabla
$num_serie = $_POST['num_serie'];
$id_item = $_POST['id_item'];
$id_tipo_item = $_POST['id_tipo_item'];
$rango = $_POST['rango'];
$output = $_POST['output'];
$cert_enyca = $_POST['cert_enyca'];
$fecha_calibracion = $_POST['fecha_calibracion'];
$url_enyca = $_POST['url_enyca'];
$estado_item = $_POST['estado_item'];
$status = $_POST['status'];

$conexion->begin_transaction();

// Insertar en la tabla 'sensores'
$sql_sensores = $conexion->prepare("INSERT INTO `sensores`(`num_serie`, `id_item`, `id_tipo_item`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql_sensores->bind_param("ssssssssss", $num_serie, $id_item, $id_tipo_item, $rango, $output, $cert_enyca, $fecha_calibracion, $url_enyca, $estado_item, $status);
$sql_sensores_executed = $sql_sensores->execute();

// Insertar en la tabla 'relacion_item_tipo_item'
$sql_rti = $conexion->prepare("INSERT INTO `relacion_item_tipo_item`(`id_item`, `id_tipo_item`) VALUES (?, ?)");
$sql_rti->bind_param("ss", $id_item, $id_tipo_item);
$sql_rti_executed = $sql_rti->execute();

if ($sql_sensores_executed && $sql_rti_executed) {
    $conexion->commit();
    header('Location: index.php');
} else {
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}


/*
$sql = "INSERT INTO `sensores`(`num_serie`, `id_item`,`id_tipo_item`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `estado_item`, `status`)VALUES('$num_serie', '$id_item', '$id_tipo_item','$rango','$output','$cert_enyca','$fecha_calibracion','$url_enyca', '$estado_item','$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}
*/

?>