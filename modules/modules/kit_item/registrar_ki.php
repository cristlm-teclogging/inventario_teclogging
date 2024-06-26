<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');


$sql_item1 =  "SELECT * FROM `kit`";
$resultado_item1 = $conexion->query($sql_item1);

$sql_item2 =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado_item2 = $conexion->query($sql_item2);

$sql_r =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado1 = $conexion->query($sql_r);

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
                        <section>
                            <select name="id_kit" id="id_kit" class="form-select" required>
                                <option value="" selected disabled>Selecciona tu opción</option>
                                    <?php while($row = $resultado_item1->fetch_assoc()){ ?>
                                <option value="<?php echo $row['id_kit']; ?>"><?php echo $row['id_kit']; ?></option>
                                     <?php } ?>
                            </select>
                        </section>

                        </div>
                        <div class="col-4 mt-2">
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

                        <div class="col-2 mt-2">
                        <label for="submit" class="form-label"></label>
                        <button  type="submit" class="btn btn-success mt-4">Agregar <i class="fa-solid fa-plus fa-sm"></i></button> 
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                            <div class="col text-center form-group mt-5">
                            <a href="./index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                        <!--button  type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-check fa-lg"></i></button--> 
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
                                 require "../../config/conexion.php";

                                     $sql = "SELECT rki.id_kit as 'id_kit', rki.id_item as 'id_item',ti.id_tipo_item as 'id_tipo_item', ti.tipo_item as 'tipo_item', rit.id_tipo_item as 'tipo_kit_item', rit.num_serie as 'num_serie' FROM relacion_kit_item rki LEFT JOIN relacion_item_tipo_item rit ON rit.id_item = rki.id_item LEFT JOIN tipo_item ti ON rit.id_tipo_item = ti.id_tipo_item";
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
                $('#id_kit').select2();
            };
    </script>
