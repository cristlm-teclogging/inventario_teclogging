<?php
error_reporting(1);

require_once('../config/conexion.php');

// Variables de la tabla relacion_kit_item
$id_item = $_POST['id_item'];
$tpo_item = $_POST['tipo_item'];

// Variables de la tabla kit
$id_kit = $_POST['id_kit'];
$ip = $_POST['ip'];
$tw = $_POST['tw'];
$status = $_POST['status'];
$num_kit = $_POST['num_kit'];

$conexion->begin_transaction();

$sql_item = $conexion->prepare("INSERT INTO `relacion_kit_item`(`id_kit`, `id_item`, `tipo_item`) VALUES (?, ?, ?)");
$sql_item->bind_param("iss", $id_kit, $id_item, $tpo_item);
$sql_item_executed = $sql_item->execute();

$sql_actualizacion_kit = $conexion->prepare("UPDATE `kit` SET `id_kit` = ?, `ip` = ?, `tw` = ? WHERE `num_kit` = ?");
$sql_actualizacion_kit->bind_param("sssi", $id_kit, $ip, $tw, $num_kit);
$sql_kit_actualizada = $sql_actualizacion_kit->execute();

if ($sql_item_executed && $sql_kit_actualizada) {
    $conexion->commit();
    header('Location: ../index.php');
    exit; // Termina el script después de redirigir
} else {
    $conexion->rollback();
    echo "Error al insertar los datos.";
}

/*
$sql = "UPDATE `kit` SET `ip`='$ip',`tw`='$tw',`status`='$status' WHERE `num_kit` ='$num_kit'";
$resultado = $conexion->query($sql);

header("Location: ../index.php");
//actualiar kit y mandarlo al index
*/
?>