<?php 
require('../../config/conexion.php');

$id_compañia = $_POST['id_compañia'];
$nombre_compañia = $_POST['nombre_compañia'];
$rfc = $_POST['rfc'];
$contacto =  $_POST['contacto'];
$telefono = $_POST['telefono'];
$correo_compañia = $_POST['correo_compañia'];
$url_img = $_POST['url_img'];

//consultas para verficar si los datos exiten
$sql_id_compañia ="SELECT * FROM `compañia` WHERE `id_compañia` = '$id_compañia'";
$result_id_compañia = $conexion->query($sql_id_compañia);

$sql_rfc ="SELECT * FROM `compañia` WHERE `rfc` = '$rfc'";
$result_rfc = $conexion->query($sql_rfc);

if($result_id_compañia->num_rows > 0){
    echo "El id_ip ya está registrado.";
} elseif ($result_rf->num_rows > 0) {
    echo "El num_kit ya está registrado.";
} else {
    // Si tanto el id_ip como el num_kit no están duplicados, intenta insertar el nuevo registro
    $sql_insert = "INSERT INTO `compañia`(`id_compañia`,`nombre_compañia`, `rfc`, `contacto`, `telefono`, `correo_compañia`, `url_img`)VALUES('$id_compañia','$nombre_compañia', '$rfc', '$contacto', '$telefono', '$correo_compañia', '$url_img')";
    if($conexion->query($sql_insert) === TRUE){
       // echo "Registro insertado correctamente.";
       header('Location: index.php');
    } else {
        // Si hay un error al insertar el registro, mostrar mensaje de error
        //echo "Error al insertar el registro.";
        echo "No se insertaron los datos";

    }
}


/*
$sql = "INSERT INTO `compañia`(`id_compañia`,`nombre_compañia`, `rfc`, `contacto`, `telefono`, `correo_compañia`, `url_img`)VALUES('$id_compañia','$nombre_compañia', '$rfc', '$contacto', '$telefono', '$correo_compañia', '$url_img')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>