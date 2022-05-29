<?php

    include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULA</title>
</head>
<body>

<div>
    

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
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del cliente</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>

             
                  <div class="form-group">
                  <label for="exampleInputEmail1">Productos</label>
                  <select class="form-control" name="Productos" id="Productos">
                    <option value="">Seleccione:</option>
                    <?php
                    while($valores=mysqli_fetch_row($RVT_PT)){
                        echo '<option value="'.$valores[0].'">'.$valores[1].'</option>';
                    }
                    ?>
                </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Cantidad de productos</label>
                    <input name="cantidad" type="number" class="form-control" id="exampleInputEmail1" placeholder="cantidad">
                  </div>

                 
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
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php

    ?>

</div>



<?php

     include 'footer.php'

?>

</body>
</html>