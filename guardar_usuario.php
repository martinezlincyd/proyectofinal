<?php
include("conectar.php");
$codigo=$_POST['codigo'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$consulta="update usuarios set nombre='$nombre', telefono='$telefono', direccion='$direccion' where codigo=$codigo";
mysqli_query($conexion,$consulta);
mysqli_close($conexion);
echo "<p align=center>Modificacion realizada con exito.</p>";

?>