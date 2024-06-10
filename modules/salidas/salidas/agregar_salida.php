<?php 
require('../../config/conexion.php');

$id_salida = $_POST['id_salida'];
$id_kit = $_POST['id_kit'];
$id_item = $_POST['id_item'];
$fecha_salida = $_POST['fecha_salida'];
$ubicacion = $_POST['ubicacion'];
$compañia = $_POST['compañia'];
$comentarios = $_POST['comentarios'];
//$documentos_firmados = addslashes(file_get_contents($_FILES['documentos_firmados']['tmp_name'])); 

$sql = "INSERT INTO `salida`(`id_salida`,`id_kit`, `id_item`,`fecha_salida`, `ubicacion`, `compañia`, `comentarios`)VALUES('$id_kit', '$id_kit', '$id_item', '$fecha_salida', '$ubicacion', '$compañia', '$comentarios')";

$resultado = $conexion -> query($sql);

if($resultado){
    header('Location: registro_salida.php?id_item=' . $id_item);
}else{
    echo "No se insertaron los datos";
}
?>