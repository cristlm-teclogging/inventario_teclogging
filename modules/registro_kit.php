<?php include './header.php'?>
<?php include "../nav.php"; 

require "../config/conexion.php";

$sql_select1 =  "SELECT * FROM `status`";
$resultado_select1 = $conexion->query($sql_select1);
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="">Registro kit</h4>
            </div>
            <div class="card-body">
              <form action="./agregar_kit.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="num_kit" class="form-label">Numero de kit:</label>
                        <input type="text" class="form-control" name="num_kit" id="num_kit" required>
                    </div>
                    <div class="col-4 mt-3">
                        <label for="id_kit" class="form-label">Id_kit:</label>
                        <input type="number" class="form-control" name="id_kit" id="id_kit" required>
                    </div>
                    <div class="col-4 mt-3">
                        <label for="ip" class="form-label">IP:</label>
                        <input type="text" class="form-control" name="ip" id="ip" required>
                    </div>

                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="tw" class="form-label">Teamviewer:</label>
                        <input type="text" class="form-control" name="tw" id="tw" required>
                    </div>
                    <div class="col-4 mt-3">
                     <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                        <option value="" selected disabled>Selecciona tu opción</option>
                        <?php 
                         while($row = $resultado_select1->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                         <?php } ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center fom-group mt-5">
                        <a href="../index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button>
                           
                        </div>
                    </div>

                </div>
                </form>

            </div>
        </div>
                        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>