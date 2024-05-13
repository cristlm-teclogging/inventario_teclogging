<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$sql_item1 = "SELECT * FROM `tipo_item` WHERE tipo_item = 'antena'";
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

$sql_antena1 =  "SELECT * FROM `kit`";
$resultado_antena1 = $conexion->query($sql_antena1);

$sql_item1 =  "SELECT * FROM `marca`";
$resultado_item1 = $conexion->query($sql_item1);

$sql_item2 =  "SELECT * FROM `estado_item`";
$resultado_item2 = $conexion->query($sql_item2);

$sql_select1 =  "SELECT * FROM `marca`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_select2 =  "SELECT * FROM `status`";
$resultado_select2 = $conexion->query($sql_select2);

$sql_select3 =  "SELECT * FROM `estado_item`";
$resultado_select3 = $conexion->query($sql_select3);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Registro de Antenas</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_antena.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="accordion" id="accordionAntena">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Registro de Antena
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionSensor">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <label for="id_tipo_item" class="form-label">Tipo de Item:</label>
                                                <input type="text" class="form-control" name="id_tipo_item" id="id_tipo_item" value="<?php echo $valor_item ?>" readonly>
                                            </div>
                                        <div class="col-4 mt-2">
                                                <label for="num_serie" class="form-label">Numero de Serie:</label>
                                                <input type="text" class="form-control" name="num_serie" id="num_serie" required>
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="descripcion" class="form-label">Descripcion:</label>
                                                <input type="text" class="form-control" name="descripcion" id="descripcion" required>                                            
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <div class="form-group">
                                                <label for="marca" class="form-label">Marca</label>
                                                     <select class="form-select" name="marca" id="marca">
                                                             <option value="0" selected>Selecciona tu opción</option>
                                                                <?php 
                                                                    while($row_select1 = $resultado_select1->fetch_assoc()){
                                                                  ?>
                                                             <option value="<?php echo $row_select1['id_marca']; ?>"><?php echo $row_select1['nombre_marca']; ?></option>
                                                             <?php } ?>
                                                     </select>
                                                     </div>
                                                </div>

                                            <div class="col-4 mt-2">
                                                <label for="modelo" class="form-label">Modelo:</label>
                                                <input type="text" class="form-control" name="modelo" id="modelo" required>
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="num_plato" class="form-label">Numero de plato:</label>
                                                <input type="text" class="form-control" name="num_plato" id="num_plato" required>  
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <label for="ns_modem" class="form-label">Numero serie del Modem:</label>
                                                <input type="text" class="form-control" name="ns_modem" id="ns_modem" required>  
                                            </div>
                                        <div class="col-4 mt-2">
                                            <label for="status" class="form-label">Estado del item</label>
                                                <select class="form-select" name="marca" id="marca">
                                                    <option value="0" selected>Selecciona tu opción</option>
                                                        <?php 
                                                        while($row_select = $resultado_select2->fetch_assoc()){
                                                        ?>
                                                    <option value="<?php echo $row_select2['id_marca']; ?>"><?php echo $row_select2['nombre_marca']; ?></option>
                                                        <?php } ?>
                                                </select>    
                                            </div>
                                            <div class="col-4 mt-2">
                                             <label for="status" class="form-label">Status</label>
                                                <select class="form-select" name="marca" id="marca">
                                                     <option value="0" selected>Selecciona tu opción</option>
                                                            <?php 
                                                        while($row_select1 = $resultado_select1->fetch_assoc()){
                                                            ?>
                                                     <option value="<?php echo $row_select1['id_marca']; ?>"><?php echo $row_select1['nombre_marca']; ?></option>
                                                            <?php } ?>
                                                </select>                                         
                                             </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Registro Kit
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSensor">
                                    <div class="accordion-body">
                                        <div class="row">
                    
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center form-group mt-2">
                            <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                            <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button> 
                        </div>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>
</div>