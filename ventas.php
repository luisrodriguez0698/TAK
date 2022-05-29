
<?php
	include_once './header.php';

	$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, 
		GROUP_CONCAT(producto_terminado.id_pt, '..',  producto_terminado.nombre, '..', productos_vendidos.cantidad SEPARATOR '__') 
		AS producto_terminado FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
		INNER JOIN producto_terminado ON producto_terminado.id_pt = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");

	$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
		<div class="row">
          	<div class="col-12">
              	<div class="card">
					<div class="card-header">
						<a class="btn btn-success" href="./puntodeventa.php">Nueva <i class="fa fa-plus"></i></a>
					</div>
						<div class="card-body">
							<table id="TablaVenta" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Número</th>
										<th>Fecha</th>
										<th>Productos vendidos</th>
										<th>Total</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($ventas as $venta){ ?>
									<tr>
										<td><?php echo $venta->id ?></td>
										<td><?php echo $venta->fecha ?></td>
										<td>
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>Código</th>
														<th>Descripción</th>
														<th>Cantidad</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach(explode("__", $venta->producto_terminado) as $productosConcatenados){ 
													$producto = explode("..", $productosConcatenados)
													?>
													<tr>
														<td><?php echo $producto[0] ?></td>
														<td><?php echo $producto[1] ?></td>
														<td><?php echo $producto[2] ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</td>
										<td><?php echo $venta->total ?></td>
										<td><a class="btn btn-danger" href="<?php echo "Venta/eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
									</tr>
									<?php
										} 
								 	?>
								</tbody>
								<tfoot>
									<tr>
										<th>Número</th>
										<th>Fecha</th>
										<th>Productos vendidos</th>
										<th>Total</th>
										<th>Eliminar</th>
									</tr>
								</tfoot>
							</table>
						</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

	<script type="text/javascript">
		$(function () {
		$("#TablaVenta").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#TablaVenta_wrapper .col-md-6:eq(0)');

		});
	</script>

<?php

	include_once './footer.php';

?>