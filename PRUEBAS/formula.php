  <?php


    include 'header.php';
    
    require_once '../php/db.php';
    $con = conexion();
  
    $VT_C="SELECT * FROM categoria";
    $RVT_C=mysqli_query($con, $VT_C);
  
    $VT_PT="SELECT * FROM producto_terminado";
    $RVT_PT=mysqli_query($con, $VT_PT);
  
    $VT_AMP="SELECT * FROM a_materia_prima";
    $RVT_AMP=mysqli_query($con, $VT_AMP);
       
if(isset($_GET['submit'])){

  while($TV_RVT_AMP=mysqli_fetch_row($RVT_AMP)){

      $id_pt = $_REQUEST['Productos'];

      $id=$TV_RVT_AMP[0];
      $id1=$TV_RVT_AMP[0];

      $id = $_REQUEST['checkbox'.$id];
      $id1 = $_REQUEST['cantidad'.$id1];

        echo $checkbox.$id;
        echo $cantidad.$id1;

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

}

  ?>


  <head>
    <title>FORMULA</title>
  </head>


      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Realiza tu formula</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

              <!-- left column -->
          <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">

                  <div class="card-header">
                    <h3 class="card-title">Formula para Productos Terminados</h3>
                  </div>
                   <!-- /.card-header -->

                   <!-- form start -->
                  <form action="formula.php" method="GET">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Seleccione el productos terminado</label>
                        <select class="form-control" name="Productos" id="Productos">
                        <option value="">Seleccione:</option>
                            <?php
                            while($V_RVT_PT=mysqli_fetch_row($RVT_PT)){
                                echo '<option value="'.$V_RVT_PT[0].'">'.$V_RVT_PT[1].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <?php
                        while($V_RVT_AMP=mysqli_fetch_row($RVT_AMP)){
                    ?>
             
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="<?php echo 'checkbox'.$V_RVT_AMP[0]; ?>" id="<?php echo $V_RVT_AMP[0]; ?>" value="<?php echo $V_RVT_AMP[0]; ?>">
                          <label for="<?php echo $V_RVT_AMP[0]; ?>" class="custom-control-label"><?php echo $V_RVT_AMP[1]; ?></label>
                      </div>

                        <div class="col-4">
                          <label for="exampleInputEmail1">Cantidad</label>
                          <input name="<?php echo 'cantidad'.$V_RVT_AMP[0]; ?>" type="number" class="form-control" id="cantidad" placeholder="cantidad">
                    
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    </div>
                     <!-- /.card-body -->
                    <div class="card-footer">
                      <input type="submit" class="btn btn-primary" name="submit" value="ACEPTAR">
                    </div>

                  </form>
                </div>
                 <!-- /.card -->
            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
    <!-- /.content -->

    <?php

 

    include 'footer.php';

    ?>

