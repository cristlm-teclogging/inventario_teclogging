<?php
error_reporting(1);

require_once('../../config/conexion.php');

$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$nombre =$_POST['nombre'];
$estado_item =$_POST['estado_item'];
$status = $_POST['status'];
$num_serie = $_POST['num_serie'];


$sql = "UPDATE`items` SET `modelo`='$modelo',`marca`='$marca', `descripcion`='$descripcion', `nombre`='$nombre', `estado_item`='$estado_item',`status`='$status' WHERE `num_serie` ='$num_serie'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>