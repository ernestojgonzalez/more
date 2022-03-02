<?php 
$connectionInfo = array("Database"=>"EAFB74", "UID"=>"sa","PWD"=>"admin", "CharacterSet"=>"UTF-8");

$conn_sis = sqlsrv_connect ($serverName04, $connectionInfo);


if ($conn_sis) {
  echo "" ;
 }
 else 
 {
  echo "Fallo en la conexion";
  die (print_r(sqlsrv_errors(), true));
 }

 ?>

 <?php 

$connectionInfo1 = array("Database"=>"EAFB74", "UID"=>"sa","PWD"=>"admin", "CharacterSet"=>"UTF-8");
$conn_sis1 = sqlsrv_connect ($serverName04, $connectionInfo1);



if ($conn_sis1) {
  echo "" ;
}
else
{
  echo "fallo en la Conexion";
  die (print_r(sqlsrv_errors(), true));
}


 ?>