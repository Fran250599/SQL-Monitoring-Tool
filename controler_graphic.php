<?php
require 'modelo_grafico.php';

$Modelo_Grafico = new Modelo_Grafico();
$consulta = $Modelo_Grafico->TraerDatosGraficoBar();

echo json_encode($consulta);
?>

<?php 



?>