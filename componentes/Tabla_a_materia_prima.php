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
                      <th>id_mp</th>
                      <th>nombre</th>
                      <th>stock</th>
                      <th>PrecioCompra</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                      
                  <tbody>
                    <?php 
                      foreach ($Tabla as $VerTabla){

                        $datos= $VerTabla->id_mp."||".
                                $VerTabla->nombre."||".
                                $VerTabla->stock."||".
                                $VerTabla->PrecioCompra;
                    ?>
                    <tr>
                        <td><?php echo $VerTabla->id_mp ?></td>
                        <td><?php echo $VerTabla->nombre ?></td>
                        <td><?php echo $VerTabla->stock ?></td>
                        <td><?php echo $VerTabla->PrecioCompra ?></td>
                        <td>
                          <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#M<?php echo $NTabla; ?>" onclick="AgregarForm('<?php echo $datos ?>', '<?php echo $NTabla; ?>')">
                             <i class="fas fa-edit"></i>
                          </button>

                          <button class="btn btn-danger glyphicon glyphicon-remove" 
                          onclick="PreguntaSiNo('<?php echo $VerTabla->id_mp ?>', '<?php echo $NTabla; ?>')">
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
                          <th>id_mp</th>
                          <th>nombre</th>
                          <th>stock</th>
                          <th>PrecioCompra</th>
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

        <script type="text/javascript">
          $(document).ready(function(){
              
            $('#GN'+'<?php echo $NTabla; ?>').click(function(){

            Tabla = "<?php echo $NTabla; ?>";

            var1 = $('#id_'+Tabla).val();
            var2 = $('#v1_'+Tabla).val();
            var3 = $('#v2_'+Tabla).val();
            var4 = $('#v3_'+Tabla).val();

            AgregarDatos(var1,var2,var3,var4,Tabla);

            });

            $('#AD'+'<?php echo $NTabla; ?>').click(function(){

            Tabla = "<?php echo $NTabla; ?>";
            ActualizarDatos(Tabla);

            });

          });    
        </script>

        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

          });
        </script>