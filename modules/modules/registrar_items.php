<?php include "../header.php"; ?>
<?php include "../nav.php";

require "../config/conexion.php";

$num_kit= $_GET['num_kit'];

$sql_item1 = "SELECT * FROM `kit` WHERE num_kit = '$num_kit'";
$resultado_kit1 = $conexion->query($sql_item1);

if ($resultado_kit1->num_rows > 0) {
    // Obtener el primer resultado de la consulta
    $row = $resultado_kit1->fetch_assoc();
    $valor_kit = $row['num_kit']; // Suponiendo que el valor que necesitas es 'num_kit

    // Puedes hacer algo con $valor_kit aquí si es necesario
} else {
    $valor_kit = "";
}
?>
<?php
$sql_item2 =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado_item2 = $conexion->query($sql_item2);
/*
$sql = "SELECT * FROM `kit` WHERE `num_kit` ='$num_kit'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();*/
?>

<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Agregar item, sensor y antena</h4>
            </div>
            <div class="card-body">
                <form action="./agregar_items.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <label for="num_kit" class="form-label">Numero de KIT:</label>
                            <input type="text" class="form-control" name="num_kit" id="num_kit" value="<?php echo $valor_kit ?>" readonly>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                            <label for="id_item" class="form-label">Numero de Serie</label>
                            <section>
                                 <select name="id_item" id="id_item" class="form-select" required>
                                    <option value="" selected disabled>Selecciona tu opción</option>
                                        <?php while($row = $resultado_item2->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_item']; ?>"><?php echo $row['num_serie']; ?></option>
                                <?php } ?>
                            </select>
                        </section>
                        </div>
                        <div class="col-2 mt-3">
                            <label for="submit" class="form-label"></label>
                            <button  type="submit" class="btn btn-success mt-4">Agregar <i class="fa-solid fa-plus fa-sm"></i></button> 
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-4">
                                <a href="../index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                            </div>
                        </div>
                </form>

                <div class="d-flex justify-content-center">
                    <div class="col-5 mt-3">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover  table-hover">
                                <thead class="table-light">
                                     <th class="">Numero de Kit</th>
                                     <th class="">Numero de serie</th>
                                     <th class="">tipo item</th>
                                     <th class="">Eliminar</th>
                                </thead>
                            <tbody>
                                 <?php 
                                 require "../config/conexion.php";

                                     $sql = "SELECT rki.id_kit as 'id_kit', rki.id_item as 'id_item',ti.id_tipo_item as 'id_tipo_item', ti.tipo_item as 'tipo_item', rit.id_tipo_item as 'tipo_kit_item', rit.num_serie as 'num_serie' FROM relacion_kit_item rki LEFT JOIN relacion_item_tipo_item rit ON rit.id_item = rki.id_item LEFT JOIN tipo_item ti ON rit.id_tipo_item = ti.id_tipo_item WHERE rki.id_kit = '$num_kit' ";
                                    $resultado = $conexion->query($sql);

                                    while($row = $resultado->fetch_assoc()) { ?>
                                         <tr class="col-">
                                         <!--corregir el nombre de las propiedades-->          
                                            <td class=""><?php echo $row['id_kit'];?></td>
                                             <td class=""><?php echo $row['num_serie'];?></td>
                                             <td class=""><?php echo $row['tipo_item'];?></td>
                                              <td class="col-text-center">
                                                 <a href="./eliminar_ki.php?id_kit=<?php echo $row['id_kit'];?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                         </tr>
                                        <?php  } ?>
                                     </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
        // Paso 4: Inicializar Select2
        window.onload=function(){
                $('#id_item').select2();
                //$('#id_kit').select2();
            };
    </script>