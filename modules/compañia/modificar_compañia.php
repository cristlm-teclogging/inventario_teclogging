<?php
error_reporting(1);

require_once('../../config/conexion.php');

$nombre_compañia = $_POST['nombre_compañia'];
$rfc = $_POST['rfc'];
$contacto =  $_POST['contacto'];
$telefono = $_POST['telefono'];
$correo_compañia = $_POST['correo_compañia'];
$url_img = $_POST['url_img'];
$id_compañia = $_POST['id_compañia'];

$sql = "UPDATE`compañia` SET `nombre_compañia`='$nombre_compañia',`rfc`='$rfc', `contacto`='$contacto', `correo_compañia`='$correo_compañia', `url_compañia`='$url_compañia' WHERE `id_compañia` ='$id_compañia'";
$resultado = $conexion->query($sql);

header("Location: index.php");
?>