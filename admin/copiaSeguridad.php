<?php  
$C_SERVER='qxr982.clinicahuella.com';  
$C_BASE_DATOS='qxr982';   
$C_USUARIO='qxr982';  
$C_CONTRASENA='7538Alba';  
//ruta archivo de salida     
$C_RUTA_ARCHIVO = 'BD_ClinicaHuellas'.date("Y_m_d_H_i_s").'.sql'; 
  



//comando  
$command = "mysqldump --opt -h ".$C_SERVER." ".$C_BASE_DATOS." -u ".$C_USUARIO." -p".$C_CONTRASENA.  
     " -r \"".$C_RUTA_ARCHIVO."\" 2>&1";   
   

//ejecutamos  
system($command);  
  
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$C_RUTA_ARCHIVO");
header("Content-Length: " . filesize("$C_RUTA_ARCHIVO"));
$fp = fopen("$C_RUTA_ARCHIVO", "r");
fpassthru($fp);

unlink($C_RUTA_ARCHIVO);
         
?>