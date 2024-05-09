<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$id_item= $_GET['id_item'];

$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);

$sql = "SELECT * FROM `item` WHERE `id_item` ='$id_item'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Sensor</h4>
            </div>
            <div class="card-body">
                <form action="./modificar_sensor.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4 mt-3">
                        <label for="id_item" class="form-label">id_ item:</label>
                        <input type="text" class="form-control" name="id_item" id="id_item" value="<?php echo $row['id_item']?>"readonly>
                    </div>
                    <div class="col-4 mt-3">
                        <label for="num_serie" class="form-label">Num_serie:</label>
                        <input type="text" class="form-control" name="num_serie" id="num_serie" value="<?php echo $row['num_serie']?>">
                    </div>

                    <div class="col-4 mt-3">
                        <label for="rango" class="form-label">Rango:</label>
                        <input type="text" class="form-control" name="rango" id="rango" value="<?php echo $row['rango']?>">
                    </div>

                    </div>
                    <div class="row">
                    <div class="col-4 mt-3">
                        <label for="output" class="form-label">Output:</label>
                        <input type="text" class="form-control" name="output" id="output" value="<?php echo $row['output']?>">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="certificado" class="form-label">Certificado:</label>
                        <input type="text" class="form-control" name="certificado" id="certificado" value="<?php echo $row['certificado']?>">
                    </div>

                    <div class="col-4 mt-3">
                        <label for="fecha_calibracion" class="form-label">Fecha Calibracion:</label>
                        <input type="date" class="form-control" name="fecha_calibracion" id="fecha_calibracion" value="<?php echo $row['fecha_calibracion']?>">
                    </div>

                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="url_cert" class="form-label">url certificado:</label>
                            <input type="text" class="form-control" name="url_cert" id="url_cert" value="<?php echo $row['url_cert']?>">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status" value="<?php echo $row['status']?>">
                                <option value="0" selected>Selecciona tu opción</option>
                                <?php 
                            while($row = $resultado_select1->fetch_assoc()){
                                 ?>
                                <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                                 <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-4">
                            <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button> 
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>