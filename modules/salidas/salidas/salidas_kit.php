<?php include "header.php"; ?>
<?php include "../../nav.php";

require('../../config/conexion.php');

$id_kit = $_GET['id_kit'];
$sql_kit = "SELECT * FROM `relacion_kit_item` WHERE id_kit = '$id_kit'";
$resultado_kit = $conexion->query($sql_kit);
?>
<?php
//$sql_kit1 =  "SELECT * FROM `relacion_kit_item";
$sql_kit1 = "SELECT DISTINCT id_kit FROM relacion_kit_item WHERE 1 ORDER BY `relacion_kit_item`.`id_kit` ASC";
$resultado_kit1 = $conexion->query($sql_kit1);
//select del modal
$sql_kit2 =  "SELECT * FROM `relacion_item_tipo_item`";
$resultado_kit2 = $conexion->query($sql_kit2);

// Obtener los kits disponibles
$sql_kit_disponibles = "SELECT id_kit FROM salida_item";
$resultado_kit_disponibles = $conexion->query($sql_kit_disponibles);

 // Obtener los kits seleccionados
$sql_kits_seleccionados = "SELECT DISTINCT id_kit FROM salida_item";
$resultado_kits_seleccionados = $conexion->query($sql_kits_seleccionados);
$kits_seleccionados = array();
while ($row = $resultado_kits_seleccionados->fetch_assoc()) {
    $kits_seleccionados[] = $row['id_kit'];
}

// Obtener los kits disponibles
$sql_kit_disponibles = "SELECT id_kit FROM relacion_kit_item WHERE id_kit > 0 ORDER BY `relacion_kit_item`.`id_kit` ASC";
$resultado_kit_disponibles = $conexion->query($sql_kit_disponibles);

// Variable para controlar si el select debe estar deshabilitado
$select_disabled = (isset($id_kit) && $id_kit !=0) ? "disabled" : "";
?>
<div class="container mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Salida de Kit's</h4>
            </div>
            <div class="card-body">
                <form action="agregar_kit.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-4 mt-3">
                        <div class="d-flex justify-content-end">
                            <!--button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id_kit="<?php echo $id_kit; ?>">Agregar Item al kit</button-->
                            <a href="#itemModal?id_kit=<?php echo $id_kit; ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#itemModal">Agregar Item al Kit</a>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="id_kit" class="form-label">Número de KIT</label>
                            <select name="id_kit" id="id_kit" class="form-select" required <?php echo $select_disabled; ?>>
                                <option value="" selected disabled>Selecciona el número de KIT</option>
                                    <?php while ($row = $resultado_kit_disponibles->fetch_assoc()) { ?>
                                        <?php if (in_array($row['id_kit'], $kits_seleccionados)) { ?>
                                 <option value="<?php echo $row['id_kit']; ?>" disabled><?php echo $row['id_kit']; ?></option>
                                    <?php } else { ?>
                                <option value="<?php echo $row['id_kit']; ?>"><?php echo $row['id_kit']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-2 mt-3">
                            <label for="submit" class="form-label"></label>
                            <button type="submit" id="submitBtn" class="btn btn-success mt-3">Agregar <i class="fa-solid fa-plus fa-sm"></i></button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center form-group mt-4">
                            <a href="./index.php" class="btn btn-secondary">Volver <i class="fa-solid fa-rotate-left fa-lg"></i></a>
                            <a href="./reporte_salida.php" class="btn btn-primary">Generar reporte <i class="fa-solid fa-file-invoice"></i></a>
                        </div>
                    </div>
                </form>
                <?php
                
                $id_kit = isset($_GET['id_kit']) ? $_GET['id_kit'] : 0;

                if ($id_kit != 0) {
                        $sql = "SELECT si.id_tipo_item as 'id_tipo_item', si.id_item as 'id_item', si.id_kit as 'id_kit', rki.id_kit as 'id_kit_rki', rki.id_item as 'id_item_rki', rit.id_item as 'id_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion' FROM salida_item si LEFT JOIN relacion_kit_item rki ON rki.id_kit = si.id_kit LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item WHERE si.id_kit ORDER BY `si`.`id_kit` ASC";
                        $resultado = $conexion->query($sql);
                ?>
                <div class="d-flex justify-content-center">
                    <div class="col-5 mt-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar Numero de KIT o Item">
                        <div class="table-responsive mt-3">
                        <table class="table table-sm table-hover table-hover">
                            <thead class="table-light">
                                 <th class="">Numero de KIT</th>
                                 <th class="">Numero de Serie</th>
                                 <th class="">Descripcion</th>
                                 <th class="">Eliminar</th>
                            </thead>
                                <tbody id="tableBody">
                                    <?php
                                while ($row = $resultado->fetch_assoc()) {
                                    ?>
                                <tr class="col-">
                                        <!--corregir el nombre de las propiedades-->
                                    <td class=""><?php echo $row['id_kit']; ?></td>
                                    <td class=""><?php echo $row['num_serie']; ?></td>
                                    <td class=""><?php echo $row['descripcion']; ?></td>
                                    <td class="col-text-center">
                                    <a href="./eliminar_salida_kit.php?id_kit=<?php echo $row['id_kit']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                     </td>
                                 </tr>
                                <?php } ?>
                            </tbody>
                         </table>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!--modal de items-->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Agregar Item al Kit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addItemForm">
                    <div class="mb-3">
                        <label for="id_item" class="form-label">Numero de Serie</label>
                        <select class="form-select" name="id_item" id="id_item">
                            <option value="0" selected>Selecciona tu opción</option>
                            <?php 
                             while($row_kit2 = $resultado_kit2->fetch_assoc()){
                                 ?>
                            <option value="<?php echo $row_kit2['id_item']; ?>"><?php echo $row_kit2['num_serie']; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<!--script>
    $(document).ready(function(){
        $('#guardarBtn').on('click', function(e){
            e.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

            let formData = $('#addItemForm').serialize();
            let id_kit = $('input[name="id_kit"]').val(); // Obtén el valor de id_kit del campo oculto

            $.ajax({
                type: 'POST',
                url: 'guardar_item.php',
                data: formData + '&id_kit=' + id_kit, // Agrega id_kit a los datos enviados
                success: function(response){
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script-->
<script>
    //fomulario modal
    $(document).ready(function(){
        $('#guardarBtn').on('click', function(){
            let formData = $('#addItemForm').serialize();
            $('#exampleModal').click(function() {
                let id_kit = $(this).data('id_kit'); 
            
            $.ajax({
                type: 'POST',
                url: 'guardar_item.php', // Ruta de tu archivo PHP
                data: formData,
                success: function(response){
                    // Manejar la respuesta del servidor aquí, por ejemplo, mostrar un mensaje de éxito o error
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Manejar errores de la solicitud AJAX aquí
                    console.error(xhr.responseText);
                }
            });
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#id_kit').select2();
    });
</script>

    <script>
    // Obtener referencia al campo de entrada y a la tabla (buscar en la tabla)
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');

    // Escuchar el evento de cambio en el campo de entrada
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase(); 
        const rows = tableBody.getElementsByTagName('tr'); 

        // Iterar sobre las filas y mostrar u ocultar según el término de búsqueda
        Array.from(rows).forEach(row => {
            const cells = row.getElementsByTagName('td'); 
            let found = false;

            // Iterar sobre las celdas de la fila actual
            Array.from(cells).forEach(cell => {
                const cellText = cell.textContent.toLowerCase(); 
                if (cellText.includes(searchTerm)) { 
                    found = true; 
                }
            });

            // Mostrar u ocultar la fila según si se encontró el término de búsqueda
            row.style.display = found ? '' : 'none';
        });
    });
</script>