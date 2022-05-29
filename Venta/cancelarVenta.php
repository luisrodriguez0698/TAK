<?php

session_start();

unset($_SESSION["carrito2"]);
$_SESSION["carrito2"] = [];

header("Location: ../puntodeventa.php?status=2");
?>