<?php 
	require_once "../Venta/base_de_datos.php";

	$id=$_POST['id'];
	$Tabla =$_POST['Tabla'];

		$sql = $base_de_datos -> prepare("CALL EliminarDatos(?,?);");
		$sql2 = $sql -> execute([$id, $Tabla]);

	if($sql2 == true){
       echo "1";
	}else{
       echo "2";
	}
 ?>