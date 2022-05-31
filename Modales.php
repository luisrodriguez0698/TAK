<?php

  include_once 'Venta/base_de_datos.php';

  $VT_C = $base_de_datos->query("SELECT * FROM categoria;");
  $RVT_C = $VT_C -> fetchAll(PDO::FETCH_OBJ);

  $VT_PT = $base_de_datos->query("SELECT * FROM producto_terminado;");
  $RVT_PT = $VT_PT -> fetchAll(PDO::FETCH_OBJ);

  $VT_AMP = $base_de_datos->query("SELECT * FROM a_materia_prima;");
  $RVT_AMP = $VT_AMP -> fetchAll(PDO::FETCH_OBJ);

?>
 
<!--MODALES DE TABLA CATEGORIA-->

<div class="modal fade" id="categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CATEGORIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formC" method="GET">
      <div class="modal-body">
        <div class="col-auto">
          <div class="form-group">
            <label>ID Categoria</label>
            <input type="text" class="form-control" id="id_categoria" name="" placeholder="Ingrese categoria unica" >
            <span id="estadousuario"></span> 
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="v1_categoria" name="" placeholder="Ingrese Nombre">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Cantidad</label>
            <input type="text" class="form-control" id="v2_categoria" name="" placeholder="Ingrese cantidad">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Especial</label>
            <input type="text" class="form-control" id="v3_categoria" name="" placeholder="...">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="GNcategoria" class="btn btn-primary">Guardar Categoria</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Mcategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICAR CATEGORIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formC" method="GET">
      <div class="modal-body">
        <div class="col-auto">
          <div class="form-group">
            <label>ID Categoria</label>
            <input type="text" class="form-control" id="Mid_categoria" name="" placeholder="Ingrese categoria unica" >
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="Mv1_categoria" name="" placeholder="Ingrese Nombre">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Cantidad</label>
            <input type="text" class="form-control" id="Mv2_categoria" name="" placeholder="Ingrese cantidad">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Especial</label>
            <input type="text" class="form-control" id="Mv3_categoria" name="" placeholder="...">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="ADcategoria" class="btn btn-primary">Guardar Categoria</button>
      </div>
    </div>
  </div>
</div>

<!--/MODALES DE TABLA CATEGORIA-->



<!--MODALES DE TABLA PRODUCTO_TERMINADO-->

<div class="modal fade" id="producto_terminado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO TERMINADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <div class="col-auto">
          <div class="form-group">
            <label>ID Producto Termindo unico</label>
            <input type="text" class="form-control" id="id_producto_terminado" placeholder="Ingrese ID" onBlur="comprobarIDPT()">
            <span id="Estado_IDPT"></span> 
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Nombre del Producto Terminado</label>
            <input type="text" class="form-control" id="v1_producto_terminado" placeholder="Ingrese Nombre">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label for="exampleInputEmail1">Seleccione la categoria</label>
            <select class="form-control" name="Productos" id="v2_producto_terminado">
              <option value="">Seleccione:</option>
                <?php
                  foreach($RVT_C AS $V_RVT_C){
                  echo '<option value="'.$V_RVT_C->id_c.'">'.$V_RVT_C->nombre.'</option>';
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Precio del productos terminado</label>
            <input type="number" class="form-control" id="v3_producto_terminado" placeholder="Precio">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="GNproducto_terminado" class="btn btn-primary">Guardar Producto</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Mproducto_terminado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICAR PRODUCTO TERMINADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <div class="col-auto">
          <div class="form-group">
            <label>ID Producto Termindo unico</label>
            <input type="text" class="form-control" id="Mid_producto_terminado" placeholder="Ingrese ID">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Nombre del Producto Terminado</label>
            <input type="text" class="form-control" id="Mv1_producto_terminado" placeholder="Ingrese Nombre">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label for="exampleInputEmail1">Seleccione la categoria</label>
            <select class="form-control" name="Productos1" id="Mv2_producto_terminado">
              <option value="">Seleccione:</option>
                <?php
                    foreach($RVT_C AS $V_RVT_C1){
                  echo '<option value="'.$V_RVT_C1->id_c.'">'.$V_RVT_C1->nombre.'</option>';
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Precio del productos terminado</label>
            <input type="number" class="form-control" id="Mv3_producto_terminado" placeholder="Precio">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="ADproducto_terminado" class="btn btn-primary">Guardar Producto</button>
      </div>
    </div>
  </div>
</div>

<!--/MODALES DE TABLA PRODUCTO_TERMINADO-->



<!--MODALES DE TABLA a_materia_prima-->

<div class="modal fade" id="a_materia_prima" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR INGREDIENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formC" method="GET">
      <div class="modal-body">
        <div class="col-auto">
          <div class="form-group">
            <label>ID Categoria</label>
            <input type="text" class="form-control" id="id_a_materia_prima" name="" placeholder="Ingrese categoria unica" >
            <span id="estadousuario"></span> 
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="v1_a_materia_prima" name="" placeholder="Ingrese Nombre">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Stock</label>
            <input type="text" class="form-control" id="v2_a_materia_prima" name="" placeholder="Ingrese cantidad">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Precio Compra</label>
            <input type="text" class="form-control" id="v3_a_materia_prima" name="" placeholder="Ingrese cantidad">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="GNa_materia_prima" class="btn btn-primary">Guardar Categoria</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Ma_materia_prima" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR INGREDIENTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formC" method="GET">
      <div class="modal-body">
        <div class="col-auto">
          <div class="form-group">
            <label>ID Categoria</label>
            <input type="text" class="form-control" id="Mid_a_materia_prima" name="" placeholder="Ingrese categoria unica" >
            <span id="estadousuario"></span> 
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="Mv1_a_materia_prima" name="" placeholder="Ingrese Nombre">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Stock</label>
            <input type="text" class="form-control" id="Mv2_a_materia_prima" name="" placeholder="Ingrese cantidad">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group">
            <label>Precio Compra</label>
            <input type="text" class="form-control" id="Mv3_a_materia_prima" name="" placeholder="Ingrese cantidad">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="ADa_materia_prima" class="btn btn-primary">Guardar Categoria</button>
      </div>
    </div>
  </div>
</div>

<!--/MODALES DE TABLA a_materia_prima-->



<!--MODALES DE TABLA FORMULA-->

<div class="modal fade" id="formula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR FORMULA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
      <div class="modal-body">
        <!-- form start -->
      
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Seleccione el productos terminado</label>
            <select class="form-control" name="" id="Productos2">
              <option value="">Seleccione:</option>
              <?php
                foreach($RVT_PT AS $V_RVT_PT){
                  echo '<option value="'.$V_RVT_PT->id_pt.'">'.$V_RVT_PT->nombre.'</option>';
                }
              ?>
            </select>
          </div>

              <?php
                foreach($RVT_AMP AS $V_RVT_AMP){
              ?>
             
          <div class="card-group row">
            <div class="card flex" style="max-width: 10rem;">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="checkbox" id="<?php echo $V_RVT_AMP->id_mp ?>" value="<?php echo $V_RVT_AMP->id_mp ?>">
                <label for="<?php echo $V_RVT_AMP->id_mp ?>" class="custom-control-label"><?php echo $V_RVT_AMP->nombre ?></label>
              </div>

            <div class="col-auto">
              <label for="exampleInputEmail1">Cantidad</label>
              <input name="cantidad" type="number" class="form-control" id="<?php echo 'C'.$V_RVT_AMP->id_mp ?>" placeholder="cantidad">   
            </div>
            </div>
          </div>

              <?php
                }
              ?>

        </div>
        <!-- /.card-body -->
          <!--div class="card-footer">
            <input type="submit" class="btn btn-primary" name="ATF" value="ACEPTAR">
          </div-->

        <!-- form start -->
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="GNformula" class="btn btn-primary">Guardar Categoria</button>
      </div>
    </div>
  </div>
</div>

<!--/MODALES DE TABLA FORMULA-->


