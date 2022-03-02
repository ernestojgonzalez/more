<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<div class="wrapper">

<!-- PRIMERA PARTE -->

  <?php include 'up.php'; ?>

   
    <fieldset>
    <center>	
    <legend>Arreglar Cuadre</legend>
    </fieldset>    
  

<form id="prueba" action="#" method="Post">
      <br><br><br>
<center>
      <input type="submit" name="actualizar" class="btn btn-success btn" value="actualizar">

<?php
if(isset($_POST['actualizar'])){
include 'serverName.php';
include 'conexion.php';

 $sql = "DELETE FROM SACORRELSIS WHERE CodSucu = '00001'"

or die (sqlsrv_error());

if (!sqlsrv_query($conn_sis,$sql))
  {

  }
echo "<script language='JavaScript'> alert('Se han actualizado los puestos');window.location = 'index.php';</script>";
sqlsrv_close($conn_sis);
 }


?>




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
