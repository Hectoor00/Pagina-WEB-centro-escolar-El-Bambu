<title>compras de producto
</title>
<link rel="shortcut icon" href="images/photo.jpg">
 <?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $compraproducto = find_all_Desc('compraproducto');
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 10%;">Codigo</th>
                
                <th class="text-center" style="width: 10%;"> nombre </th>
                <th class="text-center" style="width: 10%;"> Proveedor </th>
                <th class="text-center" style="width: 10%;"> Stock Comprado </th>

                <th class="text-center" style="width: 10%;"> Precio Ultima Compra por Unidad </th>
                
                
                <th class="text-center" style="width: 10%;"> Fecha de Compra </th>

              </tr>
            </thead>
            <tbody>

            <?php if (!empty($compraproducto)):?>
              <?php foreach ($compraproducto as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id() ?></td>
                
                <td> <?php echo remove_junk($product['nombreProducto']); ?></td>
                <td> <?php echo remove_junk($product['proveedorProducto']); ?></td>

                <td class="text-center"> <?php echo remove_junk($product['cantidadProducto']); ?></td>

                <td class="text-center"> <?php echo remove_junk($product['precioProducto']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['fecha']); ?></td>
              </tr>
             <?php endforeach; ?>

             <?php else: ?>

                 <p>No hay productos comprados aun</p>

            <?php endif;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
