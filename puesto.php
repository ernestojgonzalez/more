<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<div class="wrapper">

<!-- PRIMERA PARTE -->

  <?php include 'up.php'; ?>

  <?php //include 'content.php'; ?>



  
    
    <fieldset>
    <legend>PRODUCTOS CON EXISTENCIA CON PUESTOS 0 EN DEPOSITO 1</legend>
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
        <th>Accion</th>

      </tr>
    </thead>
    <?php
include 'serverName.php';
include 'conexion.php';

$sql= "Select * from SAEXIS JOIN SAPROD_04 on SAEXIS.CodProd = SAPROD_04.CodProd JOIN SAPROD on SAPROD_04.CodProd = SAPROD.CodProd where PuestoI = 0 and SAEXIS.Existen > 0 and CodUbic = 1 and Ubic = 0 "
or die (sqlsrv_error());
$result = sqlsrv_query($conn_sis, $sql);

if ( !sqlsrv_query($conn_sis,$sql))

{
  die ('Error: ' . sqlsrv_errors($conn_sis));
}
while ($row = sqlsrv_fetch_array ($result)){

  $CodProd = $row ["CodProd"]; $Descrip=$row ["Descrip"]; $CodUbic=$row["CodUbic"]; $Existen=$row["Existen"];$PuestoI=$row["PuestoI"];
  echo '<tr>';echo '<td>'; echo $CodProd; echo '<td>'; echo $Descrip;  echo '<td>'; echo $CodUbic; echo '<td>'; echo $PuestoI; echo '<td>'; echo $PuestoI; echo '<td>';
   echo "<a class='btn btn-info btn-sm' type='button' href='puestoact.php?valor=$CodProd'>Editar</a>";
   //echo "<td><br>a<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'>Editar </button>";

}
echo '</div>';
sqlsrv_close($conn_sis);

?>
  </table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal Editar content-->
    <div class="modal-content">


<form id="prueba" action="#" method="Post">
      <br><br><br>
<?php

//$CodProd1 = $_POST['codigoact'];
//$CodProd = '916233';
//$puesto = '99';
?>




      Codigo<input type="text" name="codigo" id="codigoact" value='<?php echo $CodProd  ?>'>
      Puestos<input type="text" name="Puesto" id="puestoact" value='<?php echo $PuestoI ?>'>
      <input type="submit" name="guardar" class="btn btn-success btn" value="Guardar">

<?php
if(isset($_POST['guardar'])){
include 'serverName.php';
include 'conexion.php';

$CodProd = $_POST['codigoact'];
$puesto = $_POST['puestoact'];
//$sql = "INSERT INTO pruebaE (nombre, apellido) values nombre = '$nombre', apellido = '$apellido'"
//$sql = "UPDATE SAPROD_04 SET Ubic = '99' where CodProd = '$CodProd' "
 $sql = "UPDATE SAPROD_04 SET Ubic = '99' where CodProd = '916233'"
or die (sqlsrv_error());

if (!sqlsrv_query($conn_sis,$sql))
  {

  }
echo "<script language='JavaScript'> alert('actualización exitosa');</script>";
sqlsrv_close($conn_sis);
 }


?>

      <div class="modal-footer">
              
        <input type="submit" name="guardar" class="btn btn-success btn" value="Guardar">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>



    </form>





</div>



   <!--Fin del Modal Editar-->
  </div>
</div>
</div>









    













</div>

<?php include 'down.php'; ?>
  

</body>
</html>
