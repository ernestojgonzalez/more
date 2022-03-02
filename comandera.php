<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FARMABIEN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">	
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">FARMABIEN</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">ATRAS</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">



<fieldset>
    <legend>COMANDERA</legend>
    </fieldset>




<div class="table-responsive">          
  <table id="example" class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>FACTURA</th>
        <th>DESCRIPCION</th>
        <th>CANTIDAD</th>
        <th>Ubicacion</th>

      </tr>
    </thead>
    <?php
include 'serverName.php';
include 'conexion.php';

//$sql= "select  top 10  * from  SAITEMFAC order by NumeroD Desc "    where NumeroD = 00147426


$sql1= "select  top 1  * from  SAITEMFAC order by NumeroD Desc ";
$resultado = sqlsrv_query($conn_sis, $sql1);
//or die (sqlsrv_error());
$fila = sqlsrv_fetch_array ($resultado);
$valor = $fila["NumeroD"];
echo "$valor";
$valor2 = $valor - 1;

//$sql= "select  top 1  * from  SAITEMFAC order by NumeroD Desc";

$sql3= "select  * from  SAITEMFAC where NumeroD = $valor";

$result3 = sqlsrv_query($conn_sis, $sql3)
or die (sqlsrv_error());


$result3 = sqlsrv_query($conn_sis, $sql3);

if ( !sqlsrv_query($conn_sis,$sql3))

{
  die ('Error: ' . sqlsrv_errors($conn_sis));
}
while ($row = sqlsrv_fetch_array ($result3)){

  $NumeroD = $row ["NumeroD"]; $Descrip1=$row ["Descrip1"];  $Cantidad=number_format($row ["Cantidad"]); $Descrip10=$row["Descrip10"];
   echo '<tr>';echo '<td>'; echo $NumeroD; echo '<td>'; echo $Descrip1; echo '<td>'; echo "<h1> $Cantidad </h1>";  echo '<td>'; echo "<h1>$Descrip10</h1>" ;
  // echo "<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'>Editar </button>";

}
echo '</div>';
sqlsrv_close($conn_sis);

?>
  </table>

 </div>


            <div class="small-box bg-info">

              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="Comandera.php" class="small-box-footer">ACTUALIZAR <i class="fas fa-arrow-circle-right"></i></a>
            </div>






<script type="text/javascript">
  function actualizar(){location.reload(true);}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  setInterval("actualizar()",12000);
</script>








</div>

</body>




