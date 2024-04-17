<?php
error_reporting(1);

require_once('../../config/conexion.php');

$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$status = $_POST['status'];
$num_kit = $_POST['num_kit'];

$sql = "UPDATE `antena` SET `num_plato`='$num_plato',`ns_modem`='$ns_modem', `status`='$status' WHERE `num_kit` ='$num_kit'";

$resultado = $conexion->query($sql);

header("Location: index.php");
?>