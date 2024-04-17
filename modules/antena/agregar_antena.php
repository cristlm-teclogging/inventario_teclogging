<?php 
require('../../config/conexion.php');

$num_kit = $_POST['num_kit'];
$ip = $_POST['ip'];
$tw = $_POST['tw'];
$status = $_POST['status'];

$num_kit = $_POST['num_kit'];
$num_plato = $_POST['num_plato'];
$ns_modem = $_POST['ns_modem'];
$status = $_POST['status'];


$conexion->begin_transaction();

$sql_kit = $conexion->prepare("INSERT INTO `kit`(`num_kit`, `ip`, `tw`, `status`) VALUES (?, ?, ?, ?)");
$sql_kit->bind_param("issssss", $num_kit, $ip, $tw, $status_kit);
$sql_kit->execute();

$sql_antena = $conexion->prepare("INSERT INTO `antena`(`num_serie`, `num_plato`, `ns_modem` `status`) VALUES (?, ?, ?, ?)");
$sql_antena->bind_param("issssss", $num_skit_antena, $num_plato, $ns_modem, $status_antena);
$sql_antena->execute();

if($sql_kit && $sql_antena){
    $conexion->commit();
    //echo "Datos se Insertaron Correctamente.";
    header('Location: index.php');
}else{
    $conexion->rollback();
    echo "Error: " . $conexion->error;
}

/*
//consultas para verificar si los datos exitan
$sql_num_kit ="SELECT * FROM `antena` WHERE `num_kit` = '$num_kit'";
$result_num_kit = $conexion->query($sql_num_kit);

$sql_ns_modem ="SELECT * FROM `antena` WHERE `ns_modem` = '$ns_modem'";
$result_ns_modem = $conexion->query($sql_ns_modem);

if($result_num_kit->num_rows > 0){
    echo "El Numero de kit ya está registrado.";
} elseif ($result_ns_modem->num_rows > 0) {
    echo "El numero de serie del modem ya está registrado.";
} else {
    $sql_insert = "INSERT INTO `antena`(`num_kit`, `num_plato`, `ns_modem`, `status`)VALUES('$num_kit', '$num_plato', '$ns_modem', '$status')";
    if($conexion->query($sql_insert) === TRUE){
       // echo "Registro insertado correctamente.";
       header('Location: index.php');
    } else {
        //echo "Error al insertar el registro.";
        echo "No se insertaron los datos";

    }
}
/*

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