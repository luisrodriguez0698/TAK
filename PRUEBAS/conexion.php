<?php

   $con = mysqli_connect('localhost', 'root', 'root', 'tak-frappe');

   if($con == true) {
        echo "conectado";
   }else{
       echo "error";
   }

   $VT_AMP="SELECT * FROM almacen_mp";//VISTA TABLA "ALMACEN MATERIAL PRIMA"
   $RVT_AMP=mysqli_query($con, $VT_AMP);//RESULTADO VISTA TABLA "ALMACEN MATERIAL PRIMA"

   $VT_PT="SELECT * FROM pt";
   $RVT_PT=mysqli_query($con, $VT_PT);

?>