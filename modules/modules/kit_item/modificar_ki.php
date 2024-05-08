<?php
error_reporting(1);
require_once('../../config/conexion.php');

$id_kit = $_POST['id_kit'];
$id_item = $_POST['id_item'];
$tipo_item = $_POST['tipo_item'];

$sql = "UPDATE `relacion_kit_item` SET `id_kit`='$id_kit', `id_item`='$id_item' WHERE `id_kit` ='$id_kit'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>