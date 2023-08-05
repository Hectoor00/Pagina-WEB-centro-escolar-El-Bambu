<?php

$datosTabla = array();


require_once('tcpdf/tcpdf.php');

if(isset($_POST['add_sale_pdf'])) {

  $cliente = $_POST['cliente'];
$Nombre = $_POST['s_name'];
$s_id = $_POST['s_id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$total = $_POST['total'];


// Ejemplo de datos de la tabla
$datosTabla = array(
    array('Cliente','Producto', 'Precio', 'Cantidad','Total'),
    array($cliente, $Nombre, $price,$quantity,$total),
    // ... más filas de datos
);

$price = $datosTabla[1][2];



  // Aquí puedes incluir la lógica para generar el contenido del PDF
  $contenidoPDF = '';

  // Crea una nueva instancia de TCPDF
  $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

  // Establece las propiedades del documento PDF
  $pdf->SetCreator('Tu Nombre');
  $pdf->SetAuthor('Tu Nombre');
  $pdf->SetTitle('Mi PDF');
  $pdf->SetSubject('Generación de PDF desde PHP');
  $pdf->SetKeywords('PDF, generación, ejemplo, PHP');

  // Agrega una página
  $pdf->AddPage();

  // Agrega la imagen en la esquina superior izquierda
  $imagePath = 'images/photo.jpg'; 
  $pdf->Image($imagePath, 10, 10, 20, 20, 'JPG');
  $pdf->Ln(10);

  // Agrega el contenido al PDF
  $pdf->SetFont('Helvetica', '', 12);
  $pdf->MultiCell(0, 10, $contenidoPDF);


   // Agrega la tabla al PDF
   $pdf->SetFont('Helvetica', 'B', 12);
   $pdf->Ln(10); // Salto de línea
   $pdf->SetFillColor(255, 255, 255); // Color de fondo de la tabla
   $pdf->SetTextColor(0, 0, 0); // Color de texto de la tabla
   $pdf->SetDrawColor(0, 0, 0); // Color de borde de la tabla
   $pdf->SetLineWidth(0.2); // Ancho de línea de la tabla
   $pdf->SetAutoPageBreak(true, 10); // Activar el salto de página automático

   foreach ($datosTabla as $fila) {
       $pdf->Cell(40, 10, $fila[0], 1, 0, 'L', true); // Celda de la columna 1
       $pdf->Cell(40, 10, $fila[1], 1, 0, 'L', true); // Celda de la columna 2
       $pdf->Cell(30, 10, $fila[2], 1, 0, 'R', true); // Celda de la columna 3
       $pdf->Cell(30, 10, $fila[3], 1, 0, 'R', true); // Celda de la columna 4
       $pdf->Cell(40, 10, $fila[4], 1, 1, 'R', true); // Celda de la columna 5


   }

  // Genera el PDF y lo muestra en el navegador
  $pdf->Output('generado.pdf', 'I');
}
?>
