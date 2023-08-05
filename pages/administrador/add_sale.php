<title> MAE
</title>
<!-- <link rel="shortcut icon" href="images/photo.jpg"> -->
 <?php
  $page_title = 'Agregar venta';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>




<!-- agregar -->
<?php

  if(isset($_POST['add_sale'])){


    $req_fields = array('s_id','quantity','price','total','cliente' );
    validate_fields($req_fields);
        if(empty($errors)){


          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape((int)$_POST['total']);
          // $date      = $db->escape($_POST['date']);
          // $s_date    = make_date();

          // Generar un número de cliente único
          $cliente = $db->escape((int)$_POST['cliente']);

          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,cliente";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$cliente}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
              
                  $session->msg('s',"Venta agregada ");
                  redirect('add_sale.php', false);
                } else {
                  $session->msg('d','Lo siento, registro falló.');
                  redirect('add_sale.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('add_sale.php',false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Buscar por el nombre del producto">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Agregar Producto</button>
            </span>
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Realizar venta</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_sale.php">
         <table class="table table-bordered">
           <thead>
           <th> Cliente </th>
            <th> Producto </th>
            <th> Precio </th>
            <th> Cantidad </th>
            <th> Total </th>
            <!-- <th> Agregado</th> -->
            <th> Acciones</th>
           </thead>
             <tbody  id="product_info"> </tbody>
         </table>
       </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
