<?php 
	require_once "db.php";
	$con=conexion();

	$var1=$_POST['var1'];
	$var2=$_POST['var2'];
	$var3=$_POST['var3'];
	$var4=$_POST['var4'];

	$Tabla =$_POST['Tabla'];

	switch ($Tabla) {
		case 'categoria':
			
			$sql="UPDATE categoria SET 
			id_c='$var1',
			nombre='$var2',
			cantidad='$var3',
			especial='$var4'
				WHERE id_c='$var1'";
		
		break;
		
		case 'producto_terminado':

			$sql="UPDATE producto_terminado SET 
			id_pt='$var1',
			nombre='$var2',
			id_c='$var3',
			precio='$var4'
				WHERE id_pt='$var1'";

		break;

		case 'a_materia_prima':

			$sql="UPDATE a_materia_prima SET 
			id_mp='$var1',
			nombre='$var2',
			stock_total='$var3',
			stock='$var3'
				WHERE id_mp='$var1'";

		break;

		default:
			# code...
		break;
	}

	echo $result=mysqli_query($con,$sql);

 ?>