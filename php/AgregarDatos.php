<?php 
	require_once "../Venta/base_de_datos.php";

	$var1=$_POST['var1'];
	$var2=$_POST['var2'];
	$var3=$_POST['var3'];
	$var4=$_POST['var4'];

	$Tabla =$_POST['Tabla'];

		$sql = $base_de_datos->prepare("CALL AgregarDatos(?, ?, ?, ?, ?);");
		$sql2 = $sql -> execute([$var1, $var2, $var3, $var4, $Tabla]);
		
	if($sql2 == true){
		echo "1";
	 }else{
		echo "2";
	 }

 ?>