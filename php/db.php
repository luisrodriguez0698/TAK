<?php

   #$con = mysqli_connect('localhost', 'root', 'root', 'tak-admin');
/*
   if($con == true) {
        echo "conectado";
   }else{
       echo "error";
   }
   */

   function conexion(){
      $server="localhost";
      $user="root";
      $pass="root";
      $bd="tak-admin";

      $con=mysqli_connect($server,$user,$pass,$bd);
      
      return $con;
   }

   function categoria(){
      $VT_C="SELECT * FROM categoria";//VISTA TABLA "ALMACEN MATERIAL PRIMA"
      $RVT_C=mysqli_query($con, $VT_C);//RESULTADO VISTA TABLA "ALMACEN MATERIAL PRIMA"

      return $RVT_C;
   }

   /*
   $VT_C="SELECT * FROM categoria";//VISTA TABLA "ALMACEN MATERIAL PRIMA"
   $RVT_C=mysqli_query($con, $VT_C);//RESULTADO VISTA TABLA "ALMACEN MATERIAL PRIMA"

   $VT_AMP="SELECT * FROM a_materia_prima";//VISTA TABLA "ALMACEN MATERIAL PRIMA"
   $RVT_AMP=mysqli_query($con, $VT_AMP);//RESULTADO VISTA TABLA "ALMACEN MATERIAL PRIMA"

   $VT_PT="SELECT * FROM producto_terminado";
   $RVT_PT=mysqli_query($con, $VT_PT);

   $VT_F="SELECT * FROM formula";
   $RVT_F=mysqli_query($con, $VT_F);
   */
?>