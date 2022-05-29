<?php

    include "conexion.php";

    $VT_AMP="SELECT * FROM almacen_mp";//VISTA TABLA "ALMACEN MATERIAL PRIMA"
    $RVT_AMP=mysqli_query($con, $VT_AMP);//RESULTADO VISTA TABLA "ALMACEN MATERIAL PRIMA"
 
    $VT_PT="SELECT * FROM pt";
    $RVT_PT=mysqli_query($con, $VT_PT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>HOLA</h2>

        <form action="Venta.php" method="GET">

        <p>Ingrese nombre del cliente:</p>   
        <input type="text" placeholder="Cliente">
        <br><br>

        <select name="Productos" id="Productos">
            <option value="">Seleccione:</option>
            <?php
               while($valores=mysqli_fetch_row($RVT_PT)){
                   echo '<option value="'.$valores[0].'">'.$valores[1].'</option>';
               }
            ?>
        </select>
        <br>

        <p>Ingrese la cantidad de productos</p>               
        <input type="text" name="cantidad" placeholder="Cantidad">
        <br><br>

        <input type="submit" name="submit" value="ACEPTAR">

    </form>
    <?php
        //
        $Cantidad=$_GET['cantidad'];
        $id_pt=$_REQUEST['Productos'];
               
        if(isset($_GET["submit"])){

            $SQLONE="SELECT ingredientes, complemento, cafe, azucar FROM pt WHERE id_pt=$id_pt";
            $SQLONEQ=mysqli_query($con, $SQLONE);
            while($SQLONEVER=mysqli_fetch_row($SQLONEQ)){
            
            $ingrediente=$SQLONEVER[0];
            $complemento=$SQLONEVER[1];
            $cafe=$SQLONEVER[2];
            $azucar=$SQLONEVER[3];  

                $SQLTWO="SELECT id_mp FROM almacen_mp WHERE codigo = '$ingrediente' OR codigo ='$complemento' OR codigo='$cafe' OR codigo='$azucar'";
                $SQLTWOQ=mysqli_query($con, $SQLTWO);
                while($IDMI=mysqli_fetch_row($SQLTWOQ)){
                    
                    $array_ids=array("$IDMI[0]");
                    //echo $IDMI[0];

                    $sql="UPDATE almacen_mp SET cantidad = CASE $IDMI[0]";
                    foreach ($array_ids AS $id)
                    {
                        $VT_AMP="SELECT cantidad, receta FROM almacen_mp WHERE id_mp = $id";
                        $RVT_AMP=mysqli_query($con, $VT_AMP);
                            
                        while($mostrar=mysqli_fetch_row($RVT_AMP)){
                            
                            $Resultado=$mostrar[0]-($mostrar[1]*$Cantidad);
                        }
        
                        $sql.=sprintf(" WHEN ".$id." THEN " .$Resultado);
                    }
                    
                    //$ids = implode(',', array_keys($array_ids));
                    $sql.=" END WHERE id_mp IN (".$IDMI[0].");";
                    echo $sql;
                    
                    if(mysqli_query($con, $sql)){
                        echo "  RESULTADO MODIFICADOS  ";
                    }else{
                        echo "Error $sql.".mysqli_error($con);
                    }
                }
            }  
        }
    ?>

</body>
</html>