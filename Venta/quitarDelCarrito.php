<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito2"], $indice, 1);
header("Location: ../puntodeventa.php?status=3");
?>