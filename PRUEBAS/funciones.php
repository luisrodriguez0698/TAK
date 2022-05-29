<?php
/*
require_once("php/DBController.php");
$db_handle = new DBController();
    include 'php/db.php';
*/
    $var= $_REQUEST['var'];
    echo $var;

    switch ($var) {
      case '1':
          while($TV_RVT_AMP=mysqli_fetch_row($RVT_AMP)){

            $id_pt = $_REQUEST['Productos'];

            $id=$TV_RVT_AMP[0];
            $id1=$TV_RVT_AMP[0];

            $id = $_REQUEST['checkbox'.$id];
            $id1 = $_REQUEST['cantidad'.$id1];

            //echo $checkbox.$id;
            //echo $cantidad.$id1;

            $SQL1 = "INSERT INTO formula (id_pt, id_mp, cantidad) VALUES ('$id_pt','$id','$id1')";
            //$SQL2 = mysqli_query($con, $SQL1);

            if(mysqli_query($con, $SQL1)){
                echo "<script>
                        alert('REGISTRO INGRESADOS EXITOSAMENTE');
                        window.location= 'formula.php'
                    </script>";
            }else{
                echo "Error $sql.".mysqli_error($con);
            }

          }
        break;

      case '2':

        $idc = $_REQUEST['idc'];
        $namec = $_REQUEST['namec'];
        $cantidadc = $_REQUEST['cantidadc'];
        $especialc = $_REQUEST['especialc'];

        if(!empty($idc)) {
          $query = "SELECT * FROM categoria WHERE id_c='" . $idc . "'";
          $user_count = $db_handle->numRows($query);
          if($user_count>0) {
              
              echo json_encode($user_count);
              //echo "<span class='estado-no-disponible-ID'> ID no Disponible.</span>";
          }else{
    
              $SQLINN = "INSERT INTO categoria (id_c, nombre, cantidad, especial) VALUES ('$idc','$namec','$cantidadc','$especialc')";
              echo mysqli_query($con, $SQLINN);
              echo json_encode($user_count);
          }
        }

        break;
      
      default:
        # code...
      break;
    }


?>