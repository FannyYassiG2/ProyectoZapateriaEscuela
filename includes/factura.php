<?php
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',19);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Factura',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


require ('../config/conection.php');

$codigo = $_POST['codigo'];
                     
                 
$sql="SELECT factura.Id_factura, factura.fecha, factura.Id_producto, factura.unidades, productos.Precio  FROM factura INNER JOIN productos on factura.Id_producto = productos.Id WHERE Id_factura = '$codigo'";
$result=mysqli_query($conn,$sql);  



$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row=mysqli_fetch_array($result)){
      
    $pdf->Cell(90,10, 'Codigo de factura',1,0,'C',0);
    $pdf->Cell(90,10, $row['Id_factura'],1,1,'C',0);
    $pdf->Cell(90,10, 'Fecha',1,0,'C',0);
    $pdf->Cell(90,10, $row['fecha'],1,1,'C',0);
    $pdf->Cell(90,10, 'Clave de producto',1,0,'C',0);
    $pdf->Cell(90,10, $row['Id_producto'],1,1,'C',0);
    $pdf->Cell(90,10, 'Piezas',1,0,'C',0);
    $pdf->Cell(90,10, $row['unidades'],1,1,'C',0);
    $pdf->Cell(90,10, 'Total',1,0,'C',0);
    $pdf->Cell(90,10,'$'.$row['Precio']*$row['unidades'],1,1,'C',0);
    
     }

$pdf->Output();
?>