<?php
require('../fpdf/fpdf.php');
include '../connect.php';

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,utf8_decode('Lista de clientes de Clínica huellas'));
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(50,5,'USUARIO',1,0,'C',true);   
$pdf->Cell(60,5,'NOMBRE',1,0,'C',true); 
$pdf->Cell(80,5,'E-MAIL',1,0,'C',true);    
$pdf->Ln();

if (!($sentencia = $conn->prepare("SELECT nombre,email,usuario FROM `Usuarios` WHERE `tipo`=1"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
        }
        if (!$sentencia->execute()) {
          echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        if (!($result = $sentencia->get_result())) {
		      echo "No se ha podido establecer la conexion con el servidor";
	}
	if ($result->num_rows > 0) {
             $nombres = array();

	     while($row = $result->fetch_array()){	    
                  array_push($nombres,$row[0],$row[1],$row[2]);

                  $nombre=$row[0];
                  $email=$row[1];
                  $usuario=$row[2];
                  $pdf->Cell(50,5,utf8_decode($usuario),1,0,'C');   
                  $pdf->Cell(60,5,utf8_decode($nombre),1,0,'C'); 
                  $pdf->Cell(80,5,utf8_decode($email),1,0,'C'); 
                  $pdf->Ln();      
             }
        }
        else{
             $pdf->Cell(0,25,'No existen clientes aun');
        }  
         
$pdf->Output();
?>