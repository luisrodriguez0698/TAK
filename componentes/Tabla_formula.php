<?php
    include_once '../Venta/base_de_datos.php';

    $NTabla = $_REQUEST['Tabla'];

    $sentencia2 = $base_de_datos->query("SELECT * FROM $NTabla;");
    $Tabla = $sentencia2->fetchAll(PDO::FETCH_OBJ);

    /*
    $DescTabla = $base_de_datos->query("DESC categoria;");
    $DescTabla->fetchAll(PDO::FETCH_OBJ);

    
    $VT="SELECT * FROM $NTabla";
    $RVT=mysqli_query($con, $VT);

    $DT="DESC $NTabla";
    $RDT=mysqli_query($con, $DT);

    $FDT="DESC $NTabla";
    $RFDT=mysqli_query($con, $FDT);
    */

?>
        <div class="row">
          <div class="col-12">

              <div class="card">

                <div class="card-header">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $NTabla; ?>">
                    <i class="fas fa-plus"></i> Agregar
                  </button>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>id_f</th>
                      <th>id_pt</th>
                      <th>id_mp</th>
                      <th>cantidad</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                      
                  <tbody>
                    <?php 
                      foreach ($Tabla as $VerTabla){

                        $datos= $VerTabla->id_f."||".
                                $VerTabla->id_pt."||".
                                $VerTabla->id_mp."||".
                                $VerTabla->cantidad;
                    ?>
                    <tr>
                        <td><?php echo $VerTabla->id_f ?></td>
                        <td><?php echo $VerTabla->id_pt ?></td>
                        <td><?php echo $VerTabla->id_mp ?></td>
                        <td><?php echo $VerTabla->cantidad ?></td>
                        <td>
                          <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#M<?php echo $NTabla; ?>" onclick="AgregarForm('<?php echo $datos ?>', '<?php echo $NTabla; ?>')">
                             <i class="fas fa-edit"></i>
                          </button>

                          <button class="btn btn-danger glyphicon glyphicon-remove" 
                          onclick="PreguntaSiNo('<?php echo $VerTabla->id_f ?>', '<?php echo $NTabla; ?>')">
                             <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>

                    </tr>
                      <?php
                        }
                      ?>
                  </tbody>
                      <tfoot>
                        <tr>
                          <th>id_f</th>
                          <th>id_pt</th>
                          <th>id_mp</th>
                          <th>cantidad</th>
                          <th>Acciones</th>
                        </tr>
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
           </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

          });
        </script>