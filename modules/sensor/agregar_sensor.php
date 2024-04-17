<?php
require_once('../../config/conexion.php');
//Variables para validar los datos de la tabla
$num_serie_item = $_POST['num_serie'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado_item'];
$status_item = $_POST['status'];

$num_serie_sensor = $_POST['num_serie'];
$rango = $_POST['rango'];
$output = $_POST['output'];
$cert_enyca = $_POST['cert_enyca'];
$fecha_calibracion = $_POST['fecha_calibracion'];
$url_enyca = $_POST['url_enyca'];
$status_sensor = $_POST['status'];

$conexion->begin_transaction();

$sql_items = $conexion->prepare("INSERT INTO `items`(`num_serie`, `modelo`, `marca`, `descripcion`, `nombre`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql_items->bind_param("issssss", $num_serie_item, $modelo, $marca, $descripcion, $nombre, $estado, $status_item);
$sql_items->execute();

$sql_sensores = $conexion->prepare("INSERT INTO `sensores`(`num_serie`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql_sensores->bind_param("issssss", $num_serie_sensor, $rango, $output, $cert_enyca, $fecha_calibracion, $url_enyca, $status_sensor);
$sql_sensores->execute();

if($sql_items && $sql_sensores){
    $conexion->commit();
    //echo "Datos se Insertaron Correctamente.";
    header('Location: index.php');
}else{
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}

/*
$sql = "INSERT INTO `sensores`(`num_serie`, `rango`, `output`, `cert_enyca`, `fecha_calibracion`, `url_enyca`, `status`)VALUES('$num_serie','$rango','$output','$cert_enyca','$fecha_calibracion','$url_enyca','$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>