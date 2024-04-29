<?php 
require('../../config/conexion.php');
//vaiables para la tabla antenas

$id_item = $_POST['id_item'];
$id_tipo_item = $_POST['id_tipo_item'];
$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$estado_item = $_POST['estado_item'];
$status = $_POST['status'];
$num_antena = $_POST ['num_antena'];

$sql = "INSERT INTO `antena`(`id_item`,`id_tipo_item`,`num_antena`, `num_plato`, `ns_modem`, `estado_item`, `status`)VALUES('$id_item','$id_tipo_item', '$num_antena', '$num_plato', '$ns_modem', '$estado_item', '$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}
?>