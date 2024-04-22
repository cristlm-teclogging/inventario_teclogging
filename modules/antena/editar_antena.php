<?php include "../header.php";?>
<?php include "../../nav.php";

require "../../config/conexion.php";

$num_kit=$_GET['num_kit'];

$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);

$sql = "SELECT * FROM `antena` WHERE `num_kit` = '$num_kit'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Editar registro de antena</h4>
            </div>
            <div class="card-body">
                <form action="./modificar_antena.php" method="POST" enctype="multipart/form-data" class="">
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="num_kit" class="form-label">Numero de kit:</label>
                            <input type="text" class="form-control" name="num_kit" id="num_kit" value="<?php echo $row['num_kit']?>" readonly>                    
                        </div>
                        <div class="col-4 mt-3">
                            <label for="num_plato" class="form-label">Numero Plato:</label>
                            <input type="text" class="form-control" name="num_plato" id="num_plato" value="<?php echo $row['num_plato']?>">                          
                        </div>
                        <div class="col-4 mt-3">
                            <label for="ns_modem" class="form-label">Numero Plato:</label>
                            <input type="text" class="form-control" name="ns_modem" id="ns_modem" value="<?php echo $row['ns_modem']?>">                          
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-4">
                                <a href="index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                                <button type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button>
                            </div>

                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>