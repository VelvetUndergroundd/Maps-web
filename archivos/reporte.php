<?php

require '../vendor/autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


$sql = "SELECT id, nombre_cliente, pedido, total, ubicacion, descripcion, preventista, distribuidor, fecha, estado FROM pedido";
$resultado = $mysqli->query($sql);

$excel = new Spreadsheet();
$hojaActiva= $excel-> getActiveSheet();
$hojaActiva->setTitle("Registros-Pedidos-AGROV");
$hojaActiva->setCellValue('A1', 'ID');
$hojaActiva->setCellValue('B1', 'Nombre del Cliente');
$hojaActiva->setCellValue('C1', 'Pedido');
$hojaActiva->setCellValue('D1', 'Total');
$hojaActiva->setCellValue('E1', 'Ubicacion');
$hojaActiva->setCellValue('F1', 'Descripcion');
$hojaActiva->setCellValue('G1', 'Preventista');
$hojaActiva->setCellValue('H1', 'Distribuidor');
$hojaActiva->setCellValue('I1', 'Fecha');
$hojaActiva->setCellValue('J1', 'Estado');
$fila = 2;

while($rows = $resultado->fetch_assoc()){
$hojaActiva->setCellValue('A' . $fila, $rows['id']);    
$hojaActiva->setCellValue('B' . $fila, $rows['nombre_cliente']);    
$hojaActiva->setCellValue('C' . $fila, $rows['pedido']);    
$hojaActiva->setCellValue('D' . $fila, $rows['total']);    
$hojaActiva->setCellValue('E' . $fila, $rows['ubicacion']);    
$hojaActiva->setCellValue('F' . $fila, $rows['descripcion']);
$hojaActiva->setCellValue('G' . $fila, $rows['preventista']);
$hojaActiva->setCellValue('H' . $fila, $rows['distribuidor']);
$hojaActiva->setCellValue('I' . $fila, $rows['fecha']);
$hojaActiva->setCellValue('J' . $fila, $rows['estado']);
$fila++;    
}
ob_end_clean();
/* Here there will be some code where you create $spreadsheet */
// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Registros-Pedidos-AGROV.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;


?>