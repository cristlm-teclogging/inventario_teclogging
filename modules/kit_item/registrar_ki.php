<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');

$sql_select1 =  "SELECT * FROM `antena`";
$resultado_select1 = $conexion->query($sql_select1);

$sql_item1 =  "SELECT * FROM `kit`";
$resultado_item1 = $conexion->query($sql_item1);

$sql_item2 =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado_item2 = $conexion->query($sql_item2);

$sql_item3 =  "SELECT * FROM `tipo_item`";
$resultado_item3 = $conexion->query($sql_item3);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Agregar kit item</h4>
            </div>
            <div class="card-body">
                <form action="agregar_ki.php" method="POST" enctype="multipart/form-data" required>
                    <div class="row">
                        <div class="col-4 mt-2">
                        <label for="id_kit" class="form-label">Numero de Kit</label>
                        <select name="id_kit" id="id_kit" class="form-select" required>
                            <option value="" selected disabled>Selecciona tu opción</option>
                                    <?php while($row = $resultado_item1->fetch_assoc()){ ?>
                             <option value="<?php echo $row['id_kit']; ?>"><?php echo $row['id_kit']; ?></option>
                                     <?php } ?>
                        </select>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="id_item" class="form-label">Id del item</label>
                             <select name="id_item" id="id_item" class="form-select" required>
                                <option value="" selected disabled>Selecciona tu opción</option>
                                    <?php while($row = $resultado_item2->fetch_assoc()){ ?>
                                        <option value="<?php echo $row['id_item']; ?>"><?php echo $row['id_item'] . ' - ' . $row['id_tipo_item']; ?></option>
                                     <?php } ?>
                            </select>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="tipo_item" class="form-label">Tipo de Item</label>
                             <select name="tipo_item" id="tipo_item" class="form-select" required>
                                <option value="" selected disabled>Selecciona tu opción</option>
                                    <?php while($row = $resultado_item3->fetch_assoc()){ ?>
                                 <option value="<?php echo $row['id_tipo_item']; ?>"><?php echo $row['tipo_item']; ?></option>
                                     <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-5">
                            <a href="./index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button> 
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>