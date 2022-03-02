<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<div class="wrapper">

<!-- PRIMERA PARTE -->

  <?php include 'up.php'; ?>





<form method="POST" action="">

    <fieldset>
    <legend>PRODUCTOS FARMACIA</legend>
    <h3><a href="consultas.php">Ir atras...</a></h3>
    </fieldset>
  <br>
<div class="panel-body"> 
  <div class="table-responsive">          
  <table id="example" class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Precio 3</th>     
      </tr>
    </thead>
  </div>
</div>
    <tbody>


<?php

include 'serverName.php';
include 'Conexion.php';
//$criterio = $_GET['criterio'];
$criterio = $_POST['criterio'];
//echo $criterio;
//$connectionInfo = array("Database" => "prueba" , "UID" => "sa", "PWD" => "a1b2c3$" , "CharracterSet" => "UTF-8" );
//$connectionInfo = array("Database"=>"EAFB74", "UID"=>"sa","PWD"=>"admin", "CharacterSet"=>"UTF-8");
//$conn_sis = sqlsrv_connect ($serverName04, $connectionInfo);

if ($conn_sis) {
  echo "" ;
}
else
{
  echo "fallo en la Conexion";
  die (print_r(sqlsrv_errors(), true));
}

//$sql= "SELECT * FROM SAPROD WHERE Existen != 0 and Descrip like ('%$criterio%')  or Descrip2   like ('%$criterio%')  or Descrip3   like ('%$criterio%')  


$sql= "SELECT * FROM SAPROD WHERE Existen <> 0 and Descrip like ('%$criterio%')  or Descrip2   like ('%$criterio%')  or Descrip3   like ('%$criterio%') or CodProd like ('%$criterio%') or Refere like ('%$criterio%') order by CodProd desc "

//$sql= "SELECT * FROM SAPROD WHERE   CodProd like ('%$criterio%') or Refere like ('%$criterio%')  order by Existen desc "

//$sql = "SELECT * FROM SAPROD WHERE Refere LIKE ('_%$criterio%') order by Existen desc "

//$sql = "SELECT * FROM SAPROD WHERE CodProd like ('%LCS012%')"
//SELECT * FROM SAPROD WHERE CodProd like ('%LCS012%');

//$sql= "SELECT * FROM SAPROD  "

or die (sqlsrv_error());
$result = sqlsrv_query($conn_sis, $sql);



if ( !sqlsrv_query($conn_sis,$sql))

{
  die ('Error: ' . sqlsrv_errors($conn_sis));
}


$row = sqlsrv_fetch_array ($result);

{
$CodProd = $row ["CodProd"]; $Descrip = $row ["Descrip"]; $Precio3= number_format($row["Precio3"], 2, ",", "."); $Existen=number_format($row["Existen"], 2, ",", "."); //;$Existen=$row["Existen"]$Existen=number_format($row["Existen"]);

//if $CodProd = ¡int   

  echo '<tr>';echo '<td>'; echo $CodProd; echo '<td>'; echo $Descrip; echo '<td>'; echo $Precio3; echo '<td algin = center>';
}
sqlsrv_close($conn_sis);

?>



<script type="text/javascript">
  function actualizar(){window.location.href = "consultasr.php";}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  setInterval("actualizar()",12000);
</script>



</tbody>
</table>

</form>
</body>















</div>



   <!--Fin del Modal Editar-->
  </div>
</div>
</div>









    













</div>

<?php include 'down.php'; ?>
  

</body>
</html>
