<?php
error_reporting(1);

require_once('../../config/conexion.php');

$num_serie = $_POST ['num_serie'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$estado_item =$_POST['estado_item'];
$status = $_POST['status'];
$fecha_calibracion = $_POST['fecha_calibracion'];
$id_item = $_POST ['id_item'];

$sql = "UPDATE`item` SET `num_serie`='$num_serie',`descripcion`='$descripcion', `modelo`='$modelo',`marca`='$marca', `estado_item`='$estado_item',`status`='$status', `fecha_calibracion`='$fecha_calibracion' WHERE `id_item` ='$id_item'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>