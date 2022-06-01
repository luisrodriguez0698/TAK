<?php
  include_once './header.php';

  session_start();
  if(!isset($_SESSION["carrito2"])) $_SESSION["carrito2"] = [];
  $granTotal = 0;


?>


  <head>
    <title>VENTA</title>
  </head>

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
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

        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ventas</h3>
              </div>
              <!--div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    
                    <div class="step" data-target="#frappes-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="frappes-part" id="frappes-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Frappés</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#papas-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="papas-part" id="papas-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Papas</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#gomitas-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="gomitas-part" id="gomitas-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Gomitas</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#nachos-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="nachos-part" id="nachos-part-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Nachos</span>
                      </button>
                    </div>
                  </div>
      
                  <div class="bs-stepper-content">
                   
                    <div id="frappes-part" class="content" role="tabpanel" aria-labelledby="frappes-part-trigger">
         
                      <div class="form-group">
                        <div class="col-xs-2">
                          <label for="exampleInputEmail1">Nombre del cliente</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <?php/*
                          $VT_PT="SELECT * FROM producto_terminado WHERE id_c='CF'";
                          $RVT_PT=mysqli_query($con, $VT_PT);
                          while($V_RVT_PT=mysqli_fetch_row($RVT_PT)){
                            
                        ?>
                        <div clas="col">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="<?php echo 'checkbox'.$V_RVT_PT[0]; ?>" id="<?php echo $V_RVT_PT[0]; ?>" value="<?php echo $V_RVT_PT[0]; ?>">
                            <label for="<?php echo $V_RVT_PT[0]; ?>" class="custom-control-label"><?php echo $V_RVT_PT[1]; ?></label>
                          </div>

                          <div class="col-lg-6">
                            <label for="exampleInputEmail1">Cantidad</label>
                            <input name="<?php echo 'cantidad'.$V_RVT_PT[0]; ?>" type="number" class="form-control" id="cantidad" placeholder="cantidad">
                          </div>
                        </div>
                          <?php
                            }
                          ?>
                      </div>

                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
        
                    <div id="papas-part" class="content" role="tabpanel" aria-labelledby="papas-part-trigger">
                    <div class="form-group row">
                        <?php
                          $VT_PT="SELECT * FROM producto_terminado WHERE id_c='CP'";
                          $RVT_PT=mysqli_query($con, $VT_PT);
                          while($V_RVT_PT=mysqli_fetch_row($RVT_PT)){
                        ?>
                        <div clas="col">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="<?php echo 'checkbox'.$V_RVT_PT[0]; ?>" id="<?php echo $V_RVT_PT[0]; ?>" value="<?php echo $V_RVT_PT[0]; ?>">
                            <label for="<?php echo $V_RVT_PT[0]; ?>" class="custom-control-label"><?php echo $V_RVT_PT[1]; ?></label>
                          </div>

                          <div class="col-lg-6">
                            <label for="exampleInputEmail1">Cantidad</label>
                            <input name="<?php echo 'cantidad'.$V_RVT_PT[0]; ?>" type="number" class="form-control" id="cantidad" placeholder="cantidad">
                          </div>
                        </div>
                          <?php
                            }
                          ?>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>

                    <div id="gomitas-part" class="content" role="tabpanel" aria-labelledby="gomitas-part-trigger">
                      <div class="form-group row">
                        <?php
                          $VT_PT="SELECT * FROM producto_terminado WHERE id_c='CG'";
                          $RVT_PT=mysqli_query($con, $VT_PT);
                          while($V_RVT_PT=mysqli_fetch_row($RVT_PT)){
                        ?>
                        <div clas="col">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="<?php echo 'checkbox'.$V_RVT_PT[0]; ?>" id="<?php echo $V_RVT_PT[0]; ?>" value="<?php echo $V_RVT_PT[0]; ?>">
                            <label for="<?php echo $V_RVT_PT[0]; ?>" class="custom-control-label"><?php echo $V_RVT_PT[1]; ?></label>
                          </div>

                          <div class="col-lg-6">
                            <label for="exampleInputEmail1">Cantidad</label>
                            <input name="<?php echo 'cantidad'.$V_RVT_PT[0]; ?>" type="number" class="form-control" id="cantidad" placeholder="cantidad">
                          </div>
                        </div>
                          <?php
                            }
                          ?>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>

                    <div id="nachos-part" class="content" role="tabpanel" aria-labelledby="nachos-part-trigger">
                      <div class="form-group row">
                        <?php
                          $VT_PT="SELECT * FROM producto_terminado WHERE id_c='CN'";
                          $RVT_PT=mysqli_query($con, $VT_PT);
                          while($V_RVT_PT=mysqli_fetch_row($RVT_PT)){
                        ?>
                        <div clas="col">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="<?php echo 'checkbox'.$V_RVT_PT[0]; ?>" id="<?php echo $V_RVT_PT[0]; ?>" value="<?php echo $V_RVT_PT[0]; ?>">
                            <label for="<?php echo $V_RVT_PT[0]; ?>" class="custom-control-label"><?php echo $V_RVT_PT[1]; ?></label>
                          </div>

                          <div class="col-lg-6">
                            <label for="exampleInputEmail1">Cantidad</label>
                            <input name="<?php echo 'cantidad'.$V_RVT_PT[0]; ?>" type="number" class="form-control" id="cantidad" placeholder="cantidad">
                          </div>
                        </div>
                          <?php
                            }*/
                          ?>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                  </div>
                </div>
              </div-->
              <!-- /.card-body -->
                <!--div class="card-footer">
                  Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                </div-->

                <div class="card-body">
                  <?php
                    if(isset($_GET["status"])){
                      if($_GET["status"] === "1"){
                        ?>
                          <div class="alert alert-success">
                            <strong>¡Correcto!</strong> Venta realizada correctamente
                          </div>
                        <?php
                      }else if($_GET["status"] === "2"){
                        ?>
                        <div class="alert alert-info">
                            <strong>Venta cancelada</strong>
                          </div>
                        <?php
                      }else if($_GET["status"] === "3"){
                        ?>
                        <div class="alert alert-info">
                            <strong>Ok</strong> Producto quitado de la lista
                          </div>
                        <?php
                      }else if($_GET["status"] === "4"){
                        ?>
                        <div class="alert alert-warning">
                            <strong>Error:</strong> El producto que buscas no existe
                          </div>
                        <?php
                      }else if($_GET["status"] === "5"){
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error: </strong>El producto está agotado
                          </div>
                        <?php
                      }else{
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                          </div>
                        <?php
                      }
                    }
                  ?>
                  <br>
                  <form method="post" action="Venta/agregarAlCarrito.php">
                    <label for="codigo">Código de barras:</label>
                    <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
                  </form>
                  <br><br>
                  <table id="TablaPuntoDeVenta" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio de venta</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Quitar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($_SESSION["carrito2"] as $indice => $producto){ 
                          $granTotal += $producto->total;
                        ?>
                      <tr>
                        <td><?php echo $producto->id_pt ?></td>
                        <td><?php echo $producto->nombre ?></td>
                        <td><?php echo $producto->precioVenta ?></td>
                        <td><?php echo $producto->cantidad ?></td>
                        <td><?php echo $producto->total ?></td>
                        <td><a class="btn btn-danger" href="<?php echo "Venta/quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>

                  <h3>Total: <?php echo $granTotal; ?></h3>
                  <form action="Venta/terminarVenta.php?id_pt=<?php echo $producto->id_pt; ?>" method="POST">
                    <input name="total" type="hidden" value="<?php echo $granTotal;?>">
                    <button type="submit" class="btn btn-success">Terminar venta</button>
                    <a href="Venta/cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
                  </form>
                </div>

            </div>
            <!-- /.card -->
          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
		$(function () {
		$("#TablaPuntoDeVenta").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false
		}).buttons().container().appendTo('#TablaPuntoDeVenta_wrapper .col-md-6:eq(0)');

		});
	</script>

<script>
  // BS-Stepper Init
  /*
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

      $(document).ready(function () {
    $('.stepper').mdbStepper();
    })*/
</script>

  <?php

    include 'footer.php'

  ?>

