<?php 
	require_once "../Venta/base_de_datos.php";

	$id=$_POST['id'];
	$Tabla =$_POST['Tabla'];

	switch ($Tabla) {
		case 'categoria':
			
			$sql = $base_de_datos->prepare("DELETE FROM categoria WHERE id_c = ?;");
		    $sql2 = $sql->execute([$id]);

		break;
		
		case 'producto_terminado':

			$sql = $base_de_datos->prepare("DELETE FROM producto_terminado WHERE id_pt = ?;");
		    $sql2 = $sql->execute([$id]);

		break;

		case 'a_materia_prima':

			$sql = $base_de_datos->prepare("DELETE FROM a_materia_prima WHERE id_mp = ?;");
		    $sql2 = $sql->execute([$id]);

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