<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<div class="wrapper">

<!-- PRIMERA PARTE -->

  <?php include 'up.php'; ?>

  <?php //include 'content.php'; ?>



  
    



    <div class="content-wrapper">
    
<?php

$recibo = $_GET['valor'];

?>



    <form id="prueba" action="#" method="Post">
      <br><br><br>


         <fieldset>
        <legend>PRODUCTO CON PUESTO 0 EN DEPOSITO 1</legend>
        </fieldset>
  <div class="table-responsive">          
  <table id="example" class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>Codigo del Producto</th>
        <th>Descripcion</th>
        <th>Departamento</th>
        <th>Existencia</th>
        <th>Puesto</th>

      </tr>
    </thead>
<?php
include 'serverName.php';
include 'conexion.php';

$sql= "Select * from SAEXIS JOIN SAPROD_04 on SAEXIS.CodProd = SAPROD_04.CodProd JOIN SAPROD on SAPROD_04.CodProd = SAPROD.CodProd where PuestoI = 0 and SAEXIS.Existen > 0 and CodUbic = 1 and Ubic = 0 and SAPROD_04.CodProd= '$recibo' "
or die (sqlsrv_error());
$result = sqlsrv_query($conn_sis, $sql);

if ( !sqlsrv_query($conn_sis,$sql))

{
  die ('Error: ' . sqlsrv_errors($conn_sis));
}
while ($row = sqlsrv_fetch_array ($result)){

  $CodProd = $row ["CodProd"]; $Descrip=$row ["Descrip"]; $CodUbic=$row["CodUbic"]; $Existen=$row["Existen"];$PuestoI=$row["PuestoI"];
  echo '<tr>';echo '<td>'; echo $CodProd; echo '<td>'; echo $Descrip;  echo '<td>'; echo $CodUbic; echo '<td>'; echo $PuestoI; echo '<td>'; echo $PuestoI; 
   //echo "<td><br>a<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'>Editar </button>";

}
echo '</div>';
sqlsrv_close($conn_sis);

?>
  </table>








        <center>
        <div class="form-group">
        <label>Codigo</label>
        <input type="text" name="ActCodProd" value='<?php echo $recibo  ?>'>
        <label>Puesto</label>
        <input type="text" name="acpuesto" value='<?php echo $PuestoI ?>' >
         <input type="submit" name="guardar" class="btn btn-success btn" value="Actualizar">
        <a type="button" class="btn btn-default" href="puesto.php">Cerrar</a>
        </div>
      </div>


              
    
<?php 

if(isset($_POST['guardar'])){
include 'serverName.php';
include 'conexion.php';
//$acpuesto = $_POST ['acpuesto']; 
//$actCodProd = $_POST ['actCodProd'];


$CodProd = $_POST['ActCodProd'];
$PuestoI = $_POST['acpuesto'];

//$sql1 = "UPDATE SAPROD_04 SET Ubic = '$PuestoI' where CodProd = '$CodProd' "

$sql1 = "UPDATE SAPROD_04 SET Ubic = $PuestoI where CodProd = '$recibo'"
or die (sqlsrv_error());




//$result1 = sqlsrv_query($conn_sis1, $sql1);

//$sql2= "UPDATE SAEXIS SET PuestoI = '$_POST[acpuesto]' where CodProd = '$_POST[actCodProd]' "
//or die (sqlsrv_error());

//$result2 = sqlsrv_query($conn_sis1, $sql2);

if (!sqlsrv_query($conn_sis1,$sql1))
  {
  //  die('Error: ' . sqlsrv_error($conn_sis1));
  }
echo "<script language='JavaScript'> alert('Actualizacion Exitosa $PuestoI.$CodProd');window.location = 'puesto.php';</script>";
sqlsrv_close($conn_sis1);
 }

?>


    </form>





</div>



   <!--Fin del Modal Editar-->
  </div>
</div>
</div>
</div>







    













</div>

<?php include 'down.php'; ?>
  

</body>
</html>