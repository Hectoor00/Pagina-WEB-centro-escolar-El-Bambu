<title>MAE
</title>
<!-- <link rel="shortcut icon" href="images/photo.jpg"> -->



 <?php
  $page_title = 'Agregar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);

  $all_products = find_all('products');
  $all_proveedores = find_all('proveedores');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_compra'])){
   $req_fields = array('product-categorie','product-quantity','buying-price');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-categorie']));
    //  $p_descripcion  = remove_junk($db->escape($_POST['product-descripcion']));
    //  $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_proveedor  = remove_junk($db->escape($_POST['proveedor-product']));
    //  $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
    //  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
    //    $media_id = '0';
    //  } else {
    //    $media_id = remove_junk($db->escape($_POST['product-photo']));
    //  }
    //  $date    = 'NOW()';
     $query  = "INSERT INTO compraproducto (";
     $query .=" nombreProducto,cantidadProducto,precioProducto,proveedorProducto";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}','{$p_proveedor}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE nombreProducto='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Producto agregado exitosamente. ");
       redirect('add_compra.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('add_compra.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_compra.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar producto Comprado</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_compra.php" class="clearfix">
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Selecciona El Producto</option>
                    <?php  foreach ($all_products as $product): ?>
                      <option value="<?php echo $product['name'] ?>">
                        <?php echo $product['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="proveedor-product">
                      <option value="">Selecciona El Proveedor</option>
                    <?php  foreach ($all_proveedores as $proveedor): ?>
                      <option value="<?php echo $proveedor['nombreProveedor'] ?>">
                        <?php echo $proveedor['nombreProveedor'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
              </div>

              <br><br>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="product-quantity" placeholder="Cantidad">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-usd"></i>
                     </span>
                     <input type="number" class="form-control" name="buying-price" placeholder="Precio Compra">
                     <span class="input-group-addon">.00</span>
                  </div>
                 </div>
               </div>
              </div>
              <button type="submit" name="add_compra" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
