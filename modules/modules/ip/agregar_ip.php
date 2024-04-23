<?php
require_once('../../config/conexion.php');

$id_ip = $_POST['id_ip'];
$dic_ip = $_POST['direccion_ip'];
$num_kit = $_POST['num_kit'];

//consultas para verificar si los datos exitan
$sql_id_ip ="SELECT * FROM `ip` WHERE `id_ip` = '$id_ip'";
$result_id_ip = $conexion->query($sql_id_ip);

$sql_num_kit ="SELECT * FROM `ip` WHERE `num_kit` = '$num_kit'";
$result_num_kit = $conexion->query($sql_num_kit);

if($result_id_ip->num_rows > 0){
    echo "El id_ip ya está registrado.";
} elseif ($result_num_kit->num_rows > 0) {
    echo "El num_kit ya está registrado.";
} else {
    // Si tanto el id_ip como el num_kit no están duplicados, intenta insertar el nuevo registro
    $sql_insert = "INSERT INTO `ip`(`id_ip`, `direccion_ip`, `num_kit`) VALUES ('$id_ip', '$dic_ip', '$num_kit')";
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
$sql = "INSERT INTO `ip`(`id_ip`, `direccion_ip`, `num_kit`)VALUES('$id_ip', '$dic_ip', '$num_kit')";
$resultado = $conexion -> query($sql);

if($resultado){
    header('Location: index.php');
}else{
    echo "No se insertaron los datos";
}*/
?>