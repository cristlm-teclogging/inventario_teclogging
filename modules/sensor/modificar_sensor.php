<?php
error_reporting(1);
require_once('../../config/conexion.php');

$rango = $_POST['rango'];
$output = $_POST['output'];
$cert_enyca = $_POST['cert_enyca'];
$fecha_calibracion = $_POST['fecha_calibracion'];
$url_enyca = $_POST['url_enyca'];
$status = $_POST['status'];
$num_serie = $_POST['num_serie'];

$sql = "UPDATE `sensores` SET `rango`='$rango', `output`='$output', `cert_enyca`='$cert_enyca', `fecha_calibracion`='$fecha_calibracion', `url_enyca`='$url_enyca', `status`='$status' WHERE `num_serie` ='$num_serie'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>