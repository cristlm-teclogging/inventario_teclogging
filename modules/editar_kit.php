<?php include 'header.php' ?>
<?php include "../nav.php"; 

require("../config/conexion.php");
// indicador 
$num_kit = $_GET['num_kit'];
//Consultas para mostrar formulario select
$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);

$sql = "SELECT * FROM `kit` WHERE `num_kit` = '$num_kit'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder"> Editar kit </h4>
            </div>
            <div class="card-body">
                <form action="./modificar_kit.php" method="POST" enctype="multipart/form-data" class="">
                    <div class="row">
                        <div class="col">
                            <div class="accordion" id="accordionKit">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Datos del Kit
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionKit">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-4 mt-3">
                                                    <label for="num_kit" class="form-label">Numero de kit</label>
                                                    <input type="text" class="form-control" name="num_kit" id="num_kit" value="<?php echo $row['num_kit']?>"readonly>
                                                </div>
                                                <div class="col-4 mt-3">
                                                    <label for="ip" class="form-label">IP</label>
                                                    <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $row['ip']?>" readonly>          
                                                </div>
                                                <div class="col-4 mt-3">
                                                    <label for="tw" class="form-label">Teamviewer</label>
                                                    <input type="text" class="form-control" name="tw" id="tw" value="<?php echo $row['tw']?>" required>          
                                                 </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" name="status" id="status" value="<?php echo $row['status']?>" require>
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
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button" collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Tipo de Item
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionKit">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-4 mt-2">
                                                    <label for="id_item" class="form-label">Id Item:</label>
                                                    <input type="text" class="form-control" name="id_item" id="id_item" required>
                                                </div>
                                                <div class="col-4 mt-2">
                                                    <label for="tipo_item" class="form-label">Tipo Item:</label>
                                                    <input type="text" class="form-control" name="tipo_item" id="tipo_item" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <div class="d-flex justify-content-center">
                            <div class="col text-center fom-group mt-4">
                            <a href="../index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                            <button type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button>
                            </div>
                        </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>