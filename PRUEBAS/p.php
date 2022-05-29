<?php

$con = mysqli_connect('localhost', 'root', 'root', 'tak-frappe-prueba');

if($con == true) {
     echo "conectado";
}else{
    echo "error";
}

    $VT_PT="SELECT id_mp, cantidad FROM formula WHERE id_pt = 'PTFF' ";
    $RVT_PT=mysqli_query($con, $VT_PT);

    while($mostrar=mysqli_fetch_row($RVT_PT)){
      echo $mostrar[0];
      echo $mostrar[1];

    }

?>