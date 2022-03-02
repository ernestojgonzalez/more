<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<div class="wrapper">

<!-- PRIMERA PARTE -->

  <?php include 'up.php'; ?>





  
    
    <fieldset>
    <center>	
    <legend>ACTUALIZAR PUESTOS</legend>
    </fieldset>    
  

<form id="prueba" action="#" method="Post">
      <br><br><br>
<center>
      <input type="submit" name="guardar" class="btn btn-success btn" value="Guardar">

<?php
if(isset($_POST['guardar'])){
include 'serverName.php';
include 'conexion.php';

//$sql = "INSERT INTO pruebaE (nombre, apellido) values nombre = '$nombre', apellido = '$apellido'"
//$sql = "UPDATE SAPROD_04 SET Ubic = '99' where CodProd = '$CodProd' "
 $sql = "UPDATE SAEXIS
   SET PuestoI = ISNULL(P.Ubic,'')
FROM SAEXIS E
INNER JOIN SAPROD_04 P ON P.CodProd = E.CodProd"


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
