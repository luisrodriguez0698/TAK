<?php 
	require_once "../Venta/base_de_datos.php";

	$var1=$_POST['var1'];
	$var2=$_POST['var2'];
	$var3=$_POST['var3'];
	$var4=$_POST['var4'];

	$Tabla =$_POST['Tabla'];

	switch ($Tabla) {
		case 'categoria':
			
			$sql=$base_de_datos->prepare("UPDATE categoria SET id_c=?, nombre=?, cantidad=?, especial=? WHERE id_c=?;");
			$sql2 = $sql -> execute([$var1, $var2, $var3, $var4, $var1]);
		
		break;
		
		case 'producto_terminado':

			$sql=$base_de_datos->prepare("UPDATE producto_terminado SET id_pt=?, nombre=?, id_c=?, existencia=?, precioVenta=? WHERE id_pt=?;");
			$sql2 = $sql -> execute([$var1, $var2, $var3, $var4, $var4, $var1]);

		break;

		case 'a_materia_prima':

			$sql=$base_de_datos->prepare("UPDATE a_materia_prima SET id_mp=?, nombre=?, stock_total=?, stock=?, PrecioCompra=? WHERE id_mp=?;");
			$sql2 = $sql -> execute([$var1, $var2, $var3, $var3, $var4, $var1]);

		break;

		default:
			# code...
		break;
	}

	if($sql2 == true){
		echo "1";
	 }else{
		echo "2";
	 }

 ?>