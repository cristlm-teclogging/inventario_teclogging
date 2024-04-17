<?php 
require('../../config/conexion.php');

$id_salida = $_POST['id_salida'];
$fecha_salida = $_POST['fecha_salida'];
$ubicacion = $_POST['ubicacion'];
$compañia = $_POST['compañia'];
$num_equipo = $_POST['num_equipo'];
$comentarios = $_POST['comentarios'];
$documentos_firmados = addslashes(file_get_contents($_FILES['documentos_firmados']['tmp_name'])); 

$sql = "INSERT INTO `salida`(`id_salida`, `fecha_salida`, `ubicacion`, `compañia`, `num_equipo`, `comentarios`, `documentos_firmados`)VALUES('$id_salida', '$fecha_salida', '$ubicacion', '$compañia', '$num_equipo', '$comentarios', '$documentos_firmados')";

$resultado = $conexion -> query($sql);

if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}
?>