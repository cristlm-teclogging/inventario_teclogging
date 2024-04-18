<?php
error_reporting(1);

require_once('../../config/conexion.php');

$fecha_entrada = $_POST['fecha_entrada'];
$dias_trabajados = $_POST['dias_trabajados'];
$documentos_firmados = addslashes(file_get_contents($_FILES['documentos_firmados']['tmp_name'])); 
$id_entrada = $_POST['id_entrada'];

$sql = "UPDATE`entrada` SET `fecha_entrada`='$fecha_entrada',`dias_trabajados`='$dias_trabajados', `documentos_firmados`='$documentos_firmados' WHERE `id_entrada` ='$id_entrada'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>