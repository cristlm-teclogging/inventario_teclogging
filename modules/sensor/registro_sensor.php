<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$sql_item1 = "SELECT * FROM `tipo_item` WHERE tipo_item = 'sensor'";
$resultado_item1 = $conexion->query($sql_item1);

if ($resultado_item1->num_rows > 0) {
    // Obtener el primer resultado de la consulta
    $row = $resultado_item1->fetch_assoc();
    $valor_item = $row['id_tipo_item']; // Suponiendo que el valor que necesitas es 'id_item'

    // Puedes hacer algo con $valor_item aquí si es necesario
} else {
    $valor_item = "";
}
?>
 <?php

$sql_item0 =  "SELECT * FROM `marca`";
$resultado_item0 = $conexion->query($sql_item0);

$sql_item3 =  "SELECT * FROM `relacion_kit_item`";
$resultado_item3 = $conexion->query($sql_item3);

$sql_select3 =  "SELECT * FROM `status`";
$resultado_select3 = $conexion->query($sql_select3);

$sql_select2 =  "SELECT * FROM `estado_item`";
$resultado_select2 = $conexion->query($sql_select2);

$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Sensor</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_sensor.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="accordion" id="accordionSensor">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Registro de Sensor
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionSensor">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <!--div class="col-4 mt-2">
                                                <label for="id_item" class="form-label">Numero de Serie:</label>
                                                <input type="text" class="form-control" name="id_item" id="id_item"required>
                                            </div-->
                                            <div class="col-4 mt-2">
                                                <label for="id_tipo_item" class="form-label">Tipo de Item:</label>
                                                <input type="text" class="form-control" name="id_tipo_item" id="id_tipo_item" value="<?php echo $valor_item ?>" readonly>
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="descripcion" class="form-label">Descripcion:</label>
                                                <input type="text" class="form-control" name="descripcion" id="descripcion" required>                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <div class="form-group">
                                                    <label for="marca" class="form-label">Marca:</label>
                                                        <select name="marca" id="marca" class="form-select" required>
                                                            <option value="" selected disabled>Selecciona tu opción</option>
                                                            <?php 
                                                            while($row = $resultado_item0->fetch_assoc()){
                                                                ?>
                                                            <option value="<?php echo $row['id_marca']; ?>"><?php echo $row['nombre_marca']; ?></option>
                                                             <?php } ?>
                                                        </select>
                                                     </div>
                                                </div>
                                            <div class="col-4 mt-2">
                                                <label for="modelo" class="form-label">Modelo:</label>
                                                <input type="text" class="form-control" name="modelo" id="modelo" required>                                            
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="rango" class="form-label">Rango:</label>
                                                <input type="text" class="form-control" name="rango" id="rango" required>                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <label for="output" class="form-label">Output:</label> 
                                                <input type="text" class="form-control" name="output" id="output" required>                                                                                           
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="certificado" class="form-label">Certificado:</label>
                                                <input type="text" class="form-control" name="certificado" id="certificado" required>                                             
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="fecha_calibracion" class="form-label">Fecha Calibracion:</label>
                                                <input type="date" class="form-control" name="fecha_calibracion" id="fecha_calibracion" required>
                                            </div> 
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <label for="url_cerf" class="form-label">url certificado:</label>
                                                <input type="url" class="form-control" name="url_cert" id="url_cert" required>                                                                                            
                                            </div> 
                                            <div class="col-4 mt-2">
                                                <label for="estado_item" class="form-label">Estado Item</label>
                                                <select class="form-select" name="estado_item" id="estado_item"  required>
                                            <option value="" selected disabled>Selecciona tu opción</option>
                                                <?php 
                                                while($row = $resultado_select2->fetch_assoc()){
                                                ?>
                                            <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado_item']; ?></option>
                                                <?php } ?>
                                             </select>                                           
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-select" name="status" id="status"  required>
                                            <option value="" selected disabled>Selecciona tu opción</option>
                                                <?php 
                                                while($row = $resultado_select1->fetch_assoc()){
                                                ?>
                                            <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                                                <?php } ?>
                                             </select>                                           
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Registro de Item
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSensor">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <!--num_kit se agregar en el primer formulaio para la tabla dos"-->
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="col text-center form-group mt-4">
                                    <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                                     <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button> 
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                    </div>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>