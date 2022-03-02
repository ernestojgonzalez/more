<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
<div class="wrapper">

<!-- PRIMERA PARTE -->

  <?php include 'up.php'; ?>
  
    
    <fieldset>
    <center>	
    <legend>Eliminar ceros en Cuentas por pagar o cobrar</legend>
    </fieldset>    
  

<form id="prueba" action="#" method="Post">
      <br><br><br>
<center>
      <input type="submit" name="actualizar" class="btn btn-success btn" value="actualizar">

<?php
if(isset($_POST['actualizar'])){
include 'serverName.php';
include 'conexion.php';

//$sql = "INSERT INTO pruebaE (nombre, apellido) values nombre = '$nombre', apellido = '$apellido'"
//$sql = "UPDATE SAPROD_04 SET Ubic = '99' where CodProd = '$CodProd' "
// $sql = "UPDATE SAEXIS SET PuestoI = ISNULL(P.Ubic,'') FROM SAEXIS E INNER JOIN SAPROD_04 P ON P.CodProd = E.CodProd"

  $sql ="
  UPDATE SAACXC
   SET Saldo = 0
WHERE Saldo <> 0 AND (Saldo >= -0.1 AND Saldo <= 0.1)

  UPDATE SAACXP
   SET Saldo = 0
WHERE Saldo <> 0 AND (Saldo >= -0.1 AND Saldo <= 0.1)

  "

or die (sqlsrv_error());

if (!sqlsrv_query($conn_sis,$sql))
  {

  }
echo "<script language='JavaScript'> alert('Actualización satisfactoria');window.location = 'index.php';</script>";
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
