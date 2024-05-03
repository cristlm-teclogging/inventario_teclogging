<?php
require ('../config/conexion.php');

$num_kit = $_POST['num_kit'];
$id_kit = $_POST['id_kit'];
$ip = $_POST['ip'];
$tw = $_POST['tw'];
$status = $_POST['status'];

//consultas para verificar si los datos exiten y no
$sql_num_kit ="SELECT * FROM `kit` WHERE `num_kit` = '$num_kit'";
$result_num_kit = $conexion->query($sql_num_kit);

$sql_ip = "SELECT * FROM `kit` WHERE `ip` = '$ip'";
$result_ip = $conexion->query($sql_ip);

if($result_num_kit->num_rows> 0){
    echo "El num_kit ya estsa registrado";
}elseif ($result_ip->num_rows > 0){
    echo "El ip ya esta registrado.";
}else{
    $sql_insert = "INSERT INTO `kit`(`num_kit`, `id_kit`, `ip`, `tw`, `status`)VALUES('$num_kit', '$id_kit', '$ip', '$tw', '$status')";
    if($conexion->query($sql_insert) === TRUE){
        header('Location: ../../index.php');
    }else{
    echo "No se insertaron los datos";
    }
}

/*
$sql = "INSERT INTO `kit`(`num_kit`, `ip`, `tw`, `status`)VALUES('$num_kit', '$ip', '$tw', '$status')";

$resultado = $conexion -> query($sql);
//condicones de la tabla kit
if($resultado){
    header('Location: ../index.php');
}else{
    echo "No se insertaron los datos";
}
*/
?>