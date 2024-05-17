<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');

$sql_kit1 =  "SELECT * FROM `relacion_kit_item`";
$resultado_kit1 = $conexion->query($sql_kit1);

// Obtener los IDs de los kits ya seleccionados
$sql_kits_seleccionados = "SELECT id_kit FROM salida_item";
$resultado_kits_seleccionados = $conexion->query($sql_kits_seleccionados);
$kits_seleccionados = array();

if ($resultado_kits_seleccionados->num_rows > 0) {
    while ($row_kits = $resultado_kits_seleccionados->fetch_assoc()) {
        $kits_seleccionados[] = $row_kits['id_kit'];
    }
}
?>
<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Salida de Kit's</h4>
            </div>
            <div class="card-body">
                <form action="agregar_kit.php" method="POST" enctype="multipart/form-data" required>
                    <div class="row">
                    <div class="col-4 mt-2">
                            <input type="text" class="form-control" name="id_item" id="id_item" value="0" readonly hidden>
                        </div>
                        <div class="col-4 mt-2">
                            <label for="id_kit" class="form-label">Número de KIT</label>
                            <select name="id_kit" id="id_kit" class="form-select" required>
                                <option value="" selected disabled>Selecciona el numero de KIT</option>
                                <?php while($row = $resultado_kit1->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_kit']; ?>"><?php echo $row['id_kit']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-2 mt-3">
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
                                     
                                     <th class="">Numero de KIT</th>
                                     <th class="">Eliminar</th>
                                </thead>
                            <tbody>
                                 <?php 
                                 require "../../config/conexion.php";

                                     $sql = "SELECT * FROM `salida_item` WHERE id_kit > 0";
                                    $resultado = $conexion->query($sql);

                                    while($row = $resultado->fetch_assoc()) { ?>
                                         <tr class="col-">
                                         <!--corregir el nombre de las propiedades-->          
                                             <td class=""><?php echo $row['id_kit'];?></td>
                                              <td class="col-text-center">
                                                <a href="./eliminar_salida_kit.php?id_kit=<?php echo $row['id_kit'];?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
    $(document).ready(function() {
        // Obtener los IDs de los kits ya seleccionados desde PHP
        let kitsSeleccionados = <?php echo json_encode($kits_seleccionados); ?>;

        // Recorrer las opciones del select y deshabilitar las que coincidan con los IDs seleccionados
        $('#id_kit option').each(function() {
            let idKit = $(this).val();
            if (kitsSeleccionados.includes(idKit)) {
                $(this).prop('disabled', true);
            }
        });

        // select 2 del id_kit
        $('#id_kit').select2();
    });
</script>
<!--script>
        // Paso 4: Inicializar Select2
        window.onload=function(){
                $('#id_kit').select2();
            };
    </script-->