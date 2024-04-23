<?php
error_reporting(1);
require_once('../../config/conexion.php');

$dic_ip = $_POST['direccion_ip'];
$num_kit = $_POST['num_kit'];
$id_ip = $_POST['id_ip'];


$sql = "UPDATE `ip` SET `direccion_ip`='$dic_ip', `num_kit`='$num_kit' WHERE `id_ip` ='$id_ip'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>