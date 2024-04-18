<?php include "../header.php"; ?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$sql_antena1 =  "SELECT * FROM `kit`";
$resultado_antena1 = $conexion->query($sql_antena1);

$sql_select0 =  "SELECT * FROM `antena`";
$resultado_select0 = $conexion->query($sql_select0);

$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_select2 =  "SELECT * FROM `status`";
$resultado_select2 = $conexion->query($sql_select2);
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
                                        Registro de Kit
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionSensor">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <label for="num_kit" class="form-label">Numero de kit:</label>
                                                <input type="text" class="form-control" name="num_kit" id="num_kit" required> 
                                            </div>
                                            <!--div class="col-4 mt-2">
                                            <label for="num_kit" class="form-label">Numero de kit</label>
                                                <select  class="form-select" name="num_kit" id="num_kit" required>
                                                    <option value="0" selected>Selecciona tu opción</option>  
                                                         <!-?php 
                                                    while($row = $resultado_antena1->fetch_assoc()){
                                                             ?>
                                                    <option value="<!-?php echo $row['num_kit']; ?>"><!-?php echo $row['num_kit']; ?></option>
                                                        <!-?php } ?>
                                                </select>
                                            </div-->
                                            <div class="col-4 mt-2">
                                                <label for="ip" class="form-label">IP:</label>
                                                <input type="text" class="form-control" name="ip" id="ip" required>
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="tw" class="form-label">Teamviewer:</label>
                                                <input type="text" class="form-control" name="tw" id="tw" required>                                             
                                            </div>
                                        </div>
                                        <div class="col-4 mt-2">
                                                <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="status" required>
                                                <option value="0" selected>Selecciona tu opción</option>
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
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Registro Antena
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSensor">
                                    <div class="accordion-body">
                                        <div class="row">
                                        <!--div class="col-4 mt-2">
                                                <label for="num_kit" class="form-label">Numero kit:</label>
                                                <input type="text" class="form-control" name="num_kit" id="num_kit" required>
                                            </div-->
                                            <div class="col-4 mt-2">
                                                <label for="num_plato" class="form-label">Numero plato:</label>
                                                <input type="text" class="form-control" name="num_plato" id="num_plato" required>
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="ns_modem" class="form-label">Numero serie del Modem:</label>
                                                <input type="text" class="form-control" name="ns_modem" id="ns_modem" required>  
                                            </div>
                                        </divs>
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="status"  required>
                                            <option value="0" selected>Selecciona tu opción</option>
                                            <?php 
                                                while($row = $resultado_select2->fetch_assoc()){
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
                    </div>

                </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center form-group mt-7">
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