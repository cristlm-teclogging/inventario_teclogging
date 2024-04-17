<?php
error_reporting(1);

require_once('../config/conexion.php');

$ip = $_POST['ip'];
$tw = $_POST['tw'];
$status = $_POST['status'];
$num_kit = $_POST['num_kit'];

$sql = "UPDATE `kit` SET `ip`='$ip',`tw`='$tw',`status`='$status' WHERE `num_kit` ='$num_kit'";
$resultado = $conexion->query($sql);

header("Location: ../index.php");
//actualiar kit y mandarlo al index

?>