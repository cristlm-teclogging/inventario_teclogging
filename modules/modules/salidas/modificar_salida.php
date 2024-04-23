<?php 
error_reporting(1);

require('../../config/conexion.php');

$fecha_salida = $_POST['fecha_salida'];
$ubicacion = $_POST['ubicacion'];
$compañia = $_POST['compañia'];
$num_equipo = $_POST['num_equipo'];
$comentarios = $_POST['comentarios'];
$documentos_firmados = addslashes(file_get_contents($_FILES['documentos_firmados']['tmp_name'])); 
$id_salida = $_POST['id_salida'];

$sql = "UPDATE`salida` SET `fecha_salida`='$fecha_salida',`ubicacion`='$ubicacion', `compañia`='$compañia', `num_equipo`='$num_equipo', `comentarios`='$comentarios',`documentos_firmados`='$documentos_firmados' WHERE `id_salida` ='$id_salida'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>