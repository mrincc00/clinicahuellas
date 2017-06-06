<?php session_start(); 
require('../../fpdf/fpdf.php');
include '../../connect.php';

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,utf8_decode('Consultas registradas en Clínica huellas'));
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(25,5,'USUARIO',1,0,'C',true);   
$pdf->Cell(45,5,'FECHA',1,0,'C',true); 
$pdf->Cell(25,5,'TIPO',1,0,'C',true);   
$pdf->Cell(25,5,'MASCOTA',1,0,'C',true);  
$pdf->Cell(70,5,'DESCRIPCION',1,0,'C',true);       
$pdf->Ln();

$usuario=$_SESSION['usuario'];
$fecha=$_POST['fechaSeleccionada'];
if (!($sentencia = $conn->prepare("SELECT Usuario, tipoConsulta, Description, Mascota, StartTime FROM `Consultas` WHERE (`Veterinario`='$usuario') AND (`fecha`>='$fecha')"))) {
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
                  array_push($nombres,$row[0],$row[1],$row[2], $row[3], $row[4]);

                  $usuario=$row[0];
                  $tipo=$row[1];
                  $descripcion=$row[2];
				  $mascota=$row[3];
				  $fecha=date("d-m-Y h:i", strtotime($row[4]));
                  $pdf->Cell(25,5,utf8_decode($usuario),1,0,'C');   
                  $pdf->Cell(45,5,utf8_decode($fecha),1,0,'C'); 
                  $pdf->Cell(25,5,utf8_decode($tipo),1,0,'C'); 
		  $pdf->Cell(25,5,utf8_decode($mascota),1,0,'C');
		  $pdf->Cell(70,5,utf8_decode($descripcion),1,0,'C');
                  $pdf->Ln();      
             }
        }
        else{
             $pdf->Cell(0,25,'No existen consultas aun');
        }  
         
$pdf->Output();
?>