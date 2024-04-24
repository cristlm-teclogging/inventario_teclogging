<?php 
require('../../config/conexion.php');
//variables para la tabla kit 
$num_kit = $_POST['num_kit'];
$id_kit = $_POST['id_kit'];
$ip = $_POST['ip'];
$tw = $_POST['tw'];
$status_kit = $_POST['status'];
//vaiables para la tabla antenas
$id_item = $_POST['id_item'];
$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$estado_item = $_POST['estado_item'];
$status_antena = $_POST['status'];

$conexion->begin_transaction();

$sql_kit = $conexion->prepare("INSERT INTO `kit`(`num_kit`, `id_kit`, `ip`, `tw`, `status`) VALUES (?, ?, ?, ?, ?)");
$sql_kit->bind_param("issss", $num_kit, $id_kit, $ip, $tw, $status_kit);
$sql_kit_executed = $sql_kit->execute();

$sql_antena = $conexion->prepare("INSERT INTO `antena`(`num_kit`, `id_item`, `num_plato`, `ns_modem`, `estado_item`, `status`) VALUES (?, ?, ?, ?, ?, ?)");
$sql_antena->bind_param("isssss", $num_kit, $id_item, $num_plato, $ns_modem, $estado_item, $status_antena);
$sql_antena_executed = $sql_antena->execute();

if($sql_kit_executed && $sql_antena_executed){
    $conexion->commit();
    header('Location: index.php');
} else {
    $conexion->rollback();
    echo "Error al insertar los datos.";
}

/*
$sql = "INSERT INTO `antena`(`num_kit`, `num_plato`, `ns_modem`, `status`)VALUES('$num_kit', '$num_plato', '$ns_modem', '$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>