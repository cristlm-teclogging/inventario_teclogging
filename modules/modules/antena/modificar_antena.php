<?php
error_reporting(1);

require_once('../../config/conexion.php');

$id_item = $_POST['id_item'];
$id_tipo_item = $_POST['id_tipo_item'];
$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$estado_item = $_POST['estado_item'];
$status = $_POST['status'];
//variable num antena para antualizar
$num_antena = $_POST ['num_antena'];

$sql = "UPDATE `antena` SET `id_item`='$id_item', `id_tipo_item`='$id_tipo_item', `num_plato`='$num_plato',`ns_modem`='$ns_modem', `status`='$status' WHERE `num_antena` ='$num_antena'";

$resultado = $conexion->query($sql);

header("Location: index.php");
?>