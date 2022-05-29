<?php

  require_once 'header.php';

  $NTabla = $_REQUEST['Tabla'];
  
  require_once 'Modales.php';
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabla de <?php echo $NTabla; ?></h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
   
		    <div id="Tabla"></div>
	    </div>
    </section>

  </div>
  <!-- /.content-wrapper -->

  <script src="js/popper.min.js" ></script>

  <script type="text/javascript">
      $(document).ready(function(){
		    $('#Tabla').load('componentes/Tabla_<?php echo $NTabla; ?>.php?Tabla=<?php echo $NTabla; ?>');
	   });
  </script>

  <script type="text/javascript">
  
     $(document).ready(function(){

       $('#GN_Formula').click(function(){

        Tabla = "<?php echo $NTabla; ?>";
        var1 = $('#Productos2').val();

        <?php

          $VT_AMP="SELECT * FROM a_materia_prima";
          $RVT_AMP=mysqli_query($con, $VT_AMP);
          while($TV_RVT_AMP=mysqli_fetch_row($RVT_AMP)){

        ?>

          validar= $("<?php echo '#'.$TV_RVT_AMP[0]; ?>").is(':checked');
          id= $("<?php echo '#'.$TV_RVT_AMP[0]; ?>").val();
          cantidad= $("<?php echo '#C'.$TV_RVT_AMP[0]; ?>").val();

            array1 = [id, cantidad, validar];

            var2=array1[0];
            var3=array1[1];

            if(array1[1] != "" && array1[2] == true){
              //console.log(var1);
              //console.log(array1);

              AgregarDatos(var1,var2,var3,"",Tabla);
            }

          <?php 
          }
          ?>

       });

     });
  </script>

<?php

  include 'footer.php';

?>