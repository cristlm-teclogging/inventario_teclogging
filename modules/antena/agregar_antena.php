<?php 
require('../../config/conexion.php');
//variables para la tabla kit 
$num_kit = $_POST['num_kit'];
$ip = $_POST['ip'];
$tw = $_POST['tw'];
$status_kit = $_POST['status'];

$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$status_antena = $_POST['status'];

$conexion->begin_transaction();

$sql_kit = $conexion->prepare("INSERT INTO `kit`(`num_kit`, `ip`, `tw`, `status`) VALUES (?, ?, ?, ?)");
$sql_kit->bind_param("isss", $num_kit, $ip, $tw, $status_kit);
$sql_kit_executed = $sql_kit->execute();

$sql_antena = $conexion->prepare("INSERT INTO `antena`(`num_kit`, `num_plato`, `ns_modem`, `status`) VALUES (?, ?, ?,?)");
$sql_antena->bind_param("isss", $num_kit, $num_plato, $ns_modem, $status_antena);
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