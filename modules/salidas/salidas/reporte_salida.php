<?php  ob_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Salida</title>
    <link rel="stylesheet" href="../../public/bootstrap5/bootstrap.min.css">
</head>
<body>
    <?php require ('../../config/conexion.php');

    $sql= "SELECT si.id_tipo_item as 'id_tipo_item', si.id_item as 'id_item', si.id_kit as 'id_kit', rki.id_kit as 'id_kit_rki', rki.id_item as 'id_item_rki', rit.id_item as 'id_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion' FROM salida_item si LEFT JOIN relacion_kit_item rki ON rki.id_kit = si.id_kit LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item WHERE si.id_kit ORDER BY `si`.`id_kit` ASC";
    $resultado = $conexion->query($sql);
    ?>
        <div class="d-flex justify-content-center">
            <div class="col-5 mt-3">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered"">
                        <thead class="table-light">
                            <tr>
                                <th class="">Numero de KIT</th>
                                <th class="">Numero de Serie</th>
                                <th class="">Descripcion</th>
                            </tr>
                        </thead>
                    <tbody>
                         <?php 
                            require "../../config/conexion.php";
                                    
                            $sql= "SELECT si.id_tipo_item as 'id_tipo_item', si.id_item as 'id_item', si.id_kit as 'id_kit', rki.id_kit as 'id_kit_rki', rki.id_item as 'id_item_rki', rit.id_item as 'id_item', rit.num_serie as 'num_serie', rit.descripcion as 'descripcion' FROM salida_item si LEFT JOIN relacion_kit_item rki ON rki.id_kit = si.id_kit LEFT JOIN relacion_item_tipo_item rit ON rki.id_item = rit.id_item WHERE si.id_kit ORDER BY `si`.`id_kit` ASC";
                            $resultado = $conexion->query($sql);

                            while($row = $resultado->fetch_assoc()) { ?>
                                    <tr class="col-">
                                         <!--corregir el nombre de las propiedades-->          
                                     <td class=""><?php echo $row['id_kit'];?></td>
                                     <td class=""><?php echo $row['num_serie'];?></td>
                                     <td class=""><?php echo $row['descripcion'];?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
             </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
<?php 
$html=ob_get_clean();
//echo $html;
require_once '../../public/dompdf/autoload.inc.php';
// Crea una nueva instancia
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options = new Dompdf();

$options = $dompdf->getOptions();
$options ->set(array('isRemotEnabled' => true));
$dompdf ->setOptions($options);

$dompdf->loadHtml("$html");

$dompdf->setPaper('letter');
$dompdf ->render();
//opcon para descargar el archivo => true
$dompdf->stream("archivo_.pdf", array("Attachment" => false));

?>
