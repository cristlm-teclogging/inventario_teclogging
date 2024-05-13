<?php
error_reporting(1);
require_once('../../config/conexion.php');

$num_serie = $_POST['num_serie'];
$descripcion = $_POST['descripcion'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$rango = $_POST['rango'];
$output = $_POST['output'];
$certificado = $_POST['certificado'];
$fecha_calibracion = $_POST['fecha_calibracion'];
$url_cert = $_POST['url_cert'];
$status = $_POST['status'];
$id_item = $_POST['id_item'];

$sql = "UPDATE `item` SET `num_serie`='$num_serie', `descripcion`='$descripcion', `marca`='$marca', `modelo`='$modelo',`rango`='$rango', `output`='$output', `certificado`='$certificado', `fecha_calibracion`='$fecha_calibracion', `url_cert`='$url_cert', `status`='$status' WHERE `id_item` ='$id_item'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>