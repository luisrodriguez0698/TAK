<?php 
	require_once "../Venta/base_de_datos.php";

	$var1=$_POST['var1'];
	$var2=$_POST['var2'];
	$var3=$_POST['var3'];
	$var4=$_POST['var4'];

	$Tabla =$_POST['Tabla'];


	switch ($Tabla) {
		case 'categoria':
			
			$sql = $base_de_datos->prepare("INSERT INTO categoria (id_c,nombre,cantidad,especial) VALUES (?, ?, ?, ?);");
	        $sql2 = $sql -> execute([$var1, $var2, $var3, $var4]);
		
		break;
		
		case 'producto_terminado':

			$sql = $base_de_datos->prepare("INSERT INTO producto_terminado (id_pt,nombre,id_c, existencia, precioVenta) VALUES (?, ?, ?, ?, ?);");
			$sql2 = $sql -> execute([$var1, $var2, $var3,$var4, $var4]);

		break;

		case 'a_materia_prima':

			$sql = $base_de_datos->prepare("INSERT INTO a_materia_prima (id_mp, nombre, stock_total, stock, PrecioCompra) VALUES (?, ?, ?, ?, ?);");
			$sql2 = $sql -> execute([$var1, $var2, $var3, $var3, $var4]);

		break;

		case 'formula':

			$sql = $base_de_datos->prepare("INSERT INTO formula (id_f,id_pt,id_mp,cantidad) VALUES (?, ?, ?, ?);");
			$sql2 = $sql -> execute([$var1, $var2, $var3, $var4]);
		
		break;

		default:
			# code...
		break;
	}

	/*if($sql2 === 1){
		echo "1";
	}else{
		echo "2";
	}*/

	if($sql2 == true){
		echo "1";
	 }else{
		echo "2";
	 }

    /*if($sql === TRUE){
		echo "1";
	}else{
		echo "2";
	}**/
	//if($sql) return "1";

 ?>