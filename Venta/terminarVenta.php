<?php
if(!isset($_POST["total"])) exit;

date_default_timezone_set('America/Mexico_City'); 
session_start();


$total = $_POST["total"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE producto_terminado SET existencia = existencia - ? WHERE id_pt = ?;");

foreach ($_SESSION["carrito2"] as $producto_terminado) {
	$total += $producto_terminado->total;
	$sentencia->execute([$producto_terminado->id_pt, $idVenta, $producto_terminado->cantidad]);
	$sentenciaExistencia->execute([$producto_terminado->cantidad, $producto_terminado->id_pt]);
}

	$base_de_datos->commit();
	unset($_SESSION["carrito2"]);
	$_SESSION["carrito2"] = [];
	
	header("Location: ../puntodeventa.php?status=1");
?>