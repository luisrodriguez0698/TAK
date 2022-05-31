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

<?php

  include 'footer.php';

?>